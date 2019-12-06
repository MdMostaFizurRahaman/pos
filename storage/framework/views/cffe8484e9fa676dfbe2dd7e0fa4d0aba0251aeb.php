<!-- Content Header (Page header) -->
<div id="page-title">
    <h2>
        <?php $__env->startSection('contentheader'); ?> 
            <?php echo e(settings('site_name')); ?>

            <small style=" font-size: 12px; letter-spacing: 2px;" class="hidden-xs">
                <b><?php echo e(Auth::user()->warehouse->name); ?></b>
            </small>
        <?php echo $__env->yieldSection(); ?>
    </h2>
    <p>
        <?php $__env->startSection('contentheader_description'); ?> 
            Ultimate tool to manage inventory and stock. 
        <?php echo $__env->yieldSection(); ?>
    </p>
    <ol class="breadcrumb">
        <li>
            <a href="<?php echo e(route('home')); ?>">
                <i class="fa fa-dashboard"></i> 
                <?php echo e(trans('core.dashboard')); ?>

            </a>
        </li>
        <li class="active">
        	<?php $__env->startSection('breadcrumb'); ?>
        		
        	<?php echo $__env->yieldSection(); ?>
        </li>
    </ol>
</div>