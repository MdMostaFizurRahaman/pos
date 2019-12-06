<?php if($transaction->net_total - $transaction->paid > 0): ?>
    <h3 style="text-align: center;"><?php echo e(trans('core.make_payment')); ?></h3>
    <form method="post" name="myForm" onsubmit="return validateForm()" action="<?php echo e(route('payment.post')); ?>">

      <?php echo e(csrf_field()); ?>

      <div class="form-group">
         <input type="hidden" name="client_id" value="<?php echo e($transaction->client_id); ?>">
         <input type="hidden" name="type" value="debit">
         <input type="hidden" name="reference_no" value="<?php echo e($transaction->reference_no); ?>">
         <input type="hidden" name="invoice_payment" value="1">

         <label><?php echo e(trans('core.date')); ?></label>
         <input type="text" class="paymentTime form-control" name="date">

         <br>
         
         <label><?php echo e(trans('core.amount')); ?></label>
         <input type="text" class="form-control number" name="amount"  required>
         <p id="message" style="color: red;"></p>
         
         <label><?php echo e(trans('core.payment_method')); ?></label>
         <select class="form-control" name="method">
            <option value="cash"><?php echo e(trans('core.cash')); ?></option>
            <option value="cheque"><?php echo e(trans('core.cheque')); ?></option>
            <option value="others"><?php echo e(trans('core.others')); ?></option>
         </select>

         <label><?php echo e(trans('core.note')); ?></label>
         <textarea name="note" class="form-control"></textarea>
         
      </div>

      <button type="submit" class="btn btn-success">
        <?php echo e(trans('core.submit')); ?>

      </button>
    </form>
<?php else: ?>
  <h1>No Due</h1>
<?php endif; ?>