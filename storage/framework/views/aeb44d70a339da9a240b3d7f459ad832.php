<?php $__env->startSection('content'); ?>
    <h2 class="text-xl font-bold mb-4">Редактировать организацию</h2>

    <form action="<?php echo e(route('organizations.update', $organization)); ?>" method="POST" class="space-y-4">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>

        <div>
            <label for="name" class="block font-medium">Название:</label>
            <input type="text" name="name" value="<?php echo e($organization->name); ?>" class="mt-1 w-full border rounded px-3 py-2" required>
        </div>

        <div>
            <label for="phone" class="block font-medium">Телефон:</label>
            <input type="text" name="phone" value="<?php echo e($organization->phone); ?>" class="mt-1 w-full border rounded px-3 py-2">
        </div>

        <div>
            <label for="email" class="block font-medium">Email:</label>
            <input type="email" name="email" value="<?php echo e($organization->email); ?>" class="mt-1 w-full border rounded px-3 py-2">
        </div>

        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-500 cursor-pointer"">Обновить</button>
    </form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\OSPanel\home\organizations-site\resources\views/organizations/edit.blade.php ENDPATH**/ ?>