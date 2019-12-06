<!DOCTYPE html>
<html>

<?php echo $__env->make('partials.htmlheader', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php $__env->startSection('css'); ?>
  <link rel="stylesheet" type="text/css" href="/assets/css-core/slick.css">
  <link rel="stylesheet" type="text/css" href="/assets/css-core/slick-theme.css">
  <link rel="stylesheet" href="/assets/css-core/pos.css">
<?php echo $__env->yieldSection(); ?>

<body class="add-transition pt-page-rotatePullTop-init fixed-sidebar closed-sidebar">
    <div id="page-wrapper">
        <?php echo $__env->make('partials.mainheader', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <div id="page-content-wrapper">
          <div id="page-content"  <?php if(rtlLocale()): ?> style="margin-right: 0px !important;" <?php endif; ?>>
            <div class="container">
                <?php echo $__env->yieldContent('main-content'); ?>
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
        <script src="/assets/js-core/jquery-2.2.0.min.js" type="text/javascript"></script>
        <script src="/assets/js-core/slick.js" type="text/javascript" charset="utf-8"></script>
        <script type="text/javascript">
            $(document).on('ready', function() {
              $(".regular").slick({
                dots: true,
                infinite: true,
                slidesToShow: 7,
                slidesToScroll: 3
              });
              $(".center").slick({
                dots: true,
                infinite: true,
                centerMode: true,
                slidesToShow: 3,
                slidesToScroll: 3
              });
              $(".variable").slick({
                dots: true,
                infinite: true,
                variableWidth: true
              });
            });
        </script>
    <?php echo $__env->yieldSection(); ?>

</body>
</html>