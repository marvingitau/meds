<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Product_Category;
use App\ProductAttrib;

class Products extends Model
{
    protected $table='products';
    protected $primaryKey='id';
    protected $fillable=['categories_id','p_name','p_code','description','price','image'];
    // ,'p_color'

    public function category(){
        return $this->belongsTo(Product_Category::class,'categories_id','id');
    }
    public function attributes(){
        return $this->hasMany(ProductAttrib::class,'products_id','id');
    }
}
