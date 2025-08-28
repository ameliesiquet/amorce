<?php

namespace App\Livewire\Pages\Dashboard;

use App\Models\Project;
use Livewire\Component;

class RecentProjects extends Component
{
    public $projects;

    public function mount()
    {
        $this->projects = Project::latest()->take(3)->get();
    }

    public function render()
    {
        return view('livewire.pages.dashboard.recent-projects');
    }
}
