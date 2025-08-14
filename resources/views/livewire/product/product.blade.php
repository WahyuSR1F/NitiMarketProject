<div>
    <x-navigation.menus-product />

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
        <h2 class="text-center text-2xl font-bold mb-10 text-[#1e293b]">
            List Product
        </h2>

        {{-- Loading overlay --}}
        <div
            wire:loading.flex
            class="fixed inset-0 bg-white bg-opacity-70 backdrop-blur-sm flex items-center justify-center z-50"
        >
            <svg
                class="animate-spin h-10 w-10 text-red-500"
                xmlns="http://www.w3.org/2000/svg"
                fill="none"
                viewBox="0 0 24 24"
            >
                <circle
                    class="opacity-25"
                    cx="12"
                    cy="12"
                    r="10"
                    stroke="currentColor"
                    stroke-width="4"
                ></circle>
                <path
                    class="opacity-75"
                    fill="currentColor"
                    d="M4 12a8 8 0 018-8v4a4 4 0 00-4 4H4z"
                ></path>
            </svg>
        </div>

        <section
            class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-6 gap-x-1 gap-y-3 max-w-7xl mx-auto"
        >
            @foreach ($products as $product)
            <x-product.card-product
                image="https://storage.googleapis.com/a1aa/image/6061f6cb-ff03-4a1b-e6c2-1f9a0548e988.jpg"
                alt="Gambar produk {{ $product->nama }}"
                title="{{ $product->nama }}"
                description="{{ $product->deskripsi }}"
                buttonText="Click here"
            />
            @endforeach
        </section>

        <div class="mt-6">
            {{ $products->links() }}
        </div>
    </div>
</div>
