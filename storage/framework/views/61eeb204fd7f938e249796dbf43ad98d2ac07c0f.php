<div class="box-body" >
	<?php if($total_due > 0): ?>
      	<form method="post" name="myForm" onsubmit="return validateForm()" action="<?php echo e(route('payment.post')); ?>">

      		<?php echo e(csrf_field()); ?>

      		<div class="form-group">
			   <label><?php echo e(trans('core.date')); ?></label>
		       <input type="text" class="paymentTime form-control" name="date">

		       <br>

			   <label>
			   		<?php echo e(trans('core.amount')); ?>

			   </label>
			   <input type="hidden" name="client_id" value="<?php echo e($client->id); ?>">

			   <input type="text" class="form-control" name="amount" required>
			   <p id="message" style="color: red;"></p>
			   
			   <br>

			   <label><?php echo e(trans('core.payment_method')); ?></label>
			   <select class="form-control" name="method">
			   		<option value="cash"><?php echo e(trans('core.cash')); ?></option>
			   		<option value="cheque"><?php echo e(trans('core.cheque')); ?></option>
			   		<option value="others"><?php echo e(trans('core.others')); ?></option>
			   </select>

			   <br>
			   
			   <label><?php echo e(trans('core.note')); ?></label>
			   <textarea name="note" class="form-control"></textarea>

			   <?php if($client->client_type == 'purchaser'): ?>
			   		<input type="hidden" name="type" value="debit">
			   <?php else: ?>
			   		<input type="hidden" name="type" value="credit">
			   <?php endif; ?>
			</div>

			<button type="submit" class="btn btn-success">
				<?php echo e(trans('core.submit')); ?>

			</button>
      	</form>
    <?php else: ?>	
	
		<h1 class="no-due"><?php echo e(trans('core.no_due')); ?></h1>
			     
    <?php endif; ?>
</div> <!-- box body -->
	