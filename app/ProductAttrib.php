<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductAttrib extends Model
{
    protected $primaryKey='id';
    protected $fillable=['products_id','sku','size','price','stock'];
}
