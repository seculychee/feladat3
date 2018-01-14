<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $table = "carts";

    protected $fillable = ["pizza_id", "order_id", "quantity", "price"];

    public function pizza()
    {
        return $this->belongsTo(Pizza::class, 'pizza_id', 'id');
    }
}
