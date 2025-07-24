<li class="border-t border-gray-300 py-2">
    <div class="flex justify-between items-center">
        <span class="font-medium">
            <?php echo e($division->name); ?>

            <?php if($division->head): ?>
                — <em class="font-light">Глава: <?php echo e($division->head); ?></em>
            <?php endif; ?>
        </span>
        <div class="flex gap-2">
            <a href="<?php echo e(route('divisions.create', ['org_id' => $division->organization_id, 'parent_id' => $division->id])); ?>"
               class="bg-green-600 text-white px-4 py-1 rounded hover:bg-green-500 cursor-pointer">
                Добавить подразделение
            </a>
            <a href="<?php echo e(route('divisions.edit', $division)); ?>"
               class="bg-blue-600 text-white px-4 py-1 rounded hover:bg-blue-500 cursor-pointer">
                Редактировать
            </a>
            <form method="POST" action="<?php echo e(route('divisions.destroy', $division)); ?>"
                  onsubmit="return confirm('Удалить это подразделение?');">
                <?php echo csrf_field(); ?>
                <?php echo method_field('DELETE'); ?>
                <button type="submit" class="bg-red-600 text-white px-4 py-1 rounded hover:bg-red-500 cursor-pointer">
                    Удалить
                </button>
            </form>
        </div>
    </div>

    <?php if($division->children->count()): ?>
        <ul class="ml-6 mt-2 border-l-2 border-gray-300 pl-4">
            <?php $__currentLoopData = $division->children; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $child): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php echo $__env->make('divisions.partials.division_item', ['division' => $child], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    <?php endif; ?>
</li>
<?php /**PATH C:\OSPanel\home\organizations-site\resources\views/divisions/partials/division_item.blade.php ENDPATH**/ ?>