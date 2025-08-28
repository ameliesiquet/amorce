<?php

namespace App\Livewire\Pages\Dashboard;

use Carbon\Carbon;
use Livewire\Component;

class Calendar extends Component
{
    public $currentMonth;
    public $events;

    public function mount()
    {
        $this->currentMonth = Carbon::now();
        $this->events = collect([
            [
                'id' => 1,
                'title' => 'Team Meeting',
                'date' => Carbon::now()->addDays(1),
            ],
            [
                'id' => 2,
                'title' => 'Code Review',
                'date' => Carbon::now()->addDays(3),
            ],
        ]);
    }

    public function getCalendarProperty()
    {
        $startOfMonth = $this->currentMonth->copy()->startOfMonth()->startOfWeek();
        $endOfMonth = $this->currentMonth->copy()->endOfMonth()->endOfWeek();

        $days = [];
        for ($date = $startOfMonth; $date->lte($endOfMonth); $date->addDay()) {
            $days[] = $date->copy();
        }

        return array_chunk($days, 7);
    }

    public function previousMonth()
    {
        $this->currentMonth->subMonth();
    }

    public function nextMonth()
    {
        $this->currentMonth->addMonth();
    }

    public function render()
    {
        return view('livewire.pages.dashboard.calendar', [
            'calendar' => $this->calendar,
            'events' => $this->events,
        ]);
    }
}
