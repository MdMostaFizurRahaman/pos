<?php if(( isset($errors) && $errors->any()) || Session::has('error') || isset($error) || Session::has('message') || isset($message)): ?>
    <div id="messageBar" class="animated fadeInDown">
        <?php if($errors->any()): ?>
            <div class="alert alert-close alert-danger">
                <a href="#" title="Close" class="glyph-icon alert-close-btn icon-remove"></a>
                <div class="bg-red alert-icon">
                    <i class="glyph-icon fa fa-times fa-2x"></i>
                </div>
                <div class="alert-content">
                    <h4 class="alert-title"><?php echo e(trans('core.validation_error_title')); ?></h4>
                    <p>
                        <ul>
                            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li><?php echo $error; ?></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </p>
                </div>
            </div>
        <?php endif; ?>

        <?php if(isset($message) || Session::has('message')): ?>

            <div class="alert alert-close alert-info">
                <a href="#" title="Close" class="glyph-icon alert-close-btn icon-remove"></a>
                <div class="bg-info alert-icon">
                    <i class="fa <?php echo e((isset($icon)) ? $icon : (Session::has('icon') ? Session::get('icon') : 'fa-info-circle')); ?> fa-2x text-info"></i>
                </div>
                <div class="alert-content">
                    <h4 class="alert-title"><?php echo e(trans('core.info')); ?></h4>
                    <p>
                        <?php echo isset($message) ? $message : Session::get('message'); ?>

                    </p>
                </div>
            </div>
        <?php endif; ?>
        
    </div>
<?php endif; ?>

<?php if(isset($success) || Session::has('success')): ?>
    <?php $__env->startSection('js'); ?>
        ##parent-placeholder-93f8bb0eb2c659b85694486c41717eaf0fe23cd4##
        <script>
            $(document).ready(function() {
                swal({
                    title: '',
                    text: <?php echo json_encode(isset($success) ? $success : Session::get('success')); ?>,
                    type: 'success',
                    confirmButtonText: <?php echo json_encode(trans('core.ok')); ?>

                });
            });
        </script>
    <?php $__env->stopSection(); ?>
<?php endif; ?>


<?php if(isset($quantityerror) || Session::has('quantityerror')): ?>
    <?php $__env->startSection('js'); ?>
        ##parent-placeholder-93f8bb0eb2c659b85694486c41717eaf0fe23cd4##
        <script>
            $(document).ready(function() {
                swal({
                    title: '',
                    text: <?php echo json_encode(isset($quantityerror) ? $quantityerror : Session::get('quantityerror')); ?>,
                    type: 'warning',
                })
                .then(() => {
                  window.location.href = '<?php echo e(route("sell.index")); ?>';
                });
            });
        </script>
    <?php $__env->stopSection(); ?>
<?php endif; ?>

<?php if(isset($warning) || Session::has('warning')): ?>
    <?php $__env->startSection('js'); ?>
        ##parent-placeholder-93f8bb0eb2c659b85694486c41717eaf0fe23cd4##
        <script>
            $(document).ready(function() {
                swal({
                    title: '',
                    text: <?php echo json_encode(isset($warning) ? $warning : Session::get('warning')); ?>,
                    type: 'warning',
                    confirmButtonText: <?php echo json_encode(trans('core.ok')); ?>

                });
            });
        </script>
    <?php $__env->stopSection(); ?>
<?php endif; ?>