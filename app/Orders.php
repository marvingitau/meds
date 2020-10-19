<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\CustomOrder;

class Orders extends Model
{
    // protected $table='orders';
    protected $primaryKey='id';
    protected $fillable=['users_id',
        'users_email','name','postal_address','city','phone_no','country','shipping_charges','coupon_code','coupon_amount',
        'order_status','payment_method','grand_total',
        'order_type'];

      public function items()
    {
        return $this->hasMany(CustomOrder::class,'order_id');
    }
}
