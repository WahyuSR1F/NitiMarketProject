<div>
    <div class="p-6">
        <!-- Header -->
        <div class="flex justify-between items-center mb-4">
            <h1 class="text-2xl font-bold text-gray-800 dark:text-gray-200">
                Manajemen Users
            </h1>
            <button
                onclick="openModal('createModal')"
                class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg shadow transition"
            >
                + Tambah User
            </button>
        </div>

        <!-- Search / Filter -->
        <div class="mb-4 flex items-center gap-2">
            <input
                type="text"
                placeholder="Cari user..."
                class="w-64 px-3 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-400"
                onkeyup="filterTable(this.value)"
            />
        </div>

        <!-- Table Wrapper (responsive) -->
        <div class="overflow-x-auto rounded-lg shadow">
            <table class="w-full border-collapse bg-white dark:bg-gray-800">
                <thead
                    class="bg-gray-100 dark:bg-gray-700 text-gray-600 dark:text-gray-300"
                >
                    <tr>
                        <th class="px-4 py-3 text-left">#</th>
                        <th class="px-4 py-3 text-left">Nama</th>
                        <th class="px-4 py-3 text-left">Email</th>
                        <th class="px-4 py-3 text-left">Role</th>
                        <th class="px-4 py-3 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody id="userTable">
                    <tr
                        class="border-b hover:bg-gray-50 dark:hover:bg-gray-700"
                    >
                        <td class="px-4 py-3">1</td>
                        <td class="px-4 py-3">Budi Santoso</td>
                        <td class="px-4 py-3">budi@example.com</td>
                        <td class="px-4 py-3">Admin</td>
                        <td class="px-4 py-3 text-center space-x-2">
                            <button
                                onclick="openModal('editModal')"
                                class="bg-yellow-500 hover:bg-yellow-600 text-white px-3 py-1 rounded"
                            >
                                Edit
                            </button>
                            <button
                                onclick="openModal('deleteModal')"
                                class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded"
                            >
                                Hapus
                            </button>
                        </td>
                    </tr>
                    <tr
                        class="border-b hover:bg-gray-50 dark:hover:bg-gray-700"
                    >
                        <td class="px-4 py-3">2</td>
                        <td class="px-4 py-3">Siti Aminah</td>
                        <td class="px-4 py-3">siti@example.com</td>
                        <td class="px-4 py-3">User</td>
                        <td class="px-4 py-3 text-center space-x-2">
                            <button
                                onclick="openModal('editModal')"
                                class="bg-yellow-500 hover:bg-yellow-600 text-white px-3 py-1 rounded"
                            >
                                Edit
                            </button>
                            <button
                                onclick="openModal('deleteModal')"
                                class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded"
                            >
                                Hapus
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal Template -->
    <div
        id="createModal"
        class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50"
    >
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg w-96 p-6">
            <h2 class="text-xl font-semibold mb-4">Tambah User</h2>
            <form class="space-y-3">
                <input
                    type="text"
                    placeholder="Nama"
                    class="w-full border px-3 py-2 rounded"
                />
                <input
                    type="email"
                    placeholder="Email"
                    class="w-full border px-3 py-2 rounded"
                />
                <select class="w-full border px-3 py-2 rounded">
                    <option>Admin</option>
                    <option>User</option>
                </select>
                <div class="flex justify-end gap-2">
                    <button
                        type="button"
                        onclick="closeModal('createModal')"
                        class="px-4 py-2 bg-gray-300 rounded"
                    >
                        Batal
                    </button>
                    <button
                        type="submit"
                        class="px-4 py-2 bg-blue-600 text-white rounded"
                    >
                        Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>

    <div
        id="editModal"
        class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50"
    >
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg w-96 p-6">
            <h2 class="text-xl font-semibold mb-4">Edit User</h2>
            <form class="space-y-3">
                <input
                    type="text"
                    value="Nama Lama"
                    class="w-full border px-3 py-2 rounded"
                />
                <input
                    type="email"
                    value="email@example.com"
                    class="w-full border px-3 py-2 rounded"
                />
                <select class="w-full border px-3 py-2 rounded">
                    <option>Admin</option>
                    <option>User</option>
                </select>
                <div class="flex justify-end gap-2">
                    <button
                        type="button"
                        onclick="closeModal('editModal')"
                        class="px-4 py-2 bg-gray-300 rounded"
                    >
                        Batal
                    </button>
                    <button
                        type="submit"
                        class="px-4 py-2 bg-yellow-500 text-white rounded"
                    >
                        Update
                    </button>
                </div>
            </form>
        </div>
    </div>

    <div
        id="deleteModal"
        class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50"
    >
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg w-96 p-6">
            <h2 class="text-xl font-semibold mb-4">Hapus User</h2>
            <p>Apakah anda yakin ingin menghapus user ini?</p>
            <div class="flex justify-end gap-2 mt-4">
                <button
                    type="button"
                    onclick="closeModal('deleteModal')"
                    class="px-4 py-2 bg-gray-300 rounded"
                >
                    Batal
                </button>
                <button
                    type="submit"
                    class="px-4 py-2 bg-red-600 text-white rounded"
                >
                    Hapus
                </button>
            </div>
        </div>
    </div>
</div>
<script>
    function openModal(id) {
        document.getElementById(id).classList.remove("hidden");
    }
    function closeModal(id) {
        document.getElementById(id).classList.add("hidden");
    }
    function filterTable(keyword) {
        let rows = document.querySelectorAll("#userTable tr");
        rows.forEach((row) => {
            let text = row.innerText.toLowerCase();
            row.style.display = text.includes(keyword.toLowerCase())
                ? ""
                : "none";
        });
    }
</script>
