<?php

namespace App\Domain\Users;

use Illuminate\Database\Eloquent\Model;

class Preference extends Model
{
    protected $table = 'preferences';

    protected $primaryKey = 'preference_id';

    public $timestamps = false;
}
