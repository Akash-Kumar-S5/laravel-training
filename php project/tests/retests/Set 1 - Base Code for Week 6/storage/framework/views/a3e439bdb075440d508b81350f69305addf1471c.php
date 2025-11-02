<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><?php echo e(__('Create Role')); ?></div>
                <div class="card-body">
                    <form action="<?php echo e(route('role.store')); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <div class="form-group">
                            <label for="">Roll Name</label>
                            <input type="text" name="name" class="form-control">
                            <?php if($errors->has('name')): ?>
                            <div class="text-danger"
                                 style="margin-top: 10px; margin-bottom: 10px;"><?php echo e($errors->first('name')); ?></div>
                            <?php endif; ?>
                        </div>
                        <div class="form-group">
                            <label for="permission">Permissions</label><br>
                            <input type="checkbox" name="permissions[]" id="permission" value="Blog Read" > Blog Read<br>
                            <input type="checkbox" name="permissions[]" id="permission" value="Blog Read and Write" > Blog Read and write <br>
                            <input type="checkbox" name="permissions[]" id="permission" value="User profile Read" > User profile Read <br>
                            <input type="checkbox" name="permissions[]" id="permission" value="User profile Read and Write" > User profile Read and Write
                        </div>
                        <div style="margin-top: 20px;">
                            <a href="<?php echo e(route('user.index')); ?>" class="btn btn-primary">Cancel</a>
                            <button type="submit" class="btn btn-primary">Create</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\ak994\OneDrive\Documents\PHP_assignment\Set 1 - Base Code for Week 6\resources\views/roles/create.blade.php ENDPATH**/ ?>