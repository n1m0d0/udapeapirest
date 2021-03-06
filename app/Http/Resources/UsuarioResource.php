<?php

namespace App\Http\Resources;

use App\Models\Telefono;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Http\Resources\Json\JsonResource;

class UsuarioResource extends JsonResource
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
            'identificador' => $this->usuario_id,
            'nombre_completo' => Str::upper($this->nombres.' '.$this->paterno.' '.$this->materno),
            'registrado' => Carbon::parse($this->registrado)->format('d-m-Y'),
            'modificado' => Carbon::parse($this->modificado)->format('d-m-Y'),
            'telefonos' => new TelefonoCollection(Telefono::where('usuario_id', $this->usuario_id)->get())
        ];
    }
}
