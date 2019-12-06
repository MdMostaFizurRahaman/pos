<?php $__env->startSection('contentheader'); ?>
	<?php echo e(trans('core.warehouse')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
	<?php echo e(trans('core.warehouse')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('main-content'); ?>

<div class="panel-heading">
	<?php if(auth()->user()->can('branch.create')): ?>
		<a href="<?php echo e(route('warehouse.new')); ?>" class="btn btn-success btn-alt btn-xs">
			<i class='fa fa-plus'></i> 
			<?php echo e(trans('core.add_new_warehouse')); ?>

		</a>
	<?php endif; ?>
</div>

<div class="panel-body">
	<div class="table-responsive">
		<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered">
			<thead class="<?php echo e(settings('theme')); ?>">
				<td class="text-center font-white">#</td>
				<td class="text-center font-white"><?php echo e(trans('core.name')); ?></td>
				<td class="text-center font-white"><?php echo e(trans('core.address')); ?></td>
				<td class="text-center font-white"><?php echo e(trans('core.phone')); ?></td>
				<td class="text-center font-white"><?php echo e(trans('core.in-charge-name')); ?></td>
				<td class="text-center font-white"><?php echo e(trans('core.actions')); ?></td>
			</thead>

			<tbody>
				<?php $__currentLoopData = $warehouses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $warehouse): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<tr>
						<td class="text-center"><?php echo e($loop->iteration); ?></td>
						<td class="text-center"><?php echo e($warehouse->name); ?></td>
						<td class="text-center">
							<?php if($warehouse->address): ?>
								<?php echo e($warehouse->address); ?>

							<?php else: ?>
								-
							<?php endif; ?>
						</td>
						<td class="text-center">
							<?php if($warehouse->phone): ?>
								<?php echo e($warehouse->phone); ?>

							<?php else: ?>
								-
							<?php endif; ?>
						</td>

						<td class="text-center">
							<?php if($warehouse->in_charge_name): ?>
								<?php echo e($warehouse->in_charge_name); ?>

							<?php else: ?>
								-
							<?php endif; ?>
						</td>

						<td class="text-center">
							<?php if(auth()->user()->can('branch.create')): ?>
								<a href="<?php echo e(route('warehouse.edit',$warehouse)); ?>" class="btn btn-info btn-alt btn-xs">
									<i class="fa fa-edit"></i>
									<?php echo e(trans('core.edit')); ?>

								</a>
								<!-- Delete modal trigger -->
								<a type="button" class="btn btn-danger btn-alt btn-xs" data-toggle="modal" data-target="#deleteModal<?php echo e($warehouse->id); ?>">
									<i class="fa fa-trash"></i>
								 	<?php echo e(trans('core.delete')); ?>

								</a>
							<?php endif; ?>
						</td>
					</tr>

					<!-- Modal -->
					<div class="modal fade" id="deleteModal<?php echo e($warehouse->id); ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
						<?php echo Form::open(['route' => ['warehouse.delete', $warehouse], 'method' => 'delete' ]); ?>

					  <div class="modal-dialog" role="document">
					    <div class="modal-content">
					      <div class="modal-header">
					        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					        <h4 class="modal-title" id="myModalLabel">
					  			<?php echo e($warehouse->name); ?>

					        </h4>
					      </div>
					      <div class="modal-body">
					        <h4>
					        	Are you sure to delete this <b><?php echo e($warehouse->name); ?></b>?
					        </h4>
					      </div>
					      <div class="modal-footer">
					        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					        <button type="submit" class="btn btn-danger">
					        	<?php echo e(trans('core.delete')); ?>

					        </button>
					      </div>
					    </div>
					  </div>
					  <?php echo Form::close(); ?>

					</div>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			</tbody>
		</table>
	</div>
	
	<!--Pagination-->
	<div class="pull-right">
		<?php echo e($warehouses->links()); ?>

	</div>
	<!--Ends-->
</div>


<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
	##parent-placeholder-93f8bb0eb2c659b85694486c41717eaf0fe23cd4##
	<script>
		
	</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>