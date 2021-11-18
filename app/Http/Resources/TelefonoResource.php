<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class TelefonoResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        //return parent::toArray($request);
        return [
            'identificador' => $this->telefono_id,
            'numero' => $this->numero,
            'registrado' => Carbon::parse($this->registrado)->format('d-m-Y'),
            'modificado' => Carbon::parse($this->modificado)->format('d-m-Y')
        ];
    }
}
