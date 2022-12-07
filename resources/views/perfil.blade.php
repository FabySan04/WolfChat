<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>


    <title>Perfil {{ Auth::user()->name }}</title>
    <style>
        #contenedor {
            margin-top: 50px; 
            margin-left: 150px; 
            margin-right: 150px; 
            align: left;
        }
        img.perfil_vista{
            display: block;
            float:left;
            width: 150px;
            height: 150px;
margin-top:5px;
border-radius:150px;}
#fotos{
    display: block;
            float:left;
}
@media (max-width: 500px){
    #contenedor {
            margin-top: 50px; 
            margin-left: 10px; 
            margin-right: 10px; 
            align: left;
        }
        img.perfil_vista{
            display: block;
            float: right;
            width: 80px;
            height: 80px;
margin-top:5px;
border-radius:150px;} 
}
    </style>
</head>
<body>
    @include('layouts.headerP',[])
<div class="container">
    @if(Session::has('mensaje'))
        <div class="alert alert-success alert-dismissible" role="alert">
            {{ Session::get('mensaje') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close" >
            </button>
        </div>
    @endif
</div>
<div  id="contenedor">
<h5>Hola {{$datos->name}} este es tu perfil</h5>
    <img src="{{ asset('storage').'/'.$datos->foto_user}}" class="perfil_vista" width="100" height="auto" HSPACE="10" VSPACE="10" alt="">
    
    <p>{{$datos->name}} {{$datos->apellidos}}</p>
    <p>{{$datos->email}}</p>
    <p>{{$datos->municipio}}</p>
    <p>{{$datos->genero}}</p>
    <p>{{$datos->fecha_nac}}</p>

    @foreach( $publicaciones as $publicacion)
      
    <div align="center">
    
    <img src="{{ asset('storage').'/'.$publicacion->imagen}}" id="fotos" width="300" height="300" HSPACE="20" VSPACE="20" alt="">
    @endforeach
    
</body>
</html>
