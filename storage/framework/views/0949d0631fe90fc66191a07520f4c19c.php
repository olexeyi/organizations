<?php $__env->startSection('content'); ?>
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold">
            Новости <?php echo e($entity->name); ?>

        </h1>
        <div class="flex gap-3">
            <a href="<?php echo e(route('news.create', request()->all())); ?>"
               class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-500">
                Добавить новость
            </a>
            <a href="<?php echo e(route('organizations.index')); ?>"
               class="bg-gray-600 text-white px-4 py-2 rounded hover:bg-gray-500">
                Назад
            </a>
        </div>
    </div>

    <?php $__empty_1 = true; $__currentLoopData = $news; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
        <div class="mb-6 border-b pb-4">
            <h2 class="text-xl font-semibold"><?php echo e($item->title); ?></h2>
            <p class="mt-2 text-gray-700"><?php echo e($item->content); ?></p>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
        <p class="text-gray-500">Новостей пока нет.</p>
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\OSPanel\home\organizations-site\resources\views/news/index.blade.php ENDPATH**/ ?>