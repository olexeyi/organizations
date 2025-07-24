<?php $__env->startSection('content'); ?>
    <h1 class="text-2xl font-bold mb-4">Добавить подразделение</h1>

    <?php if(isset($parentDivision)): ?>
        <p class="mb-2 text-sm text-gray-700">Вложенное под <strong><?php echo e($parentDivision->name); ?></strong></p>
    <?php endif; ?>

    <form method="POST" action="/organizations/store_division" class="space-y-4">
        <?php echo csrf_field(); ?>
        <input type="hidden" name="organization_id" value="<?php echo e($organization->id); ?>">
        <?php if(isset($parent_id)): ?>
            <input type="hidden" name="parent_id" value="<?php echo e($parent_id); ?>">
        <?php endif; ?>

        <div>
            <label class="block font-medium">Название подразделения:</label>
            <input name="name" type="text" class="mt-1 w-full border rounded px-3 py-2" required>
        </div>
        <div>
            <label class="block font-medium">Глава:</label>
            <input name="head" type="text" class="mt-1 w-full border rounded px-3 py-2">
        </div>
        <button type="submit" class="bg-green-600 text-white px-6 py-2 rounded hover:bg-green-700 hover:underline cursor-pointer">
            Сохранить
        </button>
    </form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\OSPanel\home\organizations-site\resources\views/organizations/create.blade.php ENDPATH**/ ?>
