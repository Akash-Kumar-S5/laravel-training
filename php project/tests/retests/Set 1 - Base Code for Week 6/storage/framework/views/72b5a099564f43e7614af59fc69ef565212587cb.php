<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row justify-content-center">
            <?php if(session('success')): ?>
                <div class="alert alert-success" role="alert">
                    <?php echo e(session('success')); ?>

                </div>
            <?php endif; ?>
            <div class="col-12">
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('User profile Read and Write')): ?>
                <a href="<?php echo e(route('user.create')); ?>" class="btn btn-primary mb-2">Create User</a>
                <a href="<?php echo e(route('roles.getAssign')); ?>" class="btn btn-primary mb-2">Assign Role</a>
                <br>
                <?php endif; ?>
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>S.No</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th colspan="2">Action</th>
                    </tr>
                    </thead>
                    <tbody>

                    <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($key + 1); ?></td>
                            <td><?php echo e($user->name); ?></td>
                            <td><?php echo e($user->email); ?></td>
                            <td>
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('User profile Read and Write')): ?>
                                <a href="<?php echo e(route('user.show', $user->id)); ?>" class="btn btn-primary">Show</a>
                                <a href="<?php echo e(route('user.edit', $user->id)); ?>" class="btn btn-primary">Edit</a>
                                <form action="<?php echo e(route('user.destroy', $user->id)); ?>" method="post" class="d-inline">
                                    <?php echo e(csrf_field()); ?>

                                    <?php echo method_field('DELETE'); ?>
                                    <button class="btn btn-danger" type="submit">Delete</button>
                                </form>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\mallow\php project\retests\Set 1 - Base Code for Week 6\resources\views/users/index.blade.php ENDPATH**/ ?>