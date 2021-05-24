<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name','describe','url_img','price','category_id','discount','status','view','star_rating'];

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function detailOrders(){
        return $this->hasMany(DetailOrder::class);
    }
}
