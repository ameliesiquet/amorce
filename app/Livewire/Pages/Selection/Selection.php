<?php

namespace App\Livewire\Pages\Selection;

use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
use Livewire\Component;
use App\Models\Selection as SelectionModel;

class Selection extends Component
{
    #[Computed]
    public function selections()
    {
        return SelectionModel::all();
    }


    #[On('refresh-selections')]
    public function refreshSelections()
    {
        unset($this->selections);
    }
    public $modal = null;
    public $modalParams = [];

    public $selections;

    public function openmodal($name, $params = null)
    {
        $this->modal = $name;
        $this->modalParams = $params;
    }

    public function mount()
    {
        $this->selections = SelectionModel::with('donators')->orderBy('created_at', 'desc')->get();
    }


    public function render()
    {
        return view('livewire.pages.selection.selection', [
            'selections' => $this->selections,
        ]);
    }
}
