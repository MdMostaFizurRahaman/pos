<h3 class="text-center"><?php echo e(trans('core.payment_history')); ?></h3>
 
<div class="box-body" >
  <table class="table table-bordered" id="example">
    <tr class="table-header-color">
      <th class="text-center"><?php echo e(trans('core.date')); ?></th>
      <th class="text-center"><?php echo e(trans('core.method')); ?></th>
      <th class="text-center"><?php echo e(trans('core.note')); ?></th>
      <th class="text-center">
        <?php if($client->client_type == 'purchaser'): ?>
          <?php echo e(trans('core.given_amount')); ?>

        <?php else: ?>
          <?php echo e(trans('core.received_amount')); ?>

        <?php endif; ?>
      </th>
      <th class="text-center"><?php echo e(trans('core.voucher')); ?></th>
    </tr>

    <tbody id="myTable">
      <?php $__currentLoopData = $payment_lists; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $payment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <tr>
        <td><?php echo e(carbonDate($payment->date, 'g:i:a')); ?></td>
        <td><?php echo e(title_case($payment->method)); ?></td>
        <td><?php echo e($payment->note); ?></td>
        <td>
          <?php echo e(settings('currency_code')); ?>

          <?php echo e(bangla_digit($payment->amount)); ?>

        </td>
        
        <td>
        	<a target="_BLINK" href="<?php echo e(route('payment.voucher', $payment)); ?>" class="btn btn-alt btn-warning btn-xs">
        		<i class="fa fa-print"></i> 
        		<?php echo e(trans('core.print')); ?>

        	</a>
        </td>
      </tr>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
  </table>
  
  <a class="btn btn-default btn-xs pull-right" href="<?php echo e(route('client.payment.list', $client)); ?>"> 
    <?php echo e(trans('core.view_all')); ?> <i class="fa fa-arrow-circle-right"></i>
  </a>
</div> <!-- box body ends -->


