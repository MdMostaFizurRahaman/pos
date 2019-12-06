<?php $__env->startSection('title'); ?>
	<?php if($product->id): ?>
		<?php echo e(trans('core.editing')); ?> <?php echo e($product->name); ?>

	<?php else: ?>
		<?php echo e(trans('core.add_new_product')); ?>

	<?php endif; ?>
	|| ##parent-placeholder-3c6de1b7dd91465d437ef415f94f36afc1fbc8a8##
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contentheader'); ?>
	<?php if($product->id): ?>
		<?php echo e(trans('core.editing')); ?> <b><?php echo e($product->name); ?></b>
	<?php else: ?>
		<?php echo e(trans('core.add_new_product')); ?>

	<?php endif; ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
	<a href="<?php echo e(route('product.index')); ?>"><?php echo e(trans('core.product_list')); ?></a>
	<li>
		<?php if($product->id): ?>
			<?php echo e(trans('core.editing')); ?> <?php echo e($product->name); ?>

		<?php else: ?>
			<?php echo e(trans('core.add_new_product')); ?>

		<?php endif; ?>
	</li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('main-content'); ?>

	<div class="panel-body">
		<h3 class="title-hero">
			<?php if($product->id): ?>
				<?php echo e(trans('core.editing')); ?> <?php echo e($product->name); ?>

			<?php else: ?>
				<?php echo e(trans('core.add_new_product')); ?>

			<?php endif; ?>
		</h3>

		<div class="example-box-wrapper"> 
		<?php echo Form::model($product,['method' => 'post', 'files' => true, 'class' => 'form-horizontal bordered-row', 'id' => 'ism_form']); ?>

				<div class="form-group">					
					<label class="col-sm-2 control-label"> 
						<?php echo e(trans('core.product_name')); ?>

						<span class="required">*</span>
					</label>
						
					<div class="col-sm-4"> 
						<?php echo Form::text('name', $product->name, ['class' => 'form-control', 'id' => 'productName']); ?>

					</div>

					<label class="col-sm-2 control-label"> 
						<?php echo e(trans('core.product_code')); ?> 
						<span class="required">*</span>
					</label>
					<div class="col-md-3">		
						<?php echo Form::text('code', $product->code, ['class' => 'form-control', 'id' => 'code']); ?>

					</div>

					<button 
						class="btn btn-info col-sm-1 tooltip-button" 
						type="button" 
						onclick="document.getElementById('code').value = generateCode()" 
						title="Click here to generate random code"
						> 
						<i class="fa fa-random"></i> 
					</button>

				</div>

				<div class="form-group">
					<label class="col-sm-2 control-label"> <?php echo e(trans('core.category_name')); ?> <span class="required">*</span></label>
					<div class="col-sm-4">
						<?php echo Form::select('category_id', $categories, $product->category_id, ['class' => 'form-control selectpicker', 'id' => 'category_id', 'placeholder' => 'Please select a category', 'data-live-search' => "true"]); ?>

					</div>

					<label class="col-sm-2 control-label"> 
						<?php echo e(trans('core.subcategory_name')); ?>

					</label>
					<div class="col-sm-4">		
						<?php echo Form::select('subcategory_id', $subcategories, $product->subcategory_id, ['class' => 'form-control selectpickerLive', 'placeholder' => 'Please select a Subcategory', 'data-live-search' => "true", 'id' => 'subcategoryOptions']); ?>

					</div>
				</div>

				<div class="form-group">
					<label class="col-sm-2 control-label"> 
						<?php echo e(trans('core.cost_price')); ?>

						<span class="required">*</span>
					</label>
					<div class="col-sm-4">
						<?php echo Form::text('cost_price', $product->cost_price, ['class' => 'form-control number']); ?>

					</div>

					<label class="col-sm-2 control-label"> 
						<?php echo e(trans('core.mrp')); ?>

						<span class="required">*</span>
					</label>
					<div class="col-sm-4">
						<?php echo Form::text('mrp', $product->mrp, ['class' => 'form-control number']); ?>

					</div>
				</div>

				<div class="form-group">
					<label class="col-sm-2 control-label" > 
						<?php echo e(trans('core.minimum_retails_price')); ?>

					</label>
					<div class="col-sm-4">
						<?php echo Form::text('minimum_retail_price', $product->minimum_retail_price, ['class' => 'form-control popover-button-default number', 'data-content' => 'Show this value when new sell only, no effect to any transaction', 'data-placement' => 'bottom', 'data-trigger' => 'focus']); ?>

					</div>

					<?php if(settings('product_tax') == 1): ?>
						<label class="col-sm-2 control-label"> 
							<?php echo e(trans('core.product_tax')); ?> 
						</label>

						<div class="col-sm-4">
						<?php echo Form::select('tax_id', $taxes, null, ['class' => 'form-control selectpicker']); ?>

						</div>

					<?php else: ?>
						<label class="col-sm-2 control-label"> 
							<?php echo e(trans('core.product_tax')); ?> 
						</label>

						<div class="col-sm-4 tooltip-button" title="To enable product tax, go to the settings">
							<input type="text" disabled class="form-control" value="disabled">
						</div>

					<?php endif; ?>
				</div>
				

				<div class="form-group">
					<label class="col-sm-2 control-label"> <?php echo e(trans('core.unit')); ?> </label>
					<div class="col-sm-4">
						<?php echo Form::text('unit', $product->unit, ['class' => 'form-control']); ?>

					</div>

					<label for="featured" class="col-sm-2 control-label">
						Status
					</label>
					<div class="col-sm-4 tooltip-button" title="Only active products shows in new sell & purchases">		
						<?php echo Form::select('status', [1 => 'Active', 0=> 'Inactive'],$product->status, ['class' => 'form-control selectpickerLive', 'data-live-search' => "true"]); ?>

					</div>

					
				</div>

				<div class="form-group">
					<label class="col-sm-2 control-label"> <?php echo e(trans('core.description')); ?> </label>
					<div class="col-sm-10">
						<?php echo Form::textarea('details', $product->product_details, ['class' => 'form-control', 'rows'=>3]); ?>

					</div>
				</div>

				<div class="form-group">
					<label class="col-sm-2 control-label tooltip-button" title="Opening stock is the value of goods available for sale in the beginning of an accounting period"> 
						<?php echo e(trans('core.opening_stocks')); ?>

					</label>
					<div class="col-sm-10">
						<?php echo Form::text('opening_stock', $product->opening_stock, ['class' => 'form-control number']); ?>

					</div>
				</div>

				<div class="form-group">
	                <label class="col-sm-2 control-label">
	                	<?php echo e(trans('core.image')); ?>

	                </label>
	                <div class="col-sm-4">
	                    <?php echo Form::file('image'); ?>

	                </div>

	                <?php if(!empty($product->image)): ?>
		                <div class="col-sm-3" >
			                <p>
			                    <a href="<?php echo e(url('uploads/products/' . $product->image)); ?>">
			                        <abbr title="Show Product Image">
			                            <img src="<?php echo asset('uploads/products/'. $product->image); ?>" 
			                                class="img-thumbnail img-responsive" alt="" >
			                        </abbr>
			                    </a>
			                </p>
						</div>
					<?php endif; ?>
	            </div>
			</div>
	
		    <div class="bg-default content-box text-center pad20A mrg25T">
                <input type="submit" class="btn btn-lg btn-primary" id="submitButton" value="<?php echo e(trans('core.save')); ?>" onclick="submitted()">
            </div>
		<?php echo Form::close(); ?>

	</div>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('js'); ?>
    ##parent-placeholder-93f8bb0eb2c659b85694486c41717eaf0fe23cd4##
     <script type="text/javascript">
        $(document).ready(function(){
            $('#category_id').on('change',function(){
            	$('#subcategoryOptions').html('');
                var categoryID = $(this).val();
                if(categoryID){
                    $.ajax({
                        type:'get',
                        url:'ajaxData',
                        data:'categoryID='+categoryID,
                        success:function(html){
                            $('#subcategoryOptions').html(html);
                        }
                    }); 
                }
            });
        });

        /*generate random product code*/
        var productName = document.getElementById('productName');
        var randomNumber;
		productName.onkeyup = function(){
		    randomNumber = productName.value.toUpperCase();
		}

        function generateCode() {
    		if(randomNumber){
    			return randomNumber.substring(0, 2) + (Math.floor(Math.random()*1000)+ 999);
    		}else{
    			return Math.floor(Math.random()*90000) + 100000;
    		}	
		}
		/*ends*/

		$(function() {
          $('.number').on('input', function() {
            match = (/(\d{0,100})[^.]*((?:\.\d{0,5})?)/g).exec(this.value.replace(/[^\d.]/g, ''));
            this.value = match[1] + match[2];
          });
        });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>