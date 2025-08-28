<?php

namespace App\Livewire\Pages\Projects;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Livewire\Attributes\On;
use Livewire\Component;
use App\Models\Project;

class Projects extends Component
{
    /** @use HasFactory<\Database\Factories\FondsFactory> */
    use HasFactory;
    public $projects;
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

    public function mount()
    {
        // Alle Projekte aus der DB laden
        $this->projects = Project::all();
    }

    public function render()
    {
        return view('livewire.pages.projects.projects', [
            'projects' => $this->projects,
        ]);
    }
}
