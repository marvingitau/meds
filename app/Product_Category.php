<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product_Category extends Model
{
    // protected $table='product__categories';
    // protected $primaryKey='id';
    protected $fillable=['parent_id','name','description','url','status'];
}
