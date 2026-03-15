<section class="bg-gray-900 py-5">
    <form action="<?php echo e(route('products.index')); ?>" method="GET">
        <div class="mx-auto max-w-7xl px-4 py-8 sm:px-6 lg:px-8">
            <div
                class="flex flex-col md:flex-row items-center justify-between gap-4 mb-10 bg-gray-900 p-4 rounded-2xl shadow-md border-2 border-purple-400/90 ring-1 ring-purple-500/30 relative z-10">
                <div class="flex flex-wrap items-center gap-3 w-full md:w-auto">

                    <div class="relative inline-block text-left">
                        <button type="button" onclick="toggleMenu('menuCheckbox')"
                            class="px-5 py-2.5 rounded-xl text-white text-sm font-semibold cursor-pointer border-cyan-800 outline-0 bg-purple-600/50 hover:bg-purple-800/50 transition flex items-center shadow-md">
                            Categories
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-3 fill-white ml-2 pointer-events-none"
                                viewBox="0 0 24 24">
                                <path
                                    d="M11.99997 18.1669a2.38 2.38 0 0 1-1.68266-.69733l-9.52-9.52a2.38 2.38 0 1 1 3.36532-3.36532l7.83734 7.83734 7.83734-7.83734a2.38 2.38 0 1 1 3.36532 3.36532l-9.52 9.52a2.38 2.38 0 0 1-1.68266.69734z" />
                            </svg>
                        </button>

                        <ul id="menuCheckbox"
                            class="hidden absolute left-0 mt-2 shadow-2xl bg-purple-950/95 py-3 px-3 z-20 min-w-55 rounded-xl max-h-96 overflow-auto border-2 border-purple-400/90">

                            <li
                                class="flex items-center gap-3 py-2 px-2 hover:bg-purple-800/50 rounded-lg cursor-pointer text-sm text-purple-100">
                                <input type="checkbox" name="category[]" value="Adidas"
                                    class="w-4 h-4 rounded border-purple-400 text-purple-300 focus:ring-purple-500">
                                <span>Adidas</span>
                            </li>
                            <li
                                class="flex items-center gap-3 py-2 px-2 hover:bg-purple-800/50 rounded-lg cursor-pointer text-sm text-purple-100">
                                <input type="checkbox" name="category[]" value="Adidas"
                                    class="w-4 h-4 rounded border-purple-400 text-purple-300 focus:ring-purple-500">
                                <span>Nike</span>
                            </li>
                        </ul>
                    </div>

                    <div class="relative inline-block text-left">
                        <button type="button" onclick="toggleDropdown('categoryMenu')"
                            class="px-5 py-2.5 rounded-xl border border-cyan-800 cursor-pointer text-white text-sm font-semibold outline-none bg-purple-600/50 hover:bg-purple-800/50 transition flex items-center">
                            Sort By
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-3 fill-gray-500 ml-2 pointer-events-none"
                                viewBox="0 0 24 24">
                                <path
                                    d="M11.99997 18.1669a2.38 2.38 0 0 1-1.68266-.69733l-9.52-9.52a2.38 2.38 0 1 1 3.36532-3.36532l7.83734 7.83734 7.83734-7.83734a2.38 2.38 0 1 1 3.36532 3.36532l-9.52 9.52a2.38 2.38 0 0 1-1.68266.69734z" />
                            </svg>
                        </button>
                        <ul id="categoryMenu"
                            class="hidden absolute z-30 mt-2 w-48 bg-slate-900/95 border-2 border-purple-400/90 rounded-xl shadow-lg">
                            <li>
                                <a href="<?php echo e(request()->fullUrlWithQuery(['sort' => 'price_low'])); ?>"
                                    class="block px-4 py-3 text-sm text-purple-100 hover:bg-purple-500/20 hover:text-purple-50 transition-colors">
                                    Harga Terendah
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo e(request()->fullUrlWithQuery(['sort' => 'price_high'])); ?>"
                                    class="block px-4 py-3 text-sm text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition-colors">
                                    Harga Tertinggi
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>

                <div <div
                    class="flex-1 flex items-center gap-2 bg-slate-800/80 rounded-xl px-4 py-2 border border-purple-500/40">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-purple-300" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>

                    <input type="text" name="search" value="<?php echo e(request('search')); ?>"
                        placeholder="Search product name..."
                        class="bg-slate-900/80 border border-purple-500/40 text-purple-100 text-sm w-full rounded-md px-3 py-2 focus:border-purple-300 focus:outline-none focus:ring-2 focus:ring-purple-400/40">

                    <button type="submit"
                        class="bg-purple-500 hover:bg-purple-400 text-slate-950 px-4 py-1.5 rounded-lg text-sm font-medium transition shrink-0">
                        Search
                    </button>

                    <a href="<?php echo e(route('products.index')); ?>"
                        class="bg-purple-900/30 text-purple-200 hover:bg-purple-900/40 px-4 py-1.5 rounded-lg text-sm font-medium transition shrink-0">
                        Reset
                    </a>
                </div>

            </div>
    </form>

    

    <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-4 p-8">

        <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <a href="/product-detail/<?php echo e($item['id']); ?>"
                class="group relative z-0 block overflow-hidden rounded-xl p-2 transition duration-300 hover:z-10">
                <div
                    class="relative overflow-hidden rounded-lg border-2 border-purple-400/90 bg-slate-900/90 transition duration-300 hover:border-purple-300">
                    <img src="https://images.unsplash.com/photo-1628202926206-c63a34b1618f?auto=format&amp;fit=crop&amp;q=80&amp;w=1160"
                        alt=""
                        class="h-64 w-full object-cover transition duration-500 transform group-hover:scale-105 sm:h-72">

                    <div class="relative bg-slate-950/80 p-6 z-10">
                        <p class="text-cyan-600 font-semibold">
                            $<?php echo e($item['hargaDiskon']); ?>

                            <span class="text-gray-400 line-through">$<?php echo e($item['hargaAsli']); ?></span>
                        </p>

                        <h3 class="mt-1.5 text-lg font-medium text-cyan-600"><?php echo e($item['namaProduk']); ?>

                        </h3>

                        <p class="mt-1.5 line-clamp-3 text-gray-700">

                        </p>

                        <form action="<?php echo e(route('carts.add', $item['id'])); ?>" method="POST"
                            class="mt-4 flex gap-4 items-center justify-between">
                            <?php echo csrf_field(); ?>
                            <input type="hidden" name="name" value="<?php echo e($item['namaProduk']); ?>">
                            <input type="hidden" name="price" value="<?php echo e($item['hargaDiskon']); ?>">
                            

                            <button type="submit"
                                class="rounded-md bg-purple-100/30 px-3 py-2 text-xs font-semibold text-purple-300 hover:bg-purple-500/30 hover:text-purple-100 transition focus:outline-none focus:ring-2 focus:ring-purple-300">
                                Add to Cart
                            </button>

                            <button type="button"
                                class="block w-auto rounded-lg bg-purple-600 px-4 py-3 text-sm font-semibold text-white shadow-[0_0_20px_rgba(139,92,246,0.35)] transition hover:bg-purple-500 hover:scale-105 focus:outline-none focus:ring-2 focus:ring-purple-300">
                                Buy Now
                            </button>
                        </form>
                    </div>
                </div>
            </a>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    </div>
    </div>

</section>

<?php echo app('Illuminate\Foundation\Vite')(['resources/js/product-list.js']); ?>

<?php /**PATH C:\laragon\www\Latihan\laravel_latihan1\resources\views/components/product-list.blade.php ENDPATH**/ ?>