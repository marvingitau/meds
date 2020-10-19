<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class OrderDetail extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        // return parent::toArray($request);

        return [

            'order_id' => $this->id,
            'from'=> $this->name,
            'price'=> $this->grand_total,
            'city' => $this->city,
            'country' =>$this->country,
            'P.OBox' =>$this->postal_address,


            'items'=>$this->items

        ];
    }


}
