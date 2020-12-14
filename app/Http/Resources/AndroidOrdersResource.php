<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AndroidOrdersResource extends JsonResource
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
            "CustomerNumber" => $this->CustomerNumber,
            'StorageNumber' => $this->StorageNumber,
            'ProductNumber' => $this->ProductNumber,
            'ProductName' => $this->ProductName,
            'Spec' => $this->Spec,
            'EPlatingLevel' => $this->EPlatingLevel,
            'EPlatingPrice' => $this->EPlatingPrice,
            'Voltage' => $this->Voltage,
            'StoragePlace' => $this->StoragePlace,
            'EPlatingCount' => $this->EPlatingCount,
            'DeliveryTime' => $this->DeliveryTime,
            'MoldingFactory' => $this->MoldingFactory,
            'PlatingRacks' => $this->PlatingRacks,
            'Notice' => $this->Notice,
            'note' => $this->note,
        ];

    }
}
