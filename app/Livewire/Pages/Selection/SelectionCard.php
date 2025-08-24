<?php

namespace App\Livewire\Pages\Selection;

use Livewire\Component;
use App\Models\Selection;
use App\Models\Donator;

class SelectionCard extends Component
{
    public Selection $selection;
    public $nextDonators = [];

    public function mount(Selection $selection)
    {
        $this->selection = $selection->load('donators');
        $this->loadNextDonators();
    }

    public function loadNextDonators()
    {
        $threeMonthsAgo = now()->subMonths(3);

        $this->nextDonators = Donator::where('disponibility', true)
            ->where(function($q) use ($threeMonthsAgo) {
                $q->whereNull('selection_count')
                    ->orWhere('last_selection', '<', $threeMonthsAgo);
            })
            ->whereNotIn('id', $this->selection->donators->pluck('id')->toArray())
            ->take(3)
            ->get()
            ->toArray();
    }

    public function makeDispoYes($donatorId)
    {
        if ($donator = Donator::find($donatorId)) {
            $donator->update(['disponibility' => true]);
            $this->selection->load('donators');
        }
    }

    public function makeDispoNo($donatorId)
    {
        if ($donator = Donator::find($donatorId)) {
            $donator->update(['disponibility' => false]);
            $this->selection->load('donators');
        }
    }

    public function redrawNextDonator($index)
    {
        $threeMonthsAgo = now()->subMonths(3);

        $newDonator = Donator::where('disponibility', true)
            ->where(function($q) use ($threeMonthsAgo) {
                $q->whereNull('selection_count')
                    ->orWhere('last_selection', '<', $threeMonthsAgo);
            })
            ->whereNotIn('id', $this->selection->donators->pluck('id')->toArray())
            ->inRandomOrder()
            ->first();

        if ($newDonator) {
            $this->nextDonators[$index] = $newDonator->toArray();
        }
    }

    public function selectCandidate($index)
    {
        if (!isset($this->nextDonators[$index])) {
            return;
        }

        $donator = Donator::find($this->nextDonators[$index]['id']);

        if ($donator) {
            $donator->selection_count = $donator->selection_count ? $donator->selection_count + 1 : 1;
            $donator->last_selection = now();
            $donator->save();

            if (!$this->selection->donators()->where('donator_id', $donator->id)->exists()) {
                $this->selection->donators()->attach($donator->id);
            }

            $this->selection->load('donators');

            $this->redrawNextDonator($index);
        }
    }

    public function render()
    {
        return view('livewire.pages.selection.selection-card', [
            'donators' => $this->selection->donators,
            'nextDonators' => $this->nextDonators,
        ]);
    }
}
