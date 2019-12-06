<style>
  thead tr th{
    text-align: center;
  }
</style>

<?php $__env->startSection('main-content'); ?>
  <section class="invoice">
      <!-- title row -->
      <div class="row">
        <div class="col-xs-12">
          <h4 class="page-header" >
            <?php if(!empty(settings('site_logo'))): ?>
              <img src="<?php echo asset('uploads/site/'.settings('site_logo')); ?>" style="height: 100px; width: auto;">
            <?php else: ?>
                <p><?php echo e(settings('site_name')); ?></p>
            <?php endif; ?>
            <small>
              <?php echo e(trans('core.phone')); ?>:
              <?php echo e(bangla_digit(settings('phone'))); ?>

              <br>
              <?php echo e(trans('core.email')); ?>: 
              <?php echo e(bangla_digit(settings('email'))); ?>

            </small>
          </h4>
        </div>
        <!-- /.col -->
      </div>

      <!-- info row -->
      <div class="row invoice-info" >
        <div class="col-sm-4 invoice-col">
          <?php if($payment->type == 'debit'): ?>
            <b><?php echo e(trans('core.received_from')); ?>: </b>
          <?php else: ?>
            <b><?php echo e(trans('core.received_by')); ?>: </b>
          <?php endif; ?> 
          <br>
          <?php echo e($payment->client->name); ?><br>
          <?php echo e($payment->client->company_name); ?>

        </div>
        
        <div class="col-sm-4 invoice-col">
          <b><?php echo e(trans('core.address')); ?>:</b> 
          <address>
             <?php echo e($payment->client->address); ?>

          </address>
        </div>
        
        <div class="col-sm-3 invoice-col" style="margin-left: 20px; text-align: left;">
          <b><?php echo e(trans('core.receipt_no')); ?></b> #<?php echo e(ref($payment->id)); ?><br>
          <b><?php echo e(trans('core.invoice_no')); ?></b> #<?php echo e($payment->reference_no); ?><br>
          <b><?php echo e(trans('core.date')); ?>: </b><?php echo e(carbonDate($payment->date, 'y-m-d')); ?>

        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <br>
      <!-- Table row -->
      <div class="row">
        <div class="col-xs-12 table-responsive">
          <table class="table table-bordered">
            <thead>
            <tr>
              <th>
                  <?php echo e(trans('core.note')); ?> 
              </th>

              <th style="text-align: center;">
                <?php if($payment->type == 'credit'): ?>
                  <?php echo e(trans('core.received_amount')); ?>

                <?php else: ?>
                  <?php echo e(trans('core.amount')); ?>

                <?php endif; ?>
              </th>
            </tr>
            </thead>

            <tbody>
              <td style="height: 100px;">
                <?php echo e($payment->note); ?> 
              </td> 

              <td style="height: 100px;">
                <?php echo e(settings('currency_code')); ?>

                <?php echo e(twoPlaceDecimal($payment->amount)); ?> 
              </td>       
            </tbody>
          </table>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <div class="row">
        <div class="col-md-12" style="margin-left: 20px;">
          <span class="amount-in-words">
            <?php echo e(trans('core.amount')); ?> (In Words)
              <br>
              <b><?php echo e(settings('currency_code')); ?> <?php echo e(numberFormatter($payment->amount)); ?></b>
            <br>
            <br>
          </span>
        </div>
      </div>

      <br><br>
      <div class="row">
        <div class="col-sm-5" style="margin-left: 20px;">
              
          
        </div>

        <div class="col-sm-offset-4 col-sm-4 pull-right" >
            <span>&nbsp;</span>
        <br><br>
        <?php echo e(trans('core.authorized_signature_receipt')); ?>

        </div>
      </div>

    </section>
  
<?php $__env->stopSection(); ?>
<?php echo $__env->make('printer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>