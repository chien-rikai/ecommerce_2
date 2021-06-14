<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DetailOrder extends Model
{
    use HasFactory,SoftDeletes;

    protected $dates = ['deleted_at'];
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

    public static function deleteProduct($delete,$id){
        if($delete){
            $delete = DetailOrder::where('product_id','=',$id)->chunkById(100, function($detailOrders){
                foreach($detailOrders as $detailOrder){
                    $detailOrder->delete();
                }
            });
        }
        return $delete;
    }

    public static function restoreProduct($id){
        $update = DetailOrder::withTrashed()->where('product_id','=',$id)->chunkById(100, function($detailOrders){
            foreach($detailOrders as $detailOrder){
                $detailOrder->restore();
            }
        });
        return $update;
    }
}
