<?php

namespace App\Livewire\Modals;

use AllowDynamicProperties;
use App\Models\Fonds;
use Livewire\Component;

#[AllowDynamicProperties] class CreateFund extends Component
{
    public $title = '';
    public $specific = false;


    protected $rules = [
        'title' => 'required|string|max:255',
        'specific' => 'boolean',
    ];



    public function createFund()
    {
        $this->validate();

        // Neuen Fonds erstellen
        Fonds::create([
            'title' => $this->title,
            'specific' => true,
        ]);

        // Eingabefelder zurücksetzen
        $this->reset(['title', 'specific']);

        // Event auslösen, um die Daten neu zu laden
        $this->dispatch('refresh-funds');  // Ein benutzerdefiniertes Event, das die Seite neu lädt

        // Modal schließen
        $this->dispatch('close-modal');
    }



    public function render()
    {
        return view('livewire.modals.create-fund');
    }
}
