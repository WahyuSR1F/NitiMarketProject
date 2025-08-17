<div>
    <aside
        class="fixed inset-y-0 left-0 w-64 bg-[#FF4B4B] dark:bg-primary-dark shadow-lg transform -translate-x-full md:translate-x-0 transition-transform duration-300 ease-in-out z-40"
        id="sidebar"
    >
        <div
            class="h-16 flex items-center justify-center border-b border-primary-light dark:border-primary-light/40 font-extrabold text-white text-2xl tracking-wide select-none"
        >
            NitiMarket
        </div>
        <nav
            class="flex flex-col p-4 space-y-1 overflow-y-auto h-[calc(100vh-4rem)]"
        >
            <div class="space-y-2">
                <x-navigation.sub-navigation.nav-link-sidebar-admin
                    href="{{ route('admin.dashboard') }}"
                    icon="fas fa-user-shield"
                    :active="request()->routeIs('admin.dashboard')"
                >
                    Admin Dashboard
                </x-navigation.sub-navigation.nav-link-sidebar-admin>

                <x-navigation.sub-navigation.nav-link-sidebar-admin
                    href="{{ route('admin.users.index') }}"
                    icon="fas fa-users"
                    :active="request()->routeIs('admin.users.index')"
                >
                    Kelola User
                </x-navigation.sub-navigation.nav-link-sidebar-admin>

                <x-navigation.sub-navigation.nav-link-sidebar-admin
                    href="{{ route('admin.product.index') }}"
                    icon="fas fa-boxes"
                    :active="request()->routeIs('admin.product.index')"
                >
                    Kelola Produk
                </x-navigation.sub-navigation.nav-link-sidebar-admin>

                <x-navigation.sub-navigation.nav-link-sidebar-admin
                    href="{{ route('admin.unggulan.index') }}"
                    icon="fas fa-boxes"
                    :active="request()->routeIs('admin.unggulan.index')"
                >
                    Product Unggulan
                </x-navigation.sub-navigation.nav-link-sidebar-admin>

                <x-navigation.sub-navigation.nav-link-sidebar-admin
                    href="{{ route('admin.promo.index') }}"
                    icon="fas fa-tags"
                    :active="request()->routeIs('admin.promo.index')"
                >
                    Kelola Promo
                </x-navigation.sub-navigation.nav-link-sidebar-admin>

                <x-navigation.sub-navigation.nav-link-sidebar-admin
                    href="{{ route('admin.pesanan.index') }}"
                    icon="fas fa-shopping-basket"
                    :active="request()->routeIs('admin.pesanan.index')"
                >
                    Kelola Pesanan
                </x-navigation.sub-navigation.nav-link-sidebar-admin>
            </div>
        </nav>
    </aside>
</div>
