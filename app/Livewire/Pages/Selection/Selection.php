<?php

namespace App\Livewire\Pages\Selection;

use AllowDynamicProperties;
use Livewire\Attributes\On;
use Livewire\Component;
use App\Models\Selection as SelectionModel;
class Selection extends Component
{

    protected $listeners = ['selectionCreated' => 'refreshSelections'];
    public $modal = null;
    public $modalParams = null;


    public function openmodal($which, $modelId = null): void
    {
        $this->modal = $which;
        $this->modalParams = [
            'id' => $modelId,
            'timestamp' => now()->timestamp,
        ];
    }

    #[On('close-modal')]
    public function handleCloseModal()
    {
        $this->modal = null;
        $this->modalParams = null;
    }

    public function closeModal()
    {
        $this->modal = null;
    }

    public function render()
    {
        return view('livewire.pages.selection.selection', [
            'activeSelections' => \App\Models\Selection::where('status', \App\Enum\SelectionStatus::ACTIVE->value)->get(),
            'pendingSelections' => \App\Models\Selection::where('status', \App\Enum\SelectionStatus::PENDING->value)->get(),
            'closedSelections' => \App\Models\Selection::where('status', \App\Enum\SelectionStatus::CLOSED->value)->get(),
        ]);
    }
}
