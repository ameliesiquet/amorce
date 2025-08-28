<?php

namespace App\Livewire\Pages\Meeting;

use App\Models\Project;
use Livewire\Component;

class Meeting extends Component
{
    public $project;

    public function mount()
    {
        $this->project = Project::query()->inRandomOrder()->first();
    }

    public function render()
    {
        return view('livewire.pages.meeting.meeting');
    }
}
