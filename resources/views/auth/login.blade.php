<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<style>
    #signup{    
        width: 60%;
        background-color: #42b72a;
        border: 1px solid #42b72a;
        color: #f9f9f9;
        border-radius: 30px;
    }
    #login{
        width: 60%;
        background-color: #162D4D;
        border: 1px solid #162D4D;
        color: #f9f9f9;
        border-radius: 30px;
    }
    #card{
        background-color: #009C87;
        border-radius: 5%;
    }
    
    #lobito{
        position: absolute;
        z-index: 10px;
    }
    #lobito img{
        max-width: 400px;
        height: 400px;
    }
    #email{
        float: center;
        text-align: center;
        border-radius: 10px;
    }
    #password{
        float: center;
        text-align: center;
        border-radius: 10px;
    }
    #Olvidaste{
        text-decoration: none;
        color: #162D4D;        
    }
    #Olvidaste:hover{
        text-decoration: underline;
        color: #054584;        
    }
    @media (max-width:750px){
        #signup{    
        width: 40%;
        background-color: #42b72a;
        border: 1px solid #42b72a;
        color: #f9f9f9;
        border-radius: 30px;
        margin-left: 30%;
    }
    #login{
        width: 40%;
        background-color: #162D4D;
        border: 1px solid #162D4D;
        color: #f9f9f9;
        border-radius: 30px;
        margin-left: 30%;
    }
    #CheckB{
        margin-left: 25%;
    }
    #links{
        margin-left: 30%;
    }
    #Olvidaste{
        margin-left: 30%;

    }
    }
</style>
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
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card" id="card">

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="row mb-3">

                            <div class="col-md-10 offset-md-1">
                                <input id="email" type="email" placeholder="Correo electronico" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="input-group-append row mb-3">
                            <div class="col-md-10 offset-md-1">
                                <input id="password" type="password" placeholder="Contraseña" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input id="CheckB" class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label id="links" class="form-check-label" for="remember">
                                        {{ __('Recordar contraseña') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                            <a href="{{ route('login') }}"><button id="login" class="btn btn-info btn-lg" name="login">Iniciar sesión</button></a> <br><br>

                                @if (Route::has('password.request'))
                                    <a id="Olvidaste" class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('¿Olvidaste tu contraseña?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                    <div class="row mb-0">
                        <div class="col-md-8 offset-md-4">
                            <a href="{{ route('register') }}"><button id="signup" class="btn btn-info btn-lg" name="signup">Registrarse</button></a>
                        </div>
                    </div><br>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
