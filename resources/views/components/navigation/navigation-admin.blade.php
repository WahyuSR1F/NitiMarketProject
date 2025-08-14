<div>
    <header
        class="flex items-center justify-between bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700 h-16 px-4 md:px-6 shadow-sm"
    >
        <div class="flex items-center space-x-4">
            <button
                aria-label="Toggle sidebar"
                class="text-primary dark:text-primary-light md:hidden focus:outline-none"
                id="sidebarToggle"
            >
                <i class="fas fa-bars fa-lg"> </i>
            </button>
            <h1
                class="text-2xl font-bold text-primary dark:text-primary-light select-none"
            >
                Dashboard
            </h1>
        </div>
        <div class="flex items-center space-x-4 md:space-x-6">
            <button
                aria-label="Toggle dark mode"
                class="text-gray-600 dark:text-gray-300 hover:text-primary dark:hover:text-primary-light focus:outline-none transition-colors"
                id="darkModeToggle"
                title="Toggle dark mode"
            >
                <i class="fas fa-moon fa-lg"> </i>
            </button>
            <button
                aria-label="Notifications"
                class="relative text-gray-600 dark:text-gray-300 hover:text-primary dark:hover:text-primary-light focus:outline-none transition-colors"
                title="Notifications"
            >
                <i class="fas fa-bell fa-lg"> </i>
                <span
                    class="absolute top-0 right-0 inline-block w-2 h-2 bg-red-500 rounded-full ring-2 ring-white dark:ring-gray-900"
                >
                </span>
            </button>
            <div class="relative">
                <!-- Tombol avatar -->
                <button id="dropdownToggle" type="button">
                    {{ auth()->user()->name ?? 'anonim' }}
                </button>

                <!-- Menu -->
                <div
                    id="dropdownMenu"
                    class="hidden absolute right-0 mt-2 w-48 bg-white rounded shadow"
                >
                    <button
                        wire:click="logout"
                        type="button"
                        class="block w-full text-left px-4 py-2 hover:bg-gray-100"
                    >
                        Keluar
                    </button>
                </div>
            </div>
        </div>
    </header>
</div>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const toggle = document.getElementById("dropdownToggle");
        const menu = document.getElementById("dropdownMenu");

        toggle.addEventListener("click", function () {
            menu.classList.toggle("hidden");
        });

        document.addEventListener("click", function (e) {
            if (!toggle.contains(e.target) && !menu.contains(e.target)) {
                menu.classList.add("hidden");
            }
        });
    });

    document.addEventListener("livewire:load", function () {
        Livewire.on("redirectTo", (url) => {
            window.location.href = url; // Smooth, tidak error Alpine.navigate
        });
    });
</script>
