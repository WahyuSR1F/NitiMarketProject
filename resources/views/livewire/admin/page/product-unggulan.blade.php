<div>
    <div class="p-6">
        <!-- Header -->
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-3xl font-bold text-gray-800 dark:text-gray-200">
                Manajemen Unggulan
            </h1>
            <button
                class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg shadow transition"
                onclick="openCreateFeaturedModal()"
            >
                + Tambah Produk Unggulan
            </button>
        </div>

        <!-- Filter Section -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-6">
            <input
                id="filterJumlah"
                type="number"
                placeholder="Jumlah Pembeli"
                class="px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:outline-none"
            />
            <select
                id="filterKategori"
                class="px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:outline-none"
            >
                <option value="">Semua Kategori</option>
                <option value="elektronik">Elektronik</option>
                <option value="fashion">Fashion</option>
                <option value="makanan">Makanan</option>
            </select>
            <input
                id="filterHarga"
                type="number"
                placeholder="Harga (Rp)"
                class="px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:outline-none"
            />
            <div class="flex gap-2">
                <button
                    onclick="applyFilter()"
                    class="w-full px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700"
                >
                    Filter
                </button>
                <button
                    onclick="resetFilter()"
                    class="w-full px-4 py-2 bg-gray-500 text-white rounded-lg hover:bg-gray-600"
                >
                    Reset
                </button>
            </div>
        </div>

        <!-- Grafik Produk Unggulan Terbaik -->
        <div class="mb-6 bg-white dark:bg-gray-800 p-4 rounded-lg shadow-md">
            <h2 class="text-xl font-bold mb-4 text-gray-800 dark:text-gray-200">
                Produk Unggulan Terbaik
            </h2>
            <canvas id="featuredChart" class="w-full h-48"></canvas>
        </div>

        <!-- Tabel Produk Unggulan -->
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
                        <th class="px-6 py-3">Jumlah Pembeli</th>
                        <th class="px-6 py-3">Harga</th>
                        <th class="px-6 py-3 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr
                        class="border-b hover:bg-gray-50 dark:hover:bg-gray-700"
                    >
                        <td class="px-6 py-4 font-medium">Produk A</td>
                        <td class="px-6 py-4">Elektronik</td>
                        <td class="px-6 py-4">120</td>
                        <td class="px-6 py-4">Rp 1.200.000</td>
                        <td class="px-6 py-4 flex gap-2 justify-center">
                            <button
                                class="px-3 py-1 bg-green-500 text-white rounded hover:bg-green-600 transition"
                                onclick="openEditFeaturedModal('Produk A')"
                            >
                                Edit
                            </button>
                            <button
                                class="px-3 py-1 bg-red-500 text-white rounded hover:bg-red-600 transition"
                                onclick="openDeleteFeaturedModal('Produk A')"
                            >
                                Delete
                            </button>
                        </td>
                    </tr>
                    <tr
                        class="border-b hover:bg-gray-50 dark:hover:bg-gray-700"
                    >
                        <td class="px-6 py-4 font-medium">Produk B</td>
                        <td class="px-6 py-4">Fashion</td>
                        <td class="px-6 py-4">85</td>
                        <td class="px-6 py-4">Rp 350.000</td>
                        <td class="px-6 py-4 flex gap-2 justify-center">
                            <button
                                class="px-3 py-1 bg-green-500 text-white rounded hover:bg-green-600 transition"
                                onclick="openEditFeaturedModal('Produk B')"
                            >
                                Edit
                            </button>
                            <button
                                class="px-3 py-1 bg-red-500 text-white rounded hover:bg-red-600 transition"
                                onclick="openDeleteFeaturedModal('Produk B')"
                            >
                                Delete
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal Tambah -->
    <div
        id="createFeaturedModal"
        class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50"
    >
        <div
            class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-lg w-full max-w-lg"
        >
            <h2 class="text-xl font-bold mb-4">Tambah Produk Unggulan</h2>
            <form>
                <input
                    type="text"
                    placeholder="Nama Produk"
                    class="w-full mb-3 p-2 border rounded"
                />
                <input
                    type="number"
                    placeholder="Jumlah Pembeli"
                    class="w-full mb-3 p-2 border rounded"
                />
                <input
                    type="number"
                    placeholder="Harga"
                    class="w-full mb-3 p-2 border rounded"
                />
                <select class="w-full px-4 py-2 mb-3 border rounded">
                    <option>Pilih Kategori</option>
                    <option>Elektronik</option>
                    <option>Fashion</option>
                    <option>Makanan</option>
                </select>
                <div class="flex justify-end gap-2">
                    <button
                        type="button"
                        onclick="closeCreateFeaturedModal()"
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

    <!-- Modal Edit -->
    <div
        id="editFeaturedModal"
        class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50"
    >
        <div
            class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-lg w-full max-w-lg"
        >
            <h2 class="text-xl font-bold mb-4">Edit Produk Unggulan</h2>
            <form>
                <input
                    type="text"
                    id="editFeaturedName"
                    class="w-full mb-3 p-2 border rounded"
                />
                <input
                    type="number"
                    placeholder="Jumlah Pembeli"
                    class="w-full mb-3 p-2 border rounded"
                />
                <input
                    type="number"
                    placeholder="Harga"
                    class="w-full mb-3 p-2 border rounded"
                />
                <select class="w-full px-4 py-2 mb-3 border rounded">
                    <option>Elektronik</option>
                    <option>Fashion</option>
                    <option>Makanan</option>
                </select>
                <div class="flex justify-end gap-2">
                    <button
                        type="button"
                        onclick="closeEditFeaturedModal()"
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

    <!-- Modal Delete -->
    <div
        id="deleteFeaturedModal"
        class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50"
    >
        <div
            class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-lg w-full max-w-md text-center"
        >
            <h2 class="text-xl font-bold mb-4">Hapus Produk?</h2>
            <p
                id="deleteFeaturedMessage"
                class="mb-4 text-gray-600 dark:text-gray-300"
            >
                Apakah Anda yakin ingin menghapus produk ini?
            </p>
            <div class="flex justify-center gap-3">
                <button
                    onclick="closeDeleteFeaturedModal()"
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

<!-- Chart.js -->
<script>
    const ctx = document.getElementById("featuredChart").getContext("2d");
    const featuredChart = new Chart(ctx, {
        type: "bar",
        data: {
            labels: ["Produk A", "Produk B", "Produk C", "Produk D"],
            datasets: [
                {
                    label: "Jumlah Pembeli",
                    data: [120, 85, 95, 60],
                    backgroundColor: "rgba(59, 130, 246, 0.7)",
                    borderColor: "rgba(59, 130, 246, 1)",
                    borderWidth: 1,
                },
            ],
        },
        options: {
            responsive: true,
            plugins: {
                legend: { display: false },
                title: {
                    display: true,
                    text: "Produk Unggulan Terbaik",
                    color: "#374151",
                    font: { size: 16 },
                },
            },
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: { stepSize: 20 },
                },
            },
        },
    });

    function openCreateFeaturedModal() {
        const modal = document.getElementById("createFeaturedModal");
        modal.classList.remove("hidden");
        modal.classList.add("flex");
    }
    function closeCreateFeaturedModal() {
        document.getElementById("createFeaturedModal").classList.add("hidden");
    }

    function openEditFeaturedModal(name) {
        document.getElementById("editFeaturedName").value = name;
        const modal = document.getElementById("editFeaturedModal");
        modal.classList.remove("hidden");
        modal.classList.add("flex");
    }
    function closeEditFeaturedModal() {
        document.getElementById("editFeaturedModal").classList.add("hidden");
    }

    function openDeleteFeaturedModal(name) {
        document.getElementById(
            "deleteFeaturedMessage"
        ).innerText = `Apakah Anda yakin ingin menghapus produk "${name}"?`;
        const modal = document.getElementById("deleteFeaturedModal");
        modal.classList.remove("hidden");
        modal.classList.add("flex");
    }
    function closeDeleteFeaturedModal() {
        document.getElementById("deleteFeaturedModal").classList.add("hidden");
    }

    function resetFilter() {
        document.getElementById("filterJumlah").value = "";
        document.getElementById("filterKategori").value = "";
        document.getElementById("filterHarga").value = "";
    }
    function applyFilter() {
        alert("Filter diterapkan!");
    }
</script>
