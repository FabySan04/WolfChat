<style>#registrar{    
    margin-top:10px;
        width: 60%;
        background-color: #42b72a;
        border: 1px solid #42b72a;
        color: #f9f9f9;
        border-radius: 30px;
    }
    #registrar:hover{
    margin-top:10px;
    width: 60%;
    background-color: #3CA227;
    color: #fff;
    border: 1px solid #fff;
    border-radius: 30px;
    }
</style>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if(count($errors)>0)
            <div class="alert alert-danger" role="alert">
                <ul>
                    @foreach($errors->all() as $error)
                    <li> {{$error}} </li>
                    @endforeach
                </ul>
            </div>
            @endif
            <div class="form-group">
                <input type="hidden" value="{{isset($post->fecha)?$post->fecha:old('fecha')}}" name="fecha" id="fecha">
            </div>
            
            <div class="form-group">
                <input class="form-control" type="hidden" value="{{ isset($post->id)?$post->id:old('id') }}" name="id" id="id">
            </div>
            <div class="form-group">
                <input class="form-control" type="hidden" value="{{isset($post->id_user)?$post->id_user:old('id_user')}}" name="id_user" id="id_user">
            </div>
            <div class="form-group">
                <input class="form-control" type="hidden" value="{{isset($post->name_user)?$post->name_user:old('name_user')}}" name="name_user" id="name_user">
            </div>
            <div class="form-group">
                <input class="form-control" type="hidden" value="{{isset($post->foto_user)?$post->foto_user:old('foto_user')}}" name="foto_user" id="foto_user">
            </div>
            <div class="form-group">
                <input class="form-control" type="textarea" value="{{isset($post->contenido)?$post->contenido:old('contenido')}}" name="contenido" id="contenido">
            </div>
            <div class="form-group">
                <input class="form-control" type="hidden" value="{{ isset($post->imagen)?$post->imagen:old('imagen') }}" name="imagen" id="imagen">
            </div>
            
            <div class="form-group">
                <input class="form-control" type="hidden" value="{{isset($post->reacciones)?$post->reacciones:old('reacciones')}} + 1" name="reacciones" id="reacciones">
            </div>

            <div class="form-group">
                <input class="btn btn-success" id="reaccionar" type="submit" value="{{ $modo }} comentario">
            </div>
                     
    <br>
        </div>
    </div>
</div>
    