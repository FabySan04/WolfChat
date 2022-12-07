<form action="{{url('/comentarios')}}" method="post" enctype="multipart/form-data">
@csrf
@include('comentarios.form',['modo'=>'Agregar'])
</form>