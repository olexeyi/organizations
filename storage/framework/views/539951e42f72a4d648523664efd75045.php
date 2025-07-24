<?php $__env->startSection('content'); ?>
    <h1 class="text-2xl font-bold mb-4">Добавить организацию</h1>

    <form method="POST" action="/organizations/store" class="space-y-4">
        <?php echo csrf_field(); ?>
        <div>
            <label class="block font-medium">Название:</label>
            <input name="name" type="text" class="mt-1 w-full border rounded px-3 py-2" required>
        </div>
        <div>
            <label class="block font-medium">Телефон:</label>
            <input name="phone" type="text" class="mt-1 w-full border rounded px-3 py-2" required>
        </div>
        <div>
            <label class="block font-medium">Email:</label>
            <input name="email" type="email" class="mt-1 w-full border rounded px-3 py-2" required>
        </div>
        <button type="submit" class="bg-purple-600 text-white px-6 py-2 rounded hover:bg-purple-700 hover:underline cursor-pointer">
            Сохранить
        </button>
    </form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\OSPanel\home\organizations-site\resources\views/organizations/create.blade.php ENDPATH**/ ?>
