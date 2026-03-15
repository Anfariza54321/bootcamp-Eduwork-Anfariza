<section class="bg-slate-950 text-white">
    <div class="mx-auto max-w-7xl px-4 py-10 sm:px-6 sm:py-14 lg:px-8">
        <div class="mx-auto max-w-3xl">
            <header class="text-center">
                <h1 class="text-2xl font-bold text-cyan-300 sm:text-4xl">Your Cart</h1>
                <p class="mt-2 text-cyan-100/80">Review dan lanjutkan belanja dengan gaya neon</p>
            </header>

            <div class="mt-8">
                <ul class="space-y-4">
                    <?php if(count($cart) > 0): ?>
                        <?php $__currentLoopData = $cart; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $details): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li
                                class="relative flex flex-col rounded-xl border-2 border-purple-500/70 bg-slate-900/70 p-4 shadow-2xl transition hover:-translate-y-1 hover:shadow-purple-500/40">
                                <div class="flex items-start gap-4">
                                    
                                    <div class="flex-1">
                                        <h3 class="text-base font-semibold text-cyan-200"><?php echo e($details['name']); ?></h3>
                                        <p class="mt-1 text-sm text-cyan-300 font-semibold">Rp
                                            <?php echo e(number_format($details['price'])); ?></p>
                                        <p class="text-xs text-cyan-100/80">Subtotal: Rp
                                            <?php echo e(number_format($details['price'] * $details['quantity'])); ?></p>
                                    </div>

                                    <span
                                        class="ml-auto rounded-full bg-cyan-600 px-3 py-1 text-xs font-semibold text-white">Qty
                                        <?php echo e($details['quantity']); ?></span>
                                </div>

                                <div class="mt-3 flex items-center justify-between gap-2">
                                    <form action="<?php echo e(route('cart.remove', $id)); ?>" method="POST"
                                        class="flex items-center gap-2">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('DELETE'); ?>
                                        <button type="submit"
                                            class="rounded-md border border-red-400/40 bg-red-50 px-3 py-1 text-xs font-semibold text-red-600 transition hover:bg-red-100 hover:text-red-500">
                                            <span class="sr-only">Remove item</span>
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="size-4">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0">
                                                </path>
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                            </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php else: ?>
                        <li class="text-center py-10 text-gray-500">Keranjang belanja kosong.</li>
                    <?php endif; ?>
                </ul>

                
                <div class="mt-8 flex justify-end border-t border-purple-500/40 pt-8">
                    <div class="w-screen max-w-lg space-y-4">
                        <dl class="space-y-0.5 text-sm text-cyan-100">
                            <div class="flex justify-between font-semibold text-lg text-cyan-200">
                                <dt>Total</dt>
                                <dd>Rp
                                    <?php $total = 0 ?>
                                    <?php $__currentLoopData = $cart; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php $total += $item['price'] * $item['quantity'] ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php echo e(number_format($total)); ?>

                                </dd>
                            </div>
                        </dl>

                        <div class="flex justify-end">
                            <a href="/checkout"
                                class="block rounded-lg bg-purple-500 px-5 py-3 text-sm font-bold text-slate-950 shadow-lg transition hover:bg-purple-400 hover:shadow-purple-500/40">
                                Checkout
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php /**PATH C:\laragon\www\Bootcamp-Eduwork\laravel_sesi-10\resources\views/components/carts.blade.php ENDPATH**/ ?>