<?php

namespace App\Modules\pruebas\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class pruebaResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {

/*
        return [
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description,
        ];
*/
        return parent::toArray($request);
    }
}
