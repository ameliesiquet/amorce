<?php

namespace App\Livewire\Pages\Projects;

use App\Livewire\Forms\EditProjectForm;
use App\Models\Project;
use Livewire\Component;

class EditProject extends Component
{
    public ?Project $project = null;
    public ?string $name = null;
    public ?string $description = null;
    public $model;
    public EditProjectForm $form;
    public $showModal = true;
    public ?string $modalOpen = null;

    public bool $redirect = false;

    public $modal = null;
    public $modalParams = null;
    protected $listeners = [
        'openmodal' => 'handleOpenModal',
        'close-edit-project' => 'handleCloseEditFundModal',
        'modal-state-changed',
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
        $this->form = new EditProjectForm($this, null);
        if ($model) {
            $this->project = Project::findOrFail($model);
            $this->name = $this->project->name;
            $this->description = $this->project->description;
        }
    }

    public function loadProject($projectId)
    {
        $this->project = Project::findOrFail($projectId);
        $this->form = new EditProjectForm($this, $this->project);
        $this->name = $this->project->name;
        $this->description = $this->project->description;
        $this->showModal = true;
    }

    public function editProject()
    {
        if (!$this->project) return;

        $this->validate([
            'name' => 'required|max:255',
            'description' => 'nullable|max:1000',
        ]);

        $this->project->update([
            'name' => $this->name,
            'description' => $this->description,
        ]);

        $this->emit('projectUpdated');

        $this->name = null;
        $this->description = null;
        $this->showModal = false;
    }

    public function render()
    {
        return view('livewire.pages.projects.edit-project');
    }
}
