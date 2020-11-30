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

            'OrderNo' => $this->id,
            'OrderID' => $this->id,
            'baseCurrency' => 'KSH',
            'discountPercent'=>0,
            'totalAmount'=> $this->grand_total,
            'discountTotal'=>0,
            // 'customerCode'=>002,
            'customerCode'=>$this->user->CustomerCode,
            'taxPlan' => 'VAT',
            'ExchangeRate'=>0,
            // 'from'=> $this->name,
            // 'city' => $this->city,
            // 'country' =>$this->country,
            // 'P.OBox' =>$this->postal_address,


            'OrderItems'=>$this->items

        ];
    }


}
