<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title> 
    Login :: <?php echo e(settings('site_name')); ?>  
  </title>
  <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
  <link href="<?php echo asset('img/favicon.ico'); ?>" rel="icon" type="image/gif" sizes="16x16">
  <script src="/assets/js-core/modernizr.js"></script>
  <!-- CSS -->
  <link rel="stylesheet" href="<?php echo e(elixir('base.css')); ?>">
  <script src="/assets/js-core/wow.js"></script>

  <script type="text/javascript">
      wow = new WOW({
          animateClass: 'animated',
          offset: 100
      });
      wow.init();
  </script>

  <style type="text/css">

      html,body {
          height: 100%;
          background: #fff;
          overflow: hidden;
      }

  </style>

</head>
<body>

    <img src="/assets/image-resources/blurred-bg/blurred-bg-10.jpg" class="login-img wow fadeIn" alt="">

    <div class="center-vertical">
        <div class="center-content row">

            <div>
                <center>
                  <?php if(settings('site_logo')): ?>
                  <img src="<?php echo asset('uploads/site/'.settings('site_logo')); ?>">
                  <?php else: ?>
                  <img src="/img/intelle_stock_white.png" class="wow fadeIn">
                  <?php endif; ?>
                </center>
                <br>

                
                <form role="form" method="POST" action="<?php echo e(route('login')); ?>" class="center-margin col-xs-11 col-sm-4">
                    <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">

                    <div class="content-box wow bounceInDown modal-content">
                        <h3 class="content-box-header content-box-header-alt bg-default">
                            <span class="icon-separator">
                                <i class="glyph-icon icon-cog"></i>
                            </span>
                            <span class="header-wrapper">
                                <?php echo e(settings('site_name')); ?>

                                <small>Login to your account.</small>

                        </h3>

                        <?php if($errors->any()): ?>
                        <div class="alert alert-close alert-danger">
                            <a href="#" title="Close" class="glyph-icon alert-close-btn icon-remove"></a>
                            <div class="bg-red alert-icon">
                                <i class="glyph-icon fa fa-times fa-2x"></i>
                            </div>
                            <div class="alert-content">
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
                        
                        <div class="content-box-wrapper">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email address:</label>
                                <div class="input-group input-group-lg">
                                    <span class="input-group-addon addon-inside bg-white font-primary">
                                        <i class="glyph-icon icon-envelope-o"></i>
                                    </span>
                                    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email" name="email">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">Password:</label>
                                <div class="input-group input-group-lg">
                                    <span class="input-group-addon addon-inside bg-white font-primary">
                                        <i class="glyph-icon icon-unlock-alt"></i>
                                    </span>
                                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password">
                                </div>
                            </div>

                            <button class="btn btn-success btn-block">Sign In</button><br>
                            </span>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
</body>
</html>
