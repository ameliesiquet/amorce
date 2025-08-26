<?php

namespace App\Livewire\Pages\Selection;

use AllowDynamicProperties;
use Livewire\Component;
use App\Models\Selection;
use App\Models\Donator;
use Illuminate\Support\Carbon;

#[AllowDynamicProperties]
class CreateSelection extends Component
{
    public $participants;
    public $winners = [];
    public $errorMessage = '';
    public $selectionName;
    public $selectionStatus;
    public $showModal = false;

    protected $listeners = ['openmodal' => 'handleOpenModal'];

    public function mount()
    {
        $this->participants = Donator::whereIn('selection_count', [1, 2])->get();
        $this->selectionStatus = \App\Enum\SelectionStatus::PENDING->value;
        $this->drawWinners();
    }

    public function handleOpenModal($modal)
    {
        if ($modal === 'create-selection') {
            $this->showModal = true;
        }
    }

    public function close()
    {
        $this->showModal = false;
    }

    public function drawWinners()
    {
        $threeMonthsAgo = now()->subMonths(3);
        $oneYearAgo = now()->subYear();

        $eligibleDonators = Donator::where('disponibility', true)
            ->where(function ($query) use ($threeMonthsAgo) {
                $query->whereNull('selection_count')
                    ->orWhere('last_selection', '<', $threeMonthsAgo);
            })
            ->where(function ($q) use ($oneYearAgo) {
                $q->whereNull('last_selection')
                    ->orWhere('last_selection', '<', $oneYearAgo);
            })
            ->whereNotIn('id', collect($this->winners)->pluck('id')->toArray())
            ->inRandomOrder()
            ->take(3)
            ->get();

        if ($eligibleDonators->isEmpty()) {
            $this->errorMessage = 'Aucun donateur ne remplit les conditions requises pour la nouvelle sélection.';
            $this->winners = [];
            return;
        }

        $this->winners = $eligibleDonators->map(fn($d) => [
            'id' => $d->id,
            'name' => $d->name,
            'email' => $d->email,
            'disponibility' => $d->disponibility,
        ])->toArray();

        $this->errorMessage = '';
    }

    public function redrawWinner($index)
    {
        $newWinner = Donator::whereNull('selection_count')
            ->where('disponibility', true)
            ->inRandomOrder()
            ->first()
            ->toArray();

        $this->winners[$index] = $newWinner;
    }

    private function setDisponibility($donatorId, bool $status)
    {
        $donator = Donator::find($donatorId);
        if ($donator) {
            $donator->disponibility = $status;
            $donator->save();
        }
        return $status;
    }

    public function makeDispoYes($index)
    {
        $this->winners[$index]['disponibility'] = $this->setDisponibility($this->winners[$index]['id'], true);
    }

    public function makeDispoNo($index)
    {
        $this->winners[$index]['disponibility'] = $this->setDisponibility($this->winners[$index]['id'], false);
    }

    public function createSelection()
    {
        $name = $this->selectionName ?? Carbon::now()->format('F Y');

        $selection = Selection::create([
            'name' => $name,
            'status' => $this->selectionStatus,
        ]);

        $lastSelection = Selection::latest('id')->with('donators')->skip(1)->first();

        $donatorsToKeep = collect();

        if ($lastSelection) {
            $donatorsToKeep = $lastSelection->donators->filter(fn($d) => $d->pivot->status_in_selection < 3);

            foreach ($donatorsToKeep as $donator) {
                $selection->donators()->attach($donator->id, [
                    'status_in_selection' => $donator->pivot->status_in_selection + 1,
                ]);
            }
        }

        $neededNew = 9 - $donatorsToKeep->count();
        $newDonators = Donator::inRandomOrder()
            ->whereNotIn('id', $donatorsToKeep->pluck('id'))
            ->take($neededNew)
            ->get();

        foreach ($newDonators as $donator) {
            $selection->donators()->attach($donator->id, [
                'status_in_selection' => 1,
            ]);
        }

        foreach ($selection->donators as $donator) {
            $donator->selection_count = ($donator->selection_count ?? 0) + 1;
            $donator->last_selection = now();
            $donator->save();
        }

        $this->showModal = false;
        $this->dispatch('openalert', ['message' => 'Création de la sélection terminé ✅']);
        $this->dispatch('close-modal');
        $this->winners = [];
        $this->selectionName = '';
    }


    private function updateDonatorCounts(Selection $selection): void
    {
        foreach ($selection->donators as $donator) {
            $donator->selection_count = $donator->selection_count === 3
                ? 1
                : ($donator->selection_count ?? 0) + 1;

            $donator->last_selection = now();
            $donator->save();
        }
    }


    public function render()
    {
        return view('livewire.pages.selection.create-selection', [
            'participants' => $this->participants,
        ]);
    }
}
