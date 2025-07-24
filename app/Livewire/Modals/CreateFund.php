<?php

namespace App\Livewire\Modals;

use AllowDynamicProperties;
use App\Models\Fonds;
use Livewire\Component;


class CreateFund extends Component
{
    public $showModal = false;
    public $title;

    protected $listeners = ['openmodal' => 'handleOpenModal'];

    public function handleOpenModal($modal)
    {
        if ($modal === 'create-fund') {
            $this->showModal = true;
        }
    }

    public function close()
    {
        $this->showModal = false;
    }

    public function createFund()
    {
        $this->validate([
            'title' => 'required|string|max:255',
        ]);

        Fonds::create([
            'title' => $this->title,
            'specific' => true,
        ]);

        $this->dispatch('fundCreated');
        $this->dispatch('refresh-specific-funds');
        $this->dispatch('close-modal');
        $this->reset(['title', 'showModal']);
    }


    public function render()
    {
        return view('livewire.modals.create-fund');
    }
}
