<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    use HasFactory;

    protected $fillable = [
        'description', 'type', 'amount', 'user_id',
        'photo', 'expense_date'
    ];

    protected $dates = [
        'expense_date'
    ];

    public function setAmountAttribute($amount)
    {
        return $this->attributes['amount'] = $amount * 100;
    }

    /*public function setExpenseDateAttribute($value)
    {
        return $this->attributes['expense_date'] = (\DateTime::createFromFormat('d/m/Y H:i:s', $value))->format('Y-m-d H:i:s');
    }*/

    public function getAmountAttribute()
    {
        return $this->attributes['amount'] / 100;
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
