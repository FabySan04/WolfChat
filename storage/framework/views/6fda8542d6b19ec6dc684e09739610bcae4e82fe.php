<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil <?php echo e(Auth::user()->name); ?></title>
</head>
<body>
    <?php echo $__env->make('layouts.headerED',[], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="modal-body">
        <form action="../<?php echo e(Auth::user()->id); ?>" method="post" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <?php echo e(method_field('PATCH')); ?>


            <?php echo $__env->make('layouts.formPerfil', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </form><br>
        <div class="row mb-0">
            <div class="col-md-6 offset-md-4">
                <a href="<?php echo e(route('login')); ?>"><button id="signup" class="btn btn-info btn-lg" name="signup">Regresar</button></a>
            </div>
        </div>
    </div>
</body>
</html><?php /**PATH C:\xampp\htdocs\WolfChat\resources\views/auth/perfiledit.blade.php ENDPATH**/ ?>