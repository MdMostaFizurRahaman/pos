<?php $__empty_1 = true; $__currentLoopData = $subcategory; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subcategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
	<option value="<?php echo e($subcategory->id); ?>"><?php echo e($subcategory->name); ?></option>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
    <option value="">No Data Available</option>
<?php endif; ?>
