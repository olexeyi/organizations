<?php $__env->startSection('content'); ?>
    <h1 class="text-2xl font-bold mb-6">Добавить новость для <?php echo e(isset($organization) ? $organization->name : $division->name); ?></h1>

    <form method="POST" action="<?php echo e(route('news.store')); ?>">
        <?php echo csrf_field(); ?>

        <?php if(request('organization_id')): ?>
            <input type="hidden" name="organization_id" value="<?php echo e(request('organization_id')); ?>">
        <?php endif; ?>

        <?php if(request('division_id')): ?>
            <input type="hidden" name="division_id" value="<?php echo e(request('division_id')); ?>">
        <?php endif; ?>

        <div class="mb-4">
            <label class="block font-semibold">Название</label>
            <input type="text" name="title" class="w-full border rounded px-3 py-2" required>
        </div>

        <div class="mb-4">
            <label class="block font-semibold">Содержание</label>
            <textarea name="content" class="w-full border rounded px-3 py-2" rows="6" required></textarea>
        </div>

        <button type="submit"
                class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-500">
            Сохранить
        </button>
    </form>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\OSPanel\home\organizations-site\resources\views/news/create.blade.php ENDPATH**/ ?>