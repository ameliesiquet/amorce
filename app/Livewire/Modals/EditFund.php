<?php

namespace App\Livewire\Modals;

use AllowDynamicProperties;
use App\Livewire\Forms\EditFundForm;
use App\Models\Fonds;
use Livewire\Component;

#[AllowDynamicProperties] class EditFund extends Component
{

    public Fonds $fund;
    public $model;
    public EditFundForm $form;
    public $showModal = true;
    public bool $redirect = false;


    protected $listeners = [
        'openmodal' => 'handleOpenModal',
        'close-edit-fund-modal' => 'handleCloseEditFundModal',
        'modal-state-changed',
    ];

    public ?string $modalOpen = null;

    public function handleOpenModal($modal)
    {
        if ($modal === 'edit-fund' && $this->modalOpen === null) {
            $this->showModal = true;
            $this->modalOpen = 'edit';
            $this->dispatch('modal-state-changed', null);
            $this->dispatch('block-open');

        }
    }

    public function handleCloseEditFundModal()
    {
        $this->showModal = false;
        $this->modalOpen = null;
        $this->dispatch('modal-state-changed', null);
        $this->dispatch('allow-open');

    }

    public function modalStateChanged($modal)
    {
        $this->modalOpen = $modal;
        if ($modal !== 'edit') {
            $this->showModal = false;
        }
    }


    public function close()
    {
        $this->showModal = false;
    }



    public function mount($model = null): void
    {
        $this->model = $model;
        $this->fund = Fonds::find($model);
        if ($this->fund) {
            $this->form->title = $this->fund->title;
        }

    }

    public function editFund(): void
    {
        $this->validate();
        $data = $this->form->all();
        $fund = Fonds::find($this->model);
        $fund->update($data);
        $this->dispatch('refresh-specific-funds');
        $this->dispatch('close-edit-fund-modal');
        $this->form->reset();
        $this->showModal = false;
    }

    public function deleteFund()
    {
        $fund = Fonds::find($this->model);

        if ($fund) {
            $fund->delete();
            $this->dispatch('close-edit-fund-modal');
            $this->dispatch('refresh-specific-funds');
            $this->dispatch('fund-deleted', id: $this->model);
        }
    }


    public function render()
    {
        return view('livewire.modals.edit-fund');
    }

}
