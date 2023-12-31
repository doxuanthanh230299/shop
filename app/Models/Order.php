<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        "name",
        "address",
        "phone",
        "state",
        "total",
        "updated_at"
    ];

    public function order()
    {
        return $this->hasMany(OrderProduct::class, "order_id", "id");
    }
}
