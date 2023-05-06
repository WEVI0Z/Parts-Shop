<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        "name",
        "category",
        "image",
        "description",
        "price"
    ];

    function parameters() {
        return $this->hasMany(Parameter::class);
    }

    function favourites() {
        return $this->hasMany(Favourite::class);
    }
}
