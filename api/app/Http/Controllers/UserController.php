<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use  App\Models\User;

/**
 * Class User
 *
 * @package API-DASH\controllers
 *
 * @author  PAGIMAX (falecom@pagimax.com)
 */
class UserController extends Controller
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
     * Resgatar as informações do usuário logado.
     *
     * @return Response
     * 
     * @OA\Get(path="/api/profile",
     *     tags={"User"},
     *     description="Informações do usuário",
     *     operationId="profile",
     *     @OA\Response(response="200", description="successful operation"),
     *     security={{ "apiAuth": {} }}
     * )
     */
    public function profile()
    {
        return response()->json(['user' => Auth::user()], 200);
    }

    /**
     * Obter todos os usuários
     *
     * @return Response
     * @OA\Get(path="/api/usuarios/obter-todos",
     *     tags={"User"},
     *     description="Obter a lista de todos os usuários",
     *     operationId="obterTodos",
     *     @OA\Response(response="200", description="successful operation"),
     *     security={{ "apiAuth": {} }}
     * )
     */
    public function allUsers()
    {
        return response()->json(['users' =>  User::all()], 200);
    }

    /**
     * Obter o usuário por id.
     *
     * @return Response
     * @OA\Get(path="/api/usuarios/obter-por-id/{id}",
     *     tags={"User"},
     *     description="Informações do usuário selecionado",
     *     operationId="obterPorId",
     * @OA\Parameter(
     *      name="id",
     *      in="path",
     *      description="Id do usuário",
     *      required=true,
     * ),
     * @OA\Response(
     *      response="200", 
     *      description="successful operation"
     * ),
     * security={{ "apiAuth": {} }}
     * )
     */
    public function singleUser($id)
    {
        try {
            $user = User::findOrFail($id);

            return response()->json(['user' => $user], 200);

        } catch (\Exception $e) {

            return response()->json(['message' => 'user not found!'], 404);
        }

    }

}