
<h3 class="text-center"><?php echo e(trans('core.transaction_details')); ?></h3>

<div class="box-body" >
  <table class="table table-bordered">
    <?php if($client->provious_due > 0): ?>
    <tr>
      <td class="text-center"> 
        <b><?php echo e(trans('core.previous_due')); ?></b>             
      </td>

      <td class="text-center" style="width: 40%;">
        <?php echo e(settings('currency_code')); ?>

        <?php echo e(bangla_digit($client->provious_due)); ?>

      </td>
    </tr>
    <?php endif; ?>

    <tr>
      <td class="text-center">
          <?php if($client->client_type == 'purchaser'): ?>
            <b><?php echo e(trans('core.purchasing_goods_total_price')); ?></b>
          <?php else: ?>
            <b>
              <?php echo e(trans('core.selling_goods_total_price')); ?> (+)
            </b>
          <?php endif; ?>         
      </td>

      <td class="text-center" style="width: 40%;">
        <?php echo e(settings('currency_code')); ?>

        <?php echo e(bangla_digit($net_total)); ?>

      </td>
    </tr>

    <?php if($client->client_type != 'purchaser' && $total_return > 0): ?>
      <tr>
        <td class="text-center">
            <b><?php echo e(trans('core.total_return')); ?> (-)</b>        
        </td>
        <td class="text-center">
          <?php echo e(settings('currency_code')); ?>

          <?php echo e(bangla_digit($total_return)); ?>

        </td>
      </tr>
    <?php endif; ?>


    <tr>
      <td class="text-center">
        <?php if($client->client_type == 'purchaser'): ?>
          <b><?php echo e(trans('core.total_given')); ?></b>
        <?php else: ?>
          <b><?php echo e(trans('core.total_received')); ?> (-)</b>
        <?php endif; ?>         
      </td>
      <td class="text-center">
        <?php echo e(settings('currency_code')); ?>

        <?php echo e(bangla_digit($total_received)); ?>

      </td>
    </tr>

    <tr >
      <td class="text-center"> 
        <?php if($client->client_type == 'purchaser'): ?>
      	   <b><?php echo e(trans('core.current_get')); ?></b>
        <?php else: ?>
          <b><?php echo e(trans('core.current_due')); ?></b>
        <?php endif; ?>
      </td>
      <td class="text-center">
        <?php echo e(settings('currency_code')); ?>

      	<?php echo e(bangla_digit($total_due)); ?>

      </td>
    </tr>
  </table>
</div> <!-- box body ends -->