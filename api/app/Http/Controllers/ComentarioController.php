<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\Models\Galeria;
use App\Models\GaleriaComentario;
use App\Models\Fotos;
use App\Models\FotosComentario;

/**
 * Class Comentario
 *
 * @package API-DASH\controllers
 *
 * @author  PAGIMAX (falecom@pagimax.com)
 */
class ComentarioController extends Controller
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
     * Resgatar a lista de todos comentarios.
     *
     * @return Response
     * 
     * @OA\Get(path="/api/comentario/galeria/obter-todos",
     *     tags={"Comentario"},
     *     description="Resgatar a lista de todos as galerias",
     *     operationId="obterTodos",
     *     @OA\Response(response="200", description="successful operation"),
     *     security={{ "apiAuth": {} }}
     * )
     */
    public function obterTodosGaleria()
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
     * Resgatar a galeria por Id.
     *
     * @return Response
     * 
     * @OA\Get(path="/api/comentario/galeria/obter-por-id/{id}",
     *     tags={"Comentario"},
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
    public function obterPorGaleriaId($id)
    {
        try {

            
            return response()->json(['user' => Auth::user()], 200);

        } catch (\Throwable $th) {

            return response()->json(['error' => $th], 500);

        }
    }

    /**
     * Cadastrar Galeria
     *
     * @return Response
     * 
     * @OA\Post(path="/api/comentario/galeria/cadastrar",
     *     tags={"Comentario"},
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
    public function cadastrarGaleria(Request $request)
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
     * @OA\Put(path="/api/comentario/galeria/alterar",
     *     tags={"Comentario"},
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
    public function alterarGaleria(Request $request, $id)
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
     * @OA\Delete(path="/api/comentario/galeria/deletar/{id}",
     *     tags={"Comentario"},
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
    public function deletarGaleria($id)
    {
        try {

            return response()->json(['res' => 'deletar'], 200);

        } catch (\Throwable $th) {

            return response()->json(['error' => $th], 500);

        }
    }

    /**
     * Resgatar a lista de todos comentarios.
     *
     * @return Response
     * 
     * @OA\Get(path="/api/comentario/fotos/obter-todos",
     *     tags={"Comentario"},
     *     description="Resgatar a lista de todos as fotos",
     *     operationId="obterTodasFotos",
     *     @OA\Response(response="200", description="successful operation"),
     *     security={{ "apiAuth": {} }}
     * )
     */
    public function obterTodasFotos()
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
     * Resgatar a galeria por Id.
     *
     * @return Response
     * 
     * @OA\Get(path="/api/comentario/fotos/obter-por-id/{id}",
     *     tags={"Comentario"},
     *     description="Resgatar a lista de todos as fotos",
     *     operationId="obterPorFotosId",
     *     @OA\Parameter(
     *          name="id",
     *          in="path",
     *          description="Id da fotos",
     *          required=true,
     *     ),
     *     @OA\Response(response="200", description="successful operation"),
     *     security={{ "apiAuth": {} }}
     * )
     */
    public function obterPorFotosId($id)
    {
        try {

            
            return response()->json(['user' => Auth::user()], 200);

        } catch (\Throwable $th) {

            return response()->json(['error' => $th], 500);

        }
    }

    /**
     * Cadastrar Galeria
     *
     * @return Response
     * 
     * @OA\Post(path="/api/comentario/fotos/cadastrar",
     *     tags={"Comentario"},
     *     description="Registrar fotos",
     *     operationId="cadastrarFotos",
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
    public function cadastrarFotos(Request $request)
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
     * @OA\Put(path="/api/comentario/fotos/alterar",
     *     tags={"Comentario"},
     *     description="Alterar fotos",
     *     operationId="alterarFotos",
     *     @OA\RequestBody(
     *         required=true,
     *         description="Alterar fotos",
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(ref="#/components/schemas/Galeria")
     *         )
     *     ),
     *     @OA\Response(response="200", description="successful operation"),
     *     security={{ "apiAuth": {} }}
     * )
     */
    public function alterarFotos(Request $request, $id)
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
     * @OA\Delete(path="/api/comentario/fotos/deletar/{id}",
     *     tags={"Comentario"},
     *     description="Deletar Galeria",
     *     operationId="deletarFotos",
     *     @OA\Parameter(
     *      name="id",
     *      in="path",
     *      description="Id da fotos",
     *      required=true,
     *     ),
     *     @OA\Response(response="200", description="successful operation"),
     *     security={{ "apiAuth": {} }}
     * )
     */
    public function deletarFotos($id)
    {
        try {

            return response()->json(['res' => 'deletar'], 200);

        } catch (\Throwable $th) {

            return response()->json(['error' => $th], 500);

        }
    }
}