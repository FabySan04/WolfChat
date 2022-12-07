<?php

namespace App\Http\Controllers;

use App\Models\comentarios;
use Illuminate\Http\Request;

class ComentariosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $campos=[
            'id_user'=>'required|string|max:100',
            'id_post'=>'required|string|max:100',
            'comentario'=>'required|string|max:1000',
        ];
        $mensaje=[
            'required'=>'El :attribute es requerido',
        ];
      
        $this->validate($request,$campos,$mensaje);

        $datosComentario = request()->except('_token');
        
        Comentarios::insert($datosComentario);
        //return response()->json($datosPrenda);
        return redirect('home')->with('mensaje','Comentario agregado con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\comentarios  $comentarios
     * @return \Illuminate\Http\Response
     */
    public function show(comentarios $comentarios)
    {
        //
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\comentarios  $comentarios
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $comentario=Comentarios::findOrFail($id);
        return view('comentarios.edit', compact('comentario'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\comentarios  $comentarios
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $campos=[
            'id_user'=>'required|string|max:100',
            'comentario'=>'required|string|max:1000',
        ];
        $mensaje=[
            'required'=>'El :attribute es requerido',
       ];

        $this->validate($request,$campos,$mensaje);
  
        $datosComentarios=request()->except(['_token','_method']);
    
        Comentarios::where('id','=',$id)->update($datosComentarios);
        $comentario=Comentarios::findOrFail($id);
        return redirect('home')->with('mensaje','Comentario actualizado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\comentarios  $comentarios
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
            $comentario=Comentarios::findOrFail($id);        
            Comentarios::destroy($id);
    
            return redirect('home')->with('mensaje','Comentario eliminado');        
    }
}
