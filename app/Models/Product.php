<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    protected $fillable = [

        'name','category_id','brand_id','quantity','detail','price'

    ];
    public function productimages()
    {
        return $this->hasMany(ProductImage::class);
    }
    public function category(){
        return $this->belongsTo(Category::class);
    }
      public function brand(){
        return $this->belongsTo(Brand::class);
    }
}
