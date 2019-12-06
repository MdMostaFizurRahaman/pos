<?php $__env->startSection('title'); ?>
	<?php echo e(trans('core.product_index')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('contentheader'); ?>
	<?php echo e(trans('core.product_index')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
	<?php echo e(trans('core.product_index')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('main-content'); ?>
	<div class="panel-heading">
		<?php if(auth()->user()->can('product.create')): ?> 
			<a href="<?php echo e(route('product.new')); ?>" class="btn btn-success btn-alt btn-xs" style="border-radius: 0px !important;">
				<i class='fa fa-plus'></i> 
				<?php echo e(trans('core.add_new_product')); ?>

			</a>
		<?php endif; ?>


		<?php if(count(Request::input())): ?>
			<span class="pull-right">	
	            <a class="btn btn-alt btn-default font-black btn-xs" href="<?php echo e(action('ProductController@getIndex')); ?>">
	            	<i class="fa fa-eraser"></i> 
	            	<?php echo e(trans('core.clear')); ?>

	            </a>

	            <a class="btn btn-primary btn-alt btn-xs" id="searchButton">
	            	<i class="fa fa-search"></i> 
	            	<?php echo e(trans('core.modify_search')); ?>

	            </a>
	        </span>
        <?php else: ?>
	        <span class="pull-right">	
	        	<!-- <div class="btn-group" >
	              <button type="button" class="btn btn-warning btn-alt btn-xs dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	                <?php echo e(trans('core.download')); ?> <span class="caret"></span>
	              </button>
	              <ul class="dropdown-menu ">
	                <li>
	                    <a href="<?php echo e(route('product.export.excel')); ?>" title="Export Excel" >
							<i class="fa fa-file-excel-o" style="color: #12a823;"></i>
							<?php echo e(trans('core.download_excel')); ?>

						</a>
	                </li>
	              </ul>
	            </div> -->

	            <a class="btn btn-primary btn-alt btn-xs " id="searchButton">
	            	<i class="fa fa-search"></i> 
	            	<?php echo e(trans('core.search')); ?>

	            </a>
	        </span>
        <?php endif; ?>
	</div>

	<div class="panel-body">
		<div class="table-responsive" style="min-height: 300px;">
			<table class="table table-bordered table-striped">
				<thead class="<?php echo e(settings('theme')); ?>">
					<td class="text-center font-white"># &nbsp;&nbsp;</td>
					<td class="text-center font-white"><?php echo e(trans('core.name')); ?></td>
					<td class="text-center font-white"><?php echo e(trans('core.in_stock')); ?></td>
					<td class="text-center font-white"><?php echo e(trans('core.actions')); ?></td>
				</thead>

				<tbody >
					<?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<tr>
							<td class="text-center"><?php echo e($loop->iteration); ?></td>
							<td class="text-center">
								<?php echo e($product->name); ?>

								(<?php echo e($product->code); ?>)
							</td>						
							<td class="text-center">
								<?php if($product->quantity): ?>
									<?php echo e($product->quantity); ?> <?php echo e($product->unit); ?>

								<?php else: ?>
									0
								<?php endif; ?>
							</td>

							<td class="text-center">
                                <div class="btn-group">
                                  <button type="button" class="btn btn-info btn-alt btn-xs dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <?php echo e(trans('core.actions')); ?> <span class="caret"></span>
                                  </button>
                                  <ul class="dropdown-menu pull-right">
                                    <?php if(auth()->user()->can('product.manage')): ?>
                                    <li>
                                        <a href="<?php echo e(route('product.edit', $product)); ?>" title="Edit" >
											<i class="fa fa-edit" style="color: #069996;"></i>
											<?php echo e(trans('core.edit')); ?>

										</a>
                                    </li>

                                    <li>
                                        <a href="#" data-toggle="modal" data-target="#priceUpdate<?php echo e($product->id); ?>">
                                        <i class="fa fa-usd" style="color: #0ad629;"></i>
							    		<?php echo e(trans('core.update_price')); ?>

							    		</a>
                                    </li>

                                    <!-- product delete modal trigger -->
                                    <li>
										<a data-toggle="modal" data-target="#deleteModal<?php echo e($product->id); ?>">
											<i class="fa fa-trash" style="color: #edb426;"></i>
										 	<?php echo e(trans('core.delete')); ?>

										</a>
                                    </li>
                                    <?php endif; ?>

                                    <?php if(auth()->user()->can('product.view')): ?>
                                    <li>
                                        <!-- product details button -->
										<a href="<?php echo e(route('product.details', $product)); ?>">
											<i class="fa fa-eye" style="color: #269fed;"></i>
										 	<?php echo e(trans('core.details')); ?>

										</a>
                                    </li>
                                    <?php endif; ?>

                                    <!-- Print barcode of a product -->
                                    <li>
										<a href="<?php echo e(route('single.print_barcode', $product)); ?>">
											<i class="fa fa-barcode" style="color: purple;"></i>
										 	<?php echo e(trans('core.print_barcode')); ?>

										</a>
                                    </li>
                                  </ul>
                                </div>
                            </td>
						</tr>

						<!-- Price Update Modal -->
						<div class="modal fade" id="priceUpdate<?php echo e($product->id); ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
						  <div class="modal-dialog" role="document">
						    <div class="modal-content">
						      <div class="modal-header">
						        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						        <h4 class="modal-title" id="myModalLabel">Update <?php echo e($product->name); ?> Price</h4>
						      </div>
						      <form action="<?php echo e(route('product.price.update')); ?>" method="post">
						      <div class="modal-body">
						      	<?php echo e(csrf_field()); ?>

						        <div class="form-group">
								    <label><?php echo e(trans('core.update_cost_price')); ?></label>
								    <input type="text" name="cost_price" class="form-control number" value="<?php echo e($product->cost_price); ?>" id="cost_price" onkeypress='return event.charCode <= 57 && event.charCode != 32'>
								</div>

								<div class="form-group">
								    <label><?php echo e(trans('core.update_mrp')); ?></label>
								    <input type="text" name="mrp" class="form-control number" value="<?php echo e($product->mrp); ?>">
								    <span id="pinky"></span>
								</div>

								<input type="hidden" name="product_id" value="<?php echo e($product->id); ?>">
						      </div>
						      <div class="modal-footer">
						        <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo e(trans('core.close')); ?></button>
						        <button type="submit" class="btn btn-primary"><?php echo e(trans('core.update')); ?></button>
						      </div>
						      </form>
						    </div>
						  </div>
						</div>
						<!-- Price Update Modal Ends-->
						
						<!-- modal for delete product -->
						<div class="modal fade" id="deleteModal<?php echo e($product->id); ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
							<?php echo Form::open(['route'=> ['product.delete', $product], 'method'=>'delete']); ?>

						  <div class="modal-dialog" role="document">
						    <div class="modal-content">
						      <div class="modal-header">
						        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						        <h4 class="modal-title" id="myModalLabel">
						        	<?php echo e($product->name); ?>

						        </h4>
						      </div>
						      <div class="modal-body" >
						        <h4 >
						        	<?php echo e(trans('core.delete_alert')); ?> <b><?php echo e($product->name); ?></b>?
						        </h4>
						        <br>
						        <?php if(count($product->sells) == 0 && count($product->purchases) == 0): ?>
						        <?php else: ?>
						        	<h4 style="color: red;">
						        	<i class="fa fa-exclamation-triangle" aria-hidden="true"></i>This product has too much transactions, so it can't be deleted!</h4>
						        <?php endif; ?>
						      </div>
						      <div class="modal-footer">
						        <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo e(trans('core.close')); ?></button>
						        <button type="submit" class="btn btn-danger"><?php echo e(trans('core.delete')); ?></button>
						      </div>
						    </div>
						  </div>
						  <?php echo Form::close(); ?>

						</div>
						<!-- delete modal ends here -->
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</tbody>
			</table>
		</div>
		<!--Pagination-->
		<div class="pull-right">
			<?php echo e($products->links()); ?>

		</div>
		<!--Ends-->
	</div>

	<!-- Product search modal -->
    <div class="modal fade" id="searchModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <?php echo Form::open(['class' => 'form-horizontal']); ?>

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title"> <?php echo e(trans('core.search').' '.trans('core.product')); ?></h4>
                </div>

                <div class="modal-body">                  
                    <div class="form-group">
                        <?php echo Form::label('Name', trans('core.name'), ['class' => 'col-sm-3']); ?>

                        <div class="col-sm-9">
                            <?php echo Form::text('name', Request::get('name'), ['class' => 'form-control']); ?>

                        </div>
                    </div>

                    <div class="form-group">
                        <?php echo Form::label('Product Code', trans('core.product_code'), ['class' => 'col-sm-3']); ?>

                        <div class="col-sm-9">
                            <?php echo Form::text('code', Request::get('code'), ['class' => 'form-control']); ?>

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

        $(function() {
          $('.number').on('input', function() {
            match = (/(\d{0,100})[^.]*((?:\.\d{0,5})?)/g).exec(this.value.replace(/[^\d.]/g, ''));
            this.value = match[1] + match[2];
          });
        });
	</script>

	

<?php $__env->stopSection(); ?>
<?php echo $__env->make('app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>