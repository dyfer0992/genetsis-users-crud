<?php

namespace App\Http\Resources\Users;

use Illuminate\Http\Resources\Json\Resource;

class PreferenceResource extends Resource
{
    public function toArray($request)
    {
        return [
            'id'          => $this->preference_id,
            'preferencia' => $this->preferencia,
        ];
    }
}
