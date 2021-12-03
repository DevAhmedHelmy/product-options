<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $guarded=[];
    public $with=['variations'];
    public function  variations(){
        return $this->belongsToMany(Variation::class, 'product_option_variations','product_id','variation_id')->withPivot('variation_id','option_id','price','quantity')->withTimestamps();
               }
}
