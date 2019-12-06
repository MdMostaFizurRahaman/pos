<?php $__env->startSection('title'); ?>
	##parent-placeholder-3c6de1b7dd91465d437ef415f94f36afc1fbc8a8## :: POS
<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
	<link rel="stylesheet" href="/assets/css-core/pos-invoice.css">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('main-content'); ?>
	<div id="printableArea">
		<div id="invoice-POS">
		    <div id="top" style="border-bottom: 1px solid #EEE; margin-bottom: 8px;">
			    <center>
			      <!-- <div class="logo" style="background: url(<?php echo e(asset('uploads/site/'.settings('site_logo'))); ?>) no-repeat">
			      </div> -->
			      <div class="info"> 
			        <h2>
			        	<b><?php echo e(settings('site_name')); ?></b>
			        </h2>
			        <p> 
			            <?php echo e(trans('core.address')); ?>: 
			            <?php echo e(settings('address')); ?>

			            <br>
			            <?php echo e(trans('core.email')); ?>: 
			            <?php echo e(settings('email')); ?>

			            <br>
			            <?php echo e(trans('core.phone')); ?>: 
			            <?php echo e(settings('phone')); ?>

			            <br><br>
			        </p>
			      </div><!--End Info-->
			    </center>

			    <div class="row ref">
			    	<div class="col-md-12">
			    		<?php echo e(trans('core.invoice_no')); ?>:
			    		<?php echo e($transaction->reference_no); ?>

			    	</div>
			    	<div class="col-md-12">
			    		<?php echo e(trans('core.date')); ?>:
			    		<?php echo e(carbonDate($transaction->created_at, '')); ?>

			    	</div>
			    	<div class="col-md-12">
			    		<?php echo e(trans('core.biller')); ?>:
			    		<?php echo e(Auth::user()->name); ?>

			    	</div>
			    </div>
			</div>
			<!--End InvoiceTop-->
		      
	    
	    	<div id="bot">
				<div id="table">
					<table class="table table-bordered">
						<tr class="tabletitle" >
							<td>
								<span class="table-header">Item</span>
							</td>
							<td>
								<span class="table-header">Qty</span>
							</td>
							<td>
								<span class="table-header">Price</span>
							</td>
							<td>
								<span class="table-header">Sub Total</span>
							</td>
						</tr>

						<?php $__currentLoopData = $transaction->sells; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sell): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<tr class="service">
							<td class="tableitem">
								<p class="itemtext"><?php echo e($sell->product->name); ?></p>
							</td>
							<td class="tableitem">
								<p class="itemtext"><?php echo e($sell->quantity); ?></p>
							</td>
							<td class="tableitem">
								<p class="itemtext">
									<?php if($sell->quantity > 0): ?>
										<?php echo e($sell->sub_total / $sell->quantity); ?>

									<?php else: ?>
										0
									<?php endif; ?>
								</p>
							</td>
							<td class="tableitem">
								<p class="itemtext">
									<!-- <?php echo e(settings('currency_code')); ?> -->
									<?php echo e($sell->sub_total); ?>

								</p>
							</td>
						</tr>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

						<tr class="tabletitle">
							<td class="Rate text-right" colspan="3">
								<span class="table-footer"><?php echo e(trans('core.total')); ?>: &nbsp;&nbsp;</span class="table-footer">
							</td>
							<td class="payment">
								<span class="table-footer">
									<!-- <?php echo e(settings('currency_code')); ?> -->
									<?php echo e($transaction->total + $transaction->discount); ?>

								</span class="table-footer">
							</td>
						</tr>

						<tr class="tabletitle">
							<td class="Rate text-right" colspan="3">
								<span class="table-footer"><?php echo e(trans('core.discount')); ?>: &nbsp;&nbsp;</span class="table-footer">
							</td>
							<td class="payment">
								<span class="table-footer">
									<!-- <?php echo e(settings('currency_code')); ?> -->
									<?php echo e($transaction->discount); ?>

								</span class="table-footer">
							</td>
						</tr>

						<?php if($transaction->total_tax > 0): ?>
						<tr class="tabletitle">
							<td class="Rate text-right" colspan="3">
								<span class="table-footer"><?php echo e(trans('core.vat')); ?>: &nbsp;&nbsp;</span class="table-footer">
							</td>
							<td class="payment">
								<span class="table-footer">
									<!-- <?php echo e(settings('currency_code')); ?> -->
									<?php echo e($transaction->net_total); ?>

								</span class="table-footer">
							</td>
						</tr>
						<?php endif; ?>

						<tr class="tabletitle">
							<td class="Rate text-right" colspan="3">
								<span class="table-footer"><?php echo e(trans('core.net_total')); ?>: &nbsp;&nbsp;</span class="table-footer">
							</td>
							<td class="payment">
								<span class="table-footer">
									<!-- <?php echo e(settings('currency_code')); ?> -->
									<?php echo e($transaction->net_total); ?>

								</span class="table-footer">
							</td>
						</tr>

						<tr class="tabletitle">
							<td class="Rate text-right" colspan="3">
								<span class="table-footer"><?php echo e(trans('core.paid')); ?>: &nbsp;&nbsp;</span class="table-footer">
							</td>
							<td class="payment">
								<span class="table-footer">
									<!-- <?php echo e(settings('currency_code')); ?> -->
									<?php echo e($transaction->paid + $transaction->change_amount); ?>

								</span class="table-footer">
							</td>
						</tr>

						<?php if($transaction->change_amount > 0): ?>
						<tr class="tabletitle">
							<td class="Rate text-right" colspan="3">
								<span class="table-footer"><?php echo e(trans('core.change_amount')); ?>: &nbsp;&nbsp;</span class="table-footer">
							</td>
							<td class="payment">
								<span class="table-footer">
									<!-- <?php echo e(settings('currency_code')); ?> -->
									<?php echo e($transaction->change_amount); ?>

								</span class="table-footer">
							</td>
						</tr>
						<?php endif; ?>

					</table>
				</div><!--End Table-->

				<div id="legalcopy" style="padding-bottom: 10px;">
					<span class="table-footer">
						<strong>Thank you for shopping!</strong>  
						<br>
						 <?php echo e(settings('pos_invoice_footer_text')); ?>

					</span>
				</div>

			</div><!--End InvoiceBot-->

			<div style="text-align: center;  font-size: 10px; color: black;">
				A Software By Intelle Hub Inc.
				<br>
				+880 1674871091, info@intelle-hub.com
			</div>
	  	</div><!--End Invoice-->
  	</div> <!--Printable Div Ends-->

  	<div class="invoice-pos-footer">
  		<div class="row">
  			<div class="col-md-6">
  				<a class="btn btn-success btn-block" onclick="printDiv('printableArea')" >
  					<?php echo e(trans('core.print')); ?>

  					<i class="fa fa-print"></i>
  				</a>
  			</div>

  			<div class="col-md-6">
  				<a class="btn btn-danger btn-block" href="<?php echo e(route('sell.pos')); ?>">
  					<i class="fa fa-backward"></i>
  					<?php echo e(trans('core.back')); ?>

  				</a>
  			</div>
  		</div>
  	</div>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('js'); ?>
	##parent-placeholder-93f8bb0eb2c659b85694486c41717eaf0fe23cd4##
	<script>
		function printDiv(divName) {
            var printContents = document.getElementById(divName).innerHTML;
            var originalContents = document.body.innerHTML;
            document.body.innerHTML = printContents;
            window.print();
            document.body.innerHTML = originalContents;
        }
	</script>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.pos', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>