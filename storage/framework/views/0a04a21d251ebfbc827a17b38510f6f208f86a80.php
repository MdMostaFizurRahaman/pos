<?php $__env->startSection('title'); ?>
  <?php echo e(trans('core.report')); ?>

  || ##parent-placeholder-3c6de1b7dd91465d437ef415f94f36afc1fbc8a8##
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
  <?php echo e(trans('core.report')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('main-content'); ?>

<div class="panel-body">
  <div class="row">
    <!--Product Report-->
    <div class="col-md-4">
      <div class="tile-box tile-box-alt bg-primary">
          <div class="tile-header">
              
          </div>
          <div class="tile-content-wrapper">
              <i class="glyph-icon fa fa-cubes"></i>
              <div class="tile-content">
                <span>
                  <?php echo e(trans('core.product')); ?> <br>
                  <small><?php echo e(trans('core.report')); ?></small>
                </span>
              </div>
          </div>
          <a href="#" class="tile-footer tooltip-button" data-placement="bottom" title="View Product Report" data-toggle="modal" data-target="#productModal">
              <?php echo e(trans('core.view_report')); ?>

              <i class="glyph-icon icon-arrow-right"></i>
          </a>
      </div>
    </div>
    <!--Product Report-->

    <!--Purchase Report-->
    <div class="col-md-4">
      <div class="tile-box tile-box-alt bg-purple">
          <div class="tile-header">
              
          </div>
          <div class="tile-content-wrapper">
              <i class="glyph-icon fa fa-bar-chart"></i>
              <div class="tile-content">
                <span>
                  <?php echo e(trans('core.purchase')); ?> 
                  <br><small><?php echo e(trans('core.report')); ?></small>
                </span>
              </div>
          </div>
          <a href="#" class="tile-footer tooltip-button" data-placement="bottom" title="View Purchase Report" data-toggle="modal" data-target="#purchaseModal">
              <?php echo e(trans('core.view_report')); ?>

              <i class="glyph-icon icon-arrow-right"></i>
          </a>
      </div>
    </div>
    <!--Purchase Report Ends-->

    <!--Sell Report-->
    <div class="col-md-4">
      <div class="tile-box tile-box-alt bg-blue-alt">
          <div class="tile-header">
              
          </div>
          <div class="tile-content-wrapper">
              <i class="glyph-icon fa fa-balance-scale"></i>
              <div class="tile-content">
                <span>
                  <?php echo e(trans('core.sell')); ?> <br><small><?php echo e(trans('core.report')); ?></small>
                </span>
              </div>
          </div>
          <a href="#" class="tile-footer tooltip-button" data-placement="bottom" title="View Sales Report" data-toggle="modal" data-target="#sellsModal">
              <?php echo e(trans('core.view_report')); ?>

              <i class="glyph-icon icon-arrow-right"></i>
          </a>
      </div>
    </div>
    <!--Sell Report Ends-->

    <!-- <div class="col-md-3 hidden">
      <div class="tile-box tile-box-alt bg-green">
          <div class="tile-header">
              
          </div>
          <div class="tile-content-wrapper">
              <i class="glyph-icon fa fa-cubes"></i>
              <div class="tile-content">
                <span>
                  Clients <br><small>Report</small>
                </span>
              </div>
          </div>
          <a href="#" class="tile-footer tooltip-button" data-placement="bottom" title="View Clients Report" data-toggle="modal" data-target="#clientModal">
              <?php echo e(trans('core.view_report')); ?>

              <i class="glyph-icon icon-arrow-right"></i>
          </a>
      </div>
    </div> -->

    <!--Stock Report-->
    <div class="col-md-4">
      <div class="tile-box tile-box-alt bg-warning" >
          <div class="tile-header">
              
          </div>
          <div class="tile-content-wrapper">
              <i class="glyph-icon fa fa-pie-chart"></i>
              <div class="tile-content">
                <span>
                  <?php echo e(trans('core.stock')); ?><br>
                  <small><?php echo e(trans('core.chart')); ?></small>
                </span>
              </div>
          </div>
          <a href="#" class="tile-footer tooltip-button" data-placement="bottom" title="View Stock Report" data-toggle="modal" data-target="#stockModal">
              <?php echo e(trans('core.view_report')); ?>

              <i class="glyph-icon icon-arrow-right"></i>
          </a>
      </div>
    </div>
    <!--Stock Report Ends-->

    <!-- Category Report -->
    <div class="col-md-4">
      <div class="tile-box tile-box-alt" style="background-color: #ab6666;color: #fff;">
          <div class="tile-header">
              
          </div>
          <div class="tile-content-wrapper">
              <i class="glyph-icon fa fa-tag"></i>
              <div class="tile-content">
                <span>
                  <?php echo e(trans('core.category')); ?> <br>
                  <small><?php echo e(trans('core.report')); ?></small>
                </span>
              </div>
          </div>
          <a href="#" class="tile-footer tooltip-button" data-placement="bottom" title="View Category Report" data-toggle="modal" data-target="#categoryModal">
              <?php echo e(trans('core.view_report')); ?>

              <i class="glyph-icon icon-arrow-right"></i>
          </a>
      </div>
    </div>
    <!-- Category Report Ends -->

    <!-- Subcategory Report -->
    <div class="col-md-4">
      <div class="tile-box tile-box-alt"  style="background-color: #4e7d75;color: #fff;">
          <div class="tile-header">
              
          </div>
          <div class="tile-content-wrapper">
              <i class="glyph-icon fa fa-tags"></i>
              <div class="tile-content">
                <span>
                  <?php echo e(trans('core.subcategory')); ?> <br>
                  <small><?php echo e(trans('core.report')); ?></small>
                </span>
              </div>
          </div>
          <a href="#" class="tile-footer tooltip-button" data-placement="bottom" title="View Category Report" data-toggle="modal" data-target="#subcategoryModal">
              <?php echo e(trans('core.view_report')); ?>

              <i class="glyph-icon icon-arrow-right"></i>
          </a>
      </div>
    </div>
    <!-- Subcategory Report Ends-->

    <!-- Warehouse Report -->
    <div class="col-md-4">
      <div class="tile-box tile-box-alt bg-black" style="margin-top: 5px;">
          <div class="tile-header">
              
          </div>
          <div class="tile-content-wrapper">
              <i class="glyph-icon fa fa-industry"></i>
              <div class="tile-content">
                <span>
                  <?php echo e(trans('core.warehouse')); ?>

                  <br><small><?php echo e(trans('core.report')); ?></small>
                </span>
              </div>
          </div>
          <a href="#" class="tile-footer tooltip-button" data-placement="bottom" title="View Warehouse Report" data-toggle="modal" data-target="#warehouseModal">
              <?php echo e(trans('core.view_report')); ?>

              <i class="glyph-icon icon-arrow-right"></i>
          </a>
      </div>
    </div>
    <!-- Warehouse Report Ends-->

    <!-- Profit Report -->
    <div class="col-md-4">
      <div class="tile-box tile-box-alt" style="margin-top: 5px;background-color: #db3b8a; color: white;">
          <div class="tile-header">
              
          </div>
          <div class="tile-content-wrapper">
              <i class="glyph-icon fa fa-area-chart"></i>
              <div class="tile-content">
                <span>
                  <?php echo e(trans('core.profit')); ?>

                  <br><small><?php echo e(trans('core.report')); ?></small>
                </span>
              </div>
          </div>
          <a href="#" class="tile-footer tooltip-button" data-placement="bottom" title="View Profit Report" data-toggle="modal" data-target="#profitModal">
              <?php echo e(trans('core.view_report')); ?>

              <i class="glyph-icon icon-arrow-right"></i>
          </a>
      </div>
    </div>
    <!-- Profit Report Ends-->
</div>

<!-- Modal for Purchase-->
  <div class="modal fade" id="purchaseModal" tabindex="-1" role="dialog" aria-labelledby="houseBillModalLabel">
    <?php echo Form::open(['route'=>'report.purchase']); ?>

    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="houseBillModalLabel">
            <?php echo e(trans('core.purchase')); ?> 
            <?php echo e(trans('core.purchase')); ?>

          </h4>
        </div>
        <div class="modal-body">
          <div class="form-group"> 
            <div class="row">
               <?php echo Form::label('Branch', 'Branch', ['class' => 'col-sm-2']); ?> 
              <div class="col-sm-10"> 
                <select class="form-control selectpicker" name="warehouse_id" data-live-search = true>
                    <option value="all">ALL Branches</option>
                    <?php $__currentLoopData = $warehouses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $warehouse): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <option value="<?php echo e($warehouse->id); ?>">
                        <?php echo e($warehouse->name); ?>

                      </option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </select>
              </div>
            </div>  
          </div>

          <div class="form-group"> 
            <div class="row">
               <?php echo Form::label('From', 'From', ['class' => 'col-sm-2']); ?> 
              <div class="col-sm-10"> 
                <?php echo Form::text('from', Request::get('from'), ['class' => 'form-control dateTime','placeholder'=>"yyyy-mm-dd"]); ?>

              </div>
            </div>  
          </div>

          <div class="form-group">
              <div class="row">
                <?php echo Form::label('To', 'To', ['class' => 'col-sm-2']); ?> 
                <div class="col-sm-10">   
                  <?php echo Form::text('to', Request::get('to'), ['class' => 'form-control dateTime','placeholder'=>"yyyy-mm-dd"]); ?>

                </div>
              </div>
          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">
              <?php echo e(trans('core.close')); ?>

            </button>
            <button type="submit" class="btn btn-primary">
              <?php echo e(trans('core.generate_report')); ?>

            </button>
          </div>
        </div> <!--modal body-->
    </div>
    <?php echo Form::close(); ?>

  </div>
  </div>
  <!-- purchase modal ends here -->

  <!-- Modal for sells-->
  <div class="modal fade" id="sellsModal" tabindex="-1" role="dialog" >
    <?php echo Form::open(['route'=>'report.sells']); ?>

    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Sells Report</h4>
        </div>
        <div class="modal-body">
          <div class="form-group"> 
            <div class="row">
               <?php echo Form::label('Branch', 'Branch', ['class' => 'col-sm-2']); ?> 
              <div class="col-sm-10"> 
                <select class="form-control selectpicker" name="warehouse_id" data-live-search = true>
                    <option value="all">ALL Branches</option>
                    <?php $__currentLoopData = $warehouses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $warehouse): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <option value="<?php echo e($warehouse->id); ?>">
                        <?php echo e($warehouse->name); ?>

                      </option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </select>
              </div>
            </div>  
          </div>
          
          <div class="form-group"> 
            <div class="row">
               <?php echo Form::label('From', 'From', ['class' => 'col-sm-2']); ?> 
              <div class="col-sm-10"> 
                <?php echo Form::text('from', Request::get('from'), ['class' => 'form-control dateTime','placeholder'=>"yyyy-mm-dd"]); ?>

              </div>
            </div>  
          </div>

           <div class="form-group">
              <div class="row">
                <?php echo Form::label('To', 'To', ['class' => 'col-sm-2']); ?> 
                <div class="col-sm-10">   
                  <?php echo Form::text('to', Request::get('to'), ['class' => 'form-control dateTime','placeholder'=>"yyyy-mm-dd"]); ?>

                </div>
              </div>
          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo e(trans('core.close')); ?></button>
            <button type="submit" class="btn btn-primary"><?php echo e(trans('core.generate_report')); ?></button>
          </div>
        </div>
      </div>
    <?php echo Form::close(); ?>

    </div>
  </div>
  <!-- sells modal Ends Here -->

  <!-- Product Report -->
  <div class="modal fade" id="productModal" tabindex="-1" role="dialog" >
    <?php echo Form::open(['route'=>'report.product']); ?>

    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Product Report</h4>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <div class="row">
              <?php echo Form::label('Product', 'Product', ['class' => 'col-sm-2']); ?> 
              <div class="col-sm-10">   
                <select class="form-control selectpicker" name="product_id" data-live-search = true>
                  <option value="all">ALL PRODUCTS</option>
                  <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($product->id); ?>">
                      <?php echo e($product->name); ?>

                    </option>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
              </div>
            </div>
          </div>

          <div class="form-group"> 
            <div class="row">
               <?php echo Form::label('Branch', 'Branch', ['class' => 'col-sm-2']); ?> 
              <div class="col-sm-10"> 
                <select class="form-control selectpicker" name="warehouse_id" data-live-search = true>
                    <option value="all">ALL BRANCHES</option>
                    <?php $__currentLoopData = $warehouses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $warehouse): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <option value="<?php echo e($warehouse->id); ?>">
                        <?php echo e($warehouse->name); ?>

                      </option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </select>
              </div>
            </div>  
          </div>

          <div class="form-group"> 
            <div class="row">
               <?php echo Form::label('From', 'From', ['class' => 'col-sm-2']); ?> 
              <div class="col-sm-10"> 
                <?php echo Form::text('from', Request::get('from'), ['class' => 'form-control dateTime','placeholder'=>"yyyy-mm-dd"]); ?>

              </div>
            </div>  
          </div>

          <div class="form-group">
            <div class="row">
              <?php echo Form::label('To', 'To', ['class' => 'col-sm-2']); ?> 
              <div class="col-sm-10">   
                <?php echo Form::text('to', Request::get('to'), ['class' => 'form-control dateTime','placeholder'=>"yyyy-mm-dd"]); ?>

              </div>
            </div>
          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo e(trans('core.close')); ?></button>
            <button type="submit" class="btn btn-primary"><?php echo e(trans('core.generate_report')); ?></button>
          </div>
        </div>
      </div>
    <?php echo Form::close(); ?>

    </div>
  </div>
  <!-- Product Report Ends-->

  <!--Clients Report-->
  <div class="modal fade" id="clientModal" tabindex="-1" role="dialog" >
    <?php echo Form::open(['route'=>'report.client']); ?>

    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Client Report</h4>
        </div>
        <div class="modal-body">
            <div class="form-group"> 
              <div class="row">
                 <?php echo Form::label('From', 'From', ['class' => 'col-sm-2']); ?> 
                <div class="col-sm-10"> 
                  <?php echo Form::text('from', Request::get('from'), ['class' => 'form-control dateTime','placeholder'=>"yyyy-mm-dd"]); ?>

                </div>
              </div>  
            </div>

           <div class="form-group">
              <div class="row">
                <?php echo Form::label('To', 'To', ['class' => 'col-sm-2']); ?> 
                <div class="col-sm-10">   
                  <?php echo Form::text('to', Request::get('to'), ['class' => 'form-control dateTime','placeholder'=>"yyyy-mm-dd"]); ?>

                </div>
              </div>
            </div>

            <div class="form-group">
              <div class="row">
                <?php echo Form::label('Product', 'Product', ['class' => 'col-sm-2']); ?> 
                <div class="col-sm-10">   
                  <select class="form-control selectpicker" name="client_id" data-live-search = true>
                    <option value="all">ALL CLIENT</option>
                    <?php $__currentLoopData = $clients; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $client): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <option value="<?php echo e($client->id); ?>">
                        <?php echo e($client->name); ?>

                      </option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </select>
                </div>
              </div>
            </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo e(trans('core.close')); ?></button>
            <button type="submit" class="btn btn-primary"><?php echo e(trans('core.generate_report')); ?></button>
          </div>
        </div>
      </div>
    <?php echo Form::close(); ?>

    </div>
  </div>
  <!--Clients Report Ends-->

  <!--Stock Report Modal-->
  <div class="modal fade" id="stockModal" tabindex="-1" role="dialog" >
    <?php echo Form::open(['route'=>'report.stock']); ?>

    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title"><?php echo e(trans('core.stock_report')); ?></h4>
        </div>
        <div class="modal-body">
            <div class="form-group">
              <div class="row">
                <?php echo Form::label('Product', 'Product', ['class' => 'col-sm-2']); ?> 
                <div class="col-sm-10">   
                  <select class="form-control selectpicker" name="product_id" data-live-search = true>
                    <option value="all">ALL PRODUCT</option>
                    <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <option value="<?php echo e($product->id); ?>">
                        <?php echo e($product->name); ?>

                      </option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </select>
                </div>
              </div>
            </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo e(trans('core.close')); ?></button>
            <button type="submit" class="btn btn-primary"><?php echo e(trans('core.generate_report')); ?></button>
          </div>
        </div>
      </div>
    <?php echo Form::close(); ?>

    </div>
  </div>
  <!--Stock Report Modal Ends-->

  <!--Category Report-->
  <div class="modal fade" id="categoryModal" tabindex="-1" role="dialog" >
    <?php echo Form::open(['route'=>'report.category']); ?>

    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title"><?php echo e(trans('core.report_category')); ?></h4>
        </div>
        <div class="modal-body">
            <div class="form-group"> 
              <div class="row">
                 <?php echo Form::label('From', 'From', ['class' => 'col-sm-2']); ?> 
                <div class="col-sm-10"> 
                  <?php echo Form::text('from', Request::get('from'), ['class' => 'form-control dateTime','placeholder'=>"yyyy-mm-dd"]); ?>

                </div>
              </div>  
            </div>

           <div class="form-group">
              <div class="row">
                <?php echo Form::label('To', 'To', ['class' => 'col-sm-2']); ?> 
                <div class="col-sm-10">   
                  <?php echo Form::text('to', Request::get('to'), ['class' => 'form-control dateTime','placeholder'=>"yyyy-mm-dd"]); ?>

                </div>
              </div>
            </div>

            <div class="form-group">
              <div class="row">
                <?php echo Form::label('Category', 'Category', ['class' => 'col-sm-2']); ?> 
                <div class="col-sm-10">   
                  <select class="form-control selectpicker" name="category_id" data-live-search = true>
                    <option value="all">ALL CATEGORIES</option>
                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <option value="<?php echo e($category->id); ?>">
                        <?php echo e($category->category_name); ?>

                      </option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </select>
                </div>
              </div>
            </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary"><?php echo e(trans('core.generate_report')); ?></button>
          </div>
        </div>
      </div>
    <?php echo Form::close(); ?>

    </div>
  </div>
  <!--Category Report Ends-->

  <!-- Subcategory Report -->
  <div class="modal fade" id="subcategoryModal" tabindex="-1" role="dialog" >
    <?php echo Form::open(['route'=>'report.subcategory']); ?>

    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Subcategory Report</h4>
        </div>
        <div class="modal-body">
            <div class="form-group"> 
              <div class="row">
                 <?php echo Form::label('From', 'From', ['class' => 'col-sm-2']); ?> 
                <div class="col-sm-10"> 
                  <?php echo Form::text('from', Request::get('from'), ['class' => 'form-control dateTime','placeholder'=>"yyyy-mm-dd"]); ?>

                </div>
              </div>  
            </div>

           <div class="form-group">
              <div class="row">
                <?php echo Form::label('To', 'To', ['class' => 'col-sm-2']); ?> 
                <div class="col-sm-10">   
                  <?php echo Form::text('to', Request::get('to'), ['class' => 'form-control dateTime','placeholder'=>"yyyy-mm-dd"]); ?>

                </div>
              </div>
            </div>

            <div class="form-group">
              <div class="row">
                <?php echo Form::label('sub_category', 'SubCategory', ['class' => 'col-sm-2']); ?> 
                <div class="col-sm-10">   
                  <select class="form-control selectpicker" name="subcategory_id" data-live-search = true>
                    <option value="all">ALL SUB-CATEGORIES</option>
                      <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                         <optgroup label="<?php echo e($category->category_name); ?>">
                           <?php $__currentLoopData = $category->subcategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subcategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($subcategory->id); ?>">
                              <?php echo e($subcategory->name); ?>

                            </option>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </optgroup>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </select>
                </div>
              </div>
            </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">
              <?php echo e(trans('core.close')); ?>

            </button>
            <button type="submit" class="btn btn-primary"><?php echo e(trans('core.generate_report')); ?></button>
          </div>
        </div>
      </div>
    <?php echo Form::close(); ?>

    </div>
  </div>
  <!-- Subcategory Report Ends-->

  <!-- Warehouse Report -->
  <div class="modal fade" id="warehouseModal" tabindex="-1" role="dialog" >
    <?php echo Form::open(['route'=>'report.branch']); ?>

    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Branch Report</h4>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <div class="row">
              <?php echo Form::label('Product', 'Product', ['class' => 'col-sm-2']); ?> 
              <div class="col-sm-10">   
                <select class="form-control selectpicker" name="product_id" data-live-search = true>
                  <option value="all">ALL PRODUCT</option>
                  <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($product->id); ?>">
                      <?php echo e($product->name); ?> 
                      (<?php echo e($product->code); ?>)
                    </option>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
              </div>
            </div>
          </div>

          <div class="form-group">
            <div class="row">
              <?php echo Form::label('branch', 'Branch', ['class' => 'col-sm-2']); ?> 
              <div class="col-sm-10">   
                <select class="form-control selectpicker" name="warehouse_id" data-live-search = true>
                  <option value="all">ALL BRANCHES</option>
                    <?php $__currentLoopData = $warehouses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $warehouse): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <option value="<?php echo e($warehouse->id); ?>">
                        <?php echo e($warehouse->name); ?>

                      </option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
              </div>
            </div>
          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">
              <?php echo e(trans('core.close')); ?>

            </button>
            <button type="submit" class="btn btn-primary"><?php echo e(trans('core.generate_report')); ?></button>
          </div>
        </div>
      </div>
    <?php echo Form::close(); ?>

    </div>
  </div>
  <!-- Subcategory Report Ends-->

  <!-- Profit Modal Starts -->
  <div class="modal fade" id="profitModal" tabindex="-1" role="dialog" >
    <?php echo Form::open(['route'=>'report.profit']); ?>

    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Profit Report</h4>
        </div>
        <div class="modal-body">

          <div class="form-group">
            <div class="row">
              <?php echo Form::label('branch', 'Branch', ['class' => 'col-sm-2']); ?> 
              <div class="col-sm-10">   
                <select class="form-control selectpicker" name="warehouse_id" data-live-search = true>
                  <option value="all">ALL BRANCHES</option>
                    <?php $__currentLoopData = $warehouses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $warehouse): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <option value="<?php echo e($warehouse->id); ?>">
                        <?php echo e($warehouse->name); ?>

                      </option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
              </div>
            </div>
          </div>

          <div class="form-group"> 
            <div class="row">
               <?php echo Form::label('From', 'From', ['class' => 'col-sm-2']); ?> 
              <div class="col-sm-10"> 
                <?php echo Form::text('from', Request::get('from'), ['class' => 'form-control dateTime','placeholder'=>"yyyy-mm-dd"]); ?>

              </div>
            </div>  
          </div>

          <div class="form-group">
            <div class="row">
              <?php echo Form::label('To', 'To', ['class' => 'col-sm-2']); ?> 
              <div class="col-sm-10">   
                <?php echo Form::text('to', Request::get('to'), ['class' => 'form-control dateTime','placeholder'=>"yyyy-mm-dd"]); ?>

              </div>
            </div>
          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">
              <?php echo e(trans('core.close')); ?>

            </button>
            <button type="submit" class="btn btn-primary"><?php echo e(trans('core.generate_report')); ?></button>
          </div>
        </div>
      </div>
    <?php echo Form::close(); ?>

    </div>
  </div>
  <!-- Profit Report Modal Ends-->
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>