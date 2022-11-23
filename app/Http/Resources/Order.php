<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Order extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'name' => $this->name,
            'surname' => $this->surname,
            'middle_name' => $this->middle_name,
            'phone' => $this->phone,
            'address' => $this->address,
            'summ' => $this->summ,
            'create' => $this->created_at->format('y-d-m'),
        ];
    }
}
