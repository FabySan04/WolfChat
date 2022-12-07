<script>
    function soloLetras(e){
 key = e.keyCode || e.which;
 tecla = String.fromCharCode(key).toLowerCase();
 letras = " áéíóúabcdefghijklmnñopqrstuvwxyz";
 especiales = [8,37,39,46];

 tecla_especial = false
 for(var i in especiales){
     if(key == especiales[i]){
  tecla_especial = true;
  break;
            } 
 }
 
        if(letras.indexOf(tecla)==-1 && !tecla_especial)
     return false;
     }
</script>


<script type="text/javascript">
function mostrarPassword(){
		var cambio = document.getElementById("password");
		if(cambio.type == "password"){
			cambio.type = "text";
			$('.icon').removeClass('fa fa-eye-slash').addClass('fa fa-eye');
		}else{
			cambio.type = "password";
			$('.icon').removeClass('fa fa-eye').addClass('fa fa-eye-slash');
		}
	} 
	
	$(document).ready(function () {
	//CheckBox mostrar contraseña
	$('#ShowPassword').click(function () {
		$('#password').attr('type', $(this).is(':checked') ? 'text' : 'password');
	});
});
</script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="../resources/js/CheckPassword.js"></script>
    <link href="../resources/css/CheckPassword.css" rel="stylesheet" />
            @if(count($errors)>0)
            <div class="alert alert-danger" role="alert">
                <ul>
                    @foreach($errors->all() as $error)
                    <li> {{$error}} </li>
                    @endforeach
                </ul>
            </div>
            @endif

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" onkeypress="return soloLetras(event)" class="form-control @error('name') is-invalid @enderror" placeholder="Nombre" name="name" value="{{ isset($usuario->name)?$usuario->name:old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Apellidos') }}</label>

                            <div class="col-md-6">
                                <input id="apellidos" type="text" onkeypress="return soloLetras(event)" class="form-control" name="apellidos" placeholder="Apellidos" value="{{ isset($usuario->apellidos)?$usuario->apellidos:old('apellidos') }}" required autocomplete="apellidos" autofocus>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email" name="email" value="{{ isset($usuario->email)?$usuario->email:old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label  class="col-md-4 col-form-label text-md-end">{{ __('Municipio') }}</label>

                            <div class="col-md-6">
                                <div class="input-group">
						            <span class="input-group-addon"><i class="glyphicon glyphicon-chevron-down"></i></span>
						            <select class="form-select" name="municipio" required="required"> 
                                        <option value="{{$usuario->municipio}}">{{ $usuario->municipio}}</option> 
                                        <option value="Pinal">Pinal</option>
							            <option value="Jalpan">Jalpan</option>
							            <option value="Landa">Landa</option>
							            <option value="Arroyo Seco">Arroyo Seco</option>
						            </select>
					            </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Genero') }}</label>

                            <div class="col-md-6">
                                <div class="input-group">
						            <span class="input-group-addon"><i class="glyphicon glyphicon-chevron-down"></i></span>
						            <select class="form-select input-md" name="genero" required="required">
                                        <option value="{{$usuario->genero}}">{{$usuario->genero}}</option>
							            <option value="Masculino">Masculino</option>
							            <option value="Femenino">Femenino</option>
						            </select>
					            </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Fecha de nacimiento') }}</label>

                            <div class="col-md-6">
                                <input id="fecha_nacimiento" type="date" class="form-control" name="fecha_nac" required="required" value="{{ isset($usuario->fecha_nac)?$usuario->fecha_nac:old('fecha_nac') }}">
                            </div>
                        </div><br>

                        <div class="row mb-3">
                            <label for="foto_user" class="col-md-4 col-form-label text-md-end">Foto de perfil</label>
                                @if(isset($usuario->foto_user))
                                <div class="col-md-2">
                                    <img class="img-thumbnail" src="{{ asset('storage').'/'.$usuario->foto_user}}" alt="Foto del destino">
                                </div>
                                @endif
                            <div class="col-md-6">
                                <input class="form-control" type="file" value="" name="foto_user" id="foto_user">
                            </div>
                            
                        </div><br>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Actualizar') }}
                                </button>
                            </div>
                        </div>