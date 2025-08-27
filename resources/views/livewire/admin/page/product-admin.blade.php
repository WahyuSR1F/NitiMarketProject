<div>
    <div class="p-6">
        <!-- Header -->
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-3xl font-bold text-gray-800 dark:text-gray-200">
                Manajemen Product
            </h1>
            <button
                class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg shadow transition"
                wire:click="modalCreateOpen(true)"
            >
                + Tambah Produk
            </button>
        </div>

        <!-- Filter Section -->
        <div class="grid grid-cols-1 md:grid-cols-5 gap-4 mb-6">
            <form wire:submit.prevent="applyFilter" class="contents">
                <div>
                    <label
                        class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1"
                        >Kategori</label
                    >
                    <select
                        wire:model="kategori"
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:outline-none"
                    >
                        <option value="">Semua</option>
                        @foreach ($kategoris as $kategori)
                        <option value="{{ $kategori->id }}">
                            {{ $kategori->nama }}
                        </option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label
                        class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1"
                        >Harga Minimum</label
                    >
                    <input
                        type="number"
                        wire:model="hargaMin"
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
                        wire:model="hargaMax"
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
                        wire:model="dateMasuk"
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
                        wire:model="asalPerusahaan"
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:outline-none"
                    />
                </div>

                <div class="md:col-span-3 flex items-end justify-end gap-2">
                    <button
                        wire:click="resetFilter"
                        class="px-4 py-2 bg-gray-200 hover:bg-gray-300 text-gray-700 rounded-lg transition"
                    >
                        Reset
                    </button>
                    <button
                        type="submit"
                        class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg shadow transition"
                    >
                        Terapkan Filter
                    </button>
                </div>
            </form>
        </div>

        <!-- Tabel Produk -->
        <div
            class="overflow-x-auto bg-white dark:bg-gray-800 shadow-md rounded-lg"
        >
            <h5 class="p-3 text-bold">Search Product</h5>
            <div class="flex justify-start items-center mb-4 p-2">
                <div class="w-1/3">
                    <input
                        type="text"
                        wire:model.live="search"
                        placeholder="Cari produk..."
                        class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-300 dark:bg-gray-800 dark:border-gray-600"
                    />
                </div>

                {{-- Dropdown perPage --}}
                <div class="ml-2">
                    <select
                        wire:model.live="perPage"
                        class="px-3 py-2 border rounded-lg dark:bg-gray-800 dark:border-gray-600"
                    >
                        <option value="5">5</option>
                        <option value="10">10</option>
                        <option value="25">25</option>
                    </select>
                </div>
            </div>
            <table
                class="w-full text-sm text-left text-gray-600 dark:text-gray-300"
            >
                <thead
                    class="bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-200"
                >
                    <tr>
                        <th class="px-6 py-3">No</th>
                        <th class="px-6 py-3">Nama Produk</th>
                        <th class="px-6 py-3">Kategori</th>
                        <th class="px-6 py-3">Harga</th>
                        <th class="px-6 py-3">Tanggal Masuk</th>
                        <th class="px-6 py-3">Asal</th>
                        <th class="px-6 py-3">Perusahaan</th>
                        <th class="px-6 py-3 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($products as $product)
                    <tr
                        class="border-b hover:bg-gray-50 dark:hover:bg-gray-700"
                    >
                        <td class="px-6 py-4 font-medium">
                            {{ $products->firstItem() + $loop->index }}
                        </td>
                        <td class="px-6 py-4 font-medium">
                            {{ $product->nama }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $product->kategoris->nama ?? '-' }}
                        </td>
                        <td class="px-6 py-4">
                            Rp {{ number_format($product->harga, 0, ',', '.') }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $product->created_at->format('Y-m-d') }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $product->asal}}
                        </td>
                        <td class="px-6 py-4">
                            {{ $product->product_by }}
                        </td>
                        <td class="px-6 py-4 flex gap-2 justify-center">
                            <button
                                class="px-3 py-1 bg-blue-500 text-white rounded hover:bg-blue-600 transition"
                                wire:click="confirmDelete('{{ $product->id }}')"
                            >
                                Stock
                            </button>
                            <button
                                class="px-3 py-1 bg-green-500 text-white rounded hover:bg-green-600 transition"
                                wire:click="modalEditOpen('{{ $product->id }}', true)"
                            >
                                Edit
                            </button>
                            <button
                                class="px-3 py-1 bg-red-500 text-white rounded hover:bg-red-600 transition"
                                wire:click="modalDeleteOpen('{{ $product->id }}','true')"
                            >
                                Delete
                            </button>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td
                            colspan="7"
                            class="px-6 py-4 text-center text-gray-500"
                        >
                            Tidak ada produk ditemukan.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
            <div class="mt-4">
                {{ $products->links() }}
            </div>
        </div>
    </div>

    <!-- Modal Create -->
    @if($modalCreate)
    <div
        class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50"
    >
        <div
            class="bg-white dark:bg-gray-800 rounded-lg shadow-lg w-full max-w-4xl p-6"
        >
            <h2 class="text-xl font-semibold mb-4">Tambah Produk</h2>

            <form
                wire:submit.prevent="createProduct"
                class="grid grid-cols-2 gap-6"
            >
                {{-- Kolom Upload Gambar --}}
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                      Upload Foto Produk
                    </label>
                    <div class="flex items-center justify-center w-full">
                      <label
                        for="dropzone-file"
                        id="dropzone-label"
                        class="flex flex-col items-center justify-center w-full h-60 border-2 border-dashed rounded-lg cursor-pointer bg-gray-50 hover:bg-gray-100 transition
                        @error('productImg') border-red-500 bg-red-50 @enderror"
                      >
                        <div class="flex flex-col items-center justify-center pt-5 pb-6">
                          <svg
                            class="w-10 h-10 mb-3 text-gray-400"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg"
                          >
                            <path
                              stroke-linecap="round"
                              stroke-linejoin="round"
                              stroke-width="2"
                              d="M7 16V4a2 2 0 012-2h6a2 2 0 012 2v12m-6 4h.01M12 12a4 4 0 100-8 4 4 0 000 8z"
                            ></path>
                          </svg>
                          <p class="mb-2 text-sm text-gray-500">
                            <span class="font-semibold">Klik untuk upload</span>
                            atau drag & drop
                          </p>
                          <p class="text-xs text-gray-400">PNG, JPG, JPEG (max 2MB)</p>
                        </div>
                        <input
                          id="dropzone-file"
                          type="file"
                          wire:model="productImg"
                          accept="image/png,image/jpg,image/jpeg"
                          class="hidden"
                        />
                      </label>
                    </div>
                  
                    <!-- Preview -->
                    <div class="mt-4">
                      <span class="text-sm font-medium text-gray-700">Preview:</span>
                      <img id="preview-image" class="mt-2 w-full h-48 object-cover rounded-lg shadow hidden" />
                    </div>
                  
                    <!-- Error dari server (Livewire validation) -->
                    @error('productImg')
                      <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                  </div>

                {{-- Kolom Form Input --}}
                <div class="space-y-3">
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Data Diri Produk
                    </label>

                    <input
                        type="text"
                        wire:model="name"
                        placeholder="Nama Produk"
                        class="w-full border px-3 py-2 rounded"
                    />
                    @error('name')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror

                    <select
                        wire:model="kategoriId"
                        class="w-full px-3 py-2 border rounded-lg dark:bg-gray-800 dark:border-gray-600"
                    >
                        <option value="">Pilih Kategori</option>
                        @foreach ($kategoris as $kategori)
                        <option value="{{ $kategori->id }}">
                            {{ $kategori->nama }}
                        </option>
                        @endforeach
                    </select>
                    @error('kategoriId')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror

                    <input
                        type="number"
                        wire:model="harga"
                        placeholder="Harga"
                        class="w-full border px-3 py-2 rounded"
                    />
                    @error('harga')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror

                    <textarea
                        wire:model="deskripsi"
                        placeholder="Masukkan deskripsi produk..."
                        class="w-full border px-3 py-2 rounded h-28 resize-none"
                    ></textarea>
                    @error('deskripsi')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror

                    <input
                        type="text"
                        wire:model="asal"
                        placeholder="Asal produk..."
                        class="w-full border px-3 py-2 rounded"
                    />
                    @error('asal')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror

                    <input
                        type="text"
                        wire:model="productsBy"
                        placeholder="Produksi oleh..."
                        class="w-full border px-3 py-2 rounded"
                    />
                    @error('productsBy')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror

                    <div class="flex justify-end gap-2 pt-4">
                        <button
                            type="button"
                            wire:click="modalCreateOpen(false)"
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
            class="bg-white dark:bg-gray-800 rounded-lg shadow-lg w-full max-w-4xl p-6"
        >
            <h2 class="text-xl font-semibold mb-4">Edit Produk</h2>
            <form
                wire:submit.prevent="updateProduct"
                class="grid grid-cols-2 gap-6"
            >
                {{-- Kolom Upload Gambar --}}
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Upload Foto Produk
                    </label>
                    <div class="flex items-center justify-center w-full">
                        <label
                            for="edit-dropzone-file"
                            class="flex flex-col items-center justify-center w-full h-60 border-2 border-dashed rounded-lg cursor-pointer bg-gray-50 hover:bg-gray-100 transition"
                        >
                            <div
                                class="flex flex-col items-center justify-center pt-5 pb-6"
                            >
                                <svg
                                    class="w-10 h-10 mb-3 text-gray-400"
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M7 16V4a2 2 0 012-2h6a2 2 0 012 2v12m-6 4h.01M12 12a4 4 0 100-8 4 4 0 000 8z"
                                    ></path>
                                </svg>
                                <p class="mb-2 text-sm text-gray-500">
                                    <span class="font-semibold"
                                        >Klik untuk ganti foto</span
                                    >
                                    atau drag & drop
                                </p>
                                <p class="text-xs text-gray-400">
                                    PNG, JPG, JPEG (max 2MB)
                                </p>
                            </div>
                            <input
                                id="edit-dropzone-file"
                                type="file"
                                class="hidden"
                                wire:model="productImg"
                            />
                        </label>
                    </div>

                    {{-- Preview Foto Lama atau Baru --}}
                    <div class="mt-4">
                        <span class="text-sm font-medium text-gray-700"
                            >Preview:</span
                        >
                        @if ($productImg)
                        <img
                            src="{{ $productImg->temporaryUrl() }}"
                            class="mt-2 w-full h-48 object-cover rounded-lg shadow"
                        />
                        @else
                        <img
                            src="https://via.placeholder.com/300x200"
                            class="mt-2 w-full h-48 object-cover rounded-lg shadow"
                        />
                        @endif
                    </div>
                </div>

                {{-- Kolom Form Input --}}
                <div class="space-y-3">
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Data Produk
                    </label>

                    <input
                        type="text"
                        wire:model="name"
                        placeholder="Nama Produk"
                        class="w-full border px-3 py-2 rounded"
                    />
                    @error('name')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror

                    <select
                        wire:model="kategoriId"
                        class="w-full px-3 py-2 border rounded-lg dark:bg-gray-800 dark:border-gray-600"
                    >
                        <option value="">Semua</option>
                        @foreach ($kategoris as $kategori)
                        <option value="{{ $kategori->id }}">
                            {{ $kategori->nama }}
                        </option>
                        @endforeach
                    </select>
                    @error('kategoriId')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror

                    <input
                        type="number"
                        wire:model="harga"
                        placeholder="Harga"
                        class="w-full border px-3 py-2 rounded"
                    />
                    @error('harga')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror

                    <input
                        type="number"
                        wire:model="stok"
                        placeholder="Stok"
                        class="w-full border px-3 py-2 rounded"
                    />
                    @error('stok')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror

                    <textarea
                        wire:model="deskripsi"
                        placeholder="Masukkan deskripsi produk..."
                        class="w-full border px-3 py-2 rounded h-28 resize-none"
                    ></textarea>
                    @error('deskripsi')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror

                    <input
                        type="text"
                        wire:model="asal"
                        placeholder="Asal produk..."
                        class="w-full border px-3 py-2 rounded"
                    />
                    @error('asal')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror

                    <input
                        type="text"
                        wire:model="productBy"
                        placeholder="Produksi oleh..."
                        class="w-full border px-3 py-2 rounded"
                    />
                    @error('productBy')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror

                    <div class="flex justify-end gap-2 pt-4">
                        <button
                            type="button"
                            wire:click="modalEditOpen('',false)"
                            class="px-4 py-2 bg-gray-300 rounded"
                        >
                            Batal
                        </button>
                        <button
                            type="submit"
                            class="px-4 py-2 bg-green-600 text-white rounded"
                        >
                            Update
                        </button>
                    </div>
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
            class="bg-white dark:bg-gray-800 rounded-lg shadow-lg w-full max-w-md p-6 text-center"
        >
            <h2 class="text-xl font-semibold mb-4">Hapus Produk</h2>
            <p class="mb-6 text-gray-600 dark:text-gray-300">
                Apakah Anda yakin ingin menghapus
            </p>

            <div class="flex justify-center gap-2">
                <button
                    wire:click="deleteProduct"
                    class="px-4 py-2 bg-red-600 text-white rounded"
                >
                    Hapus
                </button>
                <button
                    type="button"
                    wire:click="modalDeleteOpen('', false)"
                    class="px-4 py-2 bg-gray-300 rounded"
                >
                    Batal
                </button>
            </div>
        </div>
    </div>
    @endif
</div>

