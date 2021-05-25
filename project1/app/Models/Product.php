<?php

namespace App\Models;

use App\Jobs\ProductCsvUpload;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $guarded =[];

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function detailOrders(){
        return $this->hasMany(DetailOrder::class);
    }

    public function productImport(){
        $path = resource_path('file/*.csv');

        $files = glob($path);

        foreach($files as $file){
        
            ProductCsvUpload::dispatch($file);
        }
    }
}
