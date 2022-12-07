
<?php $__env->startSection('content'); ?>
<div class="container">
  
    <form action="<?php echo e(url('/post/'.$post->id)); ?>" method="post" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        <?php echo e(method_field('PATCH')); ?>

        <?php echo $__env->make('post.form_edit_post', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>            
    </form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\WolfChat\resources\views/post/edit.blade.php ENDPATH**/ ?>