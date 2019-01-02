<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Carbon\Carbon;

/**
 * @property int $id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property array $fillable
 * @property string $name
 * @property string $email
 * @property Carbon $email_verified_at
 * @property mixed $attributes
 */
class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * @param string $name
     * @return string
     */
    public function getNameAttribute($name)
    {
        return $name;
    }

    /**
     * @param string $name
     * @return void
     */
    public function setNameAttribute($name)
    {
        $this->attributes['name'] = (string) $name;
    }

    /**
     * @param $email
     * @return mixed
     */
    public function getEmailAttribute($email)
    {
        return (string) $email;
    }

    /**
     * @param $email
     */
    public function setEmailAttribute($email)
    {
        $this->attributes['email'] = (string) $email;
    }
}
