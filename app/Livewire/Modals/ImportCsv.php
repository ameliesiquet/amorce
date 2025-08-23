<?php

namespace App\Livewire\Modals;

use App\Livewire\Csv;
use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Fonds;
use App\Models\Transactions;
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
        if ($handle !== false) {
            while (($line = fgets($handle)) !== false) {
                $columns = str_getcsv($line, ',', '"');

                if (empty($columns[0]) || $columns[0] === 'Date') {
                    continue;
                }
                $date = !empty($columns[0])
                    ? Carbon::createFromFormat('d-m-Y', $columns[0])
                    : now();

                $amount = 0;
                if (!empty($columns[2])) {
                    $cleanAmount = str_replace('.', '', $columns[2]);
                    $cleanAmount = str_replace(',', '.', $cleanAmount);
                    $amount = (float) $cleanAmount;
                }
                $transaction_type = match($columns[7] ?? null) {
                    'SCT' => 'Virement standard',
                    'SCTIB' => 'Virement instantané',
                    default => $columns[8] ?? null,
                };

                $status_type = $amount < 0 ? 'sortie' : 'entrée';

                $donorName = $columns[5] ?? null;

                Transactions::create([
                    'fonds_id' => $this->fund_id,
                    'amount' => $amount,
                    'transaction_type' => $transaction_type,
                    'status_type' => $status_type,
                    'created_at' => $date,
                ]);
            }
            fclose($handle);
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
