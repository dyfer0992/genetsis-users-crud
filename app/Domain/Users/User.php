<?php

namespace App\Domain\Users;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = 'user_users';

    const GENDERS = [
        'MALE'   => 'male',
        'FEMALE' => 'female',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'surname',
        'address',
        'email',
        'province_id',
        'gender',
    ];

    public function province()
    {
        return $this->belongsTo(Province::class, 'province_id', 'id_provincia');
    }

    public function preferences()
    {
        return $this->belongsToMany(Preference::class, 'users_preferences', 'user_id', 'preference_id');
    }
}
