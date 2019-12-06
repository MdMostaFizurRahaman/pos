<?php $__env->startSection('contentheader'); ?>
	<?php echo e(trans('core.report_product')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
	<?php echo e(trans('core.report_product')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('main-content'); ?>           
	<div class="panel-heading">
		<a href="#" class="btn btn-border btn-alt border-orange font-orange btn-xs " onclick="printDiv('printableArea')" >
			<i class="fa fa-print"></i>
			<?php echo e(trans('core.print')); ?>

		</a>
	</div>

	<div id="printableArea" class="panel-body">
		<h4 class="text-center">	
			<b><?php echo e(trans('core.report_product')); ?>:</b>
		 	<?php echo e(carbonDate($from, 'y-m-d')); ?> 
		 	<b><?php echo e(trans('core.to')); ?></b> 
		 	<?php echo e(carbonDate($to, 'y-m-d')); ?>

		 	<br>
		 	<b><?php echo e(trans('core.warehouse')); ?>: </b><?php echo e($warehouse_name); ?>

		 </h4>

		 <br />

		<table class="table table-bordered" width="100%">	
			<thead  class="table-header-color">
				<th class="text-center"><?php echo e(trans('core.product')); ?></th>
				<th class="text-center"><?php echo e(trans('core.purchase')); ?></th>
				<th class="text-center"><?php echo e(trans('core.sell')); ?></th>
				<th class="text-center"><?php echo e(trans('core.stock')); ?></th>
				<th class="text-center"><?php echo e(trans('core.profit')); ?></th>
			</thead>

			<?php $__currentLoopData = $total; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $items): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<tr>
					<?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<td class="text-center">
							<?php echo e($item); ?>								
						</td>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</tr>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>		
		</table>

		<table style="width: 60%; font-weight: bold;" align="right" class="table table-bordered visible-lg" >
			<tr style="background-color: #F8F9F9;border: 2px solid #ddd;">
				<td width="50%">
					<?php echo e(trans('core.total_profit')); ?> *
				</td>
				<td style="text-align: center;font-weight: bold; ">
					<?php echo e(settings('currency_code')); ?>

					<?php echo e(twoPlaceDecimal($total_profit)); ?>

				</td>
			</tr>
			
		</table>

	</div> <!--Printable area-->

	<div class="panel-footer">
		<span style="padding: 10px;">
        
        </span>

		<a class="btn btn-border btn-alt border-black font-black btn-xs pull-right" href="<?php echo e(route('report.index')); ?>">
	        <i class="fa fa-backward"></i> 
	        <?php echo e(trans('core.back')); ?>

	    </a>
	</div>
	
	<div class="pull-right visible-lg">
		<small>
		<b>*Note:</b> <?php echo e(trans('core.total_profit')); ?> = <?php echo e(trans('core.selling_goods_total_price')); ?> - <?php echo e(trans('core.selling_goods_total_cost_price')); ?> 
		<?php echo e((trans('core.excluding_tax'))); ?>

		</small>
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
<?php echo $__env->make('app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>