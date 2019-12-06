<?php $__env->startSection('contentheader'); ?>
	<?php echo e(trans('core.role_index')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
	<?php echo e(trans('core.role_index')); ?>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('main-content'); ?>
	
	<div class="panel-heading">
		<?php if(auth()->user()->can('acl.manage')): ?>
			<a type="button" class="btn btn-success btn-xs " data-toggle="modal" data-target="#myModal">
			   <i class="fa fa-plus"></i> 
			   <?php echo e(trans('core.add_new_role')); ?>

			</a>
		<?php endif; ?>
	</div>

	<div class="panel-body">
		<table class="table table-hover table-bordered" >
			<thead class="table-header-color">
				<td class="text-center"><?php echo e(trans('core.role')); ?></td>
				<td class="text-center"><?php echo e(trans('core.actions')); ?></td>
			</thead>

			<tbody>
				<?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<tr>
						<td class="text-center"><?php echo e($role->name); ?></td>
						<td class="text-center">
							<!-- <a href="#" class="btn btn-primary btn-xs">
								<i class="fa fa-edit"></i>
								<?php echo e(trans('core.edit')); ?>

							</a> -->

							<!-- Set permission for role -->
							<?php if(auth()->user()->can('acl.set')): ?>
								<a href="<?php echo e(route('role.permission', $role->id)); ?>" class="btn btn-info btn-xs">
									<i class="fa fa-user-secret"></i>
									<?php echo e(trans('core.set_permission')); ?>

								</a>
							<?php endif; ?>
							<!-- ends -->

						</td>
					</tr>
					<!-- Modal for delete role-->
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			</tbody>
		</table>
		<!-- Table Ends -->
	</div>
	<!-- Modal for create role-->
	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<?php echo Form::open(['method' => 'post', 'class' => 'form-horizontal']); ?>

	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title" id="myModalLabel">
	        	<?php echo e(trans('core.add_new_role')); ?>

	        </h4>
	      </div>
	      <div class="modal-body">
	        <div class="form-group">
            	<div class="col-md-1">
                	<label><?php echo e(trans('core.role')); ?></label>
                </div>
                <div class="col-sm-11">
                    <input type="text" class="form-control" name="role_name" required>
                </div>
            </div>
	      </div>
	      <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">
            	<?php echo e(trans('core.close')); ?>

            </button>
            <?php echo Form::submit('Save', ['class' => 'btn btn-primary', 'data-disable-with' => 'Saving']); ?>

          </div>
        <?php echo Form::close(); ?>

	    </div>
	  </div>
	</div>
	<!--Modal Ends-->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>