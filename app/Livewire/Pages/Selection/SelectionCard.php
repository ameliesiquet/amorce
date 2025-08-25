<?php

namespace App\Livewire\Pages\Selection;

use Livewire\Component;
use App\Models\Selection;
use App\Models\Donator;

class SelectionCard extends Component
{
    public Selection $selection;

    public function mount(Selection $selection)
    {
        $this->selection = $selection->load('donators');
    }

    public function makeParticipantYes($id)
    {
        $donator = Donator::find($id);
        if ($donator) {
            $donator->disponibility = true;
            $donator->save();
            $this->selection->refresh();
        }
    }

    public function makeParticipantNo($id)
    {
        $donator = Donator::find($id);
        if ($donator) {
            $donator->disponibility = false;
            $donator->save();
            $this->selection->refresh();
        }
    }

    public function render()
    {
        return view('livewire.pages.selection.selection-card', [
            'participantsEnAttente' => $this->selection->donators->where('disponibility', false),
            'participantsConfirmes' => $this->selection->donators->where('disponibility', true),
        ]);
    }
}
