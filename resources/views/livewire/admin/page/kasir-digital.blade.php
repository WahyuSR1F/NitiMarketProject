<div class="p-6 bg-gray-50 dark:bg-gray-900 min-h-screen">
    <!-- Header -->
    <h1 class="text-3xl font-bold mb-6 text-gray-800 dark:text-gray-200">
        Kasir Digital
    </h1>

    <div
        class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-3 gap-4"
    >
        <!-- Produk -->
        <div class="md:col-span-2">
            <div class="mb-4">
                <input
                    type="text"
                    placeholder="Cari produk..."
                    wire:keyup="searchProducts($event.target.value)"
                    class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-indigo-300"
                />
            </div>
            <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-4">
                @foreach($products as $product)
                <div
                    class="bg-white dark:bg-gray-800 p-4 rounded-lg shadow hover:shadow-lg cursor-pointer"
                    wire:click="addToCart('{{ $product->id }}', '{{ $product->pric ?? 100000 }}')"
                >
                    <h3
                        class="text-md font-semibold text-gray-800 dark:text-gray-200"
                    >
                        {{ $product->nama }}
                    </h3>
                    <span
                        class="block text-xs text-gray-500 dark:text-gray-400 mt-1"
                    >
                        {{ $product->asal }} - {{ $product->product_by }}
                    </span>
                </div>
                @endforeach
            </div>

            <div class="mt-4">
                {{ $products->links() }}
            </div>
        </div>

        <!-- Keranjang -->
        <div class="bg-white dark:bg-gray-800 p-4 rounded-lg shadow-md">
            <h2 class="text-xl font-bold mb-4 text-gray-800 dark:text-gray-200">
                Keranjang
            </h2>
            <ul class="space-y-2">
                @foreach($cart as $item)
                <li
                    class="flex justify-between items-center bg-gray-100 dark:bg-gray-700 p-2 rounded"
                >
                    <div>
                        <span class="font-medium">{{ $item["name"] }}</span
                        ><br />
                        <span class="text-sm text-gray-600 dark:text-gray-300">
                            Rp
                            {{
                                number_format(
                                    $item["price"] ?? 10000,
                                    0,
                                    ",",
                                    "."
                                )
                            }}
                            x {{ $item["qty"] ?? 1 }}
                        </span>
                    </div>
                    <div class="flex items-center space-x-2">
                        <button
                            class="px-2 bg-red-500 text-white rounded"
                            wire:click="changeQty('{{ $item['id'] }}', -1)"
                        >
                            -
                        </button>
                        <span>{{ $item["qty"] }}</span>
                        <button
                            class="px-2 bg-green-500 text-white rounded"
                            wire:click="changeQty('{{ $item['id'] }}', 1)"
                        >
                            +
                        </button>
                        <button
                            class="ml-2 text-red-600"
                            wire:click="removeFromCart('{{ $item['id'] }}')"
                        >
                            Hapus
                        </button>
                    </div>
                </li>
                @endforeach
            </ul>

            <!-- Promo -->
            <div class="mt-4">
                <label class="block text-gray-700 dark:text-gray-300 mb-1">
                    Pilih Promo:
                </label>
                <select
                    wire:change="setPromo($event.target.value)"
                    class="w-full border rounded p-2"
                >
                    <option value="0">Tidak ada promo</option>
                    <option value="10">Diskon 10%</option>
                    <option value="20">Diskon 20%</option>
                </select>
            </div>

            <!-- Ringkasan -->
            <div class="mt-4 border-t pt-4">
                <p class="text-gray-700 dark:text-gray-300">
                    Subtotal:
                    <span>Rp {{ number_format($subtotal, 0, ",", ".") }}</span>
                </p>
                <p class="text-gray-700 dark:text-gray-300">
                    Diskon:
                    <span>Rp {{ number_format($discount, 0, ",", ".") }}</span>
                </p>
                <p class="font-bold text-gray-900 dark:text-gray-100">
                    Total:
                    <span>Rp {{ number_format($total, 0, ",", ".") }}</span>
                </p>
            </div>
        </div>
    </div>
</div>
