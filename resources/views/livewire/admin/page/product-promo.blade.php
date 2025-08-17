<div>
    <div class="p-6">
        <!-- Header -->
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-3xl font-bold text-gray-800 dark:text-gray-200">
                Manajemen Promo
            </h1>
            <button
                class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg shadow transition"
                onclick="openCreatePromoModal()"
            >
                + Tambah Promo
            </button>
        </div>

        <!-- Filter Section -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-6">
            <input
                id="filterNamaPromo"
                type="text"
                placeholder="Nama Promo"
                class="px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:outline-none"
            />
            <select
                id="filterJenisPromo"
                class="px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:outline-none"
            >
                <option value="">Semua Jenis Promo</option>
                <option value="diskon">Diskon</option>
                <option value="cashback">Cashback</option>
                <option value="bundle">Bundle</option>
            </select>
            <input
                id="filterPersentase"
                type="number"
                placeholder="Persentase (%)"
                class="px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:outline-none"
            />
            <div class="flex gap-2">
                <button
                    onclick="applyPromoFilter()"
                    class="w-full px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700"
                >
                    Filter
                </button>
                <button
                    onclick="resetPromoFilter()"
                    class="w-full px-4 py-2 bg-gray-500 text-white rounded-lg hover:bg-gray-600"
                >
                    Reset
                </button>
            </div>
        </div>

        <!-- Grafik Promo Terpopuler -->
        <div class="mb-6 bg-white dark:bg-gray-800 p-4 rounded-lg shadow-md">
            <h2 class="text-xl font-bold mb-4 text-gray-800 dark:text-gray-200">
                Promo Terpopuler
            </h2>
            <canvas id="promoChart" class="w-full h-48"></canvas>
        </div>

        <!-- Tabel Promo -->
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
                        <th class="px-6 py-3">Nama Promo</th>
                        <th class="px-6 py-3">Jenis Promo</th>
                        <th class="px-6 py-3">Persentase</th>
                        <th class="px-6 py-3">Tanggal Mulai</th>
                        <th class="px-6 py-3">Tanggal Berakhir</th>
                        <th class="px-6 py-3 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr
                        class="border-b hover:bg-gray-50 dark:hover:bg-gray-700"
                    >
                        <td class="px-6 py-4 font-medium">
                            Promo Diskon Laptop
                        </td>
                        <td class="px-6 py-4">Diskon</td>
                        <td class="px-6 py-4">20%</td>
                        <td class="px-6 py-4">2025-08-01</td>
                        <td class="px-6 py-4">2025-08-31</td>
                        <td class="px-6 py-4 flex gap-2 justify-center">
                            <button
                                class="px-3 py-1 bg-green-500 text-white rounded hover:bg-green-600 transition"
                                onclick="openEditPromoModal('Promo Diskon Laptop')"
                            >
                                Edit
                            </button>
                            <button
                                class="px-3 py-1 bg-red-500 text-white rounded hover:bg-red-600 transition"
                                onclick="openDeletePromoModal('Promo Diskon Laptop')"
                            >
                                Delete
                            </button>
                        </td>
                    </tr>
                    <tr
                        class="border-b hover:bg-gray-50 dark:hover:bg-gray-700"
                    >
                        <td class="px-6 py-4 font-medium">Cashback Fashion</td>
                        <td class="px-6 py-4">Cashback</td>
                        <td class="px-6 py-4">15%</td>
                        <td class="px-6 py-4">2025-08-05</td>
                        <td class="px-6 py-4">2025-08-20</td>
                        <td class="px-6 py-4 flex gap-2 justify-center">
                            <button
                                class="px-3 py-1 bg-green-500 text-white rounded hover:bg-green-600 transition"
                                onclick="openEditPromoModal('Cashback Fashion')"
                            >
                                Edit
                            </button>
                            <button
                                class="px-3 py-1 bg-red-500 text-white rounded hover:bg-red-600 transition"
                                onclick="openDeletePromoModal('Cashback Fashion')"
                            >
                                Delete
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal Tambah Promo -->
    <div
        id="createPromoModal"
        class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50"
    >
        <div
            class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-lg w-full max-w-lg"
        >
            <h2 class="text-xl font-bold mb-4">Tambah Promo</h2>
            <form>
                <input
                    type="text"
                    placeholder="Nama Promo"
                    class="w-full mb-3 p-2 border rounded"
                />
                <select class="w-full px-4 py-2 mb-3 border rounded">
                    <option>Pilih Jenis Promo</option>
                    <option>Diskon</option>
                    <option>Cashback</option>
                    <option>Bundle</option>
                </select>
                <input
                    type="number"
                    placeholder="Persentase (%)"
                    class="w-full mb-3 p-2 border rounded"
                />
                <input
                    type="date"
                    class="w-full mb-3 p-2 border rounded"
                    placeholder="Tanggal Mulai"
                />
                <input
                    type="date"
                    class="w-full mb-3 p-2 border rounded"
                    placeholder="Tanggal Berakhir"
                />
                <div class="flex justify-end gap-2">
                    <button
                        type="button"
                        onclick="closeCreatePromoModal()"
                        class="px-4 py-2 bg-gray-500 text-white rounded-lg"
                    >
                        Batal
                    </button>
                    <button
                        type="submit"
                        class="px-4 py-2 bg-blue-600 text-white rounded-lg"
                    >
                        Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Modal Edit Promo -->
    <div
        id="editPromoModal"
        class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50"
    >
        <div
            class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-lg w-full max-w-lg"
        >
            <h2 class="text-xl font-bold mb-4">Edit Promo</h2>
            <form>
                <input
                    type="text"
                    id="editPromoName"
                    class="w-full mb-3 p-2 border rounded"
                />
                <select class="w-full px-4 py-2 mb-3 border rounded">
                    <option>Diskon</option>
                    <option>Cashback</option>
                    <option>Bundle</option>
                </select>
                <input
                    type="number"
                    placeholder="Persentase (%)"
                    class="w-full mb-3 p-2 border rounded"
                />
                <input type="date" class="w-full mb-3 p-2 border rounded" />
                <input type="date" class="w-full mb-3 p-2 border rounded" />
                <div class="flex justify-end gap-2">
                    <button
                        type="button"
                        onclick="closeEditPromoModal()"
                        class="px-4 py-2 bg-gray-500 text-white rounded-lg"
                    >
                        Batal
                    </button>
                    <button
                        type="submit"
                        class="px-4 py-2 bg-green-600 text-white rounded-lg"
                    >
                        Update
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Modal Delete Promo -->
    <div
        id="deletePromoModal"
        class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50"
    >
        <div
            class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-lg w-full max-w-md text-center"
        >
            <h2 class="text-xl font-bold mb-4">Hapus Promo?</h2>
            <p
                id="deletePromoMessage"
                class="mb-4 text-gray-600 dark:text-gray-300"
            >
                Apakah Anda yakin ingin menghapus promo ini?
            </p>
            <div class="flex justify-center gap-3">
                <button
                    onclick="closeDeletePromoModal()"
                    class="px-4 py-2 rounded border"
                >
                    Batal
                </button>
                <button
                    class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700"
                >
                    Hapus
                </button>
            </div>
        </div>
    </div>
</div>
