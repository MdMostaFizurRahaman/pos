<?php $__env->startSection('contentheader'); ?>
	<?php echo e($user->name); ?>'s <?php echo e(trans('core.profile')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
	<?php echo e(trans('core.profile')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('main-content'); ?>
<div class="panel-body">
	<div class="row">
    <div class="col-md-3" >
      <!-- Profile Image -->
      <div class="box box-primary" style="padding-bottom: 50px;">
        <center>
          <div class="box-body box-profile">
            <?php if(empty($user->image)): ?>
              <img src="<?php echo e(asset('img/default.png')); ?>" class="img-thumbnail img-responsive thumb-large" alt="<?php echo e($user->name); ?>" />
            <?php else: ?>
              <img src="<?php echo asset('uploads/profiles/'. $user->image); ?>" class="img-responsive img-thumbnail thumb-large" alt="User Image"/>
            <?php endif; ?>

            <h3 class="profile-username text-center">
            	<?php echo e(title_case($user->name)); ?>

            </h3>

            <p class="text-muted text-center">
              <?php $__currentLoopData = $user->roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            	 <?php echo e($role->name); ?>

              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </p>
            <div class="btn-group">
              <!-- tabs action starts-->
              <a href="#details" data-toggle="tab" class="btn btn-xs btn-info">
                <?php echo e(trans('core.details')); ?>

              </a>
              <a href="#editProfile" data-toggle="tab" class="btn btn-xs btn-success">
                <?php echo e(trans('core.edit_profile')); ?>

              </a>
              <a href="#change_password" data-toggle="tab" class="btn btn-xs btn-warning">
                <?php echo e(trans('core.change_password')); ?>

              </a>
              <!-- tab action ends -->
            </div>

          </div>  <!-- /.box-body -->
        </center>
      </div> <!-- /.box -->    
    </div> <!-- /.col -->
    
    <div class="col-md-9">
      <div class="nav-tabs-custom">
        <div class="tab-content">
          <!-- Details tab starts -->
          <div class="active tab-pane" id="details" style="padding-bottom: 50px;">
          	<h4><?php echo e(trans('core.details')); ?></h4>
          	<hr />
	          <div class="row">
	              <div class="col-md-12">
	                <label><?php echo e(trans('core.email')); ?></label>
	                <div class="form-control" ><?php echo e($user->email); ?></div>
	            </div>

              <?php if($user->phone): ?>
  	            <div class="col-md-12">
  	                <label><?php echo e(trans('core.phone')); ?></label>
  	                <div class="form-control"><?php echo e($user->phone); ?></div>
  	            </div>
              <?php endif; ?>
	          </div>

            <?php if($user->address): ?>
  	          <div class="form-group">
  	              <label><?php echo e(trans('core.address')); ?></label>
  	              <div class="form-control" style="background-color: #ddd;"><?php echo e($user->address); ?></div>
  	          </div>
            <?php endif; ?>
          </div> 
          <!-- /.Details tab ends -->

          <!-- Edit Profile tab starts -->
          <div class="tab-pane" id="editProfile">
            <h4><?php echo e(trans('core.edit_profile')); ?></h4><hr />
          	<form class="form-horizontal" method="post" action="<?php echo e(route('user.profile.post')); ?>">
          		<?php echo e(csrf_field()); ?>

          	  <input type="hidden" name="user_id" value="<?php echo e($user->id); ?>">
              <div class="form-group">
                <label for="inputName" class="col-sm-2 control-label">First Name</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" id="inputName" value="<?php echo e($user->first_name); ?>" name="first_name" <?php if($user->hasRole('Super User')): ?> disabled="true" title="You Can't Edit This Section" <?php endif; ?>>
                </div>
                <div class="col-sm-5">
                  <input type="text" class="form-control" id="inputName" value="<?php echo e($user->last_name); ?>" name="last_name" <?php if($user->hasRole('Super User')): ?> disabled="true" title="You Can't Edit This Section" <?php endif; ?>>
                </div>

              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label"><?php echo e(trans('core.email')); ?></label>

                <div class="col-sm-10">
                  <input type="email" class="form-control" value="<?php echo e($user->email); ?>" name="email" <?php if($user->hasRole('Super User')): ?> disabled="true" title="You Can't Edit This Section" <?php endif; ?>>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label"><?php echo e(trans('core.phone')); ?></label>

                <div class="col-sm-10">
                  <input type="text" class="form-control"  value="<?php echo e($user->phone); ?>" name="phone">
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label"><?php echo e(trans('core.address')); ?></label>

                <div class="col-sm-10">
                  <textarea class="form-control" name="address"><?php echo e($user->address); ?></textarea>
                </div>
              </div>
              
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <button type="submit" class="btn btn-success">
                    <?php echo e(trans('core.update')); ?>

                  </button>
                </div>
              </div>
            </form>
          </div>
          <!-- Edit Profile Ends -->

          <!-- Password Change Tab Starts -->
          <div class="tab-pane" id="change_password">
            <h4><?php echo e(trans('core.change_password')); ?></h4><hr/>
          	<form class="form-horizontal" method="post" action="<?php echo e(route('change.password')); ?>">
          	  <?php echo e(csrf_field()); ?>

          	  <input type="hidden" name="user_id" value="<?php echo e($user->id); ?>">
              <div class="form-group">
                <label class="col-sm-2 control-label">
                  <?php echo e(trans('core.old_password')); ?>

                </label>
                <div class="col-sm-10">
                  <input id="password" type="password" class="form-control" placeholder="Type your old password"  name="old_password">

                  <!-- Alert Message Shows on Password Match State -->
                  <p id="correct" style="color: green;">
                    <i class="fa fa-check"></i> Valid
                  </p>
                  <p id="incorrect" style="color: red;">
                    <i class="fa fa-times"></i> Oops! Old password does not match!
                  </p>
                  <!-- Ends -->
                  
                </div>
              </div>

              <div id="pasword_change_form">
                <div class="form-group">
                  <label for="inputName" class="col-sm-2 control-label">
                    <?php echo e(trans('core.new_password')); ?>

                  </label>
                  <div class="col-sm-10">
                    <input id="new_password" type="password" class="form-control" placeholder="Type Your New Password"  name="password" required>
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputName" class="col-sm-2 control-label">
                    <?php echo e(trans('core.re_type_password')); ?>

                  </label>
                  <div class="col-sm-10">
                    <input id="new_pass_conf" type="password" class="form-control" placeholder="Re Type Password"  name="confirm_password" required>
                    <p id="match" style="color: green;">
                      <i class="fa fa-check"></i> Password Match
                    </p>
                    <p id="mis_match" style="color: red;">
                      <i class="fa fa-times"></i> Your Passwords don't Match
                    </p>
                  </div>
                </div>
              </div>

              <div id="submit">
                <div class="form-group">
                  <div class="col-sm-offset-2 col-sm-10">
                    <button id="submit" type="submit" class="btn btn-success" id="submit">
                      <?php echo e(trans('core.submit')); ?>

                    </button>
                  </div>
                </div>
              </div>
            </form>
          </div> <!-- Password Change Tab Ends -->
        </div> <!-- Tab-content ends-->  
      </div> <!-- Nav-tabs-custom -->
    </div> <!-- col-9 Ends-->   
  </div> <!-- row ends -->
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
	##parent-placeholder-93f8bb0eb2c659b85694486c41717eaf0fe23cd4##
  <script src="/assets/js-core/axios.min.js"></script>
	<script>

    var current_password = "<?php echo e($user->password); ?>";
    $('#pasword_change_form').hide();
    $('#correct').hide();
    $('#match').hide();
    $('#incorrect').hide();
    $('#mis_match').hide();
    $('#submit').hide();
    var password;
    var new_password;
    var new_pass_conf;
    $(document).ready(function(){
        $('#password').on('change', function(){
            password = $(this).val();
            var route = <?php echo json_encode(route('user.old-password')); ?>

            axios.post(route, { password: password})
              .then(function (response) {
                $('#pasword_change_form').show();
                $('#correct').show();
                $('#incorrect').hide();
              })
              .catch(function (response) {
                $('#correct').hide();
                $('#incorrect').show();
                $('#pasword_change_form').hide();
              })    
        });

        $('#new_password').keyup(function(){
            new_password = $(this).val();         
        });

        $('#new_pass_conf').keyup(function(){
            new_pass_conf = $(this).val();
            if(new_pass_conf == new_password){
              $('#match').show();
              $('#mis_match').hide();
              $('#submit').show();
            }else{
              $('#mis_match').show();
              $('#match').hide();
              $('#submit').hide();
            }  
        });

    });	
	</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>