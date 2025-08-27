<div>
    <div class="m-2 py-2 flex justify-between items-center">
        <!-- Judul -->
        <h1 class="text-3xl font-bold text-gray-800 dark:text-white">
            Penjualan {{ now()->format('d M Y') }}
        </h1>

        <!-- Jam Digital -->
        <div
            id="digitalClock"
            class="text-2xl bg-white shadow p-3 rounded-xl font-mono font-semibold text-blue-600 dark:text-blue-400"
        ></div>
    </div>
    <div class="grid grid-cols-12 gap-6 sm:p-1 md:p-1 lg:p-6 xl:p-6">
        <!-- Kiri -->
        <div class="col-span-12 lg:col-span-8 space-y-6">
            <!-- Chart: Jumlah Pembelian -->
            <div class="bg-white dark:bg-gray-800 rounded-2xl shadow p-4">
                <h2 class="text-lg font-semibold mb-2">Jumlah Pembelian</h2>
                <canvas id="pembelianChart"></canvas>
            </div>

            <!-- Chart: Grafik Keuntungan -->
            <div class="bg-white dark:bg-gray-800 rounded-2xl shadow p-4">
                <h2 class="text-lg font-semibold mb-2">Grafik Keuntungan</h2>
                <canvas id="keuntunganChart"></canvas>
            </div>

            <!-- Chart: Pasokan Gudang (Pie) -->
        </div>

        <!-- Kanan -->
        <div class="col-span-12 lg:col-span-4 space-y-6">
            <!-- User Table -->
            <div class="bg-white dark:bg-gray-800 rounded-2xl shadow p-4">
                <h2 class="text-lg font-semibold mb-2">Daftar User</h2>
                <table class="min-w-full text-sm">
                    <thead>
                        <tr class="bg-gray-100 dark:bg-gray-700">
                            <th class="px-3 py-2 text-left">Nama</th>
                            <th class="px-3 py-2 text-left">Email</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="border-b dark:border-gray-700">
                            <td class="px-3 py-2">John Doe</td>
                            <td class="px-3 py-2">john@example.com</td>
                        </tr>
                        <tr class="border-b dark:border-gray-700">
                            <td class="px-3 py-2">Jane Smith</td>
                            <td class="px-3 py-2">jane@example.com</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="bg-white dark:bg-gray-800 rounded-2xl shadow p-4">
                <h2 class="text-lg font-semibold mb-2">Pasokan Gudang</h2>
                <canvas id="pasokanChart"></canvas>
            </div>

            <!-- Paket Unggulan -->
            <div class="bg-white dark:bg-gray-800 rounded-2xl shadow p-4">
                <h2 class="text-lg font-semibold mb-2">Paket Unggulan</h2>
                <ul class="space-y-2">
                    <li class="p-3 bg-primary text-white rounded-lg">
                        Paket A
                    </li>
                    <li class="p-3 bg-primary/90 text-white rounded-lg">
                        Paket B
                    </li>
                    <li class="p-3 bg-primary/80 text-white rounded-lg">
                        Paket C
                    </li>
                </ul>
            </div>

            <!-- Tabel Produk -->
            <div class="bg-white dark:bg-gray-800 rounded-2xl shadow p-4">
                <h2 class="text-lg font-semibold mb-2">Daftar Produk</h2>
                <table class="min-w-full text-sm">
                    <thead>
                        <tr class="bg-gray-100 dark:bg-gray-700">
                            <th class="px-3 py-2 text-left">Produk</th>
                            <th class="px-3 py-2 text-left">Stok</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="border-b dark:border-gray-700">
                            <td class="px-3 py-2">Produk 1</td>
                            <td class="px-3 py-2">100</td>
                        </tr>
                        <tr class="border-b dark:border-gray-700">
                            <td class="px-3 py-2">Produk 2</td>
                            <td class="px-3 py-2">50</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- Chart.js -->

<script>
    // Jumlah Pembelian (Line Chart)
    new Chart(document.getElementById("pembelianChart"), {
        type: "line",
        data: {
            labels: ["Jan", "Feb", "Mar", "Apr", "Mei"],
            datasets: [
                {
                    label: "Pembelian",
                    data: [12, 19, 3, 5, 7],
                    borderColor: "#3b82f6",
                    backgroundColor: "rgba(59, 130, 246, 0.3)",
                    fill: true,
                },
            ],
        },
    });

    // Grafik Keuntungan (Bar Chart)
    new Chart(document.getElementById("keuntunganChart"), {
        type: "bar",
        data: {
            labels: ["Jan", "Feb", "Mar", "Apr", "Mei"],
            datasets: [
                {
                    label: "Keuntungan",
                    data: [500, 700, 400, 600, 800],
                    backgroundColor: "#10b981",
                },
            ],
        },
    });

    // Pasokan Gudang (Pie Chart)
    new Chart(document.getElementById("pasokanChart"), {
        type: "pie",
        data: {
            labels: ["Produk A", "Produk B", "Produk C"],
            datasets: [
                {
                    label: "Pasokan",
                    data: [120, 90, 60],
                    backgroundColor: ["#f87171", "#60a5fa", "#34d399"],
                },
            ],
        },
    });

    (function () {
        let clockInterval;

        function startClock() {
            function updateClock() {
                const clockEl = document.getElementById("digitalClock");
                if (!clockEl) {
                    clearInterval(clockInterval);
                    return;
                }
                const now = new Date();
                const h = String(now.getHours()).padStart(2, "0");
                const m = String(now.getMinutes()).padStart(2, "0");
                const s = String(now.getSeconds()).padStart(2, "0");
                clockEl.textContent = `${h}:${m}:${s}`;
            }

            updateClock();
            clockInterval = setInterval(updateClock, 1000);
        }

        startClock();
    })();
</script>
