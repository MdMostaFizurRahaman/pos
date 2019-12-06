<style>
	thead tr th{
		text-align: center;
		font-size: 14px !important;
	}

	tbody tr td{
		font-size: 13px !important;
	}
</style>

<?php $__env->startSection('main-content'); ?>
	<section class="invoice">
	    <div class="row">
	      <div class="col-sm-4" style="margin-left: 20px; padding: 20px; ">
	          <?php if(!empty(settings('site_logo'))): ?>
              	<img src="<?php echo asset('uploads/site/'.settings('site_logo')); ?>" style="height: 84px; width: 190px;">
              <?php else: ?>
                <h4><?php echo e(settings('site_name')); ?></h4>
                <p>
                	<?php echo e(trans('core.phone')); ?>:
		          	<?php echo e(bangla_digit(settings('phone'))); ?>

		        </p>
		        <p>
		          	<?php echo e(bangla_digit(settings('address'))); ?>

		        </p>
              <?php endif; ?>
	      </div>

	       <div class="col-sm-3">
	        <h3 class="" style="text-align: center;  padding: 20px; font-weight: bolder;">
	           	<?php echo e(trans('core.invoice')); ?>

	          	<br>
		        
		        <?php if(settings('vat_no')): ?>
		          	<small style="font-size: 10px;">
		          		<?php echo e(trans('core.tin')); ?>: <?php echo e(settings('vat_no')); ?>

		          	</small>
		        <?php endif; ?>
	        </h3>
	        
	        <p class="" style="text-align: center; ">
	          <b>
	          	<small>
	          		<?php echo e(trans('core.name')); ?>: <?php echo e($transaction->client->name); ?>

	          	</small>
	          </b>
	        </p>
	        <p class="" style="text-align: center; ">
	          <b>
	          	<small>
		          	<?php if($transaction->client->phone): ?>
		          		<?php echo e(trans('core.phone')); ?>: 
		          		<?php echo e($transaction->client->phone); ?>

		          	<?php endif; ?>
		          	
		          	<?php if($transaction->client->email): ?>
		          		,<?php echo e(trans('core.email')); ?>: 
		          		<?php echo e($transaction->client->email); ?>

		          	<?php endif; ?>
	          	</small>
	      	  </b>
	        </p>
	      </div>

	       <div class="col-sm-4" style="margin-left: 20px; padding: 20px;">
	          <table class="table table-bordered">
	          	 <tr>
	          	 	<td>
	          	 		<?php echo e(trans('core.invoice_no')); ?> : 
	          	 	</td>
	          	 	<td><?php echo e($transaction->reference_no); ?></td>
	          	 </tr>
	          
	          	 <tr>
	          	 	<td>
	          	 		<?php echo e(trans('core.date')); ?> :
	          	 	</td>
	          	 	<td>
	          	 		<?php echo e(carbonDate($transaction->purchases->first()->date, 'y-m-d')); ?>

	          	 	</td>
	          	 </tr>
	          </table>
	      </div>
	      <!-- /.col -->
	    </div> 
	    <!-- header row ends-->

	    <div class="row" >
	      <div class="col-sm-12 table-responsive" style="margin-left: 20px; ">
	        <table class="table table-bordered">
	          <thead style="background-color: #FFF !important;color: black !important;">
	          <tr>
	          	<th width="5%"><?php echo e(trans('core.si_no')); ?></th>
	            <th width="15%"><?php echo e(trans('core.name')); ?></th>
	            <th width="15%"><?php echo e(trans('core.quantity')); ?></th>
	            <th width="15%"><?php echo e(trans('core.unit_price')); ?></th>
	            <th width="15%"><?php echo e(trans('core.amount')); ?></th>
		        <?php if(settings('product_tax')): ?>
		        <th class="text-center" width="15%">
		          <?php echo e(trans('core.product_tax')); ?>

		        </th>
		        <?php endif; ?>
	            <th width="20%"><?php echo e(trans('core.sub_total')); ?></th>
	          </tr>
	          </thead>
	          
	          <tbody>
	          	<?php $__currentLoopData = $transaction->purchases; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $purchase): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		          <tr>
		          	<td><?php echo e($loop->iteration); ?></td>

		            <td class="text-center">
		            	<?php echo e($purchase->product->name); ?>

		            </td>
		            
		            <td class="text-center">
		            	<?php echo e(bangla_digit($purchase->quantity)); ?> 
		            	<?php echo e($purchase->product->unit); ?>

		            </td>
		            
		            <td class="text-center">
		            <?php if($purchase->quantity > 0): ?>
		            	<?php echo e(twoPlaceDecimal($purchase->sub_total / $purchase->quantity)); ?>

		            <?php else: ?>
		            	0
		            <?php endif; ?>
		            </td>
		            
		            <td class="text-center">
			          <?php echo e(twoPlaceDecimal($purchase->sub_total)); ?>

			        </td>

			        <?php if(settings('product_tax')): ?>
			        <td class="text-center">
			          <?php echo e(twoPlaceDecimal($purchase->product_tax)); ?>

			        </td>
			        <?php endif; ?>

		            <td class="text-center">
		            	<?php echo e(twoPlaceDecimal($purchase->sub_total + $purchase->product_tax)); ?>

		            </td>
		          </tr>
	          	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

          		<tr>
          			<td>&nbsp;</td>
          			<td></td>
          			<td></td>
          			<?php if(settings('product_tax')): ?>
          			<td></td>
          			<?php endif; ?>
          			<td></td>
          			<td></td>
          			<td></td>
          		</tr>

          		<tr style="background-color: #F8FCD4;">
          			<td></td>
          			<td><b><?php echo e(trans('core.total')); ?></b></td>
          			<td><b><?php echo e($total_quanity); ?></b></td>
          			<td></td>

          			<td>
          				<b><?php echo e(twoPlaceDecimal($transaction->total + $transaction->discount)); ?></b>
          			</td>
          			
          			<?php if(settings('product_tax')): ?>
          				<td>
          					<b><?php echo e(twoPlaceDecimal($transaction->total_tax - $transaction->invoice_tax)); ?></b>
          				</td>
          			<?php endif; ?>
          			
          			<td>
          				<b><?php echo e(twoPlaceDecimal($transaction->total + $transaction->discount + ($transaction->total_tax - $transaction->invoice_tax))); ?></b>
          			</td>
          		</tr>

          		<?php if($transaction->discount > 0): ?>
          		<tr>
          			<td colspan="<?php echo e(sellDetailsColSpanNumber() + 1); ?>" style="text-align: right">
          				<b><?php echo e(trans('core.discount')); ?>:</b>
          			</td>
          			<td>
          				<?php echo e(twoPlaceDecimal($transaction->discount)); ?>

          			</td>
          		</tr>
          		<?php endif; ?>

          		<?php if($transaction->invoice_tax > 0): ?>
          		<tr>
          			<td colspan="<?php echo e(sellDetailsColSpanNumber() + 1); ?>" style="text-align: right">
          				<b>
          					<?php echo e(trans('core.invoice_tax')); ?>

          					(<?php echo e(orderTax()); ?> 
          					of <?php echo e($transaction->total + $transaction->total_tax - $transaction->invoice_tax); ?>)
          				</b>
          			</td>
          			<td>
          				<?php echo e(twoPlaceDecimal($transaction->invoice_tax)); ?>

          			</td>
          		</tr>
          		<?php endif; ?>

          		<tr>
          			<td colspan="<?php echo e(sellDetailsColSpanNumber() + 1); ?>" style="text-align: right">
          				<b><?php echo e(trans('core.net_total')); ?>:</b>
          			</td>
          			<td>
          				<?php echo e(twoPlaceDecimal($transaction->net_total)); ?>

          			</td>
          		</tr>

          		<tr>
          			<td colspan="<?php echo e(sellDetailsColSpanNumber() + 1); ?>" style="text-align: right">
          				<b><?php echo e(trans('core.paid')); ?>:</b>
          			</td>
          			<td>
          				<?php echo e(twoPlaceDecimal($transaction->paid)); ?>

          			</td>
          		</tr>

          		<?php if($transaction->net_total - $transaction->paid != 0): ?>
          		<tr>
          			<td colspan="<?php echo e(sellDetailsColSpanNumber() + 1); ?>" style="text-align: right">
          				<b><?php echo e(trans('core.due')); ?>:</b>
          			</td>
          			<td>
          				<?php echo e(twoPlaceDecimal($transaction->net_total - $transaction->paid)); ?>

          			</td>
          		</tr>
          		<?php endif; ?>

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
			        <b><?php echo e(settings('currency_code')); ?> <?php echo e(numberFormatter($transaction->net_total)); ?></b>
			    	<br>
			    	<br>
			    </span>
	    	</div>
	    </div>

	    <div class="row">
	    	<div class="col-sm-5" style="margin-left: 20px;">
	          	<span class="declaration_header">
	          		<?php echo e(trans('core.declaration')); ?>

	          	</span>
	          	<br>
	          		<?php echo e(trans('core.declaration_text')); ?>

		    	<br>
		    	<br><br>
		    	<span class="customer-signature">
		    		<?php echo e(trans('core.supplier_seal')); ?>:
		    	</span>
		    	<br><br><br>
	        </div>

	        <div class="col-sm-offset-2 col-sm-4 pull-right" >
	          	<span>&nbsp;</span>
	    		<br><br><br>
	    		for <b><?php echo e(settings('site_name')); ?></b>
	    		<br><br>
	    		<?php echo e(trans('core.authorized_signature')); ?>

	        </div>
	    </div>
  	</section>
	
<?php $__env->stopSection(); ?>
<?php echo $__env->make('printer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>