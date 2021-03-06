<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BuyList extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_num',
        'product_id',
        'count',
        'price',
        'orderStatus',
    ];

    protected $casts = [

        'created_at' => 'datetime:Y-m-d H:i:s',
        'updated_at' => 'datetime:Y-m-d H:i:s',

    ];


}
