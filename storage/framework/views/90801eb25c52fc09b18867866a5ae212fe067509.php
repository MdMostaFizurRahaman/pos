<?php $__env->startSection('contentheader'); ?>
	<?php echo e(trans('core.expense_list')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
	<?php echo e(trans('core.expense_list')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('main-content'); ?>

    <div class="panel-heading">
		<?php if(auth()->user()->can('expense.create')): ?>
			<a id="addButton" class="btn btn-success btn-alt btn-xs" style="border-radius: 0px !important;">
				<i class='fa fa-plus'></i> 
				<?php echo e(trans('core.add_new_expense')); ?>

			</a>
		<?php endif; ?>
        <a href="<?php echo e(route('expense.today')); ?>" class="btn btn-purple btn-alt btn-xs hidden-xs">
            <?php echo e(trans('core.expense_today')); ?>

        </a>

        <!--advance search-->
        <?php if(count(Request::input())): ?>
            <span class="pull-right">   
                <a class="btn btn-default btn-alt btn-xs" href="<?php echo e(action('ExpenseController@getIndex')); ?>">
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
        <!--ends-->
    </div>
	
    <div class="panel-body">
        <div class="table-responsive">
    		<table class="table table-bordered table-striped" id="example">
    			<thead class="<?php echo e(settings('theme')); ?>">
    				<td class="text-center font-white"># &nbsp;&nbsp;</td>
    				<td class="text-center font-white"><?php echo e(trans('core.purpose')); ?></td>
    				<td class="text-center font-white"><?php echo e(trans('core.amount')); ?></td>
    				<td class="text-center font-white"><?php echo e(trans('core.date')); ?></td>
    				<td class="text-center font-white"><?php echo e(trans('core.actions')); ?></td>
    			</thead>

    			<tbody>
    				<?php $__currentLoopData = $expenses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $expense): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    					<tr>
    						<td class="text-center"><?php echo e($loop->iteration); ?></td>
    						<td class="text-center"><?php echo $expense->purpose; ?></td>
    						<td class="text-center">
                                <?php echo e(settings('currency_code')); ?>

                                <?php echo e(twoPlaceDecimal($expense->amount)); ?>

                            </td>
    						<td class="text-center"> <?php echo e(carbonDate($expense->created_at, 'y-m-d')); ?> </td>
    						<td class="text-center">
    							<?php if(auth()->user()->can('expense.manage')): ?>
                                <a href="#" 
                                    data-id="<?php echo e($expense->id); ?>" 
                                    data-purpose="<?php echo e($expense->purpose); ?>"
                                    data-amount="<?php echo e($expense->amount); ?>"
                                    class="btn btn-info btn-alt btn-xs btn-edit">
                                    <i class="fa fa-edit"></i>
                                    <?php echo e(trans('core.edit')); ?>

                                </a>

                                <!--Expense Delete button trigger-->
                                <a href="#" 
                                    data-id="<?php echo e($expense->id); ?>" 
                                    data-name="<?php echo e($expense->purpose); ?>"  
                                    class="btn btn-danger btn-alt btn-xs btn-delete"
                                >
                                    <i class="fa fa-trash"></i>
                                    <?php echo e(trans('core.delete')); ?>

                                </a>
                                <?php endif; ?>
                                <!--Delete button trigger ends-->
    						</td>
    					</tr>
    				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    			</tbody>
    		</table>
        </div>

        <!--Pagination-->
        <div class="pull-right">
            <?php echo e($expenses->links()); ?>

        </div>
        <!--Ends-->
    </div>

	<!--Create Expense Modal -->
    <div class="modal fade" id="addModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <?php echo Form::open(['class' => '', 'id' => 'ism_form']); ?>

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title"> 
                        <?php echo e(trans('core.add_new_expense')); ?>

                    </h4>
                </div>

                <div class="modal-body">                  
                    <div class="form-group">
                    	<label><?php echo e(trans('core.expense_purpose')); ?></label>
                        <textarea  class="form-control" name="purpose" rows="4" cols="50" name="comment" required></textarea>
                    </div>

                    <div class="form-group">
                		<label><?php echo e(trans('core.expense_amount')); ?></label>
                    	<input type="text" class="form-control number" name="amount" required>
                    </div>                                             
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">
                    	<?php echo e(trans('core.close')); ?>

                    </button>
                    <input type="submit" class="btn btn-primary" id="submitButton" value="<?php echo e(trans('core.save')); ?>" onclick="submitted()">
                </div>
                <?php echo Form::close(); ?>

            </div>
        </div>
    </div>
    <!-- Create Expense modal ends -->

    <!-- Expense search modal -->
    <div class="modal fade" id="searchModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <?php echo Form::open(['route' => 'expense.search', 'class' => 'form-horizontal']); ?>

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title"> <?php echo e(trans('core.search').' '.trans('core.expense')); ?></h4>
                </div>

                <div class="modal-body">                  
                    <div class="form-group">
                        <?php echo Form::label('Purpose', trans('core.purpose'), ['class' => 'col-sm-3']); ?>

                        <div class="col-sm-9">
                            <?php echo Form::text('purpose', Request::get('purpose'), ['class' => 'form-control']); ?>

                        </div>
                    </div>

                    <div class="form-group">
                        <?php echo Form::label('From', trans('core.from'), ['class' => 'col-sm-3']); ?>

                        <div class="col-sm-9">
                            <?php echo Form::text('from', Request::get('from'), ['class' => 'form-control dateTime','placeholder'=>"yyyy-mm-dd"]); ?>

                        </div>
                    </div>

                    <div class="form-group">
                        <?php echo Form::label('to', trans('core.to'), ['class' => 'col-sm-3']); ?>

                        <div class="col-sm-9">
                            <?php echo Form::text('to', Request::get('to'), ['class' => 'form-control dateTime','placeholder'=>"yyyy-mm-dd"]); ?>

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

    <!-- Delete Modal Starts -->
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
      <?php echo Form::open(['route'=>'expense.delete','method'=>'POST']); ?>

      <?php echo Form::hidden('id',null,['id'=>'deleteExpenseInput']); ?>

      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">
                Delete Expense 
                <span id="deleteExpenseName" ></span>
            </h4>
          </div>
          <div class="modal-body">
            <h3>Are you sure you want to delete this expense?</h3>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-danger">Delete</button>
          </div>
        </div>
      </div>
      <?php echo Form::close(); ?>

    </div>
    <!-- Modal Ends -->

    <!-- Edit Modal Starts -->
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
      <?php echo Form::open(['route'=>'expense.edit','method'=>'POST']); ?>

      <?php echo Form::hidden('id',null,['id'=>'editExpenseInput']); ?>

      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">
                Edit Expense
            </h4>
          </div>
          <div class="modal-body">
            <div class="form-group">
                <label><?php echo e(trans('core.purpose')); ?></label>
                <textarea  class="form-control" name="purpose" rows="4" cols="50" name="comment" required id="editPurpose"></textarea>
            </div>

            <div class="form-group">
                <label><?php echo e(trans('core.amount')); ?></label>
                <input type="text" name="amount" class="form-control number" id="editAmount" required>
            </div>   
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-info">Update</button>
          </div>
        </div>
      </div>
      <?php echo Form::close(); ?>

    </div>
    <!-- Modal Ends -->   
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
	##parent-placeholder-93f8bb0eb2c659b85694486c41717eaf0fe23cd4##
	<script>
		$(function() {
            $('#addButton').click(function(event) {
                event.preventDefault();
                $('#addModal').modal('show')
            });
        })

        $(function() {
            $('#searchButton').click(function(event) {
                event.preventDefault();
                $('#searchModal').modal('show')
            });
        })

        $(document).ready(function(){
            $('.btn-delete').on('click',function(e){
                e.preventDefault();
                $('#deleteModal').modal();
                $('#deleteExpenseInput').val($(this).attr('data-id'));
                $('#deleteExpenseName').val($(this).attr('data-name'));
            })
        });

         $(document).ready(function(){
            $('.btn-edit').on('click',function(e){
                e.preventDefault();
                $('#editModal').modal();
                $('#editExpenseInput').val($(this).attr('data-id'));
                $('#editPurpose').val($(this).attr('data-purpose'));
                $('#editAmount').val($(this).attr('data-amount'));
            })
        });

        $(function() {
          $('.number').on('input', function() {
            match = (/(\d{0,100})[^.]*((?:\.\d{0,2})?)/g).exec(this.value.replace(/[^\d.]/g, ''));
            this.value = match[1] + match[2];
          });
        });
	</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>