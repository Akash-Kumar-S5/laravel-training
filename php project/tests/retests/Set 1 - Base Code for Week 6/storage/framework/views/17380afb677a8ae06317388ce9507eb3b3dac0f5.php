<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><?php echo e(__('Create Blog')); ?></div>
                    <div class="card-body">
                        <form action="/blog" method="POST">
                            <?php echo csrf_field(); ?>
                            <div class="form-group">
                                <label for="">Blog Title</label>
                                <input type="text" name="title" class="form-control">
                                <?php if($errors->has('title')): ?>
                                    <div class="text-danger"
                                         style="margin-top: 10px; margin-bottom: 10px;"><?php echo e($errors->first('title')); ?></div>
                                <?php endif; ?>
                            </div>
                            <div class="form-group">
                                <label for="">Blog Body</label>
                                <textarea name="body" id="" cols="30" rows="10" class="form-control"></textarea>
                                <?php if($errors->has('body')): ?>
                                    <div class="text-danger"
                                         style="margin-top: 10px; margin-bottom: 10px;"><?php echo e($errors->first('body')); ?></div>
                                <?php endif; ?>
                            </div>
                            <div class="form-group">
                                <label for="">Publish At</label>
                                <input type="date" name="published_at" class="form-control">
                                <?php if($errors->has('published_at')): ?>
                                    <div class="text-danger"
                                         style="margin-top: 10px; margin-bottom: 10px;"><?php echo e($errors->first('published_at')); ?></div>
                                <?php endif; ?>
                            </div>
                            <div style="margin-top: 20px;">
                                <a href="<?php echo e(route('blog.index')); ?>" class="btn btn-primary">Cancel</a>
                                <button type="submit" class="btn btn-primary">Create</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\mallow\php project\retests\Set 1 - Base Code for Week 6\resources\views/blogs/create.blade.php ENDPATH**/ ?>