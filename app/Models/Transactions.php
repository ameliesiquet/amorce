<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transactions extends Model
{
    use HasFactory;

    protected $fillable = [
        'amount', 'transaction_type','donator_id', 'status_type', 'donor_name','created_at', 'fonds_id', 'id'
    ];

    public function donator()
    {
        return $this->belongsTo(Donator::class, 'donator_id');
    }
}
