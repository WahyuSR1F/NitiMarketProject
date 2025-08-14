<div class="bg-white shadow-md w-full px-4 py-4">
    <div
        class="max-w-4xl mx-auto flex flex-col md:flex-row items-center justify-between gap-4"
    >
        <!-- Search Box -->
        <div class="relative w-full">
            <form wire:submit.prevent="searchEngine">
                <input
                    type="text"
                    wire:model.lazy="search"
                    placeholder="Cari sesuatu barang  di sini..."
                    class="w-full px-5 py-3 pl-12 rounded-lg border border-gray-300 shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 text-gray-800 placeholder:text-gray-400"
                />
                <!-- Search icon -->
                <button
                    type="submit"
                    class="absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 text-lg focus:outline-none"
                >
                    🔍
                </button>
            </form>
        </div>

        <!-- Filter Dropdown -->
        <div class="relative w-full md:w-52">
            <select
                wire:model="filter"
                class="w-full appearance-none px-4 py-3 rounded-lg border border-gray-300 shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 text-gray-700 pr-10"
            >
                <option value="">📂 Semua Status</option>
                <option value="aktif">✅ Aktif</option>
                <option value="nonaktif">❌ Nonaktif</option>
                <option value="pending">⏳ Pending</option>
            </select>
            <!-- Dropdown Icon -->
            <div
                class="absolute right-3 top-1/2 transform -translate-y-1/2 pointer-events-none text-gray-500 text-base"
            >
                ▼
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener("livewire:init", () => {
        Livewire.on("navigateToProduct", ({ search }) => {
            Livewire.navigate(`/product?search=${encodeURIComponent(search)}`);
        });
    });
</script>
