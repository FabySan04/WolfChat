
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

<script src="https://www.google.com/recaptcha/enterprise.js?render=6LcHiUAfAAAAAPqCJthg7sjOd0O6FZAD-1XBioVE"></script>
<script>
grecaptcha.enterprise.ready(function() {
    grecaptcha.enterprise.execute('6LcHiUAfAAAAAPqCJthg7sjOd0O6FZAD-1XBioVE', {action: 'login'}).then(function(token) {
       ...
    });
});
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
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" onkeypress="return soloLetras(event)" class="form-control @error('name') is-invalid @enderror" placeholder="Nombre" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

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
                                <input id="apellidos" type="text" onkeypress="return soloLetras(event)" class="form-control" name="apellidos" placeholder="Apellidos" value="{{ old('apellidos') }}" required autocomplete="apellidos" autofocus>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Contraseña') }}</label>

                            <div class="input-group-append col-md-6">
                                <input id="password" type="password" placeholder="Contraseña mayor a 8 caracteres" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                
                                <div class="input-group-append">
                                    <button id="show_password" class="btn btn-primary" type="button" onclick="mostrarPassword()"> <span class="fa fa-eye-slash icon"></span> </button>
                                </div>
                                
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>
                               
                             
                                <div class="row input-group-append col-md-10" >                        
                                    <label  class="col-md-4 col-form-label text-md-end" id="pass"></label>
                                <div  class="col-md-4" id="strengthMessage"></div>
                           </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" placeholder="Confirmar contraseña" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>


                        <div class="row mb-3">
                            <label  class="col-md-4 col-form-label text-md-end">{{ __('Municipio') }}</label>

                            <div class="col-md-6">
                                <div class="input-group">
						            <span class="input-group-addon"><i class="glyphicon glyphicon-chevron-down"></i></span>
						            <select class="form-select" name="municipio" required="required" >
							            <option >Selecciona tu municipio</option>    
                                        <option value="Pinal" >Pinal</option>
							            <option value="Jalpan">Japan</option>
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
							            <option >Seleciona tu genero</option>
							            <option value="Masculino">Masculino</option>
							            <option value="Femenino">Femenino</option>
						            </select>
					            </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Fecha de nacimiento') }}</label>

                            <div class="col-md-6">
                                <input id="fecha_nacimiento" type="date" class="form-control" name="fecha_nac" required="required">
                            </div>
                        </div>

                        <div class="row input-group-append col-md-8">
                           <label  class="col-md-6 col-form-label text-md-end"></label>
                           
                           <div class="g-recaptcha col-md-3" data-sitekey="6LfHrj4fAAAAAKzTNwpkOOdVGOl4eITCom4vBixt" required="required"></div> 
                         
                        </div><br>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" id="registrar" class="btn btn-primary">
                                    {{ __('Registrar') }}
                                </button>
                            </div>
                        </div>
                    </form>
                    <div class="row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <a href="{{ route('login') }}"><button id="signup" class="btn btn-info btn-lg" name="signup">Regresar</button></a>
                        </div>
                    </div><br>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<style>
    #registrar{
    width: 60%;
    background-color: #fff;
    border: 1px solid #5D8EC5;
    color: #5D8EC5;
    border-radius: 30px;
    }
    #registrar:hover{
    width: 60%;
    background-color: #5D8EC5;
    color: #fff;
    border: 2px solid #fff;
    border-radius: 30px;
    }
    .card{
        background-color: #009C87;
    }
    .pass{
        text-align: center;
    }
    #signup{    
        width: 60%;
        background-color: #42b72a;
        border: 1px solid #42b72a;
        color: #f9f9f9;
        border-radius: 30px;
    }
</style>
