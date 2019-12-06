<?php $__env->startSection('title'); ?>
	Settings ::
	##parent-placeholder-3c6de1b7dd91465d437ef415f94f36afc1fbc8a8##
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contentheader'); ?>
	<?php echo e(trans('core.general_settings')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
	<?php echo e(trans('core.general_settings')); ?>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('main-content'); ?>
	<div class="panel-body" style="min-height: 1020px;">
		<div class="nav-tabs-custom">
	        <ul class="nav nav-tabs">
	            <!-- <li class="active">
	            	<a href="#details" data-toggle="tab">
	            		<?php echo e(trans('core.general_settings')); ?>

	            	</a>
	            </li> -->
	            <li class="active <?php echo e(settings('theme')); ?> font-white" >
	            	<a href="#editSettings" data-toggle="tab" class="<?php echo e(settings('theme')); ?> font-white no-border">
	            		<?php echo e(trans('core.general_settings')); ?>

	            	</a>
	            </li>
	        </ul>

	        <div class="tab-content">
	            <!-- <div class="active tab-pane" id="details">
	            	<?php echo $__env->make('settings.partials.details', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	            </div> -->

	            <!--Tab For Edit Settings-->
	            <div class="active tab-pane animated fadeIn" id="editSettings" >
	            	<?php echo $__env->make('settings.partials.edit-settings', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	            </div>
	            <!--Ends-->
	        </div><!--Tab Content Ends-->
	    </div> <!--nav-tabs-custom-->
	</div>
	
<?php $__env->stopSection(); ?>


<?php $__env->startSection('js'); ?>
	##parent-placeholder-93f8bb0eb2c659b85694486c41717eaf0fe23cd4##
	<script type="text/javascript">
        /*$(document).ready(function(){
            $('#invoice_tax').on('change',function(){
            	$('#invoice_tax_rate').hide();
            	var invoiceTax = $(this).val();
            	if(invoiceTax == 1){
                    $('#invoice_tax_rate').show();
                }
            });
        });*/
		/*ends*/
		var _URL = window.URL || window.webkitURL;
		$("#file").change(function(e) {
		    var file, img;
		    if ((file = this.files[0])) {
		        img = new Image();
		        img.onload = function() {
		        	if(this.width > 190 || this.height > 34){
		        		swal({
						  title: 'Invalid Image Size',
						  type: 'warning',
						  html:
						    '<small>Logo size should be (width=<b>190px</b>) x (height=<b>34px</b>) <br>Size of Logo you are tryining to Upload is '+this.width+'px x '+this.height+'px</small>',
						  showCloseButton: true,
						})
		        	}
		        };
		        img.onerror = function() {
		            alert( "not a valid file: " + file.type);
		        };
		        img.src = _URL.createObjectURL(file);
		    }
		});
    </script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>