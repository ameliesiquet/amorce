<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fonds extends Model
{
    use HasFactory;

    public function transactions()
    {
        return $this->hasMany(Transactions::class, 'fonds_id', 'id');
    }

}
