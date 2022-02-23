<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class orderUserInform extends Model
{
    use HasFactory;

    protected $fillable = [

        'order_id',
        'user_id',
        'name',
        'phone',
        'zip',
        'address',
        'subAdress',

    ];

    protected $casts = [

        'created_at' => 'datetime:Y-m-d H:i:s',
        'updated_at' => 'datetime:Y-m-d H:i:s',

    ];

}
