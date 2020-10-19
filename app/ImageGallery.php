<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ImageGallery extends Model
{
    protected $table='image_galleries';
    protected $primaryKey='id';
    protected $fillable=['products_id','image'];
}
