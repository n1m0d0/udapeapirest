<?php

namespace App\Http\Controllers;

use App\Http\Resources\ErrorResource;
use App\Http\Resources\UsuarioResource;
use App\Http\Resources\UsuarioCollection;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ApiUsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->user();
        if ($user->hasAnyRole(['Administrador', 'Supervisor', 'Invitado'])) {
            //$data = DB::connection('mysql2')->table('usuarios')->get();
            $data = Usuario::all();
            //->join('telefonos', 'usuarios.usuario_id', '=', 'telefonos.usuario_id')->get();
            /*return response()->json([
                'code' => '10',
                'message' => 'Peticion Exitosa',
                'data' => $data
            ]);*/
            return new UsuarioCollection($data);
        } else {
            return response()->json([
                'code' => '20',
                'message' => 'No esta Habilitado'
            ]);
        }
        //$data = DB::connection('mysql2')->table('usuarios')->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
