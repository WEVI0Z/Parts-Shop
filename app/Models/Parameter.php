<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parameter extends Model
{
    use HasFactory;

    protected $fillable = [
      "product_id",
      "title",
      "info"
    ];

    function product() {
        $this->belongsTo(Product::class);
    }
}
