<?php

namespace App\Livewire\Pages\Selection;

use Livewire\Attributes\On;
use Livewire\Component;
use App\Models\Selection;
use App\Models\Donator;
use App\Models\Project;

class SelectionCard extends Component
{
    public Selection $selection;
    public $projects;
    public $newProjectId;
    public $markdownNotes;
    public $notesSaved = false;
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

    public function mount(Selection $selection)
    {
        $this->selection = $selection->load(['donators', 'projects']);
        $this->projects = Project::all();
        $this->markdownNotes = $selection->notes ?? '';
        $this->notesSaved = !empty($selection->notes);
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

    public function addProject()
    {
        if ($this->newProjectId && $this->newProjectId !== 'default') {
            $this->selection->projects()->attach($this->newProjectId);
            $this->selection->refresh();
            $this->newProjectId = null;
        }
    }


    public function removeProject($projectId)
    {
        $this->selection->projects()->detach($projectId);
        $this->selection->load('projects');
    }
    public function saveNotes()
    {
        $this->selection->update([
            'notes' => $this->markdownNotes,
        ]);
        $this->selection->refresh();
        $this->markdownNotes = $this->selection->notes;

        $this->notesSaved = true;
        session()->flash('message', 'Notes enregistrées !');
    }
    public function enableEditNotes()
    {
        $this->notesSaved = false;
    }



    public function redrawDonator($donatorId)
    {
        $donator = Donator::find($donatorId);
        if ($donator) {
            $this->selection->donators()->detach($donator->id);

            $newDonator = Donator::where('is_drawable', true)
                ->whereNull('selection_count')
                ->inRandomOrder()
                ->first();

            if ($newDonator) {
                $newDonator->selection_count = 1;
                $newDonator->save();
                $this->selection->donators()->attach($newDonator->id);
            }

            $donator->selection_count = null;
            $donator->disponibility = false;
            $donator->save();

            $this->selection->refresh();
            $this->dispatch('refresh-editForm');
        }
    }
    public function releaseDonator($donatorId)
    {
        $donator = Donator::find($donatorId);
        if ($donator) {
            $this->selection->donators()->detach($donator->id);
            $donator->selection_count = null;
            $donator->disponibility = false;
            $donator->save();
            $this->selection->refresh();
            $this->dispatch('donatorReleased', $donatorId);
        }
    }

    public function pickNewDonator()
    {
        $newDonator = Donator::where('is_drawable', true)
            ->whereNull('selection_count')
            ->inRandomOrder()
            ->first();

        if ($newDonator) {
            $newDonator->selection_count = 1;
            $newDonator->save();
            $this->selection->donators()->attach($newDonator->id);
            $this->selection->refresh();
            $this->dispatch('newDonatorPicked', $newDonator->id);
        }
    }

    public function render()
    {
        return view('livewire.pages.selection.selection-card', [
            'participantsEnAttente' => $this->selection->donators->where('disponibility', false),
            'participantsConfirmes' => $this->selection->donators->where('disponibility', true),
            'projects' => $this->projects,
        ]);
    }
}
