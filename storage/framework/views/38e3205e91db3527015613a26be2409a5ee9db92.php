<?php $__env->startSection('contentheader'); ?>
  <?php echo e(trans('core.details')); ?>: <?php echo e($client->name); ?> 
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
    <?php if($client->client_type == 'purchaser'): ?>
      <a href="<?php echo e(route('purchaser.index')); ?>"> 
        <?php echo e(trans('core.supplier_list')); ?>

      </a>
    <?php else: ?>
      <a href="<?php echo e(route('client.index')); ?>"> 
        <?php echo e(trans('core.customer_list')); ?>

      </a>
    <?php endif; ?> 
    &nbsp;&nbsp;>&nbsp;
    <?php echo e(trans('core.details')); ?>: <?php echo e($client->name); ?> 
<?php $__env->stopSection(); ?>

<?php $__env->startSection('main-content'); ?>

  <div class="panel-body">
    <div class="row">
      <div class="col-md-4 col-sm-6 col-xs-12" >

        <div class="panel-layout">
            <div class="panel-box">
                <div class="panel-content bg-primary">
                    <div class="image-content font-white">
                        <div class="center-vertical">
                            <div class="meta-box center-content">
                                <h3 class="meta-heading"><?php echo e($client->company_name); ?></h3>
                                <h4 class="meta-subheading"><?php echo e($client->name); ?></h4>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="panel-content bg-white">
                    <ul class="list-group list-group-separator mrg0A row list-group-icons">
                        <li class="col-md-12 list-group-item">
                          <?php echo e(trans('core.phone')); ?> : <?php echo e($client->phone); ?>

                        </li>

                        <?php if($client->email): ?>
                        <li class="col-md-12 list-group-item">
                          <?php echo e(trans('core.email')); ?>: <?php echo e($client->email); ?>

                        </li>
                        <?php endif; ?>

                        <?php if($client->address): ?>
                        <li class="col-md-12 list-group-item">
                          <?php echo e(trans('core.address')); ?>: <?php echo e($client->address); ?>

                        </li>
                        <?php endif; ?>

                        <?php if($client->account_no): ?>
                        <li class="col-md-12 list-group-item"> 
                            <?php echo e(trans('core.account_no')); ?>: <?php echo e($client->account_no); ?>

                        </li>
                        <?php endif; ?>
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
                                <h3 class="meta-heading">
                                  <?php if($client->client_type == 'purchaser'): ?>
                                    <?php echo e(trans('core.total_purchase')); ?>

                                  <?php else: ?>
                                     <?php echo e(trans('core.total_sell')); ?>

                                  <?php endif; ?>

                                </h3>
                                <h4 class="meta-subheading">
                                   &nbsp;
                                </h4>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="panel-content bg-white" style="min-height: 190px;">
                    <ul class="list-group list-group-separator mrg0A row list-group-icons">
                       <li class="col-md-12 list-group-item">
                          <h3>
                            <?php if($client->client_type == 'purchaser'): ?>
                                <?php echo e(bangla_digit($client->purchases->sum('quantity'))); ?>

                                <?php echo e(trans('core.entity')); ?> <?php echo e(trans('core.product')); ?>

                            <?php else: ?>
                                <?php echo e(bangla_digit($client->sells->sum('quantity'))); ?>

                                <?php echo e(trans('core.product')); ?>

                            <?php endif; ?>
                          </h3>
                        </li>

                        <li class="col-md-12 list-group-item">
                            <!-- <a href="<?php echo e(route('client.payment.list', $client)); ?>" >
                                <i class="glyph-icon font-red fa-arrow-circle-right"></i>
                                <?php echo e(trans('core.details')); ?>

                            </a> -->
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
                                <h3 class="meta-heading">
                                  <?php echo e(trans('core.total_invoice')); ?>

                                </h3>
                                <h4 class="meta-subheading">
                                  &nbsp;
                                </h4>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="panel-content bg-white" style="min-height: 190px;">
                    <ul class="list-group list-group-separator mrg0A row list-group-icons">
                        <li class="col-md-12 list-group-item">
                            <?php echo e(bangla_digit($total_invoice)); ?>

                        </li>

                        <li class="col-md-12 list-group-item">
                            <a href="<?php echo e(route('client.invoices', $client)); ?>" >
                                <i class="glyph-icon font-red fa-arrow-circle-right"></i>
                                <?php echo e(trans('core.details')); ?>

                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
      </div> <!-- /.col -->     
    </div>
    <!-- ./row -->

    <!--second row-->
    <div class="row">
      <div class="col-md-12">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
                <li class="active">
                  <a href="#transaction_details" data-toggle="tab">
                    <?php echo e(trans('core.transaction_details')); ?>

                  </a>
                </li>

                <li>
                  <a href="#payments" data-toggle="tab">
                    <?php echo e(trans('core.payment_history')); ?>

                  </a>
                </li>

                <li>
                  <a href="#make-payment" data-toggle="tab">
                    <?php echo e(trans('core.make_payment')); ?>

                  </a>
                </li>
            </ul>
            <!--nav tab ends-->

            <div class="tab-content">
              <!--transaction history-->
              <div class="active tab-pane animated fadeIn" id="transaction_details" style="padding-bottom: 50px;">
                <?php echo $__env->make('clients.partials.transaction-history', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
              </div>
              <!--transaction history ends-->

              <!-- Payment list table -->
              <div class="tab-pane animated fadeIn" id="payments">
                <?php echo $__env->make('clients.partials.payment-list', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>       
              </div>
              <!-- Payment list table ends -->

              <!--Make payment form-->
              <div class="tab-pane animated fadeIn" id="make-payment">
                <?php echo $__env->make('clients.partials.make-payment', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
              </div>
              <!--Make payment div ends-->
            </div> <!--  tab-content -->
          </div> <!-- nav-tabs-custom -->
      </div> <!-- col -->
    </div> 
    <!-- ./second row ends--> 
  </div>

  <div class="panel-footer">
    <span style="padding: 10px;">
        
    </span>
     
    <a class="btn btn-border btn-alt border-black font-black btn-xs pull-right" <?php if($client->client_type == 'purchaser'): ?> 
          href="<?php echo e(route('purchaser.index')); ?>" 
        <?php else: ?> 
          href="<?php echo e(route('client.index')); ?>" 
        <?php endif; ?>>
      <i class="fa fa-backward"></i> <?php echo e(trans('core.back')); ?>

    </a>
  </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
  ##parent-placeholder-93f8bb0eb2c659b85694486c41717eaf0fe23cd4##
  <script>
    function validateForm() {   
        var x = parseFloat(document.forms["myForm"]["amount"].value);
        var y = parseFloat("<?php echo e($total_due); ?>");
        if (x > y) {
            document.getElementById("message").innerHTML = "Paid amount (<?php echo e(settings('currency_code')); ?> "+ x + " ) can't be greater than Due Amount (<?php echo e(settings('currency_code')); ?> " + y + " )";
            return false;
        }
    }

    $(function() {
      $('input').on('input', function() {
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