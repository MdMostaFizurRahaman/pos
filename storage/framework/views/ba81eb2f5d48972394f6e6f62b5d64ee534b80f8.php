<?php $__env->startSection('contentheader'); ?>
	<?php echo e(trans('core.subcategory')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
	<?php echo e(trans('core.subcategory_index')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('main-content'); ?>

	<div class="panel-heading">
		<?php if(auth()->user()->can('category.create')): ?>
			<a href="<?php echo e(route('subcategory.new')); ?>" class="btn btn-success btn-alt btn-xs" style="border-radius: 0px !important;">
				<i class='fa fa-plus'></i> 
				<?php echo e(trans('core.add_new_subcategory')); ?>

			</a>
		<?php endif; ?>

		<?php if(count(Request::input())): ?>
			<span class="pull-right">	
	            <a class="btn btn-alt btn-default font-black btn-xs" href="<?php echo e(action('SubcategoryController@getIndex')); ?>">
	            	<i class="fa fa-eraser"></i> 
	            	<?php echo e(trans('core.clear')); ?>

	            </a>

	            <a class="btn btn-primary btn-alt btn-xs" id="searchButton">
	            	<i class="fa fa-search"></i> 
	            	<?php echo e(trans('core.modify_search')); ?>

	            </a>
	        </span>
	    <?php else: ?>
	        <a class="btn btn-primary btn-alt btn-xs pull-right" id="searchButton">
				<i class="fa fa-search"></i> 
				<?php echo e(trans('core.search')); ?>

			</a>
	    <?php endif; ?>
	</div>

	<div class="panel-body">
		<div class="table-responsive" style="min-height: 300px;">
			<table class="table table-bordered table-striped">
				<thead class="<?php echo e(settings('theme')); ?>">
					<td class="text-center font-white">#</td>
					<td class="text-center font-white"><?php echo e(trans('core.name')); ?></td>
					<td class="text-center font-white"><?php echo e(trans('core.category')); ?></td>
					<td class="text-center font-white"><?php echo e(trans('core.actions')); ?></td>
				</thead>

				<tbody>
					<?php $__currentLoopData = $subcategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subcategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<tr>
							<td class="text-center"><?php echo e($loop->iteration); ?></td>
							<td class="text-center"><?php echo e($subcategory->name); ?></td>
							<td class="text-center"><?php echo e($subcategory->category->category_name); ?></td>
							<td class="text-center">
								<?php if(auth()->user()->can('category.manage')): ?>
									<a href="<?php echo e(route('subcategory.edit',$subcategory)); ?>" class="btn btn-info btn-alt btn-xs">
										<i class="fa fa-edit"></i>
										<?php echo e(trans('core.edit')); ?>

									</a>
									<!-- Delete modal trigger -->
									<a type="button" class="btn btn-danger btn-alt btn-xs" data-toggle="modal" data-target="#deleteModal<?php echo e($subcategory->id); ?>">
										<i class="fa fa-trash"></i>
									  <?php echo e(trans('core.delete')); ?>

									</a>
								<?php endif; ?>

								<a href="<?php echo e(route('subcategory.products', $subcategory)); ?>" class="btn btn-purple btn-alt btn-xs">
									<i class="fa fa-cube"></i>
									<?php echo e(trans('core.product')); ?>

								</a>
							</td>
						</tr>

						<!-- Modal -->
						<div class="modal fade" id="deleteModal<?php echo e($subcategory->id); ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
							<?php echo Form::open(['route' => ['subcategory.delete', $subcategory], 'method' => 'delete' ]); ?>

						  <div class="modal-dialog" role="document">
						    <div class="modal-content">
						      <div class="modal-header">
						        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						        <h4 class="modal-title" id="myModalLabel">
						        	<span style="color:red;">
						        		<?php echo e($subcategory->name); ?> has total <?php echo e(count($subcategory->products)); ?> product(s)
						        	</span>
						        </h4>
						      </div>
						      <div class="modal-body">
						        <h4>
						        	<?php echo e(trans('core.delete_alert')); ?> <b><?php echo e($subcategory->name); ?></b> <?php echo e(trans('core.subcategory')); ?>?
						        </h4>
						      </div>
						      <div class="modal-footer">
						        <button type="button" class="btn btn-default" data-dismiss="modal">		<?php echo e(trans('core.close')); ?>

						        </button>
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
			<?php echo e($subcategories->links()); ?>

		</div>
		<!--Ends-->
	</div>

	<!-- Subcategory search modal -->
    <div class="modal fade" id="searchModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <?php echo Form::open(['class' => 'form-horizontal']); ?>

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title"> <?php echo e(trans('core.search').' '.trans('core.subcategory')); ?></h4>
                </div>

                <div class="modal-body">                  
                    <div class="form-group">
                        <?php echo Form::label('Name', trans('core.name'), ['class' => 'col-sm-3']); ?>

                        <div class="col-sm-9">
                            <?php echo Form::text('name', Request::get('name'), ['class' => 'form-control']); ?>

                        </div>
                    </div>                                             
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo e(trans('core.close')); ?></button>
                    <?php echo Form::submit('Search', ['class' => 'btn btn-primary', 'data-disable-with' => trans('core.searching')]); ?>

                </div>
                <?php echo Form::close(); ?>

            </div>
        </div>
    </div>
    <!-- search modal ends -->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
	##parent-placeholder-93f8bb0eb2c659b85694486c41717eaf0fe23cd4##
	<script>
		$(function() {
            $('#searchButton').click(function(event) {
                event.preventDefault();
                $('#searchModal').modal('show')
            });
        })
	</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>