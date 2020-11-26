<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    use HasFactory;

    protected $fillable = [
        'description', 'type', 'amount', 'user_id'
    ];

    public function setAmountAttribute($amount)
    {
        return $this->attributes['amount'] = $amount * 100;
    }

    public function getAmountAttribute()
    {
        return $this->attributes['amount'] / 100;
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
