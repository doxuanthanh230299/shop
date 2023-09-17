<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderProduct extends Model
{
    use HasFactory;

    protected $fillable = [
        "id",
        "name",
        "code",
        "price",
        "quantity",
        "image",
        "order_id"
    ];

    public function order()
    {
        return $this->belongsTo(Order::class, "order_id", "id");
    }

}
