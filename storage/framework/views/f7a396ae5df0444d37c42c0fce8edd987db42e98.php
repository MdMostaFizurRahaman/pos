<?php $__env->startSection('contentheader'); ?>
	<?php echo e(trans('core.customer_list')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
	<?php echo e(trans('core.customer_list')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('main-content'); ?>
	<div class="panel-heading">
		<?php if(auth()->user()->can('customer.create')): ?>
		<a  href="<?php echo e(route('client.new')); ?>" class="btn btn-success btn-alt btn-xs" style="border-radius: 0px !important;" >
			<i class='fa fa-plus'></i> 
			<?php echo e(trans('core.add_new_customer')); ?>

		</a>
		<?php endif; ?>

		<?php if(count(Request::input())): ?>
			<span class="pull-right">	
	            <a class="btn btn-default btn-alt btn-xs font-black" href="<?php echo e(action('ClientController@getIndex')); ?>">
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
		<div class="table-responsive" style="min-height: 150px;">
			<table class="table table-bordered table-striped">
				<thead class="<?php echo e(settings('theme')); ?>">
					<td class="text-center font-white"># &nbsp;&nbsp;</td>
					<td class="text-center font-white"><?php echo e(trans('core.name')); ?></td>
					<td class="text-center font-white"><?php echo e(trans('core.company_name')); ?></td>
					<td class="text-center font-white"><?php echo e(trans('core.total_due')); ?></td>
					<td class="text-center font-white"><?php echo e(trans('core.phone')); ?></td>
					<td class="text-center font-white"><?php echo e(trans('core.actions')); ?></td>
				</thead>

				<tbody>
					<?php $__currentLoopData = $clients; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $client): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<tr>
							<td class="text-center"><?php echo e($loop->iteration); ?></td>
							<td class="text-center"><?php echo e(title_case($client->name)); ?></td>
							<td class="text-center"><?php echo e(title_case($client->company_name)); ?></td>
							<td class="text-center">
								<?php 
									$due = ($client->transactions->sum('net_total') + $client->payments->where('type', 'return')->sum('amount')) - ($client->payments->where('type', 'credit')->sum('amount')) 
								?>
								<?php if($due == 0): ?>
									-
								<?php else: ?>
									<?php echo e(settings('currency_code')); ?> <?php echo e($due); ?>

								<?php endif; ?>
							</td>
							<td class="text-center">
								<?php if($client->phone): ?>
									<?php echo e($client->phone); ?>

								<?php else: ?>
									<i class="fa fa-remove"></i>
								<?php endif; ?>
							</td>
							<td class="text-center">
								<?php if(auth()->user()->can('customer.manage')): ?>
									<a href="<?php echo e(route('client.edit', $client)); ?>" class="btn btn-info btn-alt btn-xs">
										<i class="fa fa-edit"></i>
										<?php echo e(trans('core.edit')); ?>

									</a>

									<?php if($client->id != 1): ?>
									<!-- delete trigger modal -->
									<a type="button" class="btn btn-danger btn-alt btn-xs" data-toggle="modal" data-target="#deleteModal<?php echo e($client->id); ?>">
										<i class="fa fa-trash"></i>
									  	<?php echo e(trans('core.delete')); ?>

									</a>
									<?php endif; ?>

									<a  href="<?php echo e(route('client.details', $client->id)); ?>" type="button" class="btn btn-purple btn-alt btn-xs">
										<i class="fa fa-eye"></i>
										<?php echo e(trans('core.details')); ?>

									</a>	
								<?php endif; ?>		
							</td>
						</tr>

						<!-- modal for delete -->
						<div class="modal fade" id="deleteModal<?php echo e($client->id); ?>">
						  <div class="modal-dialog ">
						      <?php echo Form::open(['route' => ['client.delete', $client], 'method' => 'delete']); ?>

						    <div class="modal-content">
						      <div class="modal-header">
						        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						        <h4 class="modal-title" id="myModalLabel">
						        	<?php echo e($client->name); ?>

						        </h4>
						      </div>
						      <div class="modal-body" >
						        <h4 >
						        	Are you sure to delete <b><?php echo e($client->name); ?></b>?
						        </h4>
						        <br>
						        <?php if(count($client->sells) == 0 && count($client->purchases) == 0): ?>
						        <?php else: ?>
						        	<h4 style="color: red;">
						        	<i class="fa fa-exclamation-triangle" aria-hidden="true"></i> <?php echo e($client->name); ?> has too much transactions, so it can't be deleted!</h4>
						        <?php endif; ?>
						      </div>
						      <div class="modal-footer">
						        <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo e(trans('core.close')); ?></button>
						        <button type="submit" class="btn btn-danger"><?php echo e(trans('core.delete')); ?></button>
						      </div>
						    </div>
						  </div><!-- /.modal-dialog -->
						  <?php echo Form::close(); ?>

						</div>
						<!-- Delete modal Ends Here -->
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</tbody>
			</table>
		</div>

		<!--Pagination-->
		<div class="pull-right">
			<?php echo e($clients->links()); ?>

		</div>
		<!--Ends-->
	</div>


	<!-- Client search modal -->
    <div class="modal fade" id="searchModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <?php echo Form::open(['class' => 'form-horizontal']); ?>

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title"> <?php echo e(trans('core.search').' '.trans('core.customer')); ?></h4>
                </div>

                <div class="modal-body">                  
                    <div class="form-group">
                        <?php echo Form::label('Name', trans('core.name'), ['class' => 'col-sm-3']); ?>

                        <div class="col-sm-9">
                            <?php echo Form::text('name', Request::get('name'), ['class' => 'form-control']); ?>

                        </div>
                    </div>

                    <div class="form-group">
                        <?php echo Form::label('Company Name', trans('core.company_name'), ['class' => 'col-sm-3']); ?>

                        <div class="col-sm-9">
                            <?php echo Form::text('company_name', Request::get('company_name'), ['class' => 'form-control']); ?>

                        </div>
                    </div>  

                    <div class="form-group">
                        <?php echo Form::label('Phone No', trans('core.phone'), ['class' => 'col-sm-3']); ?>

                        <div class="col-sm-9">
                            <?php echo Form::text('phone', Request::get('phone'), ['class' => 'form-control']); ?>

                        </div>
                    </div>  

                    <div class="form-group">
                        <?php echo Form::label('Address', trans('core.address'), ['class' => 'col-sm-3']); ?>

                        <div class="col-sm-9">
                            <?php echo Form::text('address', Request::get('address'), ['class' => 'form-control']); ?>

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