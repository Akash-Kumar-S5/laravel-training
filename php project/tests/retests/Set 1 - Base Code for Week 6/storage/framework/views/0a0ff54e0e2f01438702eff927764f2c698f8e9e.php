<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><?php echo e(__('View Blog')); ?></div>

                    <div class="card-body">
                        <?php if(session('success')): ?>
                            <div class="alert alert-success" role="alert">
                                <?php echo e(session('success')); ?>

                            </div>
                        <?php endif; ?>
                        <h3><?php echo e($blog->user->name); ?></h3>
                        <h2><?php echo e($blog->title); ?></h2>
                        <p>Published At: <?php echo e(date('Y-m-d', strtotime($blog->published_at))); ?></p>
                        <br>
                        <div>
                            <?php echo e($blog->body); ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\ak994\OneDrive\Documents\PHP_assignment\Set 1 - Base Code for Week 6\resources\views/blogs/show.blade.php ENDPATH**/ ?>