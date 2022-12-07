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
                <input type="hidden" value="{{old('fecha', date(' g Y h:i:s A'))}}" name="fecha" id="fecha">
            </div>
            <div class="form-group">
                <input class="form-control" type="hidden" value="{{old('id')}}" name="id" id="id">
            </div>
            <div class="form-group">
                <input class="form-control" type="hidden" value="{{ Auth::user()->id }}" name="id_user" id="id_user">
            </div>
            <div class="form-group">
                <input class="form-control" type="hidden" value="{{ Auth::user()->name }}" name="name" id="name">
            </div>
            <div class="form-group">
                <input class="form-control" type="hidden" value="{{ Auth::user()->foto_user}}" name="foto_user" id="foto_user">
            </div>
            <div class="form-group">
                <label for="contenido">Contenido</label>
                <input class="form-control" type="textarea" placeholder="¿En que estas pensando?" value="{{isset($post->contenido)?$post->contenido:old('contenido')}}" name="contenido" id="contenido">
            </div>
            <div class="form-group">
                <label for="imagen">Imagen</label>
                @if(isset($post->imagen))
                <img class="img-thumbnail img-fluid" src="{{ asset('storage').'/'.$post->imagen}}" alt="Foto del destino" width="200" height="auto">
                @endif
                <input class="form-control" type="file" value="" name="imagen" id="imagen">
            </div>
           

            <div class="form-group">
                <input class="btn btn-success" id="registrar" type="submit" >
            </div>
        </div>
    </div>
</div>
    