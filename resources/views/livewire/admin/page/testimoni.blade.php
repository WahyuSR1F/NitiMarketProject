<div>
    <div class="p-6 bg-gray-100 dark:bg-gray-900 min-h-screen">
        <!-- Header -->
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold text-gray-800 dark:text-gray-200">
                Manajemen Testimoni
            </h1>
            <button
                class="bg-blue-600 text-white px-4 py-2 rounded-lg shadow hover:bg-blue-700"
                @click="openModal = true"
            >
                + Tambah Testimoni
            </button>
        </div>

        <!-- Table -->
        <div
            class="bg-white dark:bg-gray-800 shadow-md rounded-lg overflow-hidden"
        >
            <table class="w-full text-left">
                <thead
                    class="bg-gray-200 dark:bg-gray-700 text-gray-800 dark:text-gray-200"
                >
                    <tr>
                        <th class="px-4 py-2">Nama</th>
                        <th class="px-4 py-2">Testimoni</th>
                        <th class="px-4 py-2">Rating</th>
                        <th class="px-4 py-2">Status</th>
                        <th class="px-4 py-2">Aksi</th>
                    </tr>
                </thead>
                <tbody
                    class="divide-y divide-gray-200 dark:divide-gray-700 text-gray-700 dark:text-gray-300"
                >
                    <tr>
                        <td class="px-4 py-2">Wahyu S.</td>
                        <td class="px-4 py-2">Pelayanan sangat memuaskan!</td>
                        <td class="px-4 py-2">⭐⭐⭐⭐⭐</td>
                        <td class="px-4 py-2">
                            <span
                                class="bg-green-100 text-green-800 px-2 py-1 rounded text-sm"
                                >Aktif</span
                            >
                        </td>
                        <td class="px-4 py-2 flex gap-2">
                            <button
                                class="px-3 py-1 bg-yellow-500 text-white rounded hover:bg-yellow-600"
                            >
                                Edit
                            </button>
                            <button
                                class="px-3 py-1 bg-red-600 text-white rounded hover:bg-red-700"
                            >
                                Hapus
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <td class="px-4 py-2">Ayu L.</td>
                        <td class="px-4 py-2">
                            Produk bagus dan cepat sampai.
                        </td>
                        <td class="px-4 py-2">⭐⭐⭐⭐</td>
                        <td class="px-4 py-2">
                            <span
                                class="bg-red-100 text-red-800 px-2 py-1 rounded text-sm"
                                >Nonaktif</span
                            >
                        </td>
                        <td class="px-4 py-2 flex gap-2">
                            <button
                                class="px-3 py-1 bg-yellow-500 text-white rounded hover:bg-yellow-600"
                            >
                                Edit
                            </button>
                            <button
                                class="px-3 py-1 bg-red-600 text-white rounded hover:bg-red-700"
                            >
                                Hapus
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Modal Tambah -->
        <div x-data="{ openModal: false }">
            <template x-if="openModal">
                <div
                    class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50"
                >
                    <div
                        class="bg-white dark:bg-gray-800 rounded-lg shadow-lg p-6 w-96"
                    >
                        <h2
                            class="text-xl font-bold mb-4 text-gray-800 dark:text-gray-200"
                        >
                            Tambah Testimoni
                        </h2>
                        <form class="space-y-4">
                            <div>
                                <label
                                    class="block text-gray-700 dark:text-gray-300 mb-1"
                                    >Nama</label
                                >
                                <input
                                    type="text"
                                    class="w-full px-3 py-2 border rounded-lg dark:bg-gray-700 dark:text-white"
                                />
                            </div>
                            <div>
                                <label
                                    class="block text-gray-700 dark:text-gray-300 mb-1"
                                    >Testimoni</label
                                >
                                <textarea
                                    class="w-full px-3 py-2 border rounded-lg dark:bg-gray-700 dark:text-white"
                                ></textarea>
                            </div>
                            <div>
                                <label
                                    class="block text-gray-700 dark:text-gray-300 mb-1"
                                    >Rating</label
                                >
                                <select
                                    class="w-full px-3 py-2 border rounded-lg dark:bg-gray-700 dark:text-white"
                                >
                                    <option>⭐⭐⭐⭐⭐</option>
                                    <option>⭐⭐⭐⭐</option>
                                    <option>⭐⭐⭐</option>
                                    <option>⭐⭐</option>
                                    <option>⭐</option>
                                </select>
                            </div>
                            <div class="flex justify-end gap-2">
                                <button
                                    type="button"
                                    class="px-4 py-2 bg-gray-500 text-white rounded-lg hover:bg-gray-600"
                                    @click="openModal = false"
                                >
                                    Batal
                                </button>
                                <button
                                    type="submit"
                                    class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700"
                                >
                                    Simpan
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </template>
        </div>
    </div>
</div>
