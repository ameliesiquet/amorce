<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Selection extends Model
{
    /** @use HasFactory<\Database\Factories\SelectionFactory> */
    use HasFactory;
    protected $fillable = [
        'name',
        'status',
    ];

    public function attendances()
    {
        return $this->hasMany(Participation::class);
    }
    public function projets()
    {
        return $this->belongsToMany(Projet::class);
    }

    public function donators()
    {
        return $this->belongsToMany(Donator::class, 'participations')
            ->withTimestamps();
    }



}
