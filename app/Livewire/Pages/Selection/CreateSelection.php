<?php

namespace App\Livewire\Pages\Selection;

use Livewire\Component;
use App\Models\Selection;
use App\Models\Donator;
use Illuminate\Support\Carbon;

class CreateSelection extends Component
{
    public $participants;
    public $winners = [];
    public $errorMessage = '';
    public $selectionName;

    public function mount()
    {
        $this->participants = Donator::whereIn('selection_count', [1, 2])->get();

        $this->drawWinners();
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
            $this->errorMessage = 'Keine Donators erfüllen die Bedingungen für die neue Selection.';
            $this->winners = [];
            return;
        }

        $this->winners = $eligibleDonators->map(fn($donator) => [
            'id' => $donator->id,
            'name' => $donator->name,
            'email' => $donator->email,
            'disponibility' => $donator->disponibility,
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
        if (empty($this->winners)) {
            $this->errorMessage = 'Vueillez sélectionner 3 participants.';
            return;
        }

        $name = $this->selectionName ?? Carbon::now()->format('F Y');

        $selection = Selection::create([
            'name' => $name
        ]);

        foreach ($this->participants as $participant) {
            $selection->donators()->attach($participant->id);

            $participant->selection_count = $participant->selection_count === 2 ? null : $participant->selection_count + 1;
            $participant->save();
        }
        foreach ($this->winners as $winner) {
            $donator = Donator::find($winner['id']);
            $donator->selection_count = 1;
            $donator->save();

            $selection->donators()->attach($donator->id);
        }

        $this->dispatch('refresh-selections');
        $this->dispatch('openalert', ['message' => 'Création de la sélection terminé ✅']);

        $this->winners = [];
        $this->selectionName = '';
    }

    public function render()
    {
        return view('livewire.pages.selection.create-selection', [
            'participants' => $this->participants,
        ]);
    }
}
