<?php $__env->startSection('content'); ?>
    <h2 class="text-xl font-bold mb-4">Добавить подразделение</h2>

    <p class="mb-2">Организация: <strong><?php echo e($organization->name); ?></strong></p>

    <form action="<?php echo e(route('divisions.store')); ?>" method="POST" class="space-y-4">
        <?php echo csrf_field(); ?>
        <input type="hidden" name="organization_id" value="<?php echo e($organization->id); ?>">

        <div>
            <label for="name" class="block font-medium">Название:</label>
            <input type="text" name="name" class="mt-1 w-full border rounded px-3 py-2" required>
        </div>

        <div>
            <label for="head" class="block font-medium">Глава:</label>
            <input type="text" name="head" class="mt-1 w-full border rounded px-3 py-2">
        </div>

        <div>
            <label for="parent_id" class="block font-medium">Родительское подразделение:</label>
            <select name="parent_id" class="mt-1 w-full border rounded px-3 py-2">
                <option value="">— нет —</option>
                <?php $__currentLoopData = $parentDivisions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $div): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($div->id); ?>"><?php echo e($div->name); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>

        <button type="submit" class="bg-green-600 text-white px-4 py-1 rounded hover:bg-green-500 cursor-pointer">Сохранить</button>
    </form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\OSPanel\home\organizations-site\resources\views/divisions/create.blade.php ENDPATH**/ ?>