<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailOrder extends Model
{
    use HasFactory;
    protected $table = "detail_orders";
    
    protected $fillable = ['product_id','price_base','quantity'];

    public function order(){
        return $this->belongsTo(Order::class);
    }

    public function product(){
        return $this->belongsTo(Product::class);
    }
    public function getPriceAttribute(){
        return $this->price_base*$this->quantity;
    }
}
