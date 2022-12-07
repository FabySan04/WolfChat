<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $datos['publicaciones'] = DB::table('posts')
                ->orderBy('fecha', 'desc')
                ->get();
        return view('home',$datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $campos=[
            'fecha'=>'required|string|max:100',
            'id_user'=>'required|string|max:100',
            'contenido'=>'required|string|max:150',
            'imagen'=>'required|max:10000|mimes:jpeg,png,jpg',
            
        ];
        $mensaje=[
            'required'=>'El :attribute es requerido',
       ];

        $this->validate($request,$campos,$mensaje);

        $datosPost=request()->except('_token');
        
        if ($request->hasFile('imagen')) {
            $datosPost['imagen']=$request->file('imagen')->store('uploads','public');
        }

        Post::insert($datosPost);
        //return response()->json($datosPost);
        return redirect('home');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $post=Post::findOrFail($id);
        return view('post.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $campos=[
            
            'id_user'=>'required|string|max:100',
            'contenido'=>'required|string|max:150',
        ];
        $mensaje=[
            'required'=>'El :attribute es requerido',
       ];
       
        $this->validate($request,$campos,$mensaje);
  
        $datospost=request()->except(['_token','_method']);

       
        if ($request->hasFile('imagen')) {
            $post=Post::findOrFail($id);

            Storage::delete('public/'.$post->imagen);
            /*GUARDAR LA IMAGEN*/
            $datospost['imagen']=$request->file('imagen')->store('uploads','public');
        }

    
        Post::where('id','=',$id)->update($datospost);
        $post=Post::findOrFail($id);
        return redirect('home')->with('mensaje','Reaccionaste');
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $post=Post::findOrFail($id);

        if(Storage::delete('public/'.$post->imagen)){
            Post::destroy($id);
        }
        return redirect('home')->with('mensaje','Publicación eliminada');
    }
    public function like($id, $id_user){
        $datos =[
            'id_pub' => $id,
            'id_usu' => $id_user
        ];

        if($this->publicar->rowPublicacion($datos)){

        }else{

        }
    }
}
