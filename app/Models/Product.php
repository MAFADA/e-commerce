<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public function category(){
        // return $this->belongsTo(Category::class, 'product_id', 'id');
        return $this->belongsTo(Category::class,'category_id');
    }

    public function order_details(){
        return $this->hasMany(OrderDetail::class, 'product_id', 'id');
    }
}
