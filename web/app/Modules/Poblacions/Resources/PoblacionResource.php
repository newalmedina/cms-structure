<?php

namespace App\Modules\Poblacions\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PoblacionResource extends JsonResource
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
