<!DOCTYPE html>
<html>

<?php echo $__env->make('partials.htmlheader', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<body class="add-transition pt-page-rotatePullTop-init">

    <?php $__env->startSection('loader'); ?>
        <div id="loading" >
            <div class="spinner">
                <div class="bounce1"></div>
                <div class="bounce2"></div>
                <div class="bounce3"></div>
            </div>
        </div>
    <?php echo $__env->yieldSection(); ?>

    <div id="page-wrapper">
        <?php echo $__env->make('partials.mainheader', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <?php echo $__env->make('partials.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <div id="page-content-wrapper" >
          <div id="page-content" style="min-height: 600px;">
            <div class="container">
                <?php echo $__env->make('partials.contentheader', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                <?php echo $__env->make('partials.messages', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                <div class="panel">
                  <?php echo $__env->yieldContent('main-content'); ?>
                </div>
            </div>
          </div>
          <?php echo $__env->make('partials.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        </div>
        
    </div>

    <?php $__env->startSection('js'); ?>
        <script>
            window.Laravel = <?php echo json_encode(['csrfToken' => csrf_token() ]);; ?>

        </script>
        <?php echo $__env->make('partials.scripts', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php echo $__env->yieldSection(); ?>

</body>
</html>