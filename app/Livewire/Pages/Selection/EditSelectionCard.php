<?php

namespace App\Livewire\Pages\Selection;

use Livewire\Component;
use App\Models\Selection;

class EditSelectionCard extends Component
{
    public Selection $selection;

    public $selectionName;
    public $selectionStatus;
    public $errorMessage;

    public function mount(Selection $selection)
    {
        $this->selection = $selection;
        $this->selectionName = $selection->name;
        $this->selectionStatus = $selection->status;
    }

    public function updateSelection()
    {
        try {
            $this->selection->update([
                'name' => $this->selectionName,
                'status' => $this->selectionStatus,
            ]);

            session()->flash('message', 'Sélection mise à jour avec succès ✅');
            $this->dispatch('closeModal');
        } catch (\Exception $e) {
            $this->errorMessage = "Erreur lors de la mise à jour : " . $e->getMessage();
        }
    }

    public function render()
    {
        return view('livewire.pages.selection.edit-selection-card', [
            'selection' => $this->selection,
        ]);
    }

}
