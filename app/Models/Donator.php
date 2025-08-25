<?php

namespace App\Models;

use App\Livewire\Pages\Selection\Selection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Donator extends Model
{
    use HasFactory;

    protected $casts = [
        'donations_dates' => 'array',
    ];

    protected $fillable = [
        'name',
        'email',
        'phone',
        'donations_dates',
        'ok_for_selection',
        'selection_count',
        'disponibility',
        'last_selection',
    ];

    public function participations()
    {
        return $this->hasMany(Participation::class);
    }

    public function selections()
    {
        return $this->belongsToMany(Selection::class, 'donator_selection')
            ->withPivot('status_in_selection')
            ->withTimestamps();
    }

    public function updateOkForSelection(): bool
    {
        $threeMonthsAgo = Carbon::now()->subMonths(3);
        $currentYear = Carbon::now()->year;

        $hasRecentDonations = collect($this->donations_dates)
            ->contains(fn($date) => Carbon::parse($date)->greaterThanOrEqualTo($threeMonthsAgo));

        $lastSelectionYear = $this->last_selection ? Carbon::parse($this->last_selection)->year : null;
        $hasParticipatedThisYear = $lastSelectionYear === $currentYear;

        $eligible = $hasRecentDonations && !$hasParticipatedThisYear && $this->hasConsecutiveMonths();
        $this->ok_for_selection = $eligible;
        $this->save();

        return $eligible;
    }

    public function hasConsecutiveMonths(): bool
    {
        $dates = collect($this->donations_dates)
            ->map(fn($date) => Carbon::parse($date))
            ->sort();

        for ($i = 1; $i < $dates->count(); $i++) {
            if (!$dates[$i]->isSameMonth($dates[$i - 1]->copy()->addMonth())) {
                return false;
            }
        }

        return true;
    }

    public static function updateOkForSelectionForAll()
    {
        $donators = self::all();
        foreach ($donators as $donator) {
            $donator->updateOkForSelection();
        }
    }
}
