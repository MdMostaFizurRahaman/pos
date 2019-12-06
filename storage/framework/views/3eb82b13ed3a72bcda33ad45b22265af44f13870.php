<?php echo Form::model($setting, ['method' => 'post', 'files' => true]); ?>

	<div class="example-box-wrapper">
		<div class="form-horizontal bordered-row">

			<div class="form-group bg-khaki">
				<h3 class="control-label col-sm-2 title-hero">
		            <?php echo e(trans('core.general_settings')); ?>

		        </h3>
			</div>

			<div class="form-group">
				<label class="control-label col-sm-2">
					<?php echo e(trans('core.shop_name')); ?>

				</label>
				<div class="col-sm-4 <?php echo e($errors->has('site_name') ? 'has-error' : ''); ?>"> 
					<?php echo Form::text('site_name', $setting->site_name, ['class' => 'form-control']); ?>

					<!-- <?php echo $errors->first('site_name', '<p class="error-message">:message</p>'); ?> -->
			    </div>

			    <label class="control-label col-sm-2">
			    	<?php echo e(trans('core.shop_slogan')); ?>

			    </label>
				<div class="col-sm-4"> 
					<?php echo Form::text('slogan', $setting->slogan, ['class' => 'form-control']); ?>

			    </div>
			</div>

			<div class="form-group">
				<label class="control-label col-sm-2">
					<?php echo e(trans('core.phone')); ?>

				</label>
				<div class="col-sm-4 <?php echo e($errors->has('phone') ? 'has-error' : ''); ?>"> 
					<?php echo Form::text('phone', $setting->phone, ['class' => 'form-control']); ?>

			    </div>

			    <label class="control-label col-sm-2">
			    	<?php echo e(trans('core.email')); ?>

			    </label>
				<div class="col-sm-4 <?php echo e($errors->has('email') ? 'has-error' : ''); ?>"> 
					<?php echo Form::text('email', $setting->email, ['class' => 'form-control']); ?>

			    </div>
			</div>

			<div class="form-group">
				<label class="control-label col-sm-2">
					<?php echo e(trans('core.shop_address')); ?>

				</label>
				<div class="col-sm-10 <?php echo e($errors->has('address') ? 'has-error' : ''); ?>"> 
					<?php echo Form::textarea('address', $setting->address, ['class' => 'form-control', 'rows' => 3]); ?>

			    </div>
			</div>

			<div class="form-group">
				<label class="control-label col-sm-2">
					<?php echo e(trans('core.shop_owner')); ?>

				</label>
				<div class="col-sm-4"> 
					<?php echo Form::text('owner_name', $setting->owner_name, ['class' => 'form-control']); ?>

			    </div>

			    <label class="control-label col-sm-2">
			    	<?php echo e(trans('core.currency')); ?>

			    </label>
				<div class="col-sm-4"> 
					<?php echo Form::text('currency_code', $setting->currency_code, ['class' => 'form-control']); ?>

			    </div>
			</div>

			<div class="form-group">
                <label class="control-label col-sm-2">
			    	<?php echo e(trans('core.theme')); ?>

			    </label>
				<div class="col-sm-4"> 
					<?php echo Form::select('theme', [ 'bg-primary' => 'Pacific Blue', 'bg-green' => 'Green', 'bg-red' => 'Red', 'bg-blue' => 'Blue', 'bg-warning' => 'Orange', 'bg-purple' => 'Purple', 'bg-black' => 'Black','bg-gradient-1' => 'Moderate Azure', 'bg-gradient-2' => 'Strong Spring Green', 'bg-gradient-3' => 'Magenta-pink', 'bg-gradient-4' => 'Desaturated Cyan', 'bg-gradient-5' => 'Strong Azure', 'bg-gradient-6' => 'Vivid Cyan', 'bg-gradient-7' => 'Deep Cyan', 'bg-gradient-8' => 'Strong Cornflower Blue.', 'bg-gradient-9' => 'Strong Arctic Blue'], null, ['class' => 'form-control']); ?>

			    </div>

			    <label class="control-label col-sm-2">
			    	<?php echo e(trans('core.dashboard_style')); ?>

			    </label>
				<div class="col-sm-4">
					<?php echo Form::select('dashboard_style', [ 'chart-box' => 'Chart Box', 'tile-box' => 'Tile Box'], $setting->dashboard, ['class' => 'form-control']); ?>

			    </div>
            </div>

			<div class="form-group">
                <label class="col-sm-2 control-label">
                	<?php echo e(trans('core.logo')); ?>

                </label>
                <div class="col-sm-10">
                    <?php echo Form::file('image', ['id' => 'file']); ?>

					<br>
					<small>
						Logo size should be (width=190px) x (height=34px).
					</small>
                </div>
            </div>

			<div class="form-group bg-khaki">
				<h3 class="control-label col-sm-2 title-hero">
		            <?php echo e(trans('core.product_settings')); ?>

		        </h3>
			</div>

			<div class="form-group">
				<label class="control-label col-sm-2">
					<?php echo e(trans('core.alert_range')); ?>

				</label>
				<div class="col-sm-4"> 
					<?php echo Form::number('alert_quantity', $setting->alert_quantity, ['class' => 'form-control']); ?>

			    </div>

			    <label class="control-label col-sm-2">
					<?php echo e(trans('core.product_tax')); ?>

				</label>
				<div class="col-sm-4"> 
					<?php echo Form::select('product_tax', ['0' => 'Disable', '1' => 'Enable'],null, ['class' => 'form-control']); ?>

			    </div>
			</div>

			<div class="form-group bg-khaki">
				<h3 class="control-label col-sm-3 title-hero">
					<?php echo e(trans('core.sell_n_purchase_settings')); ?>

		        </h3>
			</div>

			<div class="form-group">
				<label class="control-label col-sm-2">
					<?php echo e(trans('core.invoice_tax')); ?>

				</label>
				<div class="col-sm-4"> 
					<?php echo Form::select('invoice_tax', ['0' => 'Disable', '1' => 'Enable'],null, ['class' => 'form-control', 'id' => 'invoice_tax',]); ?>

			    </div>

			    <div id="invoice_tax_rate"> 
			    	<!-- <?php if(settings('invoice_tax') == 0): ?> style="display: none;" <?php endif; ?> -->
				    <label class="control-label col-sm-2">
						<?php echo e(trans('core.invoice_tax_rate')); ?>

					</label>

					<div class="col-sm-4">
						<select class="form-control" name="invoice_tax_id">
							<?php $__currentLoopData = $taxes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tax): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<option value="<?php echo e($tax->id); ?>" <?php if($tax_rate == $tax->rate): ?> selected <?php endif; ?>>
									<?php echo e($tax->name); ?>

								</option>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						</select>

						<span>Add VAT Rate?</span>
						<a href="<?php echo e(route('tax.index')); ?>" style="text-decoration: underline; padding: 10px; color: blue; ">Click Here</a>
					</div>
				</div>
			</div>

			<div class="form-group">
				<label class="control-label col-sm-2">
				<?php echo e(trans('core.enable_purchaser')); ?>

				</label>
				<div class="col-sm-4"> 
					<?php echo Form::select('enable_purchaser', ['0' => 'Disable', '1' => 'Enable'],null, ['class' => 'form-control']); ?>

			    </div>

			    <label class="control-label col-sm-2">
				<?php echo e(trans('core.enable_customer')); ?>

				</label>
				<div class="col-sm-4"> 
					<?php echo Form::select('enable_customer', ['0' => 'Disable', '1' => 'Enable'],null, ['class' => 'form-control']); ?>

			    </div>
			</div>

			<div class="form-group bg-khaki" >
				<h3 class="control-label col-sm-2 title-hero">
					<?php echo e(trans('core.invoice_settings')); ?>

		        </h3>
			</div>

			<div class="form-group">
			    <label class="control-label col-sm-2">
				<?php echo e(trans('core.vat_no')); ?>

				</label>
				<div class="col-sm-4"> 
					<?php echo Form::text('vat_no', $setting->vat_no, ['class' => 'form-control']); ?>

			    </div>
			</div>

			<div class="form-group bg-khaki" >
				<h3 class="control-label col-sm-2 title-hero">
					<?php echo e(trans('core.pos_settings')); ?>

		        </h3>
			</div>

			<div class="form-group">
			    <label class="control-label col-sm-2">
				<?php echo e(trans('core.pos_footer_text')); ?>

				</label>
				<div class="col-sm-4"> 
					<?php echo Form::textarea('pos_invoice_footer_text', $setting->pos_invoice_footer_text, ['class' => 'form-control', 'rows' => '2']); ?>

			    </div>
			</div>

			<?php if(auth()->user()->can('settings.manage')): ?>
		    <div class="bg-default content-box text-center pad20A mrg25T">
                <button class="btn btn-lg btn-primary" type="submit">
                	<?php echo e(trans('core.save')); ?>

                </button>
            </div>
            <?php endif; ?>
		</div>		
	</div>
<?php echo Form::close(); ?>