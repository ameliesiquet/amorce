<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transactions extends Model
{
    use HasFactory;

    protected $fillable = [
        'amount', 'transaction_type', 'status_type', 'created_at', 'fonds_id', 'id'
    ];


    public function fonds()
    {
        return $this->belongsTo(Fonds::class, 'fonds_id', 'id', ['transactions'=>Transactions::paginate(3)]);
    }

}
