<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class GaleriaComentario
 * @property integer $id
 * @property string $GaleriaId
 * @property string $Descricao
 * @property integer $UserId
 * @property bool $Status
 * @property string $created_at
 * @property string $update_at
 * @package App\Models
 * @OA\Schema(
 *     schema="GaleriaComentario",
 *     type="object",
 *     title="GaleriaComentario",
 *     required={"GaleriaId", "Descricao"},
 *     properties={
 *         @OA\Property(property="id", type="integer"),
 *         @OA\Property(property="GaleriaId", type="integer"),
 *         @OA\Property(property="Descricao", type="string"),
 *         @OA\Property(property="UserId", type="integer"),
 *         @OA\Property(property="Status", type="string"),
 *         @OA\Property(property="created_at", type="string"),
 *         @OA\Property(property="update_at", type="string")
 *     }
 * )
 */
class GaleriaComentario extends Model
{
    use HasFactory;

    protected $fillable = [ 'GaleriaId', 'Descricao', 'UserId', 'Status' ];
    protected $guarded = ['id', 'created_at', 'update_at'];
    protected $table = 'galeria_comentarios';

    public function galeria()
    {
        return $this->belongsTo(Galeria::class, "id", 'GaleriaId');
    }

}
