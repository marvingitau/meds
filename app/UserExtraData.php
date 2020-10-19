<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserExtraData extends Model
{
    protected $fillable = [
        'user_id',
        'order_authorized_name',
        'order_authorized_qualification',
        'order_authorized_licence_no',
        'payment_authorizedpersonelname',
        'payment_authorizedpersoneldesignation',
        'payment_authorizedpersonelsign',
        'guarantorname',
        'guarantordesignation',
        'guarantorsignature',
        'filename',
        'personinchargefile'
    ];
}
