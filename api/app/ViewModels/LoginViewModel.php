<?php

namespace App\ViewModels;

use Illuminate\Auth\Authenticatable;
use Laravel\Lumen\Auth\Authorizable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Tymon\JWTAuth\Contracts\JWTSubject;

/**
 * Class LoginViewModel
 * @property string $email
 * @property string $password
 * @package App\ViewModels
 * @OA\Schema(
 *     schema="LoginViewModel",
 *     type="object",
 *     title="LoginViewModel",
 *     required={"email", "password"},
 *     properties={
 *         @OA\Property(property="email", type="string"),
 *         @OA\Property(property="password", type="string")
 *     }
 * )
 */
class LoginViewModel extends Model implements AuthenticatableContract, AuthorizableContract, JWTSubject
{
    use Authenticatable, Authorizable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email', 'password',
    ];

    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }

}
