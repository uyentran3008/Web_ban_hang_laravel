<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable =[
        'status',
        'total',
        'ship',
        'curtomer_name',
        'curtomer_email',
        'curtomer_phone',
        'curtomer_address',
        'note',
    ];
}
