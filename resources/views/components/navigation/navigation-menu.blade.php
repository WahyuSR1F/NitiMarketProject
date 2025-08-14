<!-- Tambahkan x-data untuk membuat Alpine.js state -->
<nav
    x-data="{ open: false }"
    class="max-w-7xl mx-auto px-6 py-8 flex items-center justify-between"
>
    <!-- Logo dan Judul -->
    <div class="flex items-center">
        <img
            src="{{ asset('img/grocery.png') }}"
            alt="Icon"
            class="w-8 h-8 mr-2"
            width="32"
            height="32"
        />
        <span class="font-extrabold text-2xl">Niti Market</span>
    </div>

    <!-- Tombol hamburger (muncul di tampilan mobile) -->
    <button
        @click="open = !open"
        class="md:hidden text-gray-700 focus:outline-none"
    >
        <svg
            xmlns="http://www.w3.org/2000/svg"
            class="h-6 w-6"
            fill="none"
            viewBox="0 0 24 24"
            stroke="currentColor"
        >
            <path
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="M4 6h16M4 12h16M4 18h16"
            />
        </svg>
    </button>

    <!-- Menu utama (desktop) -->
    <ul class="hidden md:flex space-x-6 text-xs font-semibold">
        <x-navigation.sub-navigation.nav-link href="/"
            >Home</x-navigation.sub-navigation.nav-link
        >
        <x-navigation.sub-navigation.nav-link href="/about"
            >About Me</x-navigation.sub-navigation.nav-link
        >
        <x-navigation.sub-navigation.nav-link href="/product"
            >Product</x-navigation.sub-navigation.nav-link
        >
        <x-navigation.sub-navigation.nav-link href="/contact"
            >Contact Kami</x-navigation.sub-navigation.nav-link
        >
    </ul>

    <!-- Tombol login dan dark mode (desktop) -->
    <div class="hidden md:flex items-center">
        <button
            id="darkModeToggle"
            aria-label="Toggle Dark Mode"
            class="ml-4 p-2 rounded bg-gray-200 dark:bg-gray-700 text-gray-800 dark:text-gray-200 hover:bg-primaryRed hover:text-white transition"
            title="Toggle Dark Mode"
            type="button"
        >
            <i class="fas fa-moon"></i>
        </button>
        <a wire:navigate href="/login">
            <button
                class="ml-4 p-2 text-xs rounded-lg bg-primaryRed hover:bg-red-700 text-white font-semibold transition duration-200 ease-in-out shadow-md transform hover:scale-105"
            >
                <i class="fas fa-door-open"></i> Pelanggan
            </button>
        </a>
    </div>
</nav>

<!-- Menu mobile (tampil hanya jika open == true) -->
<div
    x-show="open"
    x-transition
    class="md:hidden px-6 pb-4 space-y-4 text-sm font-semibold"
>
    <x-navigation.sub-navigation.nav-link href="/"
        >Home</x-navigation.sub-navigation.nav-link
    >
    <x-navigation.sub-navigation.nav-link href="/about"
        >About Me</x-navigation.sub-navigation.nav-link
    >
    <x-navigation.sub-navigation.nav-link href="/product"
        >Product</x-navigation.sub-navigation.nav-link
    >
    <x-navigation.sub-navigation.nav-link href="/contact"
        >Contact Kami</x-navigation.sub-navigation.nav-link
    >

    <!-- Tombol login dan dark mode juga bisa ditaruh di mobile menu -->
    <button
        id="darkModeToggleMobile"
        aria-label="Toggle Dark Mode"
        class="w-full p-2 rounded bg-gray-200 dark:bg-gray-700 text-gray-800 dark:text-gray-200 hover:bg-primaryRed hover:text-white transition"
        type="button"
    >
        <i class="fas fa-moon"></i> Mode
    </button>
    <a wire:navigate href="/login">
        <button
            class="w-full p-2 rounded-lg bg-primaryRed hover:bg-red-700 text-white font-semibold transition duration-200 ease-in-out shadow-md transform hover:scale-105"
        >
            <i class="fas fa-door-open"></i> Pelanggan
        </button>
    </a>
</div>
