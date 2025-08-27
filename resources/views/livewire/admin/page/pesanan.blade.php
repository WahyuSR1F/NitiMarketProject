<div>
    <div class="p-6">
        <!-- Header -->
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-3xl font-bold text-gray-800 dark:text-gray-200">
                Manajemen Pesanan
            </h1>
            <button
                onclick="openModal('addModal')"
                class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg shadow"
            >
                + Tambah Pesanan
            </button>
        </div>

        <!-- Filter -->
        <div class="flex items-center gap-4 mb-4">
            <input
                type="text"
                placeholder="Cari pesanan..."
                class="border rounded-lg px-3 py-2 w-64 focus:ring-2 focus:ring-blue-400"
            />
            <select
                class="border rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-400"
            >
                <option value="">Semua Status</option>
                <option value="pending">Pending</option>
                <option value="proses">Proses</option>
                <option value="selesai">Selesai</option>
            </select>
            <button
                class="bg-gray-600 hover:bg-gray-700 text-white px-4 py-2 rounded-lg"
            >
                Filter
            </button>
        </div>

        <!-- Table -->
        <div class="overflow-x-auto bg-white rounded-xl shadow">
            <table class="w-full text-left border-collapse">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-4 py-2 border">No</th>
                        <th class="px-4 py-2 border">Nama Pelanggan</th>
                        <th class="px-4 py-2 border">Tanggal</th>
                        <th class="px-4 py-2 border">Status</th>
                        <th class="px-4 py-2 border">Total</th>
                        <th class="px-4 py-2 border text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="hover:bg-gray-50">
                        <td class="px-4 py-2 border">1</td>
                        <td class="px-4 py-2 border">Budi Santoso</td>
                        <td class="px-4 py-2 border">2025-08-18</td>
                        <td class="px-4 py-2 border">
                            <span
                                class="bg-yellow-200 text-yellow-800 px-2 py-1 rounded-lg text-sm"
                                >Pending</span
                            >
                        </td>
                        <td class="px-4 py-2 border">Rp 500.000</td>
                        <td class="px-4 py-2 border text-center space-x-2">
                            <button
                                onclick="openModal('editModal')"
                                class="bg-green-600 hover:bg-green-700 text-white px-3 py-1 rounded-lg"
                            >
                                Edit
                            </button>
                            <button
                                onclick="openModal('deleteModal')"
                                class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded-lg"
                            >
                                Delete
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal Tambah Pesanan -->
    <div
        id="addModal"
        class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50"
    >
        <div class="bg-white rounded-lg shadow-lg w-full max-w-md p-6">
            <h2 class="text-xl font-bold mb-4">Tambah Pesanan</h2>
            <form class="space-y-4">
                <div>
                    <label class="block mb-1">Nama Pelanggan</label>
                    <input
                        type="text"
                        class="w-full border rounded-lg px-3 py-2"
                        required
                    />
                </div>
                <div>
                    <label class="block mb-1">Tanggal</label>
                    <input
                        type="date"
                        class="w-full border rounded-lg px-3 py-2"
                        required
                    />
                </div>
                <div>
                    <label class="block mb-1">Status</label>
                    <select class="w-full border rounded-lg px-3 py-2">
                        <option value="pending">Pending</option>
                        <option value="proses">Proses</option>
                        <option value="selesai">Selesai</option>
                    </select>
                </div>
                <div>
                    <label class="block mb-1">Total</label>
                    <input
                        type="number"
                        class="w-full border rounded-lg px-3 py-2"
                        placeholder="Rp"
                    />
                </div>
                <div class="flex justify-end gap-2">
                    <button
                        type="button"
                        onclick="closeModal('addModal')"
                        class="px-4 py-2 bg-gray-500 text-white rounded-lg"
                    >
                        Batal
                    </button>
                    <button
                        type="submit"
                        class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg"
                    >
                        Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Modal Edit Pesanan -->
    <div
        id="editModal"
        class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50"
    >
        <div class="bg-white rounded-lg shadow-lg w-full max-w-md p-6">
            <h2 class="text-xl font-bold mb-4">Edit Pesanan</h2>
            <form class="space-y-4">
                <div>
                    <label class="block mb-1">Nama Pelanggan</label>
                    <input
                        type="text"
                        value="Budi Santoso"
                        class="w-full border rounded-lg px-3 py-2"
                    />
                </div>
                <div>
                    <label class="block mb-1">Tanggal</label>
                    <input
                        type="date"
                        value="2025-08-18"
                        class="w-full border rounded-lg px-3 py-2"
                    />
                </div>
                <div>
                    <label class="block mb-1">Status</label>
                    <select class="w-full border rounded-lg px-3 py-2">
                        <option value="pending">Pending</option>
                        <option value="proses">Proses</option>
                        <option value="selesai" selected>Selesai</option>
                    </select>
                </div>
                <div>
                    <label class="block mb-1">Total</label>
                    <input
                        type="number"
                        value="500000"
                        class="w-full border rounded-lg px-3 py-2"
                    />
                </div>
                <div class="flex justify-end gap-2">
                    <button
                        type="button"
                        onclick="closeModal('editModal')"
                        class="px-4 py-2 bg-gray-500 text-white rounded-lg"
                    >
                        Batal
                    </button>
                    <button
                        type="submit"
                        class="px-4 py-2 bg-green-600 hover:bg-green-700 text-white rounded-lg"
                    >
                        Update
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Modal Delete -->
    <div
        id="deleteModal"
        class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50"
    >
        <div
            class="bg-white rounded-lg shadow-lg w-full max-w-sm p-6 text-center"
        >
            <h2 class="text-lg font-bold mb-4">Hapus Pesanan?</h2>
            <p class="mb-6 text-gray-600">
                Apakah Anda yakin ingin menghapus pesanan ini?
            </p>
            <div class="flex justify-center gap-2">
                <button
                    onclick="closeModal('deleteModal')"
                    class="px-4 py-2 bg-gray-500 text-white rounded-lg"
                >
                    Batal
                </button>
                <button
                    class="px-4 py-2 bg-red-600 hover:bg-red-700 text-white rounded-lg"
                >
                    Hapus
                </button>
            </div>
        </div>
    </div>
</div>
<!-- Script JS murni -->
<script>
    function openModal(id) {
        document.getElementById(id).classList.remove("hidden");
    }
    function closeModal(id) {
        document.getElementById(id).classList.add("hidden");
    }
</script>
