<?php $__env->startSection('content'); ?>
    <h1 class="text-2xl font-bold mb-4">Редактировать подразделение</h1>

    <p class="mb-2 text-sm text-gray-700">Организация: <strong><?php echo e($division->organization->name); ?></strong></p>

    <form method="POST" action="/organizations/update_division/<?php echo e($division->id); ?>" class="space-y-4">
        <?php echo csrf_field(); ?> <?php echo method_field('PUT'); ?>
        <input type="hidden" name="organization_id" value="<?php echo e($division->organization_id); ?>">
        <input type="hidden" name="parent_id" value="<?php echo e($division->parent_id); ?>">

        <div>
            <label class="block font-medium">Название подразделения:</label>
            <input name="name" type="text" value="<?php echo e($division->name); ?>" class="mt-1 w-full border rounded px-3 py-2" required>
        </div>
        <div>
            <label class="block font-medium">Глава:</label>
            <input name="head" type="text" value="<?php echo e($division->head); ?>" class="mt-1 w-full border rounded px-3 py-2">
        </div>
        <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700 hover:underline cursor-pointer">
            Сохранить
        </button>
    </form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\OSPanel\home\organizations-site\resources\views/organizations/edit.blade.php ENDPATH**/ ?>
