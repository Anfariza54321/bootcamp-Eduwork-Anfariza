<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <?php echo app('Illuminate\Foundation\Vite')('resources/css/app.css'); ?>
    <title><?php echo $__env->yieldContent('title'); ?></title>
</head>
<body>
    <header>
    <?php echo $__env->make('components.navbar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    </header>

    <div>
        <?php echo $__env->yieldContent('content'); ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@tailwindplus/elements@1" type="module"></script>
</body>
</html><?php /**PATH C:\laragon\www\Latihan\laravel_latihan1\resources\views/components/layout.blade.php ENDPATH**/ ?>