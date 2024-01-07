<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use  App\Models\Galeria;
use  App\Models\Fotos;

/**
 * Class Fotos
 *
 * @package API-DASH\controllers
 *
 * @author  PAGIMAX (falecom@pagimax.com)
 */
class FotosController extends Controller
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
     * @OA\Get(path="/api/fotos/obter-todos",
     *     tags={"Fotos"},
     *     description="Resgatar a lista de todos as fotos",
     *     operationId="obterTodos",
     *     @OA\Response(response="200", description="successful operation"),
     *     security={{ "apiAuth": {} }}
     * )
     */
    public function obterTodos()
    {
        try {

            $lista = DB::table('galerias')
            ->select('galerias.id', "galerias.created_at")
            ->where([ ['galerias.Status', '=', '1'], ['galerias.UserId', '=', auth()->user()->id] ])
            ->orderBy('galerias.created_at', 'desc')
            ->paginate(10);

            $qtdeRegistros = $lista->total();

            return response()->json(['lista' => $lista, 'qtdeRegistros' => $qtdeRegistros], 200);

        } catch (\Throwable $th) {

            return response()->json(['error' => $th], 500);

        }
    }

    /**
     * Resgatar Fotos por Id.
     *
     * @return Response
     * 
     * @OA\Get(path="/api/fotos/obter-por-id/{id}",
     *     tags={"Fotos"},
     *     description="Resgatar a foto por id",
     *     operationId="obterPorId",
     *     @OA\Parameter(
     *          name="id",
     *          in="path",
     *          description="Id da foto",
     *          required=true,
     *     ),
     *     @OA\Response(response="200", description="successful operation"),
     *     security={{ "apiAuth": {} }}
     * )
     */
    public function obterPorId($id)
    {
        try {

            return response()->json(['user' => Auth::user()], 200);

        } catch (\Throwable $th) {

            return response()->json(['error' => $th], 500);

        }
    }

    /**
     * Resgatar Fotos por Galeria.
     *
     * @return Response
     * 
     * @OA\Get(path="/api/fotos/obter-por-galeria/{id}",
     *     tags={"Fotos"},
     *     description="Resgatar a lista de todos as fotos por galeria",
     *     operationId="obterPorGaleria",
     *     @OA\Parameter(
     *          name="id",
     *          in="path",
     *          description="Id da foto",
     *          required=true,
     *     ),
     *     @OA\Response(response="200", description="successful operation"),
     *     security={{ "apiAuth": {} }}
     * )
     */
    public function obterPorGaleria($id)
    {
        try {

            return response()->json(['user' => Auth::user()], 200);

        } catch (\Throwable $th) {

            return response()->json(['error' => $th], 500);

        }
    }

    /**
     * Cadastrar Foto
     *
     * @return Response
     * 
     * @OA\Post(path="/api/fotos/cadastrar",
     *     tags={"Fotos"},
     *     description="Registrar foto",
     *     operationId="cadastrar",
     *     @OA\RequestBody(
     *         required=true,
     *         description="Registrar foto",
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(ref="#/components/schemas/Fotos")
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
     * Alterar Fotos
     *
     * @return Response
     * 
     * @OA\Put(path="/api/fotos/alterar",
     *     tags={"Fotos"},
     *     description="Alterar Fotos",
     *     operationId="alterar",
     *     @OA\RequestBody(
     *         required=true,
     *         description="Alterar Fotos",
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(ref="#/components/schemas/Fotos")
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
     * Excluir Fotos
     *
     * @return Response
     * 
     * @OA\Delete(path="/api/fotos/deletar/{id}",
     *     tags={"Fotos"},
     *     description="Deletar Fotos",
     *     operationId="deletar",
     *     @OA\Parameter(
     *      name="id",
     *      in="path",
     *      description="Id da Foto",
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