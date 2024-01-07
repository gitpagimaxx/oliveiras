<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use  App\Models\Galeria;

/**
 * Class Galeria
 *
 * @package API-DASH\controllers
 *
 * @author  PAGIMAX (falecom@pagimax.com)
 */
class GaleriaController extends Controller
{
    /**
     * Instantiate a new UserController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Resgatar a lista de todos as galerias.
     *
     * @return Response
     * 
     * @OA\Get(path="/api/galeria/obter-todos",
     *     tags={"Galeria"},
     *     description="Resgatar a lista de todos as galerias",
     *     operationId="obterTodos",
     *     @OA\Response(response="200", description="successful operation"),
     *     security={{ "apiAuth": {} }}
     * )
     */
    public function obterTodos()
    {
        try {

            $lista = DB::table('galeria')
            ->select('galeria.id', "galeria.created_at")
            ->where([ ['galeria.Status', '=', '1'], ['galeria.UserId', '=', auth()->user()->id] ])
            ->orderBy('galeria.created_at', 'desc')
            ->paginate(10);

            $qtdeRegistros = $lista->total();

            return response()->json(['lista' => $lista, 'qtdeRegistros' => $qtdeRegistros], 200);

        } catch (\Throwable $th) {

            return response()->json(['error' => $th], 500);

        }
    }

    /**
     * Resgatar a galeria por Id.
     *
     * @return Response
     * 
     * @OA\Get(path="/api/galeria/obter-por-id/{id}",
     *     tags={"Galeria"},
     *     description="Resgatar a lista de todos as galerias",
     *     operationId="obterPorId",
     *     @OA\Parameter(
     *          name="id",
     *          in="path",
     *          description="Id da galeria",
     *          required=true,
     *     ),
     *     @OA\Response(response="200", description="successful operation"),
     *     security={{ "apiAuth": {} }}
     * )
     */
    public function obterPorId($id)
    {
        try {
            $registro = DB::table('galeria')
            ->select('galeria.id', 'galeria.Nome', 'galeria.Data', 'galeria.Descricao', "galeria.created_at")
            ->where([ ['galeria.Status', '=', '1'], ['galeria.UserId', '=', auth()->user()->id], ['galeria.id', '=', $id] ])
            ->paginate(10);

            $galeria = Galeria::where('id', $id)->get();

            // TO-DO: Listar os comentários do modo antigo
            $comentarios = DB::table('galeria_comentario')->get();

            return response()->json(['registro' => $registro, 'comentarios' => $comentarios, 'galeria' => $galeria ], 200);


        } catch (\Throwable $th) {

            return response()->json(['error' => $th], 500);

        }
    }

    /**
     * Cadastrar Galeria
     *
     * @return Response
     * 
     * @OA\Post(path="/api/galeria/cadastrar",
     *     tags={"Galeria"},
     *     description="Registrar galeria",
     *     operationId="cadastrar",
     *     @OA\RequestBody(
     *         required=true,
     *         description="Registrar galeria",
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(ref="#/components/schemas/Galeria")
     *         )
     *     ),
     *     @OA\Response(response="200", description="successful operation")
     * )
     */
    public function cadastrar(Request $request)
    {
        try {

            return response()->json(['res' => 'cadastrar'], 200);

        } catch (\Throwable $th) {

            return response()->json(['error' => $th], 500);

        }
    }

    /**
     * Alterar Galeria
     *
     * @return Response
     * 
     * @OA\Put(path="/api/galeria/alterar",
     *     tags={"Galeria"},
     *     description="Alterar Galeria",
     *     operationId="alterar",
     *     @OA\RequestBody(
     *         required=true,
     *         description="Alterar Galeria",
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(ref="#/components/schemas/Galeria")
     *         )
     *     ),
     *     @OA\Response(response="200", description="successful operation"),
     *     security={{ "apiAuth": {} }}
     * )
     */
    public function alterar(Request $request, $id)
    {
        try {

            return response()->json(['res' => 'alterar'], 200);

        } catch (\Throwable $th) {

            return response()->json(['error' => $th], 500);

        }
    }

    /**
     * Excluir Galeria
     *
     * @return Response
     * 
     * @OA\Delete(path="/api/galeria/deletar/{id}",
     *     tags={"Galeria"},
     *     description="Deletar Galeria",
     *     operationId="deletar",
     *     @OA\Parameter(
     *      name="id",
     *      in="path",
     *      description="Id da galeria",
     *      required=true,
     *     ),
     *     @OA\Response(response="200", description="successful operation"),
     *     security={{ "apiAuth": {} }}
     * )
     */
    public function deletar($id)
    {
        try {

            return response()->json(['res' => 'deletar'], 200);

        } catch (\Throwable $th) {

            return response()->json(['error' => $th], 500);

        }
    }
}