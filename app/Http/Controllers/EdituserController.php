<?php

namespace App\Http\Controllers;

use App\Models\Edituser;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class EdituserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
     * @param  \App\Models\Edituser  $edituser
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $datos = User::findOrFail($id);
        $publicaciones = Post::where('id_user','=',$id)
            ->orderBy('fecha', 'desc')
            ->get();
        return view('perfil', compact('publicaciones','datos'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Edituser  $edituser
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $usuario = User::findOrFail($id);
        
        //return response()->json($usuario);
        return view('auth.perfiledit', compact('usuario'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Edituser  $edituser
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $campos=[
            'name' => 'required|string|max:100',
            'apellidos' => 'required|string|max:100',
            'email' => 'required|string|max:100',
            'municipio'=> 'required|string|max:100',
            'genero'=> 'required|string|max:100',
            'fecha_nac'=> 'required|string|max:100',
        ];

        $mensaje=[
            'required'=>'El :attribute es requerido',
        ];


        if ($request->hasFile('foto_user')) {
            $campos=['foto_user'=>'required|max:10000|mimes:jpeg,png,jpg'];
            $mensaje=['foto_user'=>'La foto del destino es requerida'];
        }

        $this->validate($request,$campos,$mensaje);



        $datosPerfil=$request->except(['_token','_method']);
        
        if ($request->hasFile('foto_user')) {
            $perfil=User::findOrFail($id);
                Storage::delete('public/'.$perfil->foto_user);
            $datosPerfil['foto_user']=$request->file('foto_user')->store('uploads','public');
        }

        $datos=$request->except(['_token','_method','apellidos','email','municipio','genero','fecha_nac']);

        Post::where('id_user','=',$id)->update($datos);
        User::where('id','=',$id)->update($datosPerfil);

        $datos = User::findOrFail($id);
        $publicaciones = Post::where('id_user','=',$id)
            ->orderBy('fecha', 'desc')
            ->get();
        //return response()->json($datosPerfil);
        $perfil=User::findOrFail($id);
        //return view('viajes.edit', compact('viaje'));
        return view('perfil', compact('datos','publicaciones'))->with('mensaje','Perfil editado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Edituser  $edituser
     * @return \Illuminate\Http\Response
     */
    public function destroy(Edituser $edituser)
    {
        //
    }
}
