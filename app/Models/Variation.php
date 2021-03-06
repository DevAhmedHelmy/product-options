<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Variation extends Model
{
    use HasFactory;
    protected $guarded=[];
    public $with = ['options'];
    public function options()
    {
        return $this->hasMany(Option::class);
    }

    public function  products(){

        return $this->belongsToMany(Product::class, 'product_option_variations');

    }

}
