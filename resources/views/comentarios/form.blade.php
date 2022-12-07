<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.10.2/css/solid.css">
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/fontawesome.css" integrity="sha384-eHoocPgXsiuZh+Yy6+7DsKAerLXyJmu2Hadh4QYyt+8v86geixVYwFqUvMU8X90l" crossorigin="anonymous"/>
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/duotone.css" integrity="sha384-R3QzTxyukP03CMqKFe0ssp5wUvBPEyy9ZspCB+Y01fEjhMwcXixTyeot+S40+AjZ" crossorigin="anonymous"/>      
<script src="https://use.fontawesome.com/releases/v5.10.2/js/all.js"></script>
<!--<h1>{{ $modo }} comentario</h1>-->
   
    @if(count($errors)>0)       
        <div class="alert alert-danger" role="alert">
            <ul>
                @foreach($errors->all() as $error)
                    <li> {{ $error }} </li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="form-group">
        <input type="hidden" value="{{old('fecha', date('d/M/Y h:i:s A'))}}" name="fecha" id="fecha">
    </div>
    <div class="form-group">
        <input class="form-control" type="hidden" value="{{old('id')}}" name="id" id="id">
    </div>
    <div class="form-goup">
        <input class="form-control" type="hidden" value="{{ $publicacion->id }}" name="id_post" id="id_post">
    </div>
    <div class="form-goup">
        <input class="form-control" type="hidden" value="{{ Auth::user()->id }}" name="id_user" id="id_user">
    </div>
    <div class="form-group">
        <input class="form-control" type="hidden" value="{{ Auth::user()->name }}" name="name_user" id="name_user">
    </div>
    <div class="form-group">
        <input class="form-control" type="hidden" value="{{ Auth::user()-> name}}" name="foto_user" id="foto_user">
    </div>           
    <div class="form-goup" style="margin-right: 15px;">
       <!-- <label for="comentario">Comentario</label>
    {{ isset($comentario->comentario)?$comentario->comentario:old('comentario') }}-->
        <input type="text" class="enviar-btn form-control input-sm" placeholder="Escribe un comentario" value="" name="comentario" id="comentario">
    </div>
    
    <br>         
    <input type="submit" class="btn btn-success" value="Comentar">
     <!--<a href="{{ url('home/') }}" class="btn btn-primary">Cancelar</a>-->
    <br>
    <br> 