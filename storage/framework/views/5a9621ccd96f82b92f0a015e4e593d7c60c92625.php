<h3 style="text-align: center;"><?php echo e(trans('core.payment_history')); ?></h3>
  <div class="table-responsive">
    <table class="table table-bordered ">
      <tr class="table-header-color">
        <th class="text-center"><?php echo e(trans('core.date')); ?></th>
        <th class="text-center"><?php echo e(trans('core.method')); ?></th>
        <th class="text-center"><?php echo e(trans('core.note')); ?></th>
        <th class="text-center"><?php echo e(trans('core.amount')); ?></th>
        <th class="text-center"><?php echo e(trans('core.print')); ?></th>
      </tr>

      <?php $__currentLoopData = $payments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $payment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
          <td class="text-center"><?php echo e(carbonDate($payment->date, 'g:i:a')); ?></td>
          <td class="text-center"><?php echo e(title_case($payment->method)); ?></td>
          <td class="text-center"><?php echo e($payment->note); ?></td>
          <td class="text-center">
             <?php echo e(settings('currency_code')); ?>

             <?php echo e(twoPlaceDecimal($payment->amount)); ?>

          </td>
          <td class="text-center">
            <a target="_BLINK" href="<?php echo e(route('payment.voucher', $payment)); ?>" class="btn btn-border btn-alt border-orange btn-link font-orange btn-xs">
              <i class="fa fa-print"></i> 
              <?php echo e(trans('core.print')); ?>

            </a>
          </td>
        </tr>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      <tr style="background-color: #F8FCD4;" class="text-center">
        <td colspan="3" <?php if(!rtlLocale ()): ?> class="text-right" <?php else: ?> class="text-left" <?php endif; ?>">
          <b><?php echo e(trans('core.total')); ?> :</b>
        </td>
        <td colspan="2" <?php if(!rtlLocale ()): ?> class="text-left bold" <?php else: ?> class="text-right bold" <?php endif; ?>"> 
          <?php echo e(settings('currency_code')); ?>

          <?php echo e(twoPlaceDecimal($payments->sum('amount'))); ?>

        </td>
      </tr>
    </table>
  </div>