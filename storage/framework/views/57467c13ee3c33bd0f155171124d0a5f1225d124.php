<?php $__env->startSection('contentheader'); ?>
	<?php if($subcategory->id): ?>
		<?php echo e(trans('core.editing')); ?> <b><?php echo e($subcategory->name); ?></b>
	<?php else: ?>
		<?php echo e(trans('core.add_new_subcategory')); ?>

	<?php endif; ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
	<a href="<?php echo e(route('subcategory.index')); ?>"><?php echo e(trans('core.subcategory_index')); ?></a>
	<li>
		<?php if($subcategory->id): ?>
			<?php echo e(trans('core.editing')); ?> <?php echo e($subcategory->name); ?>

		<?php else: ?>
			<?php echo e(trans('core.add_new_subcategory')); ?>

		<?php endif; ?>
	</li>
	
<?php $__env->stopSection(); ?>


<?php $__env->startSection('main-content'); ?>

	<div class="panel-body">

	    <h3 class="title-hero">
			<?php if($subcategory->id): ?>
				<?php echo e(trans('core.editing')); ?> <?php echo e($subcategory->name); ?>

			<?php else: ?>
				<?php echo e(trans('core.add_new_subcategory')); ?>

			<?php endif; ?>
	    </h3>

		<?php echo Form::model($subcategory,['method' => 'post', 'files' => true, 'class' => 'form-horizontal bordered-row', 'id' => 'ism_form']); ?>

			<div class="form-group">		
				<label class="col-sm-3 control-label"> 
					<?php echo e(trans('core.subcategory_name')); ?>  
					<span class="required">*</span>
				</label>
				<div class="col-sm-6"> 
					<?php echo Form::text('name', $subcategory->name, ['class' => 'form-control']); ?>

				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label" title="<?php echo e(trans('core.category_info')); ?>">
					<?php echo e(trans('core.category_name')); ?>

					<span class="required">*</span>
				</label>
				
				<div class="col-sm-6"> 
					<?php echo Form::select('category_id', $category, null, ['class' => 'form-control selectpicker', 'title' => 'Please select a category', 'data-live-search' => 'true']); ?>

				</div>
			</div>

			<div class="bg-default content-box text-center pad20A mrg25T">
            	<input type="submit" class="btn btn-lg btn-primary" id="submitButton" value="<?php echo e(trans('core.save')); ?>" onclick="submitted()">
        	</div>

		<?php echo Form::close(); ?>

	</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>