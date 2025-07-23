<?php

namespace App\Livewire\Pages\Accounting;

use App\Models\Fonds;
use Livewire\Component;
use Livewire\WithPagination;

class Accounting extends Component
{
    use WithPagination;

    public $search = '';

    protected $listeners = ['fundCreated' => '$refresh'];

    public function openmodal($which, $model = null): void
    {
        $this->dispatch('openmodal', $which, $model);
    }

    public function render()
    {
        return view('livewire.pages.accounting.accounting', [
            'funds' => Fonds::where('specific', false)->latest()->get(),
            'specificFunds' => Fonds::where('specific', true)
                ->where('title', 'like', '%' . $this->search . '%')
                ->latest()
                ->get(),
        ]);
    }
}
