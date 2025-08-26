<?php

namespace App\Livewire\Pages\Accounting;

use App\Models\Fonds;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class Accounting extends Component
{
    use WithPagination;

    public $search = '';

    protected $listeners = ['fundCreated' => '$refresh'];
    public $isOpen = false;
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
