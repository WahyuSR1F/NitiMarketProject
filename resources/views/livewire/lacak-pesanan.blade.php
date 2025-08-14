<div>
    {{-- Search Lacak Pesanan --}}

    {{-- Section Navigasi --}}
    <section class="bg-primaryRed py-5">
        <div class="max-w-7xl mx-auto px-6">
            <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-5 gap-6">
                <x-navigation.sub-navigation.nav-link-product
                    img="https://storage.googleapis.com/a1aa/image/231bcb35-6f88-4856-e07a-7cb0ee059222.jpg"
                    alt="Produk"
                    label="Produk"
                    href="{{ route('product') }}"
                />
                <x-navigation.sub-navigation.nav-link-product
                    img="https://storage.googleapis.com/a1aa/image/231bcb35-6f88-4856-e07a-7cb0ee059222.jpg"
                    alt="Produk Unggulan"
                    label="Produk Unggulan"
                    href="{{ route('ungulan') }}"
                />
                <x-navigation.sub-navigation.nav-link-product
                    img="https://storage.googleapis.com/a1aa/image/108b263c-beb2-4d00-715e-4dd5fc07a217.jpg"
                    alt="Kategori"
                    label="Kategori"
                    href="{{ route('kategori',['page' => 'kategori'])}}"
                />
                <x-navigation.sub-navigation.nav-link-product
                    img="https://storage.googleapis.com/a1aa/image/39238521-f1f9-4ebf-6d36-b389eaccaa45.jpg"
                    alt="Promo"
                    label="Promo & Diskon"
                    href="{{ route('promo') }}"
                />
                <x-navigation.sub-navigation.nav-link-product
                    img="https://storage.googleapis.com/a1aa/image/39238521-f1f9-4ebf-6d36-b389eaccaa45.jpg"
                    alt="Promo"
                    label="Packet Belanja"
                    href="{{ route('packet') }}"
                />
                <x-navigation.sub-navigation.nav-link-product
                    img="https://storage.googleapis.com/a1aa/image/39238521-f1f9-4ebf-6d36-b389eaccaa45.jpg"
                    alt="Promo"
                    label="Lacak Pesanan"
                    href="{{ route('lacak') }}"
                />
            </div>
        </div>
    </section>
    <section>
        <div class="bg-white py-6">
            <h1 class="text-center text-bold text-3xl py-4">
                Lacak Pesanan Mu
            </h1>
            <div class="max-w-2xl mx-auto px-6">
                <form
                    action="{{ route('lacak') }}"
                    method="GET"
                    class="flex flex-col sm:flex-row items-center gap-3 w-full"
                >
                    <input
                        type="text"
                        name="kode"
                        placeholder="Masukkan Kode Pesanan..."
                        class="w-full border border-gray-300 rounded-md py-3 px-4 focus:outline-none focus:ring-2 focus:ring-primaryRed focus:border-transparent text-sm"
                        required
                    />
                    <button
                        type="submit"
                        class="w-full sm:w-auto bg-primaryRed text-white px-6 py-3 rounded-md hover:bg-red-600 transition text-sm"
                    >
                        Lacak
                    </button>
                </form>
            </div>
        </div>
    </section>
</div>
