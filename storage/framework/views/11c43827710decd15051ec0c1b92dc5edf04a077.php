<?php $__env->startSection('title'); ?>
	<?php echo e(trans('core.print_barcode')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('contentheader'); ?>
	<?php echo e(trans('core.print_barcode')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
	<?php echo e(trans('core.print_barcode')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('main-content'); ?>

<div class="panel-body" id="app">
  <div style="background-color: #c5d5d34d;">
	<!-- Print setting section -->
	<div class="panel-heading" style="background-color: #c5d5d34d;">
	  	<div class="form-group">
	    	<div class="row">
		     	<div class="col-md-12">
		     		<label>Print Per Page</label>
			      	<select v-model="ppp" class="form-control">
					  <option disabled value="">Please select one</option>
					  <option value="pp10">Per Page 10</option>
					  <option value="pp24">Per Page 24</option>
					  <option value="pp40">Per Page 40</option>
					  <option value="pp50">Per Page 50</option>
					  <option value="pp60">Per Page 60</option>
					  <option value="pp70">Per Page 70</option>
					</select>
			    </div>
			</div>
	  	</div>

	  	<div class="form-group">
	  		<div class="row">
	    		<div class="col-md-2">
				  	<div class="checkbox-custom checkbox-custom-success">
                        <input id="checkbox3" type="checkbox" v-model.number='site_name'>
                        <label for="checkbox3">
                            Site Name
                        </label>
                	</div>
				</div>

				<div class="col-md-2">
					<div class="checkbox-custom checkbox-custom-success">
			    		<input id="checkbox4" type="checkbox" v-model.number='product_name'>
			    		<label for="checkbox4">
                        	Product Name
                    	</label>
				    </div>
				</div>

				<div class="col-md-2">
					<div class="checkbox-custom checkbox-custom-success">
			    		<input id="checkbox1" type="checkbox" v-model.number='product_price'>
			    		<label for="checkbox1">
                        	Product Price
                    	</label>
				    </div>
				</div>
			</div>
		</div>
	</div>
	<!-- Print setting section ends -->


	<!-- printable product selection form -->
	<form method="post"> 
		<!-- <div class="well">{{products}}</div> -->
		<!-- <?php echo e(csrf_field()); ?> -->
		
    	<div>
    		<table class="table table-bordered" style="background-color: #EDF2F2;">
    			<thead style="background-color: #f3f5d4;">
					<tr>
						<td class="text-center" style="width: 42.5%;">
							<b><?php echo e(trans('core.product')); ?></b>
						</td>

						<td class="text-center bold"  style="width: 42.5%;">
							<b><?php echo e(trans('core.quantity')); ?></b>
						</td>
						<td style="width: 10%;">&nbsp;</td>
					</tr>
				</thead>

				<tbody>
					<tr 
						is="products"
						v-for="product in products"
						:id="product.id"
						:product="product"
						:add="addInput"
						:remove="removeInput"
					></tr>
				</tbody>
    		</table>  	 
		</div>
	</form>
	<!-- printable product selection form ends-->

	<!-- print button div -->
	<div class="row">
		<div class="col-md-12">
			<a @click="printDiv('printableArea')" class="btn btn-block btn-xs" style="background-color: #2D5C8A; color: #FFF;"> 
				<?php echo e(trans('core.print')); ?> 
			</a>
		</div>
	</div>
	<!-- ends -->
  </div>
	

	<div class="panel-body">
		<div class="a4paper" id="printableArea">
			<div class="barcode-item" v-for="product in products" >
				<div :class="ppp" v-for="n in parseInt(product.quantity)" style="float: left; ">
					<p v-if="site_name" class="barcode-info-p">
						<?php echo e(settings('site_name')); ?>

					</p>
					<p v-if="product_name" class="barcode-info-p">
						{{ product.name }}
					</p>
					<img :src="product.barcode">
					<br>
					<small style="font-size: 8px !important;"><b>{{product.code}}</b></small>
					<p v-if="product_price" style="line-height: 12px !important; font-size: 8px !important;">
						MRP: <?php echo e(settings('currency_code')); ?> {{product.mrp}} 
					</p>
				</div>
			</div>
		</div>
	</div>
</div>



<template id="products">
	<tr>
		<td>
			<select class="form-control selectPickerLive" @change="setProduct" v-model="products.product_id" data-live-search="true">
				<option><?php echo e(trans('core.select_product')); ?></option>
				<?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<option 
						value="<?php echo e($product->id); ?>"
						data-quantity="<?php echo e($product->quantity); ?>"
						data-barcode = "<?php echo e($product->bar_code); ?>"
						data-mrp = "<?php echo e($product->mrp); ?>"
						data-name = "<?php echo e($product->name); ?>"
						data-code = "<?php echo e($product->code); ?>"
						data-id = "<?php echo e($product->id); ?>"
					>
						<?php echo e($product->name); ?> (<?php echo e($product->code); ?>)
					</option>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			</select>
		</td>

		<td>
			<input type="text" v-model="product.quantity" class="form-control text-center">
			
		</td>
		
		<td>
			<button @click.prevent="remove(id)" class="btn btn-danger" v-if="id != 1">
				<i class="fa fa-times"></i>
			</button>
			<button @click.prevent="add()" class="btn btn-success" v-else >
				<i class="fa fa-plus"></i>
			</button>
		</td>
	</tr>
</template>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
    ##parent-placeholder-93f8bb0eb2c659b85694486c41717eaf0fe23cd4##
	<script src="/assets/js-core/vue.min.js"></script>
    <script src="/assets/js-core/axios.min.js"></script>
    
    <script>
    	$(document).ready(function () {
    		$('.selectPickerLive').selectpicker();
    	})
	    
    	axios.defaults.headers.common['X-CSRF-TOKEN'] = window.Laravel.csrfToken;
		axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

    	Vue.component('products', {
    		template: '#products',
    		props: ['id', 'product', 'add', 'remove'],
    		data: function () {
	    		return {}
	    	},
	    	methods: {
	    		setProduct: function (event) {
	    			this.product.product_id = $('option:selected', event.target).data('id')
	    			this.product.barcode = $('option:selected', event.target).data('barcode')
	    			this.product.mrp = $('option:selected', event.target).data('mrp')
	    			this.product.name = $('option:selected', event.target).data('name')
	    			this.product.code = $('option:selected', event.target).data('code')
	    		}
	    	},
	    	mounted: function () {
	    	}
    	})

    	var app = new Vue({
		    el: '#app',
		    data: {
		    	items: 48,
		    	ppp:'pp40',
		    	site_name: true,
			    product_name: true,
			    product_price: true,
		    	products: [
		    		{ 
		    			id: 1, 
		    			quantity: 1,
		    			product_id: 0,
		    			barcode: ''
		    		},
		    	],
		    	submitted: false,
		    },
		    computed: {

		    },
		    methods:{
		        addInput: function () {
		        	var newInputId = 1
		        	for (var i = 0; i < this.products.length; i++) {
		        		newInputId = this.products[i].id + 1
		        	}
		        	this.products.push({ id: newInputId, barcode: '', product_id: '', quantity: 1})
		        	this.$nextTick(function () {
		        		$('.selectPickerLive').selectpicker()
		        	})
		        },
		        removeInput: function (id) {
		           var index = this.products.findIndex(function (sell) {
		           		return sell.id === id
		           })
		           this.products.splice(index, 1)
		        },
		        printDiv: function (divName) {
		        	var printContents = document.getElementById(divName).innerHTML;
		            var originalContents = document.body.innerHTML;
		            document.body.innerHTML = printContents;
		            window.print();
		            document.body.innerHTML = originalContents;
		            location.reload();
        		}
		    }
		});
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>