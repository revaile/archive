<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-100 dark:bg-gray-900">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 gap-8 md:grid-cols-2">

                <!-- Cards Section with Shadow -->
                <div class="bg-white dark:bg-gray-800 shadow-xl sm:rounded-lg p-6">
                    <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 xl:grid-cols-2">
                        @foreach ($cards as $card)
                            <div class="card shadow-lg rounded-lg {{ $card['bgColor'] }} text-white h-fit">
                                <div class="card-body p-6">
                                    <div class="flex justify-between items-center">
                                        <h4 class="text-lg font-semibold">{{ $card['title'] }}</h4>
                                        <div class="rounded-md w-12 h-12 flex items-center justify-center bg-gray-100 bg-opacity-20">
                                            {!! $card['icon'] !!}   
                                        </div>
                                    </div>
                                    <div class="mt-4">
                                        <h2 class="text-3xl font-bold">{{ $card['count'] }}</h2>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <!-- Bar Chart Section with Shadow -->
                <div class="bg-white dark:bg-gray-800 shadow-xl sm:rounded-lg p-6">
                    <div class="flex justify-center">
                        <canvas id="barChart" width="400" height="200"></canvas>
                    </div>
                </div>
            </div>

            <!-- Chart.js Script -->
            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
            <script>
                // Mengambil data count dari PHP dan mengonversinya menjadi array JavaScript
                const cardCounts = @json($cards); // Menambahkan data count ke JavaScript
                const counts = cardCounts.map(card => card.count); // Ambil count dari setiap card

                // Chart.js
                const barCtx = document.getElementById('barChart').getContext('2d');

                const barChart = new Chart(barCtx, {
                    type: 'bar',
                    data: {
                        labels: ['Users', 'Skripsi', 'Proposal', 'Kerja Praktek'], // Label ini bisa disesuaikan
                        datasets: [{
                            label: 'Data Distribution',
                            data: counts, // Gunakan data count yang sudah diambil
                            backgroundColor: [
                                'rgba(59, 130, 246, 0.7)',
                                'rgba(16, 185, 129, 0.7)',
                                'rgba(234, 179, 8, 0.7)',
                                'rgba(239, 68, 68, 0.7)'
                            ],
                            borderColor: [
                                'rgba(59, 130, 246, 1)',
                                'rgba(16, 185, 129, 1)',
                                'rgba(234, 179, 8, 1)',
                                'rgba(239, 68, 68, 1)'
                            ],
                            borderWidth: 1
                        }]
                    },
                    options: {
                        responsive: true,
                        scales: {
                            y: {
                                beginAtZero: true,
                                ticks: {
                                    color: '#D1D5DB' // Text color for y-axis (light gray)
                                },
                                grid: {
                                    color: 'rgba(209, 213, 219, 0.3)' // Grid lines color
                                }
                            },
                            x: {
                                ticks: {
                                    color: '#D1D5DB' // Text color for x-axis (light gray)
                                },
                                grid: {
                                    color: 'rgba(209, 213, 219, 0.3)' // Grid lines color
                                }
                            }
                        },
                        plugins: {
                            legend: {
                                labels: {
                                    color: '#D1D5DB' // Legend text color
                                }
                            }
                        }
                    }
                });
            </script>

        </div>
    </div>
</x-app-layout>
