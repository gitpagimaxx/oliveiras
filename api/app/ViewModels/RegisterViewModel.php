<?php

namespace App\ViewModels;

use Illuminate\Database\Eloquent\Model;

/**
 * Class RegisterViewModel
 * @property string $name
 * @property string $email
 * @property string $password
 * @property string $password_confirmation
 * @package App\ViewModels
 * @OA\Schema(
 *     schema="RegisterViewModel",
 *     type="object",
 *     title="RegisterViewModel",
 *     required={"name", "email", "password", "password_confirmation"},
 *     properties={
 *         @OA\Property(property="name", type="string"),
 *         @OA\Property(property="email", type="string"),
 *         @OA\Property(property="password", type="string"),
 *         @OA\Property(property="password_confirmation", type="string")
 *     }
 * )
 */
class RegisterViewModel extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'password_confirmation'
    ];

}
