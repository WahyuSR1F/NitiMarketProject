<article
    class="flex flex-col bg-white rounded-xl shadow-lg hover:shadow-2xl transition-shadow duration-300 max-w-[180px] mx-auto cursor-pointer overflow-hidden"
>
    <!-- Gambar produk dengan efek zoom saat hover -->
    <div class="overflow-hidden rounded-t-xl">
        <img
            src="{{ $image }}"
            alt="{{ $alt }}"
            class="w-full h-36 object-cover transform transition-transform duration-500 hover:scale-105"
            loading="lazy"
        />
    </div>

    <!-- Isi card -->
    <div class="p-3 flex flex-col flex-grow">
        <h3
            class="text-gray-900 font-semibold text-sm mb-1 truncate"
            title="{{ $title }}"
        >
            {{ $title }}
        </h3>

        <p
            class="text-gray-600 text-xs mb-3 line-clamp-3"
            title="{{ $description }}"
        >
            {{ $description }}
        </p>

        <!-- Harga -->
        <div class="text-red-600 font-bold text-base mb-4">500000</div>

        <div class="flex gap-2">
            <button
                type="button"
                class="flex-1 flex items-center justify-center gap-1 bg-gradient-to-r from-red-500 to-red-600 hover:from-red-600 hover:to-red-700 text-white font-semibold py-2 rounded-lg shadow-md transition-all text-xs"
            >
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    class="w-4 h-4"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                    stroke-width="2"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13l-1.2 6M17 13l1.2 6M6 19a2 2 0 100 4 2 2 0 000-4zm12 0a2 2 0 100 4 2 2 0 000-4z"
                    />
                </svg>
            </button>

            <button
                type="button"
                aria-label="Bagikan"
                class="flex items-center justify-center w-10 h-10 border border-gray-300 rounded-lg text-red-600 hover:bg-red-50 transition-colors"
            >
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    class="w-5 h-5"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                    stroke-width="2"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M15 8a3 3 0 11-2.83-2H8a3 3 0 100 6h1m5 0l4 4m0 0l-4 4m4-4H9"
                    />
                </svg>
            </button>
        </div>
    </div>
</article>
