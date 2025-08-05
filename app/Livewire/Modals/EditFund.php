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
    public ?string $modalOpen = null;

    public bool $redirect = false;
    public $cannotDeleteMessage = null;

    public $showTransferModal = false;

    public $modal = null;
    public $modalParams = null;


    protected $listeners = [
        'openmodal' => 'handleOpenModal',
        'close-edit-fund-modal' => 'handleCloseEditFundModal',
        'modal-state-changed',
        'refresh-specific-funds' => '$refresh',
        'close-modal' => 'closeModal'

    ];

    public function closeModal()
    {
        $this->modal = null;
        $this->modalParams = null;
    }



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

        if (!$this->fund) {
            $this->redirectRoute('accounting');
            return;
        }

        $this->form->title = $this->fund->title;
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

    public function getBalance(): float
    {
        $fonds = $this->fund;
        $balance = $fonds->transactions()->where('status_type', 'entrée')->sum('amount')
            - $fonds->transactions()->where('status_type', 'sortie')->sum('amount');
        return $balance;
    }


    public function deleteFund()
    {
        $balance = $this->getBalance();

        if ($balance > 0) {
            $this->cannotDeleteMessage = "Le fond dispose encore d'un solde de " . number_format($balance, 2) . " et ne peut pas être supprimé.";
            return;
        }

        $this->fund->delete();
        $this->form->reset();
        $this->showModal = false;
        $this->dispatch('close-edit-fund-modal');
        $this->dispatch('refresh-specific-funds');

        $this->redirectRoute('accounting');
    }
    public function openTransferModal($id)
    {
        $this->dispatch('close-edit-fund-modal');
        $this->showTransferModal = true;
        // Optional: Validieren oder anderweitig nutzen
        $this->model = $id;
    }







    public function render()
    {
        return view('livewire.modals.edit-fund');
    }

}
