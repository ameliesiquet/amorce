<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    /** @use HasFactory<\Database\Factories\ProjetFactory> */
    use HasFactory;


    protected $fillable = [
        'name',
        'description',
    ];

    public function selections()
    {
        return $this->belongsToMany(Selection::class, 'project_selection')->withTimestamps();
    }

}
