<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil {{ Auth::user()->name }}</title>
</head>
<body>
    @include('layouts.headerED',[])
    <div class="modal-body">
        <form action="../{{ Auth::user()->id}}" method="post" enctype="multipart/form-data">
            @csrf
            {{method_field('PATCH')}}

            @include('layouts.formPerfil')
        </form><br>
        <div class="row mb-0">
            <div class="col-md-6 offset-md-4">
                <a href="{{ route('login') }}"><button id="signup" class="btn btn-info btn-lg" name="signup">Regresar</button></a>
            </div>
        </div>
    </div>
</body>
</html>