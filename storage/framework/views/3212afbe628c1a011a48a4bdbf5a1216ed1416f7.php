<?php $__env->startSection('contentheader'); ?>
  <?php echo e(trans('core.set_permission')); ?> <?php echo e(trans('core.for')); ?> <b><?php echo e($role->name); ?></b>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
  <?php echo e(trans('core.set_permission')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('main-content'); ?>

<div class="panel-body">

  <form  method="post" class="form-horizontal bordered-row">
    <?php echo e(csrf_field()); ?>


    <div class="form-group bg-khaki">

    

      <input type="hidden" value="<?php echo e($role->id); ?>" name="role_id">

      <div class="text-center" style="background-color: #F8F8F8; margin-bottom: 20px;">
        <label class="control-label col-sm-offset-3 col-sm-2">
          <span style=" color:navy; font-weight: bold;">Select All</span>
        </label>

        <div class="col-sm-1">
          <input type="checkbox"  name="all_permission" id="all-access" class="all-access" >
        </div>
      </div>
    </div>

      <div class="row">
        <?php $__currentLoopData = $permissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $permission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="col-md-4">
          <div class="form-group">
            <label class="control-label col-sm-8"> <?php echo e(ucwords($permission->type).' '.ucwords($permission->name)); ?></label>
            <div class="col-sm-4">
              <input
                type="checkbox"
                class="input-group"
                data-toggle="switch"
                name="permissions<?php echo e($permission->id); ?>"
                value="<?php echo e($permission->id); ?>"
                <?php if(in_array(ucwords($permission->type).' '.ucwords($permission->name), $rolePermissionNameLists) == true): ?>
                  checked
                <?php endif; ?>
                > 
            </div>
          </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </div>
      

      <div class="box-footer">
        <button type="submit" class="btn btn-primary pull-right" style="margin-bottom: 10px;"><?php echo e(trans('core.submit')); ?> </button>
      </div>

  </form>
</div>


                
<?php $__env->stopSection(); ?>


<?php $__env->startSection('js'); ?>
  ##parent-placeholder-93f8bb0eb2c659b85694486c41717eaf0fe23cd4##
  <script type="text/javascript">
    $(document).ready(function () {
    $(".all-access").click(function () {
        $(".input-group").prop('checked', $(this).prop('checked'));
        });
    });
  </script>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>