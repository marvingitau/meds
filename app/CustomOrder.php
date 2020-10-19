<?php

namespace App;
use App\Orders;

use Illuminate\Database\Eloquent\Model;

class CustomOrder extends Model
{
    protected $guarded=['id'];

    public function orders()
    {
        return $this->belongsTo(Orders::class);
    }
}
