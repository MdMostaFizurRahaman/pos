<?php $__env->startSection('breadcrumb'); ?>
	<a href="<?php echo e(route('category.index')); ?>"><?php echo e(trans('core.category_index')); ?></a>
	<li>
		<?php if($category->id): ?>
			<?php echo e(trans('core.editing')); ?> <?php echo e($category->category_name); ?>

		<?php else: ?>
			<?php echo e(trans('core.add_new_category')); ?>

		<?php endif; ?>
	</li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('main-content'); ?>
	<div class="panel-body">
	    <h3 class="title-hero">
			<?php if($category->id): ?>
				<?php echo e(trans('core.editing')); ?> 
				<?php echo e($category->category_name); ?>

			<?php else: ?>
				<?php echo e(trans('core.add_new_category')); ?>

			<?php endif; ?>
	    </h3>
	    <div class="example-box-wrapper">
			<?php echo Form::model($category,['method' => 'post', 'files' => true, 'class' => 'form-horizontal bordered-row', 'id' => 'ism_form']); ?>


				<div class="form-group">
					<label class="col-sm-3 control-label"><?php echo e(trans('core.category_name')); ?></label>
					<span class="required">*</span>
					<div class="col-sm-6">
						<?php echo Form::text('name', $category->category_name, ['class' => 'form-control']); ?>

					</div>
				</div>

			    <div class="bg-default content-box text-center pad20A mrg25T">
                    <input class="btn btn-lg btn-primary" type="submit" id="submitButton" value="<?php echo e(trans('core.save')); ?>" onclick="submitted()">
                </div>
			<?php echo Form::close(); ?>

		</div>
	</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
	##parent-placeholder-93f8bb0eb2c659b85694486c41717eaf0fe23cd4##
	
<?php $__env->stopSection(); ?>
<?php echo $__env->make('app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>