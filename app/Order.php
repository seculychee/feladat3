<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = "orders";

    protected $fillable = ["userdata_id", "price", "ordered"];


    public function user()
    {
        return $this->belongsTo(UserData::class, 'userdata_id');
    }

    public function cart()
    {
        return $this->belongsTo(Cart::class, 'id', 'order_id');
    }
}
