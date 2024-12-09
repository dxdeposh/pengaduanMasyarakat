@extends('layouts.app')

@section('header')
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Dashboard Pengaduan Masyarakat') }}
    </h2>
@endsection

@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Dashboard Cards -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
                <!-- Total Pengaduan Card -->
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <h3 class="text-xl font-semibold text-gray-700">Total Pengaduan</h3>
                    <p class="text-3xl font-bold text-blue-600">123</p>
                    <p class="text-sm text-gray-500">Jumlah pengaduan yang masuk</p>
                </div>

                <!-- Pengaduan Terverifikasi Card -->
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <h3 class="text-xl font-semibold text-gray-700">Pengaduan Terverifikasi</h3>
                    <p class="text-3xl font-bold text-green-600">80</p>
                    <p class="text-sm text-gray-500">Pengaduan yang sudah diverifikasi</p>
                </div>

                <!-- Pengaduan Belum Ditangani Card -->
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <h3 class="text-xl font-semibold text-gray-700">Pengaduan Belum Ditangani</h3>
                    <p class="text-3xl font-bold text-red-600">43</p>
                    <p class="text-sm text-gray-500">Pengaduan yang belum diproses</p>
                </div>
            </div>

            <!-- Analytics Section -->
            <div class="bg-white p-6 rounded-lg shadow-md mb-8">
                <h3 class="text-xl font-semibold text-gray-700 mb-4">Analytics Pengaduan Masyarakat</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Bar Chart atau Grafik -->
                    <div class="bg-gray-100 p-4 rounded-lg">
                        <!-- Grafik Placeholder (Misalnya dengan menggunakan Chart.js) -->
                        <canvas id="barChart"></canvas>
                    </div>

                    <!-- Pengaduan Berdasarkan Kategori -->
                    <div class="bg-gray-100 p-4 rounded-lg">
                        <h4 class="text-lg font-semibold text-gray-700 mb-4">Pengaduan Berdasarkan Kategori</h4>
                        <ul class="space-y-2">
                            <li class="flex justify-between text-gray-600">
                                <span>Infrastruktur</span>
                                <span class="font-semibold">45%</span>
                            </li>
                            <li class="flex justify-between text-gray-600">
                                <span>Lingkungan</span>
                                <span class="font-semibold">30%</span>
                            </li>
                            <li class="flex justify-between text-gray-600">
                                <span>Keamanan</span>
                                <span class="font-semibold">15%</span>
                            </li>
                            <li class="flex justify-between text-gray-600">
                                <span>Lainnya</span>
                                <span class="font-semibold">10%</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Table Data Pengaduan -->
            <div class="bg-white p-6 rounded-lg shadow-md">
                <h3 class="text-xl font-semibold text-gray-700 mb-4">Daftar Pengaduan Terbaru</h3>
                <table class="min-w-full table-auto border-collapse">
                    <thead>
                        <tr class="bg-gray-100">
                            <th class="px-4 py-2 text-left text-gray-600">No</th>
                            <th class="px-4 py-2 text-left text-gray-600">Judul Pengaduan</th>
                            <th class="px-4 py-2 text-left text-gray-600">Status</th>
                            <th class="px-4 py-2 text-left text-gray-600">Tanggal</th>
                            <th class="px-4 py-2 text-left text-gray-600">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Loop Data Pengaduan -->
                        <tr class="border-b">
                            <td class="px-4 py-2">1</td>
                            <td class="px-4 py-2">Lampu Jalan Rusak</td>
                            <td class="px-4 py-2 text-green-600">Terverifikasi</td>
                            <td class="px-4 py-2">2024-12-09</td>
                            <td class="px-4 py-2">
                                <a href="#" class="text-blue-500">Lihat</a>
                            </td>
                        </tr>
                        <tr class="border-b">
                            <td class="px-4 py-2">2</td>
                            <td class="px-4 py-2">Sampah Menumpuk</td>
                            <td class="px-4 py-2 text-red-600">Belum Ditangani</td>
                            <td class="px-4 py-2">2024-12-08</td>
                            <td class="px-4 py-2">
                                <a href="#" class="text-blue-500">Lihat</a>
                            </td>
                        </tr>
                        <!-- Tambahkan baris lainnya sesuai data pengaduan -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <!-- Include Chart.js Script -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Bar Chart Data (Contoh)
        var ctx = document.getElementById('barChart').getContext('2d');
        var barChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Infrastruktur', 'Lingkungan', 'Keamanan', 'Lainnya'],
                datasets: [{
                    label: 'Jumlah Pengaduan',
                    data: [45, 30, 15, 10],
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    tooltip: {
                        callbacks: {
                            label: function(tooltipItem) {
                                return tooltipItem.label + ': ' + tooltipItem.raw + ' Pengaduan';
                            }
                        }
                    }
                }
            }
        });
    </script>
@endsection
