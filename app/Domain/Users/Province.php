<?php

namespace App\Domain\Users;

use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    protected $table = 'provincias';

    protected $primaryKey = 'id_provincia';

    public $timestamps = false;
}
