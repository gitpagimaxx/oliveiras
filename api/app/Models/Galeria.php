<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Galeria
 * @property integer $id
 * @property string $Nome
 * @property string $Data
 * @property string $Descricao
 * @property integer $UserId
 * @property bool $Status
 * @property string $created_at
 * @property string $update_at
 * @package App\Models
 * @OA\Schema(
 *     schema="Galeria",
 *     type="object",
 *     title="Galeria",
 *     required={"Nome", "Data", "Descricao"},
 *     properties={
 *         @OA\Property(property="id", type="integer"),
 *         @OA\Property(property="Nome", type="string"),
 *         @OA\Property(property="Data", type="string"),
 *         @OA\Property(property="Descricao", type="string"),
 *         @OA\Property(property="UserId", type="integer"),
 *         @OA\Property(property="Status", type="string"),
 *         @OA\Property(property="created_at", type="string"),
 *         @OA\Property(property="update_at", type="string")
 *     }
 * )
 */
class Galeria extends Model
{
    use HasFactory;

    protected $fillable = [ 'Nome', 'Data', 'Descricao', 'UserId', 'Status' ];
    protected $guarded = ['id', 'created_at', 'update_at'];
    protected $table = 'galeria';

    /**
     * Obter as fotos da galeria
     */
    public function fotos(): HasMany
    {
        return $this->hasMany(Fotos::class, 'GaleriaId', 'id');
    }

    /**
     * Obter os comentarios da galeria
     */
    public function comentarios(): HasMany
    {
        return $this->hasManyThrough(GaleriaComentario::class, 'GaleriaId', 'id');
    }
}