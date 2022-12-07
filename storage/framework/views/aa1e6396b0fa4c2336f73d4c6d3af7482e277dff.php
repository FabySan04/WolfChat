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


    <title>Perfil <?php echo e(Auth::user()->name); ?></title>
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
    <?php echo $__env->make('layouts.headerP',[], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<div class="container">
    <?php if(Session::has('mensaje')): ?>
        <div class="alert alert-success alert-dismissible" role="alert">
            <?php echo e(Session::get('mensaje')); ?>

            <button type="button" class="close" data-dismiss="alert" aria-label="Close" >
            </button>
        </div>
    <?php endif; ?>
</div>
<div  id="contenedor">
<h5>Hola <?php echo e($datos->name); ?> este es tu perfil</h5>
    <img src="<?php echo e(asset('storage').'/'.$datos->foto_user); ?>" class="perfil_vista" width="100" height="auto" HSPACE="10" VSPACE="10" alt="">
    
    <p><?php echo e($datos->name); ?> <?php echo e($datos->apellidos); ?></p>
    <p><?php echo e($datos->email); ?></p>
    <p><?php echo e($datos->municipio); ?></p>
    <p><?php echo e($datos->genero); ?></p>
    <p><?php echo e($datos->fecha_nac); ?></p>

    <?php $__currentLoopData = $publicaciones; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $publicacion): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      
    <div align="center">
    
    <img src="<?php echo e(asset('storage').'/'.$publicacion->imagen); ?>" id="fotos" width="300" height="300" HSPACE="20" VSPACE="20" alt="">
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    
</body>
</html>
<?php /**PATH C:\xampp\htdocs\WolfChat\resources\views/perfil.blade.php ENDPATH**/ ?>