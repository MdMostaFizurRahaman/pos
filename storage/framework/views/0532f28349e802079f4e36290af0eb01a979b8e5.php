<?php $__env->startSection('htmlheader_title'); ?>
    Page not found
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contentheader_title'); ?>
    404 Error Page
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contentheader_description'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('main-content'); ?>
<div class="panel-body">
    <div class="error-page">
        <h2 class="headline text-yellow"> 404</h2><br />
        <div class="error-content">
            <h3><i class="fa fa-warning font-red"></i> Not Found!</h3>
            <p>
                Sorry, we could not find the page you were looking for.<br />
                Meanwhile, you may <a href='<?php echo e(url('/home')); ?>'>return to dashboard</a>.
            </p>
        </div><!-- /.error-content -->
    </div><!-- /.error-page -->
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>