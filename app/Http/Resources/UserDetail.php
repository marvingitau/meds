<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class UserDetail extends Resource
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
            'CustomerCode'=>$this->CustomerCode,
            'id' => $this->id,
            'phone_no' => $this->phone_no,
            'email' => $this->email,
            'postal_address' => $this->postal_address,
            'buildingname' => $this->buildingname,
            'streetname' => $this->streetname,
            'town' => $this->town,
            'name' => $this->name,
            'qualification' => $this->qualification,
            'licence_no' => $this->licence_no,
            'doctors_name' => $this->doctors_name,
            'doctors_licence_no' => $this->doctors_licence_no

        ];
    }


}
