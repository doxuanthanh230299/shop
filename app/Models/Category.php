<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'name',
        'slug',
        'parent'
    ];

    public function product()
    {
        return $this->hasMany(Product::class,"categories_id","id");
    }

    public $timestamps = true;
}
