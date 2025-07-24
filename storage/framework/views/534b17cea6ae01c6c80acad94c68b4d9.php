<?php $__env->startSection('content'); ?>
    <h1>Добавить подразделение</h1>

    <form method="POST" action="/organizations/store_division">
        <?php echo csrf_field(); ?>

        <div>
            <label><strong>Организация:</strong></label>
            <div style="margin-bottom: 10px;">
                <span><?php echo e($organization->name); ?></span>
            </div>
            <input type="hidden" name="organization_id" value="<?php echo e($organization->id); ?>">
        </div>

        <div>
            <label>Название подразделения:</label><br>
            <input type="text" name="name" required>
        </div><br>

        <div>
            <label>Глава:</label><br>
            <input type="text" name="head">
        </div><br>

        <button type="submit">Сохранить</button>
    </form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\OSPanel\home\organizations-site\resources\views/organizations/create.blade.php ENDPATH**/ ?>
