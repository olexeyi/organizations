<?php
    $indent = $level * 1.5;
?>

<li class="py-2 flex justify-between items-start" style="margin-left: <?php echo e($indent); ?>rem;">
    <div>
        <span class="font-medium"><?php echo e($division->name); ?></span>
        <?php if($division->head): ?>
            <span class="text-sm text-gray-500">— Глава: <?php echo e($division->head); ?></span>
        <?php endif; ?>
    </div>
    <div class="flex gap-2">
        <a href="/organizations/add_division?org_id=<?php echo e($orgId); ?>&parent_id=<?php echo e($division->id); ?>" class="bg-green-600 text-white px-2 py-1 rounded hover:bg-green-400 hover:underline cursor-pointer text-xs">
            Добавить дочернее
        </a>
        <a href="/organizations/edit_division/<?php echo e($division->id); ?>" class="bg-blue-600 text-white px-2 py-1 rounded hover:bg-blue-400 hover:underline cursor-pointer text-xs">
            Редактировать
        </a>
        <form method="POST" action="/divisions/<?php echo e($division->id); ?>" onsubmit="return confirm('Удалить это подразделение?');">
            <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
            <button type="submit" class="bg-red-600 text-white px-2 py-1 rounded hover:bg-red-400 hover:underline cursor-pointer text-xs">
                Удалить
            </button>
        </form>
    </div>
</li>

<?php if($division->children->count()): ?>
    <?php $__currentLoopData = $division->children; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $child): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php echo $__env->make('organizations.partials.division', ['division' => $child, 'orgId' => $orgId, 'level' => $level + 1], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>
<?php /**PATH C:\OSPanel\home\organizations-site\resources\views/organizations/partials/division_item.blade.php ENDPATH**/ ?>
