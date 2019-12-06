<div id="page-header" class="<?php if(settings('theme')): ?><?php echo e(settings('theme')); ?> <?php else: ?> bg-gradient-1 <?php endif; ?> " >
    
    <div id="mobile-navigation">
        <button id="nav-toggle" class="collapsed" data-toggle="collapse" data-target="#page-sidebar"><span></span></button>
        <a href="<?php echo e(url('/')); ?>" class="logo-content-small" title="<?php echo e(settings('site_name')); ?>"></a>
    </div>

    <div id="header-logo" class="logo-bg">
        <a href="<?php echo e(url('/')); ?>" class="logo-content-big" title="<?php echo e(settings('site_name')); ?>">
            <?php echo e(settings('site_name')); ?>

            <span><?php echo e(settings('site_slogan')); ?></span>
        </a>
        <a href="<?php echo e(url('/')); ?>" class="logo-content-small" title="<?php echo e(settings('site_name')); ?>">
            <?php echo e(settings('site_name')); ?>

            <span><?php echo e(settings('site_slogan')); ?></span>
        </a>
        <a id="close-sidebar" href="#" title="Close sidebar">
            <i class="glyph-icon icon-angle-left"></i>
        </a>
    </div>

    <div id="header-nav-left">
        <div class="user-account-btn dropdown">
            <a href="#" title="My Account" class="user-profile clearfix" data-toggle="dropdown">
                <?php if(!user() || !user()->image ): ?>
                  <img src="<?php echo e(asset('img/default.png')); ?>" class="user-image" alt="" />
                <?php else: ?>
                  <img src="<?php echo asset('uploads/profiles/'. user()->image); ?>" class="user-image" alt="<?php echo e(user()->first_name); ?>" />
                <?php endif; ?>
                <span style="display: block; height: 20px;"><?php if(user()): ?> <?php echo e(user()->first_name); ?> <?php endif; ?></span>
                <i class="glyph-icon icon-angle-down"></i>
            </a>
            <div class="dropdown-menu float-left">
                <div class="box-sm">
                    <div class="login-box clearfix">
                        <div class="user-img">
                            <a href="#" title="" class="change-img">Change photo</a>
                            <?php if(!user() || !user()->image ): ?>
                              <img src="<?php echo e(asset('img/default.png')); ?>" class="user-image" alt="" />
                            <?php else: ?>
                              <img src="<?php echo asset('uploads/profiles/'. user()->image); ?>" class="user-image" alt="<?php echo e(user()->first_name); ?>"/>
                            <?php endif; ?>
                        </div>
                        <div class="user-info">
                            <span>
                              <?php if(user()): ?>
                                  <?php echo e(user()->first_name); ?> 
                                  <?php echo e(user()->last_name); ?>

                                  <i>Member since  <?php echo e(carbonDate(user()->created_at, 'y-m-d')); ?></i>
                              <?php else: ?>
                                  Not logged in
                              <?php endif; ?>
                            </span>
                        </div>
                    </div>
                    <div class="divider"></div>
                    <ul class="reset-ul mrg5B">
                        <li>
                            <a href="<?php echo e(route('user.profile')); ?>">
                                <i class="glyph-icon float-right icon-caret-right"></i>
                                View account details
                            </a>
                        </li>
                    </ul>
                    <div class="pad5A button-pane button-pane-alt text-center">
                        <a href="<?php echo e(url('logout')); ?>" class="btn display-block font-normal btn-danger">
                            <i class="glyph-icon icon-power-off"></i>
                            <?php echo e(trans('core.sign_out')); ?>

                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- #header-nav-left -->

    <div id="header-nav-right">
        <!--fulscreen-->
        <a href="#" class="hdr-btn tooltip-button hidden-xs" id="fullscreen-btn" data-placement="bottom" title="Fullscreen">
            <i class="glyph-icon icon-arrows-alt"></i>
        </a>
        <!--ends-->

        <!--View cash status-->
        <?php if(user() && user()->can('cash.view')): ?>
          <?php if(cashStatus() == 0): ?>
          <a data-toggle="modal" data-target="#myCashStatus" href="#" class="hdr-btn tooltip-button hidden-xs" data-placement="bottom" title="Cash Status">
          <?php else: ?>
          <a onclick="cashCalc()" href="#" class="hdr-btn tooltip-button hidden-xs" data-placement="bottom" title="Cash Status">
          <?php endif; ?>
              <i class="glyph-icon fa fa-money"></i>
          </a>
        <?php endif; ?>
        <!--cash status ends-->
        
        <!--View Today's profit-->
        <?php if(user() && user()->can('profit.view')): ?>
          <a onclick="profitCalc()" href="#" class="hdr-btn tooltip-button" data-placement="bottom" title="Profit / Loss">
              <i class="glyph-icon fa fa-line-chart"></i>
          </a>
        <?php endif; ?>
        <!--View Today's profit Ends-->

        <!--Calculator-->
        <div class="dropdown hidden-xs" id="notifications-btn" >
          <a  href="#" data-toggle="dropdown" data-placement="bottom" title="Calculator" class="tooltip-button">
              <i class="glyph-icon fa fa-calculator"></i>
          </a>
          <div class="dropdown-menu <?php if(rtlLocale()): ?> dropdown-menu-right <?php else: ?> float-right <?php endif; ?> box-md">
                <div class="scrollable-content scrollable-slim-box">
                   <?php echo $__env->make('partials.calculator', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                </div>
            </div>

        </div>
        <!--Calculator-->

        <a class="header-btn tooltip-button hidden-xs" data-placement="bottom" href="<?php echo e(route('sell.pos')); ?>" title="POS" target="_BLINK">
            <i class="glyph-icon fa fa-desktop"></i>
        </a>

        <!--Notification-->
        <?php
            $alert_quantity = settings('alert_quantity');
            $product_alert = App\Product::orderBy('id', 'asc')->where('quantity', '<' , $alert_quantity);
        ?>
        <div class="dropdown hidden-xs" id="notifications-btn">
            <a 
                data-toggle="dropdown" 
                href="#" 
                data-placement="bottom" 
                title="Alert Products" 
                class="tooltip-button" 
                <?php if($product_alert->count() > 0): ?> 
                    style="background-color: #FFE941CC !important;" 
                <?php endif; ?>
            >
                <i class="glyph-icon icon-linecons-megaphone" 
                    <?php if($product_alert->count() > 0): ?> 
                        style="color: red;text-shadow: 1px 1px 1px #ccc;"
                    <?php endif; ?>>
                </i>
            </a>

            <div class="dropdown-menu <?php if(rtlLocale()): ?> dropdown-menu-right <?php else: ?> float-right <?php endif; ?> box-md">
                <div class="popover-title display-block clearfix pad10A">
                    <?php echo e(trans('core.alert_title')); ?>

                    <?php echo e(bangla_digit($product_alert->count())); ?>

                    <?php echo e(trans('core.product')); ?> 
                </div>
                   
                <div class="scrollable-content scrollable-slim-box">
                    <ul class="no-border notifications-box">
                        <?php $__currentLoopData = $product_alert->take(5)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product_alert): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li>
                            <ul>
                                <li><span class="bg-danger icon-notification glyph-icon icon-bullhorn"></span> 
                                <?php echo e($product_alert->name); ?>

                                =
                                <?php echo e(bangla_digit($product_alert->quantity)); ?>


                                <?php echo e($product_alert->unit); ?></li>
                           </ul>
                        </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
                <div class="pad10A button-pane button-pane-alt text-center">
                    <a href="<?php echo e(route('product.alert')); ?>" class="btn btn-primary" title="View all notifications">
                        View all notifications
                    </a>
                </div>
            </div>
        </div>
        <!--Notification Ends-->

        <!--Language Swithcer -->
        <div class="dropdown" id="dashnav-btn">
            <a href="#" data-toggle="dropdown" data-placement="bottom" class="popover-button-header tooltip-button" title="Language">
                <i class="glyph-icon fa fa-language"></i>
            </a>
            <div class="dropdown-menu <?php if(rtlLocale()): ?> dropdown-menu-right <?php else: ?> float-right <?php endif; ?>">
                <div class="box-sm">
                    <div class="pad5T pad5B pad10L dashboard-buttons clearfix">
                        <a href="<?php echo e(route('locale.set', 'ar')); ?>" class="btn vertical-button hover-green" title="">
                            <span class="glyph-icon icon-separator-vertical pad0A medium">
                                <img src="https://cdn2.iconfinder.com/data/icons/world-flag-icons/128/Flag_of_Saudi_Arabia.png" width="20" height="20">
                            </span>
                            Arabic
                        </a>

                        <a href="<?php echo e(route('locale.set', 'bn')); ?>" class="btn vertical-button hover-green" title="">
                            <span class="glyph-icon icon-separator-vertical pad0A medium">
                                <img src="https://cdn2.iconfinder.com/data/icons/world-flag-icons/128/Flag_of_Bangladesh.png" width="20" height="20">
                            </span>
                            Bengali
                        </a>

                        <a href="<?php echo e(route('locale.set', 'bp')); ?>" class="btn vertical-button hover-green" title="">
                            <span class="glyph-icon icon-separator-vertical pad0A medium">
                                <img src="https://cdn2.iconfinder.com/data/icons/world-flag-icons/128/Flag_of_Portugal.png" width="20" height="20">
                            </span>
                            <span class="tooltip-button" title="Brazilian Portuguese">Portuguese</span>
                        </a>

                        <a href="<?php echo e(route('locale.set', 'en')); ?>" class="btn vertical-button hover-red-alt" title="">
                            <span class="glyph-icon icon-separator-vertical pad0A medium">
                                <img src="https://cdn2.iconfinder.com/data/icons/world-flag-icons/128/Flag_of_United_Kingdom.png" width="20" height="20">
                            </span>
                            English
                        </a>

                        <a href="<?php echo e(route('locale.set', 'fr')); ?>" class="btn vertical-button hover-blue-alt" title="">
                            <span class="glyph-icon icon-separator-vertical pad0A medium">
                                <img src="https://cdn2.iconfinder.com/data/icons/world-flag-icons/128/Flag_of_France.png" width="20" height="20">
                            </span>
                            French
                        </a>

                        <a href="<?php echo e(route('locale.set', 'gr')); ?>" class="btn vertical-button hover-germany-alt" title="">
                            <span class="glyph-icon icon-separator-vertical pad0A medium">
                                <img src="https://cdn2.iconfinder.com/data/icons/world-flag-icons/128/Flag_of_Germany.png" width="20" height="20">
                            </span>
                            German
                        </a>

                        <a href="<?php echo e(route('locale.set', 'hindy')); ?>" class="btn vertical-button hover-india-alt" title="">
                            <span class="glyph-icon icon-separator-vertical pad0A medium">
                                <img src="https://cdn2.iconfinder.com/data/icons/world-flag-icons/128/Flag_of_India.png" width="20" height="20">
                            </span>
                            Hindi
                        </a>

                         <a href="<?php echo e(route('locale.set', 'jp')); ?>" class="btn vertical-button hover-white-alt" title="">
                            <span class="glyph-icon icon-separator-vertical pad0A medium">
                                <img src="https://cdn2.iconfinder.com/data/icons/world-flag-icons/128/Flag_of_Japan.png" width="20" height="20">
                            </span>
                            Japanese
                        </a>
                        
                        <a href="<?php echo e(route('locale.set', 'es')); ?>" class="btn vertical-button hover-orange" title="">
                            <span class="glyph-icon icon-separator-vertical pad0A medium">
                                <img src="https://cdn2.iconfinder.com/data/icons/world-flag-icons/128/Flag_of_Spain.png" width="20" height="20">
                            </span>
                            Spanish
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!--Language Swithcer Ends-->

        <!--Quick Menu-->
        <div class="dropdown" id="dashnav-btn">
            <a href="#" data-toggle="dropdown" data-placement="bottom" class="popover-button-header tooltip-button" title="Dashboard Quick Menu">
                <i class="glyph-icon fa fa-th"></i>
            </a>
            <div class="dropdown-menu <?php if(rtlLocale()): ?> dropdown-menu-right <?php else: ?> float-right <?php endif; ?>">
                <div class="box-sm">
                    <div class="divider"></div>
                    <div class="pad5T pad5B pad10L dashboard-buttons clearfix">
                        <a href="<?php echo e(route('product.index')); ?>" class="btn vertical-button remove-border btn-success" title="Product List">
                            <span class="glyph-icon icon-separator-vertical pad0A medium">
                                <i class="glyph-icon fa fa-cubes opacity-80 font-size-20"></i>
                            </span>
                            <?php echo e(trans('core.product')); ?>

                        </a>

                        <a href="<?php echo e(route('sell.form')); ?>" class="btn vertical-button remove-border btn-info" title="Add New Sell">
                            <span class="glyph-icon icon-separator-vertical pad0A medium">
                                <i class="glyph-icon fa fa-shopping-cart opacity-80 font-size-20"></i>
                            </span>
                            <i class="fa fa-plus"></i>
                            <?php echo e(trans('core.sell')); ?>

                        </a>
                        <a href="<?php echo e(route('sell.index')); ?>" class="btn vertical-button remove-border btn-danger" title="Sells List">
                            <span class="glyph-icon icon-separator-vertical pad0A medium">
                                <i class="glyph-icon fa fa-file-excel-o opacity-80 font-size-20"></i>
                            </span>
                            <?php echo e(trans('core.sell_list')); ?>

                        </a>
                        <a href="<?php echo e(route('payment.list')); ?>" class="btn vertical-button remove-border btn-purple" title="Transaction List">
                            <span class="glyph-icon icon-separator-vertical pad0A medium">
                                <i class="glyph-icon fa fa-money opacity-80 font-size-20"></i>
                            </span>
                            <?php echo e(trans('core.transaction')); ?>

                        </a>
                        <a href="<?php echo e(route('purchase.item')); ?>" class="btn vertical-button remove-border btn-azure" title="">
                            <span class="glyph-icon icon-separator-vertical pad0A medium">
                                <i class="glyph-icon fa fa-ship opacity-80 font-size-20"></i>
                            </span>
                            <i class="fa fa-plus"></i>
                            <?php echo e(trans('core.purchase')); ?>

                        </a>
                        <a href="<?php echo e(route('purchase.index')); ?>" class="btn vertical-button remove-border btn-yellow" title="Purchase List">
                            <span class="glyph-icon icon-separator-vertical pad0A medium">
                                <i class="glyph-icon fa fa-file opacity-80 font-size-20"></i>
                            </span>
                            <?php echo e(trans('core.purchase_list')); ?>

                        </a>
                        <a href="<?php echo e(route('client.new')); ?>" class="btn vertical-button remove-border" title="Add New Customer" style="background-color: #4ECD00 !important;color: #FFF !important;">
                            <span class="glyph-icon icon-separator-vertical pad0A medium">
                                <i class="glyph-icon fa fa-user opacity-80 font-size-20"></i>
                            </span>
                            <i class="fa fa-plus"></i>
                            <?php echo e(trans('core.customer')); ?>

                        </a>
                        <a href="<?php echo e(route('expense.index')); ?>" class="btn vertical-button remove-border btn-black-opacity" title="<?php echo e(trans('core.expense')); ?>">
                            <span class="glyph-icon icon-separator-vertical pad0A medium">
                                <i class="glyph-icon fa fa-usd opacity-80 font-size-20"></i>
                            </span>
                            <?php echo e(trans('core.expense')); ?>

                        </a>
                        <a href="<?php echo e(route('settings.index')); ?>" class="btn vertical-button remove-border btn-warning" title="<?php echo e(trans('core.settings')); ?>">
                            <span class="glyph-icon icon-separator-vertical pad0A medium">
                                <i class="glyph-icon fa fa-cog opacity-80 font-size-20"></i>
                            </span>
                            <?php echo e(trans('core.settings')); ?>

                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!--Quick Menu Ends-->

        <a class="header-btn tooltip-button hidden-xs" data-placement="bottom" id="logout-btn" href="<?php echo e(route('lock')); ?>" title="Lock">
            <i class="glyph-icon icon-linecons-lock"></i>
        </a>
    </div><!-- #header-nav-right -->
</div><!-- header ends -->



<!-- Modal for cash register, if cash if not opened yet -->
<div class="modal fade" id="myCashStatus" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
    <form method="post" action="<?php echo e(route('cash_register.post')); ?>">
        <?php echo e(csrf_field()); ?>

      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">
            <?php echo e(trans('core.cash_is_not_open_yet')); ?>

        </h4>
      </div>
      <div class="modal-body">
        <div class="form-group">
            <label>
                <?php echo e(trans('core.cash_open_label')); ?>

            </label>
            <input type="text" class="form-control" name="cash_in_hands" value=0 onkeypress='return event.charCode <= 57 && event.charCode != 32'>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

        <button type="submit" class="btn btn-primary">
            Save changes
        </button>
        
      </div>
      </form>
    </div>
  </div>
</div>
<!--Modal ends-->


<script>
    function profitCalc() {
        var profit = <?php echo e(todayProfit()); ?>;
       swal({
          title: <?php echo json_encode(trans('core.todays_profit')); ?>,
          text: "<?php echo e(settings('currency_code')); ?> " + profit,
          imageUrl: '/img/profit.jpeg',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Details',
          cancelButtonText: 'Close!',
          buttonsStyling: true
        }).then(function () {
          window.location.href = <?php echo json_encode(route("profit.details")); ?>;
        }, function (dismiss) {
          // dismiss can be 'cancel', 'overlay',
          // 'close', and 'timer'
          if (dismiss === 'close') {
            swal(
              'close',
              'Done',
              'error'
            )
          }
        })
    }

    function cashCalc() {
        var cash = <?php echo e(cashNow()); ?>;
       swal({
          title: <?php echo json_encode(trans('core.now_in_cash')); ?>,
          text: "<?php echo e(settings('currency_code')); ?> "+ cash,
          imageUrl: '/img/cash.jpg',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Details',
          cancelButtonText: 'Close!',
          buttonsStyling: true
        }).then(function () {
          window.location.href = <?php echo json_encode(route("cash.details")); ?>;
        }, function (dismiss) {
          // dismiss can be 'cancel', 'overlay',
          // 'close', and 'timer'
          if (dismiss === 'close') {
            swal(
              'close',
              'Done.',
              'error'
            )
          }
        })
    }
</script>

