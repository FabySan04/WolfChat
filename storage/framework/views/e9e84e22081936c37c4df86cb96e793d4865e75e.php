<form action="<?php echo e(url('/comentarios')); ?>" method="post" enctype="multipart/form-data">
<?php echo csrf_field(); ?>
<?php echo $__env->make('comentarios.form',['modo'=>'Agregar'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</form><?php /**PATH C:\xampp\htdocs\WolfChat\resources\views/comentarios/create.blade.php ENDPATH**/ ?>