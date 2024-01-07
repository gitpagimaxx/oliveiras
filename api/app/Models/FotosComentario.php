<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Class FotosComentario
 * @property integer $id
 * @property string $FotosId
 * @property string $Descricao
 * @property integer $UserId
 * @property bool $Status
 * @property string $created_at
 * @property string $update_at
 * @package App\Models
 * @OA\Schema(
 *     schema="FotosComentario",
 *     type="object",
 *     title="FotosComentario",
 *     required={"FotosId", "Descricao"},
 *     properties={
 *         @OA\Property(property="id", type="integer"),
 *         @OA\Property(property="FotosId", type="integer"),
 *         @OA\Property(property="Descricao", type="string"),
 *         @OA\Property(property="UserId", type="integer"),
 *         @OA\Property(property="Status", type="string"),
 *         @OA\Property(property="created_at", type="string"),
 *         @OA\Property(property="update_at", type="string")
 *     }
 * )
 */
class FotosComentario extends Model
{
    protected $fillable = [ 'FotosId', 'Descricao', 'UserId', 'Status' ];
    protected $guarded = ['id', 'created_at', 'update_at'];
    protected $table = 'fotos_comentarios';
}