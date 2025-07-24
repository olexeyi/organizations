<?php $__env->startSection('content'); ?>
    <h1 class="text-2xl font-bold mb-6">Список организаций</h1>

    <?php $__currentLoopData = $organizations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $org): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="mb-8 border-t-4 border-gray-800 pt-4">
            <div class="flex justify-between items-center">
                <div>
                    <p class="text-lg font-semibold"><?php echo e($org->name); ?></p>
                    <p class="text-sm text-gray-600"><?php echo e($org->phone); ?> | <?php echo e($org->email); ?></p>
                </div>

                <div class="flex gap-2">
                    <a href="<?php echo e(route('divisions.create', ['org_id' => $org->id])); ?>" class="bg-green-600 text-white px-4 py-1 rounded hover:bg-green-500 cursor-pointer">
                        Добавить подразделение
                    </a>
                    <a href="<?php echo e(route('organizations.edit', $org)); ?>" class="bg-blue-600 text-white px-4 py-1 rounded hover:bg-blue-500 cursor-pointer">
                        Редактировать
                    </a>
                    <form method="POST" action="<?php echo e(route('organizations.destroy', $org)); ?>" onsubmit="return confirm('Удалить эту организацию?');">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('DELETE'); ?>
                        <button type="submit" class="bg-red-600 text-white px-4 py-1 rounded hover:bg-red-500 cursor-pointer">Удалить</button>
                    </form>
                </div>
            </div>

            <ul class="mt-4">
                <?php $__currentLoopData = $org->divisions->where('parent_id', null); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $div): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php echo $__env->make('divisions.partials.division_item', ['division' => $div], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    <div class="mt-8">
        <a href="<?php echo e(route('organizations.create')); ?>" class="inline-block px-4 py-2 bg-green-600 text-white rounded hover:bg-green-500">
            Добавить организацию
        </a>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\OSPanel\home\organizations-site\resources\views/organizations/index.blade.php ENDPATH**/ ?>