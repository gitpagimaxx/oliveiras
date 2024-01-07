<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Class Fotos
 * @property integer $id
 * @property string $GaleriaId
 * @property string $Descricao
 * @property string $Nome
 * @property string $Diretorio
 * @property integer $UserId
 * @property bool $Status
 * @property string $created_at
 * @property string $update_at
 * @package App\Models
 * @OA\Schema(
 *     schema="Fotos",
 *     type="object",
 *     title="Fotos",
 *     required={"GaleriaId", "Nome", "Descricao", "Diretorio"},
 *     properties={
 *         @OA\Property(property="id", type="integer"),
 *         @OA\Property(property="GaleriaId", type="integer"),
 *         @OA\Property(property="Nome", type="string"),
 *         @OA\Property(property="Descricao", type="string"),
 *         @OA\Property(property="Diretorio", type="string"),
 *         @OA\Property(property="UserId", type="integer"),
 *         @OA\Property(property="Status", type="string"),
 *         @OA\Property(property="created_at", type="string"),
 *         @OA\Property(property="update_at", type="string")
 *     }
 * )
 */
class Fotos extends Model
{
    protected $fillable = [ 'GaleriaId', 'Descricao', 'Nome', 'Diretorio', 'UserId', 'Status' ];
    protected $guarded = ['id', 'created_at', 'update_at'];
    protected $table = 'fotos';

    /**
     * Obter as fotos da galeria
     */
    public function comentarios(): HasMany
    {
        return $this->hasMany(FotosComentario::class, 'FotosId', 'id');
    }
}