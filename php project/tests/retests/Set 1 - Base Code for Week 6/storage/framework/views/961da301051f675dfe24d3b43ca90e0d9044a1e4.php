<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><?php echo e(__('Edit Blog')); ?></div>

                    <div class="card-body">
                        <?php if(session('success')): ?>
                            <div class="alert alert-success" role="alert"
                                 style="margin-top: 10px; margin-bottom: 10px;">
                                <?php echo e(session('success')); ?>

                            </div>
                        <?php endif; ?>
                        <form action="/user/<?php echo e($user->id); ?>" method="post">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('PUT'); ?>
                            <div class="form-group">
                                <label for=""> User Name</label>
                                <input type="text" name="name" class="form-control" value="<?php echo e($user->name); ?>">
                                <?php if($errors->has('name')): ?>
                                    <div class="text-danger"
                                         style="margin-top: 10px; margin-bottom: 10px;"><?php echo e($errors->first('name')); ?></div>
                                <?php endif; ?>
                            </div>
                            <div class="form-group">
                                <label for="">User Email</label>
                                <input type="email" name="email" class="form-control" value="<?php echo e($user->email); ?>">
                                <?php if($errors->has('email')): ?>
                                    <div class="text-danger"
                                         style="margin-top: 10px; margin-bottom: 10px;"><?php echo e($errors->first('email')); ?></div>
                                <?php endif; ?>
                            </div>
                            <div style="margin-top: 20px;">
                                <a href="<?php echo e(route('user.index')); ?>" class="btn btn-primary">Cancel</a>
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\ak994\OneDrive\Documents\PHP_assignment\Set 1 - Base Code for Week 6\resources\views/users/edit.blade.php ENDPATH**/ ?>