<h3 style="text-align: center;"><?php echo e(trans('core.purchase_items')); ?></h3>
<div class="table-responsive">
  <table class="table table-bordered ">
    <tr class="table-header-color">
      <th class="text-center">#</th>
      <th class="text-center"><?php echo e(trans('core.product')); ?></th>
      <th class="text-center"><?php echo e(trans('core.quantity')); ?></th>
      <th class="text-center"><?php echo e(trans('core.unit_price')); ?></th>
      <?php if(settings('product_tax') == 1): ?>
      <th class="text-center">
        <?php echo e(trans('core.product_tax')); ?>

      </th>
      <?php endif; ?>
      <th class="text-center"><?php echo e(trans('core.sub_total')); ?></th>
    </tr>


    <?php $__currentLoopData = $transaction->purchases; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $purchases): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <tr>
      <td class="text-center"><?php echo e($loop->iteration); ?></td>
      <td class="text-center"><?php echo e($purchases->product->name); ?></td>
      <td class="text-center">
        <?php echo e($purchases->quantity); ?> <?php echo e($purchases->product->unit); ?>

      </td>
      <td class="text-center">
        <?php echo e(settings('currency_code')); ?>

        <?php echo e(twoPlaceDecimal($purchases->sub_total / $purchases->quantity)); ?>

      </td>
      
      <?php if(settings('product_tax')): ?>
      <td class="text-center">
        <?php echo e(settings('currency_code')); ?>

        <?php echo e(twoPlaceDecimal($purchases->product_tax)); ?>

      </td>
      <?php endif; ?>
     
      <td class="text-center">
        <?php echo e(settings('currency_code')); ?>

        <?php echo e(twoPlaceDecimal($purchases->sub_total + $purchases->product_tax)); ?> 
      </td>
    </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


    <!--Table footer section for total-->
    <tr>
      <td <?php if(!rtlLocale ()): ?> class="text-right" <?php endif; ?> colspan="<?php echo e(sellDetailsColSpanNumber()); ?>" >
        <b><?php echo e(trans('core.total_quantity')); ?> :</b>
      </td>
      <td <?php if(rtlLocale ()): ?> class=" bold text-right" <?php endif; ?>>
        <?php echo e($transaction->purchases->sum('quantity')); ?> 
        <?php if(!rtlLocale ()): ?> <?php echo e(trans('core.item')); ?> <?php endif; ?>
      </td>
    </tr>

    <?php if($transaction->invoice_tax > 0): ?>
    <tr>
      <td <?php if(!rtlLocale ()): ?> class="text-right" <?php endif; ?> colspan="<?php echo e(sellDetailsColSpanNumber()); ?>" >
        <b>
          <?php echo e(trans('core.total')); ?> :
        </b>
      </td>
      <td <?php if(rtlLocale ()): ?> class="text-right" <?php endif; ?>>
        <?php echo e(settings('currency_code')); ?>

        <?php echo e(twoPlaceDecimal($transaction->total + $transaction->discount + $transaction->total_tax - $transaction->invoice_tax)); ?>

      </td>
    </tr>
    <?php endif; ?>

    <?php if($transaction->discount): ?>
    <tr>
      <td <?php if(!rtlLocale ()): ?> class="text-right" <?php endif; ?> colspan="<?php echo e(sellDetailsColSpanNumber()); ?>">
        <b><?php echo e(trans('core.discount')); ?> :</b>
      </td>
      <td <?php if(rtlLocale ()): ?> class=" bold text-right" <?php endif; ?>> 
        <?php echo e(settings('currency_code')); ?>

        <?php echo e(twoPlaceDecimal($transaction->discount)); ?>

      </td>
    </tr>  
    <?php endif; ?>

    <!-- invoice tax -->
    <?php if(settings('invoice_tax')): ?>
    <tr>
      <td <?php if(!rtlLocale ()): ?> class="text-right" <?php endif; ?> colspan="<?php echo e(sellDetailsColSpanNumber()); ?>" >
        <b>
          <?php echo e(trans('core.invoice_tax')); ?> 
          (<?php echo e(orderTax()); ?> of <?php echo e($transaction->total + $transaction->total_tax - $transaction->invoice_tax); ?>) :
        </b>
      </td>
      <td <?php if(rtlLocale ()): ?> class="text-right" <?php endif; ?>>
        <?php echo e(settings('currency_code')); ?>

        <?php echo e(twoPlaceDecimal($transaction->invoice_tax)); ?>

      </td>
    </tr>
    <?php endif; ?>
    <!-- Ends -->

    <tr style="background-color: #F8FCD4;">
      <td <?php if(!rtlLocale ()): ?> class="text-right" <?php endif; ?> colspan="<?php echo e(sellDetailsColSpanNumber()); ?>" >
        <b><?php echo e(trans('core.net_total')); ?> :</b>
      </td>
      <td <?php if(rtlLocale ()): ?> class="text-right" <?php endif; ?>>
        <?php echo e(settings('currency_code')); ?>

        <?php echo e(twoPlaceDecimal($transaction->net_total)); ?>

      </td>
    </tr>
  </table>
</div>