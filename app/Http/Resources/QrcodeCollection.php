<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class QrcodeCollection extends Resource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            //Resource Collection 118
            'amount'            =>  $this->amount,
            'company_name'      =>  $this->company_name,
            'product_name'      =>  $this->product_name,
            'link'              =>[
                'qrcode_link' => route('qrcodes.show',$this->id),

            ]
        ];
        //return parent::toArray($request);
    }
}



//'website'           =>  $this->website,
//class QrcodeCollection extends ResourceCollection

//use Illuminate\Http\Resources\Json\ResourceCollection;