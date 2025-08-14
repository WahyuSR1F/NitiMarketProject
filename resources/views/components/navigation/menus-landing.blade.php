<div>
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
</div>
