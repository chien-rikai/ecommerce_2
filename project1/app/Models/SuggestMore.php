<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class SuggestMore extends Model
{
    use HasFactory,SoftDeletes;

    protected $table = "suggest_more";
    protected $guarded =[];

    public function user(){
        return $this->belongsTo(User::class);
    }
    
    public function product(){
        return $this->belongsTo(Product::class);
    }
}
