<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class order_table extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'cost',
        'email',
        'atatus',
        'city',
        'phone',
        'adress',
        'date',
    ];
}
