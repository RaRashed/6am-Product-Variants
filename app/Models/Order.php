<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable =[
        // 'product_id','customer_id','product_details','qty','price','variant','variation'
        'name','email','phone','amount','address','status','transaction_id','currency'

    ];
}
