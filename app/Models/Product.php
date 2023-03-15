<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['company_id', 'product_name', 'product_price', 'product_image'];
    use HasFactory;

    public function getImageAttribute($value)
    {
        return json_decode($value);
    }
}
