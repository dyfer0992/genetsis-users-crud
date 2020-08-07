<?php

namespace App\Http\Resources\Users;

use Illuminate\Http\Resources\Json\Resource;

class UserResource extends Resource
{
    public function toArray($request)
    {
        return [
            'id'           => $this->id,
            'nombre'       => $this->name,
            'apellidos'    => $this->surname,
            'dirección'    => $this->address,
            'email'        => $this->email,
            'provincia'    => $this->province->provincia,
            'sexo'         => $this->gender,
            'preferencias' => PreferenceResource::collection($this->preferences),
        ];
    }
}
