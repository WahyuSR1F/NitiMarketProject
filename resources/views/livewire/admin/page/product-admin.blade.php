<div>
    <div class="p-6">
        <!-- Header -->
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-3xl font-bold text-gray-800 dark:text-gray-200">
                Manajemen Product
            </h1>
            <button
                class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg shadow transition"
                onclick="openCreateProductModal()"
            >
                + Tambah Produk
            </button>
        </div>

        <!-- Filter Section -->
        <div class="grid grid-cols-1 md:grid-cols-5 gap-4 mb-6">
            <div>
                <label
                    class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1"
                    >Kategori</label
                >
                <select
                    class="w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:outline-none"
                >
                    <option>Semua</option>
                    <option>Elektronik</option>
                    <option>Pakaian</option>
                    <option>Makanan</option>
                </select>
            </div>

            <div>
                <label
                    class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1"
                    >Harga Minimum</label
                >
                <input
                    type="number"
                    placeholder="Rp"
                    class="w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:outline-none"
                />
            </div>

            <div>
                <label
                    class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1"
                    >Harga Maksimum</label
                >
                <input
                    type="number"
                    placeholder="Rp"
                    class="w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:outline-none"
                />
            </div>

            <div>
                <label
                    class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1"
                    >Tanggal Masuk</label
                >
                <input
                    type="date"
                    class="w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:outline-none"
                />
            </div>

            <div>
                <label
                    class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1"
                    >Tanggal Kadaluarsa</label
                >
                <input
                    type="date"
                    class="w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:outline-none"
                />
            </div>

            <div class="md:col-span-2">
                <label
                    class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1"
                    >Asal Perusahaan</label
                >
                <input
                    type="text"
                    placeholder="Nama Perusahaan"
                    class="w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:outline-none"
                />
            </div>

            <div class="md:col-span-3 flex items-end justify-end gap-2">
                <button
                    class="px-4 py-2 bg-gray-200 hover:bg-gray-300 text-gray-700 rounded-lg transition"
                >
                    Reset
                </button>
                <button
                    class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg shadow transition"
                >
                    Terapkan Filter
                </button>
            </div>
        </div>

        <!-- Tabel Produk -->
        <div
            class="overflow-x-auto bg-white dark:bg-gray-800 shadow-md rounded-lg"
        >
            <table
                class="w-full text-sm text-left text-gray-600 dark:text-gray-300"
            >
                <thead
                    class="bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-200"
                >
                    <tr>
                        <th class="px-6 py-3">Nama Produk</th>
                        <th class="px-6 py-3">Kategori</th>
                        <th class="px-6 py-3">Harga</th>
                        <th class="px-6 py-3">Stok</th>
                        <th class="px-6 py-3">Tanggal Masuk</th>
                        <th class="px-6 py-3">Kadaluarsa</th>
                        <th class="px-6 py-3">Asal Perusahaan</th>
                        <th class="px-6 py-3 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr
                        class="border-b hover:bg-gray-50 dark:hover:bg-gray-700"
                    >
                        <td class="px-6 py-4 font-medium">Laptop Asus</td>
                        <td class="px-6 py-4">Elektronik</td>
                        <td class="px-6 py-4">Rp 7.500.000</td>
                        <td class="px-6 py-4">15</td>
                        <td class="px-6 py-4">2025-08-10</td>
                        <td class="px-6 py-4">2027-08-10</td>
                        <td class="px-6 py-4">Asus Indonesia</td>
                        <td class="px-6 py-4 flex gap-2 justify-center">
                            <button
                                class="px-3 py-1 bg-green-500 text-white rounded hover:bg-green-600 transition"
                                onclick="openEditProductModal('Laptop Asus')"
                            >
                                Edit
                            </button>
                            <button
                                class="px-3 py-1 bg-red-500 text-white rounded hover:bg-red-600 transition"
                                onclick="openDeleteProductModal('Laptop Asus')"
                            >
                                Delete
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal Create -->
    <div
        id="createModal"
        class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50"
    >
        <div
            class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-lg w-full max-w-lg"
        >
            <h2 class="text-xl font-bold mb-4">Tambah Produk</h2>
            <form>
                <input
                    type="text"
                    placeholder="Nama Produk"
                    class="w-full mb-3 p-2 border rounded"
                />
                <input
                    type="number"
                    placeholder="Harga"
                    class="w-full mb-3 p-2 border rounded"
                />
                <input
                    type="number"
                    placeholder="Stok"
                    class="w-full mb-3 p-2 border rounded"
                />
                <button
                    type="submit"
                    class="bg-blue-600 text-white px-4 py-2 rounded"
                >
                    Simpan
                </button>
                <button
                    type="button"
                    onclick="closeCreateProductModal()"
                    class="ml-2 px-4 py-2 rounded border"
                >
                    Batal
                </button>
            </form>
        </div>
    </div>

    <!-- Modal Edit -->
    <div
        id="editModal"
        class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50"
    >
        <div
            class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-lg w-full max-w-lg"
        >
            <h2 class="text-xl font-bold mb-4">Edit Produk</h2>
            <form>
                <input
                    type="text"
                    id="editName"
                    class="w-full mb-3 p-2 border rounded"
                />
                <input
                    type="number"
                    placeholder="Harga"
                    class="w-full mb-3 p-2 border rounded"
                />
                <input
                    type="number"
                    placeholder="Stok"
                    class="w-full mb-3 p-2 border rounded"
                />
                <button
                    type="submit"
                    class="bg-green-600 text-white px-4 py-2 rounded"
                >
                    Update
                </button>
                <button
                    type="button"
                    onclick="closeEditProductModal()"
                    class="ml-2 px-4 py-2 rounded border"
                >
                    Batal
                </button>
            </form>
        </div>
    </div>

    <!-- Modal Delete -->
    <div
        id="deleteModal"
        class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50"
    >
        <div
            class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-lg w-full max-w-md text-center"
        >
            <h2 class="text-xl font-bold mb-4">Hapus Produk?</h2>
            <p id="deleteMessage" class="mb-4 text-gray-600 dark:text-gray-300">
                Apakah Anda yakin?
            </p>
            <button class="bg-red-600 text-white px-4 py-2 rounded">
                Hapus
            </button>
            <button
                onclick="closeDeleteProductModal()"
                class="ml-2 px-4 py-2 rounded border"
            >
                Batal
            </button>
        </div>
    </div>
</div>

<script>
    function openCreateProductModal() {
        document.getElementById("createModal").classList.remove("hidden");
        document.getElementById("createModal").classList.add("flex");
    }
    function closeCreateProductModal() {
        document.getElementById("createModal").classList.add("hidden");
    }

    function openEditProductModal(name) {
        document.getElementById("editName").value = name;
        document.getElementById("editModal").classList.remove("hidden");
        document.getElementById("editModal").classList.add("flex");
    }
    function closeEditProductModal() {
        document.getElementById("editModal").classList.add("hidden");
    }

    function openDeleteProductModal(name) {
        document.getElementById(
            "deleteMessage"
        ).innerText = `Apakah Anda yakin ingin menghapus produk "${name}"?`;
        document.getElementById("deleteModal").classList.remove("hidden");
        document.getElementById("deleteModal").classList.add("flex");
    }
    function closeDeleteProductModal() {
        document.getElementById("deleteModal").classList.add("hidden");
    }
</script>
