<?php $__env->startSection('title'); ?>
  <?php echo e(trans('core.purchase_details')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('contentheader'); ?>
  <?php echo e(trans('core.purchase_details')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
  <?php echo e(trans('core.purchase_details')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('main-content'); ?>
    <div class="panel-body">
      <div class="row">
        <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="panel-layout">
              <div class="panel-box">
                  <div class="panel-content bg-primary">
                      <div class="image-content font-white">
                          <div class="center-vertical">
                              <div class="meta-box center-content">
                                  <h4 class="meta-subheading">
                                    <?php echo e($transaction->client->company_name); ?>

                                  </h4>
                                  <h3 class="meta-heading">
                                    <?php echo e($transaction->client->name); ?>

                                  </h3>
                              </div>
                          </div>

                      </div>

                  </div>

                  <div class="panel-content bg-white">
                      <ul class="list-group list-group-separator mrg0A row list-group-icons">
                          <li class="col-md-12 list-group-item">
                            <?php echo e(trans('core.phone')); ?>: 
                            <?php echo e($transaction->client->phone); ?>

                          </li>

                          <li class="col-md-12 list-group-item">
                              <?php echo e(trans('core.email')); ?>:
                              <?php echo e($transaction->client->email); ?>

                          </li>
                          
                          <li class="col-md-12 list-group-item">
                             <?php echo e(trans('core.address')); ?>:  
                             <?php echo e($transaction->client->address); ?>

                          </li>
                      </ul>
                  </div>
              </div>
            </div>
        </div><!-- /.col -->

        <div class="col-md-4 col-sm-6 col-xs-12">
          <div class="panel-layout">
              <div class="panel-box">
                  <div class="panel-content bg-blue-alt">
                      <div class="image-content font-white">
                          <div class="center-vertical">
                              <div class="meta-box center-content">
                                  <h4 class="meta-subheading">
                                    <i class="fa fa-file-text"></i>
                                  </h4>
                                  <h3 class="meta-heading">
                                      <?php echo e(trans('core.bill_info')); ?>

                                  </h3>
                              </div>
                          </div>
                      </div>
                  </div>


                  <div class="panel-content bg-white" style="min-height: 190px;">
                      <ul class="list-group list-group-separator mrg0A row list-group-icons">
                          <li class="col-md-12 list-group-item">
                            <?php echo e(trans('core.ref_no')); ?>: 
                            <?php echo e($transaction->reference_no); ?>

                          </li>

                          <li class="col-md-12 list-group-item">
                            <?php echo e(trans('core.date')); ?>: 
                            <?php echo e(carbonDate($transaction->date, 'y-m-d')); ?>

                          </li>
                          <li class="col-md-12 list-group-item">
                            <?php echo e(trans('core.time')); ?>: 
                            <?php echo e(carbonDate($transaction->date, 'time')); ?>

                          </li>
                      </ul>
                  </div>
              </div>
          </div>
        </div> <!-- /.col -->

        <div class="col-md-4 col-sm-6 col-xs-12">
          <div class="panel-layout">
              <div class="panel-box">
                  <div class="panel-content bg-purple">
                      <div class="image-content font-white">
                          <div class="center-vertical">
                              <div class="meta-box center-content">
                                  <h4 class="meta-subheading">
                                    <i class="fa fa-money"></i>
                                  </h4>
                                  <h3 class="meta-heading">
                                    <?php echo e(trans('core.payment')); ?>

                                  </h3>
                              </div>
                          </div>
                      </div>
                  </div>

                  <div class="panel-content bg-white" style="min-height: 190px;">
                      <ul class="list-group list-group-separator mrg0A row list-group-icons">
                          <!-- <li class="col-md-12 list-group-item">
                            <?php echo e(trans('core.total')); ?> :
                            <?php echo e(settings('currency_code')); ?>

                            <?php echo e(bangla_digit($transaction->net_total + $transaction->discount)); ?>

                          </li>

                          <?php if($transaction->discount): ?>
                          <li class="col-md-12 list-group-item">
                              <?php echo e(trans('core.discount')); ?>:
                              <?php echo e(settings('currency_code')); ?>

                              <?php echo e(bangla_digit($transaction->discount)); ?>

                          </li>
                          <?php endif; ?> -->

                          <li class="col-md-12 list-group-item">
                            <?php echo e(trans('core.net_total')); ?> :
                            <?php echo e(settings('currency_code')); ?>

                            <?php echo e(twoPlaceDecimal($transaction->net_total)); ?>

                          </li>

                          <li class="col-md-12 list-group-item">
                            <?php echo e(trans('core.paid')); ?>:
                            <?php echo e(settings('currency_code')); ?>

                            <?php echo e(twoPlaceDecimal($transaction->paid)); ?>

                          </li>
                          
                          <li class="col-md-12 list-group-item">
                              <?php echo e(trans('core.due')); ?>: 
                              <?php echo e(settings('currency_code')); ?>

                              <?php echo e(twoPlaceDecimal($transaction->net_total - $transaction->paid)); ?>

                          </li>
                      </ul>
                  </div>
              </div>
          </div>
        </div> <!-- /.col --> 
      </div>

      <!-- tab section -->
      <div class="row">
        <div class="col-md-12">
            <div class="nav-tabs-custom">
              <ul class="nav nav-tabs">
                  <li class="active">
                    <a href="#items" data-toggle="tab">
                      <?php echo e(trans('core.purchase_items')); ?>

                    </a>
                  </li>
                  <li>
                    <a href="#payments" data-toggle="tab">
                      <?php echo e(trans('core.payment_history')); ?>

                    </a>
                  </li>
                  
                  <?php if(auth()->user()->can('purchase.manage')): ?>
                  <li>
                    <a href="#make-payment" data-toggle="tab">
                      <?php echo e(trans('core.make_payment')); ?>

                    </a>
                  </li>
                  <?php endif; ?>
              </ul>

              <div class="tab-content">
                <!--sell items table-->
                <div class="active tab-pane animated fadeIn" id="items" style="padding-bottom: 50px;">
                 <?php echo $__env->make('purchases.partials.purchase_item_list', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                </div>
                <!--sell items table-->

                <!-- Payment list table -->
                <div class="tab-pane animated fadeIn" id="payments">
                  <?php echo $__env->make('purchases.partials.payment-history', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>      
                </div>
                <!-- Payment list table ends -->

                <!--Make payment form-->
                <div class="tab-pane animated fadeIn" id="make-payment">
                  <?php echo $__env->make('purchases.partials.make-payment-form', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                </div>
                <!--Make payment div ends-->
              </div> <!--  tab-content -->
            </div> <!-- nav-tabs-custom -->

        </div> <!-- col -->
      </div> <!--row-->
  </div> <!--panel body-->

  <div class="panel-footer">
    <a class="btn btn-border btn-alt border-black font-black btn-xs pull-right" href="<?php echo e(route('purchase.index')); ?>">
      <i class="fa fa-backward"></i> <?php echo e(trans('core.back')); ?>

    </a>

    <a class="btn btn-alt btn-warning btn-xs" target="_BLINK" href="<?php echo e(route('purchase.invoice', $transaction)); ?>">
      <i class="fa fa-print"></i>
      <?php echo e(trans('core.print_bill')); ?>

    </a>
  </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
  ##parent-placeholder-93f8bb0eb2c659b85694486c41717eaf0fe23cd4##
  <script>
    function validateForm() {   
        var x = parseFloat(document.forms["myForm"]["amount"].value);
        var y = parseFloat("<?php echo e($transaction->net_total - $transaction->paid); ?>");
        if (x > y) {
            document.getElementById("message").innerHTML = "Paid amount (<?php echo e(settings('currency_code')); ?> "+ x + " ) can't be greater than Due Amount (<?php echo e(settings('currency_code')); ?> " + y + " )";
            return false;
        }
    }

    $(function() {
      $('.number').on('input', function() {
        match = (/(\d{0,100})[^.]*((?:\.\d{0,2})?)/g).exec(this.value.replace(/[^\d.]/g, ''));
        this.value = match[1] + match[2];
      });
    });

    $('.paymentTime').datetimepicker({
        format : 'YYYY-M-D H:mm:ss'
    })

</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>