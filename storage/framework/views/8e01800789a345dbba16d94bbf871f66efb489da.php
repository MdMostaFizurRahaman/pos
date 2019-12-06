
<div id="page-sidebar" class="<?php if(settings('theme')): ?><?php echo e(settings('theme')); ?> <?php else: ?> bg-gradient-1 <?php endif; ?> font-inverse">
  <div class="scroll-sidebar">
        
    <ul id="sidebar-menu">
          
        <li <?php if(currentRoute()=="home"): ?> class="no-menu active" <?php else: ?> class="no-menu" <?php endif; ?>>
            <a href="<?php echo e(route('home')); ?>">
                <i class='fa fa-th'></i> 
                <span><?php echo e(trans('core.home')); ?></span>
            </a>
        </li>

        <li <?php if(currentRoute()=="category.index"): ?> class="no-menu active" <?php else: ?> class="no-menu" <?php endif; ?>>
            <a href="<?php echo e(route('category.index')); ?>">
                <i class='fa fa-tag'></i>
                <span><?php echo e(trans('core.category')); ?></span>
            </a>
        </li>

        <li <?php if(currentRoute()=="subcategory.index"): ?> class="no-menu active" <?php else: ?> class="no-menu" <?php endif; ?>>
            <a href="<?php echo e(route('subcategory.index')); ?>"> 
                <i class='fa fa-tags'></i>
                <span><?php echo e(trans('core.subcategory')); ?></span>
            </a>
        </li>

        <li>
            <a href="#">
                <i class='fa fa-cubes'></i> 
                <span><?php echo e(trans('core.product')); ?></span>
            </a>

            <div class="sidebar-submenu">
                <ul>
                    <li>
                        <a href="<?php echo e(route('product.index')); ?>">
                            <i class=''></i> 
                            <span><?php echo e(trans('core.product_list')); ?></span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo e(route('product.new')); ?>">
                            <i class=''></i> 
                            <span><?php echo e(trans('core.add_new_product')); ?> </span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo e(route('product.upload')); ?>">
                            <i class=''></i> 
                            <span><?php echo e(trans('core.upload_bulk_product')); ?> </span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo e(route('product.print_barcode')); ?>">
                            <i class=''></i> 
                            <span><?php echo e(trans('core.print_barcode')); ?> </span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo e(route('product.print_barcode_by_purchase')); ?>">
                            <i class=''></i> 
                            <span><?php echo e(trans('core.print_barcode_by_purchase')); ?> </span>
                        </a>
                    </li>
                </ul>
            </div>
        </li>

        <li>
            <a href="#"><i class='fa fa-users'></i> <span>People</span></a>

            <div class="sidebar-submenu">
                <ul>
                    <li>
                        <a href="<?php echo e(route('client.index')); ?>">
                            <i class=''></i> 
                            <span><?php echo e(trans('core.customer')); ?></span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo e(route('purchaser.index')); ?>">
                            <i class=''></i> 
                            <span><?php echo e(trans('core.supplier')); ?> </span>
                        </a>
                    </li>

                    <li>
                        <a href="<?php echo e(route('user.index')); ?>">
                            <i class=''></i> 
                            <span><?php echo e(trans('core.user')); ?> </span>
                        </a>
                    </li>
                </ul>
            </div>
        </li>

        <li >
            <a href="#"><i class="fa fa-ship"></i> <span><?php echo e(trans('core.purchase')); ?></span></a>
            <div class="sidebar-submenu">
                <ul>
                    <li>
                        <a href="<?php echo e(route('purchase.index')); ?>">
                            <span><?php echo e(trans('core.purchase_list')); ?></span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo e(route('purchase.item')); ?>">
                            <span><?php echo e(trans('core.add_new_purchase')); ?></span>
                        </a>
                    </li>
                </ul>
            </div>
        </li>

        <li>
            <a href="#"><i class="fa fa-shopping-cart"></i> <span><?php echo e(trans('core.sell')); ?></span></a>
            <div class="sidebar-submenu">
                <ul>
                    <li>
                        <a href="<?php echo e(route('sell.index')); ?>">
                            <span><?php echo e(trans('core.sell_list')); ?></span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo e(route('sell.form')); ?>">
                            <span><?php echo e(trans('core.add_new_sell')); ?></span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo e(route('sell.pos')); ?>">
                            <span><?php echo e(trans('core.pos_sale')); ?></span>
                        </a>
                    </li>
                </ul>
            </div>
        </li>
          
        <li class="no-menu">
            <a href="<?php echo e(route('payment.list')); ?>">
               <i class="fa fa-money"></i>                  
                <span><?php echo e(trans('core.transaction')); ?></span>
            </a>
        </li>

        <li class="no-menu">
            <a href="<?php echo e(route('expense.index')); ?>">
               <i class="fa fa-usd"></i>                  
                <span><?php echo e(trans('core.expense')); ?></span>
            </a>
        </li>

        <li>
            <a href="#"><i class="fa fa-cog"></i><span> <?php echo e(trans('core.settings')); ?></span></a>
            <div class="sidebar-submenu">
                <ul>
                    <li>
                        <a href="<?php echo e(route('settings.index')); ?>">
                            <span><?php echo e(trans('core.general_settings')); ?></span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo e(route('role.index')); ?>">
                            <span><?php echo e(trans('core.role')); ?></span>
                        </a>
                    </li>

                    <li>
                        <a href="<?php echo e(route('tax.index')); ?>">
                            <span><?php echo e(trans('core.tax')); ?></span>
                        </a>
                    </li>

                    <li>
                        <a href="<?php echo e(route('settings.backup')); ?>">
                            <span><?php echo e(trans('core.backup')); ?></span>
                        </a>
                    </li>
                </ul>
            </div>
        </li> 

        <li class="no-menu">
            <a href="<?php echo e(route('warehouse.index')); ?>">
               <i class="fa fa-industry"></i>                  
                <span><?php echo e(trans('core.warehouse')); ?></span>
            </a>
        </li>

        <?php if(auth()->user()->can('report.view')): ?>
        <li class="no-menu">
            <a href="<?php echo e(route('report.index')); ?>">
               <i class="fa fa-pie-chart"></i>                  
                <span><?php echo e(trans('core.report')); ?></span>
            </a>
        </li>
        <?php endif; ?>
    </ul><!-- #sidebar-menu -->
  </div>
</div>

