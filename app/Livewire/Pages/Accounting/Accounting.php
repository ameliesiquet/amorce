<?php
namespace App\Livewire\Pages\Accounting;

use App\Models\Fonds;
use Livewire\Component;
use Livewire\WithPagination;

class Accounting extends Component
{
    use WithPagination;

    public $funds;
    public $specificFunds;
    public $search = '';

    protected $listeners = [
        'refresh-funds' => 'refreshFunds',
    ];

    public function mount(): void
    {
        // Initiale Daten laden
        $this->funds = Fonds::where('specific', false)->get();

        $this->specificFunds = Fonds::where('specific', true)->get();
    }

    // Event zum Refresh der Fonds-Daten
    public function refreshFunds()
    {
        $this->funds = Fonds::where('specific', false)->get();
        $this->specificFunds = Fonds::where('specific', true)->get();

    }

    public function openmodal($which, $model = null): void
    {
        // Nur Modal öffnen, ohne den Fonds zu ändern
        $this->dispatch('openmodal', $which, $model);
    }




    public function render()
    {
        return view('livewire.pages.accounting.accounting', [
            'funds' => $this->funds,
            'specificFunds' => $this->specificFunds,
        ]);
    }
}
