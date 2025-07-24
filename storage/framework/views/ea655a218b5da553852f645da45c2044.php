<?php $__env->startSection('content'); ?>
    <h2 class="text-xl font-bold mb-4">Редактировать подразделение</h2>

    <p class="mb-2">Организация: <strong><?php echo e($division->organization->name); ?></strong></p>

    <form action="<?php echo e(route('divisions.update', $division)); ?>" method="POST" class="space-y-4">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>

        <div>
            <label for="name" class="block font-medium">Название:</label>
            <input type="text" name="name" value="<?php echo e($division->name); ?>" class="mt-1 w-full border rounded px-3 py-2" required>
        </div>

        <div>
            <label for="head" class="block font-medium">Глава:</label>
            <input type="text" name="head" value="<?php echo e($division->head); ?>" class="mt-1 w-full border rounded px-3 py-2">
        </div>

        <div>
            <label for="parent_id" class="block font-medium">Родительское подразделение:</label>
            <select name="parent_id" class="w-full border rounded p-2">
                <option value="">— нет —</option>
                <?php $__currentLoopData = $parentDivisions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $div): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($div->id); ?>" <?php echo e($division->parent_id == $div->id ? 'selected' : ''); ?>>
                        <?php echo e($div->name); ?>

                    </option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>

        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-500 cursor-pointer">Обновить</button>
    </form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\OSPanel\home\organizations-site\resources\views/divisions/edit.blade.php ENDPATH**/ ?>