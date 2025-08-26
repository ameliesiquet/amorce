<?php

namespace App\Livewire\Modals;

use App\Models\Selection;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Fonds;
use App\Models\Transactions;
use App\Models\Donator;
use Carbon\Carbon;
use AllowDynamicProperties;

#[AllowDynamicProperties]
class ImportCsv extends Component
{
    use WithFileUploads;

    public $upload;
    public $fund_id;
    public $imported = false;

    public ?int $model = null;

    protected $rules = [
        'fund_id' => 'required|exists:fonds,id',
        'upload' => 'required|mimes:csv,txt',
    ];

    protected $messages = [
        'fund_id.required' => 'Veuillez sélectionner un fond.',
        'upload.required' => 'Veuillez sélectionner un fichier CSV.',
        'upload.mimes' => 'Le fichier doit être un CSV ou TXT.',
    ];

    public function import()
    {
        $this->validate();

        $path = $this->upload->getRealPath();
        $handle = fopen($path, 'r');

        while (($line = fgets($handle)) !== false) {
            $columns = str_getcsv($line, ',', '"');

            if (empty($columns[0]) || $columns[0] === 'Date') continue;

            $date = Carbon::createFromFormat('d-m-Y', $columns[0] ?? now());

            $amount = 0;
            if (!empty($columns[2])) {
                $cleanAmount = str_replace('.', '', $columns[2]);
                $cleanAmount = str_replace(',', '.', $cleanAmount);
                $amount = (float) $cleanAmount;
            }

            $status_type = $amount < 0 ? 'sortie' : 'entrée';
            $transaction_type = match($columns[7] ?? null) {
                'SCT'   => 'Virement standard',
                'SCTIB' => 'Virement instantané',
                default => $columns[8] ?? null,
            };

            $donorName = $columns[5] ?? null;

            if (empty(trim($donorName))) {
                continue;
            }

            $donator = Donator::updateOrCreate(
                [
                    'name' => $donorName,
                    'email' => $donorName ? Str::slug($donorName, '.') . '@example.com' : null,
                ],
                ['disponibility' => true, 'selection_count' => null]
            );

            Transactions::create([
                'donator_id'       => $donator->id,
                'fonds_id'         => $this->fund_id,
                'amount'           => $amount,
                'transaction_type' => $transaction_type,
                'status_type'      => $status_type,
                'donor_name'       => $donator->name,
                'created_at'       => $date,
            ]);

            $donations = $donator->donations_dates ?? [];
            $donations[] = $date->format('Y-m-d');
            $donator->donations_dates = array_values(array_unique($donations));
            $donator->save();
        }


        $this->reset(['upload', 'fund_id']);
        $this->imported = true;

        $this->dispatch('refresh-make-transaction');
    }

    public function render()
    {
        return view('livewire.modals.import-csv', [
            'funds' => Fonds::all(),
        ]);
    }
}
