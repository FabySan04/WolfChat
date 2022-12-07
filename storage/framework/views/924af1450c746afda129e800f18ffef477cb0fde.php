<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.10.2/css/solid.css">
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/fontawesome.css" integrity="sha384-eHoocPgXsiuZh+Yy6+7DsKAerLXyJmu2Hadh4QYyt+8v86geixVYwFqUvMU8X90l" crossorigin="anonymous"/>
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/duotone.css" integrity="sha384-R3QzTxyukP03CMqKFe0ssp5wUvBPEyy9ZspCB+Y01fEjhMwcXixTyeot+S40+AjZ" crossorigin="anonymous"/>      
<script src="https://use.fontawesome.com/releases/v5.10.2/js/all.js"></script>
<!--<h1><?php echo e($modo); ?> comentario</h1>-->
   
    <?php if(count($errors)>0): ?>       
        <div class="alert alert-danger" role="alert">
            <ul>
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li> <?php echo e($error); ?> </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    <?php endif; ?>

    <div class="form-group">
        <input type="hidden" value="<?php echo e(old('fecha', date('d/M/Y h:i:s A'))); ?>" name="fecha" id="fecha">
    </div>
    <div class="form-group">
        <input class="form-control" type="hidden" value="<?php echo e(old('id')); ?>" name="id" id="id">
    </div>
    <div class="form-goup">
        <input class="form-control" type="hidden" value="<?php echo e($publicacion->id); ?>" name="id_post" id="id_post">
    </div>
    <div class="form-goup">
        <input class="form-control" type="hidden" value="<?php echo e(Auth::user()->id); ?>" name="id_user" id="id_user">
    </div>
    <div class="form-group">
        <input class="form-control" type="hidden" value="<?php echo e(Auth::user()->name); ?>" name="name" id="name">
    </div>
    <div class="form-group">
        <input class="form-control" type="hidden" value="<?php echo e(Auth::user()-> name); ?>" name="foto_user" id="foto_user">
    </div>           
    <div class="form-goup" style="margin-right: 15px;">
       <!-- <label for="comentario">Comentario</label>
    <?php echo e(isset($comentario->comentario)?$comentario->comentario:old('comentario')); ?>-->
        <input type="text" class="enviar-btn form-control input-sm" placeholder="Escribe un comentario" value="" name="comentario" id="comentario">
    </div>
    
    <br>         
    <input type="submit" class="btn btn-success" value="Comentar">
     <!--<a href="<?php echo e(url('home/')); ?>" class="btn btn-primary">Cancelar</a>-->
    <br>
    <br> <?php /**PATH C:\xampp\htdocs\WolfChat\resources\views/comentarios/form.blade.php ENDPATH**/ ?>