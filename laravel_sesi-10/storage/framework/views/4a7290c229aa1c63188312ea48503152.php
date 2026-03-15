<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Checkout</title>
    <?php echo app('Illuminate\Foundation\Vite')('resources/css/app.css'); ?>
</head>

<body class="bg-slate-950 text-slate-100">
    <div class="min-h-screen px-4 py-10 md:px-8">
        <div class="mx-auto max-w-6xl space-y-8">
            <header class="text-center space-y-3">
                <h1 class="text-3xl font-bold text-cyan-300">Checkout</h1>
                <p class="mt-2 text-cyan-100/80">Review item dan lanjutkan pembayaran</p>
                <a href="<?php echo e(route('products.index')); ?>"
                    class="inline-block rounded-lg border border-purple-400 px-4 py-2 text-sm font-semibold text-purple-300 hover:bg-purple-500/20 hover:text-purple-100 transition">
                    &larr; Kembali ke Product List
                </a>
            </header>

            <div class="grid gap-8 lg:grid-cols-3">

                <section class="lg:col-span-2 space-y-4">
                    <?php $checkoutTotal = 0; ?>

                    <?php if(count($cart) > 0): ?>
                        <?php $__currentLoopData = $cart; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php
                                $itemSub = $item['price'] * $item['quantity'];
                                $checkoutTotal += $itemSub;
                            ?>

                            <article
                                class="border border-purple-500/30 bg-slate-800/70 p-4 rounded-xl shadow-lg backdrop-blur-sm">
                                <div class="flex flex-col gap-2 md:flex-row md:items-center md:justify-between">
                                    <div>
                                        <h2 class="text-lg font-semibold text-cyan-300"><?php echo e($item['name']); ?></h2>
                                        <p class="text-sm text-cyan-100/80">Qty: <?php echo e($item['quantity']); ?> • Harga: Rp
                                            <?php echo e(number_format($item['price'], 0, ',', '.')); ?></p>
                                    </div>
                                    <span class="text-sm font-semibold text-cyan-200">Subtotal: Rp
                                        <?php echo e(number_format($itemSub, 0, ',', '.')); ?></span>
                                </div>
                            </article>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        <div class="rounded-xl border border-purple-400 bg-purple-900/20 p-4">
                            <p class="flex justify-between font-semibold text-cyan-100">
                                <span>Total Keranjang</span>
                                <span>Rp <?php echo e(number_format($checkoutTotal, 0, ',', '.')); ?></span>
                            </p>
                        </div>
                    <?php else: ?>
                        <div
                            class="rounded-xl border border-dashed border-purple-500/50 bg-slate-800/60 p-8 text-center">
                            <p class="text-purple-200">Keranjang belanja kosong. Kembali ke <a
                                    href="<?php echo e(route('products.index')); ?>"
                                    class="text-cyan-300 hover:text-cyan-100">produk</a>.</p>
                        </div>
                    <?php endif; ?>
                </section>

                <aside class="rounded-xl border border-purple-500/30 bg-slate-900/80 p-6 shadow-lg">
                    <h2 class="mb-4 text-xl font-bold text-cyan-200">Informasi Pembayaran</h2>
                    <form action="#" method="POST" class="space-y-3">
                        <?php echo csrf_field(); ?>
                        <input type="text" name="full_name" placeholder="Nama Lengkap"
                            class="w-full rounded-md border border-purple-400/40 bg-slate-800/70 p-3 text-slate-100 focus:border-purple-300 focus:outline-none"
                            required>
                        <input type="email" name="email" placeholder="Email"
                            class="w-full rounded-md border border-purple-400/40 bg-slate-800/70 p-3 text-slate-100 focus:border-purple-300 focus:outline-none"
                            required>
                        <input type="text" name="phone" placeholder="No. Telepon"
                            class="w-full rounded-md border border-purple-400/40 bg-slate-800/70 p-3 text-slate-100 focus:border-purple-300 focus:outline-none"
                            required>

                        <button type="submit"
                            class="w-full rounded-lg bg-purple-500 px-4 py-3 text-sm font-bold uppercase tracking-wide text-slate-950 transition hover:bg-purple-400">Complete
                            Purchase</button>
                    </form>
                </aside>
            </div>

        </div>
    </div>
</body>

</html>
<?php /**PATH C:\laragon\www\Latihan\laravel_latihan1\resources\views/components/checkout.blade.php ENDPATH**/ ?>