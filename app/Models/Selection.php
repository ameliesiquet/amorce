<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Selection extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'status',
    ];

    public function attendances()
    {
        return $this->hasMany(Participation::class);
    }

    public function donators()
    {
        return $this->belongsToMany(Donator::class, 'donator_selection')
            ->withPivot('status_in_selection')
            ->withTimestamps();
    }

    public function projects()
    {
        return $this->belongsToMany(Project::class, 'project_selection')
            ->withTimestamps();
    }
}
