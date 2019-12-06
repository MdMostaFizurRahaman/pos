<?php $__env->startSection('title'); ?>
  Upload Bulk Product
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contentheader'); ?>
  Upload Bulk Product
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
  <a href="<?php echo e(route('product.index')); ?>">Products</a>
  <li>Upload Bulk Product</li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('main-content'); ?>
	<div class="panel-body">
		<h3 class="title-hero">
			Upload Bulk Product By Excel
		</h3>

		<div class="example-box-wrapper"> 
			<form class="form-horizontal bordered-row" method="post" files='true' enctype="multipart/form-data" id="ism_form">
				<?php echo e(csrf_field()); ?>


				<div class="form-group">
		          <label class="col-md-offset-2 col-sm-2 control-label">
		          	Select a category
		          	<span class="required">*</span>
		          </label>
		          <div class="col-sm-5">
		            <?php echo Form::select('category_id', $categories, null, ['class' => 'form-control selectpicker', 'placeholder' => 'Please select a category', 'data-live-search' => "true"]); ?>

		          </div>
		        </div>

				<div class="form-group">
		          <label class="col-md-offset-2 col-sm-2 control-label">Upload Excel</label>
		          <div class="col-sm-5">
		            <input type="file" name="excel">
		            <small>
						<a href="<?php echo e(asset('/templates/Bulk_Product_Upload_Template.xlsx')); ?>" download>
							Download sample excel file by clicking here.
						</a>
					</small>
		          </div>
		        </div>
	
			    <div class="bg-default content-box text-center pad20A mrg25T">
	                <input type="submit" class="btn btn-lg btn-primary" id="submitButton" value="<?php echo e(trans('core.save')); ?>" onclick="submitted()">
	            </div>
			</form>
		</div>
	</div>


<?php $__env->stopSection(); ?>


<?php $__env->startSection('js'); ?>
    ##parent-placeholder-93f8bb0eb2c659b85694486c41717eaf0fe23cd4##


<?php $__env->stopSection(); ?>
<?php echo $__env->make('app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>