<!doctype html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <title>Inicio</title>
    <!-- Scripts -->
    <script src="<?php echo e(asset('js/app.js')); ?>" defer></script>
    <!-- Fonts <link rel="dns-prefetch" href="//fonts.gstatic.com">-->
    <link rel="icon" href="../resources/images/lobo_sf.png" sizes="32x32">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <!-- font-->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">    
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/duotone.css" integrity="sha384-R3QzTxyukP03CMqKFe0ssp5wUvBPEyy9ZspCB+Y01fEjhMwcXixTyeot+S40+AjZ" crossorigin="anonymous"/>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/fontawesome.css" integrity="sha384-eHoocPgXsiuZh+Yy6+7DsKAerLXyJmu2Hadh4QYyt+8v86geixVYwFqUvMU8X90l" crossorigin="anonymous"/>      
    <link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet">
</head>
<body>
        <nav  id="header" class="navbar navbar-expand-md navbar-light shadow-sm">
            <div class="container">
                   <!--header-->
                   <a class="logo" href="<?php echo e(url('/home')); ?>">
                    <img class="imagen_logo" src="/WolfChat/resources/images/wolfchat_sin_fondo.png" alt="Logotipo_Wolfchat">
                </a>
               
              <!--         <form class="form-inline my-2 my-lg-0">  <input class="form-control mr-sm-2" type="search" style="display:inline;" placeholder="Buscar" aria-label="Search">
  <button class="btn btn-outline-success my-2 my-sm-0 offset-md-10" style=" display:inline;" type="submit"><i class="far fa-search"></i></button>
</form>-->             
                <div id="icons" class="collapse navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">
                    </ul>
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto" style="list-style-type: none;">              
                        <li id="newpost"><i id="iconos" data-bs-toggle="modal" data-bs-target="#exampleModal" class="far fa-plus-square" aria-hidden="true"></i></li>
                     <!--   <li><i id="info" style="font-size: 20px;" class="far fa-heart"></i></li>
                        <li><img src="../resources/images/ICONOS/MENSAJES.png" id="chat" alt=""></li>
                         Authentication Links -->
                         <img src="/WolfChat/public/storage/<?php echo e(Auth::user()->foto_user); ?>" class="foto_perfil"  width="50" height="60" alt="">
                        <?php if(auth()->guard()->guest()): ?>
                            <?php if(Route::has('login')): ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo e(route('login')); ?>"><?php echo e(__('Iniciar sesión')); ?></a>
                                </li>
                            <?php endif; ?>

                            <?php if(Route::has('register')): ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo e(route('register')); ?>"><?php echo e(__('Registrarse')); ?></a>
                                </li>
                            <?php endif; ?>
                        <?php else: ?>

                            <li id="fotoflex" class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <img class="foto_perfil" src="../resources/images/User/joselyn.png" alt="">
                                </a>
                               
                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="<?php echo e(route('logout')); ?>"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        <?php echo e(__('Cerrar sesión')); ?>

                                    </a>
									
									<a class="dropdown-item" href="../<?php echo e(Auth::user()->id); ?>">Perfil</a>

                                    <a class="dropdown-item" href="../<?php echo e(Auth::user()->id); ?>/edit">Editar datos</a>

                                    <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" class="d-none">
                                        <?php echo csrf_field(); ?>
                                    </form>
                                </div>                             
                            </li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </nav>
</body>
</html>
<!-- Styles -->
<style>
    #header{
        width: 100%;
    }
   
	img.imagen_logo{
    	width: 150px;
    	height: auto;
        
	}
    img.foto_perfil{
            width:50px;
            margin-top: 0px;
            border-radius:150px;
        } 
	nav{
		background-color: #009C87;
		max-height: 90px;
        width: 100%;
	}
    i{
        margin-right: 5px;
        margin-top:30px; 
        width: 60px;
        font-size: 20px;
    }
    #chat{
        width: 16px;
        margin-top:31px;
        margin-right:10px;
        height: auto;
    }
    
    #perfil{         
        position: relative;
        z-index: 1;
    }
    @media (max-width: 750px){
       
        #home{
            display: block;
            margin-left: 10px;
            margin-bottom: 10px;
        }
        #newpost{
            display: block;
            margin-left: 80px;
            margin-top: 50px;
            position: relative;
            z-index: 1;
        }
        #fotoflex{
            display: flex;
            margin-left: -20px;
            margin-top: -30px;
        }
        img.foto_perfil{
            width:55px;
            margin-top: -40px;
            border-radius:200px;
        }  
        a.logo{
            margin-top: 0px;
            margin-left: -10px;
            display:block;
            align-items:center;
        }
        img.imagen_logo{  
            margin-left: 10px;          
            margin-top: -15px;
            width: 80px;
            height: auto;
        }        
        nav{
            max-height: 65px;
            width: 100%;
        }
         
        #icons{
            display: flex;
            margin-right: 20px;
            margin-top: -120px;
        }
        #iconos {
            margin-right: 50px;
            margin-top: 0px; 
            width: 25px;
            font-size: 30px;
        }
    }
</style><?php /**PATH C:\xampp\htdocs\WolfChat\resources\views/layouts/headerED.blade.php ENDPATH**/ ?>