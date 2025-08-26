<?php

namespace App\Models;

use App\Livewire\Pages\Selection\Selection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Participation extends Model
{
    use HasFactory;

    protected $fillable = [
        'donator_id',
        'selection_id',
        'disponibility'
    ];

    public function donator()
    {
        return $this->belongsTo(Donator::class);
    }

    public function selection()
    {
        return $this->belongsTo(Selection::class);
    }
}
