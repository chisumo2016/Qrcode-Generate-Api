<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class QrcodeCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
//        return [
//            'user_id'       => $this->user_id,
//            'company_name'  =>  $this->company_name,
//            'product_name'  =>  $this->product_name
//        ];
        return parent::toArray($request);
    }
}
