<?php $__env->startSection('content'); ?>
    <main>
        <div class="justify-content-center">
        <a href="<?php echo e(route('role.create')); ?>" class="btn btn-primary mb-2">Create Role</a>
        <a href="<?php echo e(route('role.index')); ?>" class="btn btn-primary mb-2">view Roles</a>
        </div>

        <br>
        <div class="container d-flex justify-content-center " style="margin-top:70px">
            <form method="post" action="<?php echo e(route('roles.assign')); ?>" class="mx-auto " style="width: 400px; padding:60px; padding-top:20px; background-color: #FFFFFF">
                <?php echo csrf_field(); ?>
                <h2 style=" margin-bottom: 30px;">Assign Roles to User</h2>
                <div class="form-group" style="margin-bottom: 20px">
                    <label for="userid">User</label>
                    <input type="text" class="form-control" id="userid" name="userid" required>
                </div>
                <div class="form-group" style="margin-bottom: 20px">
                    <label for="role">Select Roles</label>
                    <select class="form-control" id="role" name="role" required>
                        <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($role->name); ?>"><?php echo e($role->name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Assign Roles</button>
            </form>
        </div>
    </main>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\ak994\OneDrive\Documents\PHP_assignment\Set 1 - Base Code for Week 6\resources\views/roles/assign.blade.php ENDPATH**/ ?>