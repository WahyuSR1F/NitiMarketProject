<div>
    <div class="p-6">
        <!-- Header -->
        <div class="flex justify-between items-center mb-4">
            <h1 class="text-2xl font-bold text-gray-800 dark:text-gray-200">
                Manajemen Users
            </h1>
            <button
                wire:click="$set('modalCreate', true)"
                class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg shadow transition"
            >
                + Tambah User
            </button>
        </div>

        <!-- Search -->
        <div class="mb-4 flex items-center gap-2">
            <input
                type="text"
                wire:model.live="search"
                placeholder="Cari user..."
                class="w-64 px-3 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-400"
            />
        </div>

        <!-- Table -->
        <div class="overflow-x-auto rounded-lg shadow">
            <table class="w-full border-collapse bg-white dark:bg-gray-800">
                <thead
                    class="bg-gray-100 dark:bg-gray-700 text-gray-600 dark:text-gray-300"
                >
                    <tr>
                        <th class="px-4 py-3 text-left">#</th>
                        <th class="px-4 py-3 text-left">Nama</th>
                        <th class="px-4 py-3 text-left">Email</th>
                        <th class="px-4 py-3 text-left">Nomer</th>
                        <th class="px-4 py-3 text-left">Role</th>
                        <th class="px-4 py-3 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody
                    class="bg-white dark:bg-gray-700 divide-y divide-gray-200"
                >
                    @forelse($users as $user)
                    <tr class="hover:bg-gray-50 dark:hover:bg-gray-600">
                        <td class="px-4 py-2">{{ $loop->iteration }}</td>
                        <td class="px-4 py-2">{{ $user->name }}</td>
                        <td class="px-4 py-2">{{ $user->email }}</td>
                        <td class="px-4 py-2">{{ $user->nomer }}</td>
                        <td class="px-4 py-2">
                            {{ $user->role->role ?? '-' }}
                        </td>
                        <td class="px-4 py-2 text-center space-x-2">
                            <button
                                wire:click="openEdit('{{ $user->id }}')"
                                class="bg-yellow-500 hover:bg-yellow-600 text-white px-3 py-1 rounded"
                            >
                                Edit
                            </button>

                            <!-- Tombol Hapus -->
                            <button
                                wire:click="openDelete('{{ $user->id }}')"
                                class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded"
                            >
                                Hapus
                            </button>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center py-4 text-gray-500">
                            Tidak ada user ditemukan.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>

            <div class="mt-4">
                {{ $users->links() }}
            </div>
        </div>

        <!-- Modal Create -->
        @if($modalCreate)
        <div
            class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50"
        >
            <div
                class="bg-white dark:bg-gray-800 rounded-lg shadow-lg w-96 p-6"
            >
                <h2 class="text-xl font-semibold mb-4">Tambah User</h2>
                <form wire:submit.prevent="createUser" class="space-y-3">
                    <input
                        type="text"
                        wire:model="name"
                        placeholder="Nama"
                        class="w-full border px-3 py-2 rounded"
                    />
                    @error('name')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror

                    <input
                        type="email"
                        wire:model="email"
                        placeholder="Email"
                        class="w-full border px-3 py-2 rounded"
                    />
                    @error('email')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror

                    <input
                        type="number"
                        wire:model="nomer"
                        placeholder="Nomor 62...."
                        class="w-full border px-3 py-2 rounded"
                    />
                    @error('nomer')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror

                    <select
                        wire:model="role_id"
                        class="w-full border px-3 py-2 rounded"
                    >
                        <option value="">Pilih Role</option>
                        @foreach($roles as $role)
                        <option value="{{ $role->id }}">
                            {{ $role->role }}
                        </option>
                        @endforeach
                    </select>
                    @error('role_id')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror

                    <input
                        type="password"
                        wire:model="password"
                        placeholder="Password...."
                        class="w-full border px-3 py-2 rounded"
                    />
                    @error('password')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror

                    <input
                        type="password"
                        wire:model="passwordConfrim"
                        placeholder="Confirm Password....."
                        class="w-full border px-3 py-2 rounded"
                    />
                    @error('passwordConfrim')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror

                    <div class="flex justify-end gap-2">
                        <button
                            type="button"
                            wire:click="openCreateModal(false)"
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
        @endif

        <!-- Modal Edit -->
        @if($modalEdit)
        <div
            class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50"
        >
            <div
                class="bg-white dark:bg-gray-800 rounded-lg shadow-lg w-96 p-6"
            >
                <h2 class="text-xl font-semibold mb-4">Edit User</h2>
                <form wire:submit.prevent="updateUser" class="space-y-3">
                    <input
                        type="text"
                        wire:model="name"
                        class="w-full border px-3 py-2 rounded"
                    />
                    @error('name')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror

                    <input
                        type="email"
                        wire:model="email"
                        class="w-full border px-3 py-2 rounded"
                    />
                    @error('email')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror

                    <input
                        type="number"
                        wire:model="nomer"
                        placeholder="Nomor 62...."
                        class="w-full border px-3 py-2 rounded"
                    />
                    @error('nomer')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror

                    <select
                        wire:model="role_id"
                        class="w-full border px-3 py-2 rounded"
                    >
                        <option value="">Pilih Role</option>
                        @foreach($roles as $role)
                        <option value="{{ $role->id }}">
                            {{ $role->role }}
                        </option>
                        @endforeach
                    </select>
                    @error('role_id')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror

                    <div class="flex justify-end gap-2">
                        <button
                            type="button"
                            wire:click="openConfirmReset(true)"
                            class="px-4 py-2 bg-gray-300 rounded"
                        >
                            reset password
                        </button>
                        <button
                            type="button"
                            wire:click="$set('modalEdit', false)"
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
        @endif

        <!-- Modal Delete -->
        @if($modalDelete)
        <div
            class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50"
        >
            <div
                class="bg-white dark:bg-gray-800 rounded-lg shadow-lg w-96 p-6 relative z-50"
            >
                <form wire:submit.prevent="deleteUser" class="space-y-3">
                    <h2 class="text-xl font-semibold mb-4">Hapus User</h2>
                    <p>Apakah anda yakin ingin menghapus user ini?</p>

                    <span class="font-bold text-red-600">
                        {{ $userName }}
                    </span>

                    <div class="flex justify-end gap-2 mt-4">
                        <button
                            type="button"
                            wire:click="$set('modalDelete', false)"
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
                </form>
            </div>
        </div>
        @endif @if($confirmReset)
        <div
            class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50"
        >
            <div
                class="bg-white dark:bg-gray-800 rounded-lg shadow-lg w-96 p-6"
            >
                <h2 class="text-xl font-semibold mb-4">Yakin Reset Password</h2>
                <p>Apakah mengirim confirm Email untuk reset</p>
                <div class="flex justify-end gap-2 mt-4">
                    <button
                        type="button"
                        wire:click="openConfirmReset(false)"
                        class="px-4 py-2 bg-gray-300 rounded"
                    >
                        Batal
                    </button>
                    <button
                        type="button"
                        class="px-4 py-2 bg-red-600 text-white rounded"
                    >
                        Kirim
                    </button>
                </div>
            </div>
        </div>
        @endif
    </div>
</div>
