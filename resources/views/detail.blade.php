<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $document->title }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css">

</head>

<body class="bg-[#F5F6F8] min-h-screen flex flex-col">
    <!-- Header -->
    <header class="relative shadow">
        <div class="container mx-auto px-20 py-6 sm:py-10 flex items-center justify-between w-full">
            <!-- Logo -->


            <!-- Hamburger Button -->
            <div class="md:hidden flex items-center">
                <button id="hamburger-icon" class="text-black focus:outline-none">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                        class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </div>

            <!-- Navigation -->
            <a href="#" class="flex flex-row items-center">
                <img src="{{ asset('images/tech.png') }}" alt="Prestasi Icon" class="w-10 h-10 sm:w-12 sm:h-12 mr-2">
                <h1 class="col-span-1 sm:col-span-2 text-lg sm:text-2xl font-bold text-gray-800">Archive Documents</h1>
            </a>

            <div class="hidden md:flex items-center justify-center gap-4 mx-auto">
                <nav class="space-x-8 text-gray-600">
                    <a href="{{ route('index') }}"
                        class="text-black transform hover:scale-105 transition-transform duration-300">Home</a>
                    <a href="{{ route('kp') }}"
                        class="text-black transform hover:scale-105 transition-transform duration-300">Kerja Praktek</a>
                    <a href="{{ route('proposal') }}"
                        class="text-black transform hover:scale-105 transition-transform duration-300">Proposal</a>
                    <a href="{{ route('skripsi') }}"
                        class="text-black transform hover:scale-105 transition-transform duration-300">Tugas Akhir</a>
                    {{-- <a href="#ta"
                        class="text-black transform hover:scale-105 transition-transform duration-300">About Us</a> --}}
                </nav>

            </div>
            <!-- Login Button -->
            <div class="hidden md:flex">
                @if (Auth::check())
                    @if (Auth::user()->roles == 'admin')
                        <a href="{{ url('/dashboard') }}"
                            class="bg-yellow-400 text-white px-6 py-2 sm:px-8 sm:py-3 rounded-full font-semibold hover:bg-gray-500 focus:outline-none focus:ring-2 hover:scale-105 transition-transform duration-300">Dashboard</a>
                    @else
                        <a href="{{ route('user.mydocuments.index') }}"
                            class="bg-yellow-400 text-white px-6 py-2 sm:px-8 sm:py-3 rounded-full font-semibold hover:bg-gray-500 focus:outline-none focus:ring-2 hover:scale-105 transition-transform duration-300">My
                            Documents</a>
                    @endif
                @else
                    <a href="{{ route('login') }}"
                        class="bg-yellow-400 text-white px-4 py-2 sm:px-12 sm:py-3 rounded-full font-semibold hover:bg-gray-500 focus:outline-none focus:ring-2 hover:scale-105 transition-transform duration-300">Sign
                        In</a>
                @endif
            </div>
        </div>
     

        <!-- Mobile Menu (hidden by default) -->
        <div id="mobile-menu"
            class="md:hidden hidden flex flex-col items-center bg-transparent p-5 absolute top-[80px] left-0 right-0 w-full h-fit">
            <a href="{{ route('index') }}" class="text-white py-1">Home</a>
            <a href="{{ route('kp') }}" class="text-white py-1">Kerja Praktek</a>
            <a href="{{ route('proposal') }}" class="text-white py-1">Proposal</a>
            <a href="{{ route('skripsi') }}" class="text-white py-1">Tugas Akhir</a>
            <a href="#ta" class="text-white py-2">About Us</a>
        </div>
    </header>

    <!-- Add the following JavaScript to toggle the mobile menu -->
    <script>
        const hamburgerIcon = document.getElementById('hamburger-icon');
        const mobileMenu = document.getElementById('mobile-menu');

        hamburgerIcon.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
        });
    </script>


    <!-- Add the following JavaScript to toggle the mobile menu -->
    <script>
        const hamburgerIcon = document.getElementById('hamburger-icon');
        const mobileMenu = document.getElementById('mobile-menu');

        hamburgerIcon.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
        });
    </script>

    <main class="flex-1 min-h-screen flex flex-col mb-10">
        <div class="relative flex flex-row gap-8 w-full max-w-7xl mx-auto mt-12">
            <!-- Section Detail -->
            
            <section class="bg-white p-8 max-w-7xl shadow-lg flex-1 sm:px-10 mx-2 rounded-xl">
                <div class="flex flex-col md:flex-row items-start">
                    <div class="md:w-1/3 flex justify-center flex-col items-center">
                        <!-- Link untuk download gambar -->
                        <a href="{{ asset('storage/' . $document->cover) ? asset('storage/' . $document->cover) : 'https://via.placeholder.com/220x330' }}"
                            download="{{ $document->title }}_cover.jpg" class="relative">
                            <!-- Gambar dengan efek zoom saat hover -->
                            <img src="{{ $document->cover ? asset('storage/' . $document->cover) : 'https://via.placeholder.com/220x330' }}"
                                alt="{{ $document->title }}"
                                class="rounded-lg shadow-lg w-auto h-auto transform transition duration-300 ease-in-out hover:scale-110">
                        </a>

                        <div class="mt-4 w-full flex flex-col items-center">
                            <!-- Judul BAB 1 -->
                            <h2 class="text-xl font-bold mb-4">
                                @if ($document->category == 'artikel')
                                    Artikel
                                @elseif ($document->category == 'mbkm')
                                    Sertifikat MBKM
                                @elseif ($document->category == 'magang')
                                    Sertifikat Magang
                                @else
                                    BAB 1
                                @endif
                            </h2>
                            
                            <!-- Cover yang bisa diklik untuk membuka PDF -->
                            <a href="{{ asset('storage/' . $document->file_path) }}" target="_blank" class="relative">
                                <img src="{{ $document->cover ? asset('storage/' . $document->cover) : 'https://via.placeholder.com/220x330' }}"
                                    alt="{{ $document->title }}"
                                    class="rounded-lg shadow-lg w-auto h-auto transform transition duration-300 ease-in-out hover:scale-105 cursor-pointer">
                            </a>
                        </div>
                        <!-- BAB 2-4 (Hanya untuk Pengguna yang Sudah Login) -->
                        @auth
                    @if (!in_array($document->category, ['artikel', 'mbkm', 'magang']))
                            <div class="mt-4 w-full flex flex-col items-center">
                                <h2 class="text-xl font-bold mb-4">BAB 2</h2>
                                <a href="{{ asset('storage/' . $document->bab2) }}" target="_blank" class="relative">
                                    <img src="{{ $document->cover ? asset('storage/' . $document->cover) : 'https://via.placeholder.com/220x330' }}"
                                        alt="{{ $document->title }}"
                                        class="rounded-lg shadow-lg w-auto h-auto transform transition duration-300 ease-in-out hover:scale-105 cursor-pointer">
                                </a>
                            </div>

                            <div class="mt-4 w-full flex flex-col items-center">
                                <h2 class="text-xl font-bold mb-4">BAB 3</h2>
                                <a href="{{ asset('storage/' . $document->bab3) }}" target="_blank" class="relative">
                                    <img src="{{ $document->cover ? asset('storage/' . $document->cover) : 'https://via.placeholder.com/220x330' }}"
                                        alt="{{ $document->title }}"
                                        class="rounded-lg shadow-lg w-auto h-auto transform transition duration-300 ease-in-out hover:scale-105 cursor-pointer">
                                </a>
                            </div>

                            @if (!in_array($document->category, ['proposal', 'proposal_bersama']))
                            <div class="mt-4 w-full flex flex-col items-center">
                                <h2 class="text-xl font-bold mb-4">BAB 4</h2>
                                <a href="{{ asset('storage/' . $document->bab4) }}" target="_blank" class="relative">
                                    <img src="{{ $document->cover ? asset('storage/' . $document->cover) : 'https://via.placeholder.com/220x330' }}"
                                        alt="{{ $document->title }}"
                                        class="rounded-lg shadow-lg w-auto h-auto transform transition duration-300 ease-in-out hover:scale-105 cursor-pointer">
                                </a>
                            </div>
                            @endif
                            @if ($document->category == 'skripsi') 
                            <div class="mt-4 w-full flex flex-col items-center">
                                <h2 class="text-xl font-bold mb-4">BAB 5</h2>
                                <a href="{{ asset('storage/' . $document->bab5) }}" target="_blank" class="relative">
                                    <img src="{{ $document->cover ? asset('storage/' . $document->cover) : 'https://via.placeholder.com/220x330' }}"
                                        alt="{{ $document->title }}"
                                        class="rounded-lg shadow-lg w-auto h-auto transform transition duration-300 ease-in-out hover:scale-105 cursor-pointer">
                                </a>
                            </div>
                            @endif
                        @endif    
                        @endauth

                        <!-- Pesan jika pengguna belum login -->
                        @guest
                        <div class="mt-4 w-full text-center text-red-600 font-semibold">
                            @if ($document->category === 'kp')
                                <p>Silakan <a href="{{ route('login') }}" class="text-blue-600 underline">login</a> untuk melihat BAB 2-4.</p>
                            @elseif ($document->category === 'proposal')
                                <p>Silakan <a href="{{ route('login') }}" class="text-blue-600 underline">login</a> untuk melihat BAB 2-3.</p>
                            @elseif ($document->category === 'skripsi')
                                <p>Silakan <a href="{{ route('login') }}" class="text-blue-600 underline">login</a> untuk melihat BAB 2-5.</p>
                            @else
                            @endif
                        </div>
                    @endguest
                    

                    </div>

                    <!-- Detail -->
                    <div class="w-full md:w-2/3 mt-6 md:mt-0 md:ml-8">
                        <!-- Judul -->
                        <h1 class="text-lg sm:text-3xl font-bold text-gray-800 mb-2">
                            {{ $document->title }}
                        </h1>

                        <!-- Informasi NIM, Year, dan Category -->
                        <p class="text-lg sm:text-xl text-gray-500 mb-4">
                            {{ ucfirst($document->category) }} <br>
                            <strong>NIM:</strong> {{ $document->user->email ?? 'No Email' }} <br>
                            <strong>Year:</strong> {{ $document->year }} <br>
                        </p>

                        <!-- Sinopsis -->
                        <h2 class="text-base sm:text-lg font-semibold mb-2">
                            Description
                        </h2>
                        <p class="text-sm sm:text-base text-gray-700 leading-relaxed text-justify">
                            {{ $document->description }}
                        </p>
                    </div>

                </div>
            </section>

            <!-- Related Books -->
            {{-- <section class="p-4 sm:p-8 max-w-md flex-1">
                @if ($relatedDocuments->isNotEmpty())  <!-- Memeriksa apakah ada dokumen terkait -->
                    <h1 class="text-yellow-400 font-bold text-sm mb-4 sm:text-xl">Related Documents</h1>
                    <div class="grid gap-6">
                        @foreach ($relatedDocuments as $related)
                            <a href="{{ route('detail', $related->id) }}" class="block">
                                <div class="flex flex-col sm:flex-row gap-4 p-4 bg-white shadow-lg rounded-lg max-h-80 overflow-hidden">
                                    <img src="{{ $related->cover ? asset('storage/' . $related->cover) : 'https://via.placeholder.com/150x220' }}"
                                        alt="{{ $related->title }}" class="w-full sm:w-30 h-auto sm:h-40 rounded-lg">
                                    <div>
                                        <h2 class="text-[10px] sm:text-lg font-bold text-gray-800">{{ $related->title }}</h2>
                                        <p class="text-[8px] sm:text-sm text-gray-600">Year: {{ $related->year }}</p>
                                        <p class="text-[8px] sm:text-sm text-gray-600">Description: {{ $related->description }}</p>
                                    </div>
                                </div>
                            </a>
                        @endforeach
                    </div>
                @endif
            </section> --}}
            
        </div>
    </main>


    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
    <script>
        window.onload = function() {
            const urlParams = new URLSearchParams(window.location.search);
            const searchInputKP = document.querySelector('input[name="search_kp"]');

            // Pastikan input terisi dari URL jika ada parameter
            if (urlParams.has('search_kp')) {
                searchInputKP.value = urlParams.get('search_kp');
            }

            // Jika query kosong, kosongkan input
            if (!searchInputKP.value.trim()) {
                searchInputKP.value = '';
            }
        };

        AOS.init({
            duration: 1000, // Durasi animasi dalam milidetik
            easing: 'ease-in-out', // Efek easing animasi
            once: true, // Animasi hanya sekali (tidak akan berulang ketika scroll kembali)
            mirror: false // Animasi tidak akan muncul saat scrolling ke atas
        });
    </script>

</body>
<footer class="bg-yellow-400 text-black py-8 px-6 lg:px-20">
    <div class="container mx-auto flex flex-col md:flex-row justify-between">
        <div class="mb-6 md:mb-0">
            <img src="{{ asset('images/tech.png') }}" alt="Logo IF" class="inline-block w-20">
            <p class="mt-4 text-sm md:text-base">
                Teknik Informatika<br>
                Universitas Islam Negeri Sunan Gunung Djati<br>
                Jalan A.H Nasution No. 105, Cipadung, Cibiru, Kota Bandung, Jawa Barat 40614
            </p>
        </div>
        <div class="mb-6 md:mb-0">
            <h3 class="font-bold mb-4 text-lg md:text-xl">Layanan Akademik</h3>
            <ul class="space-y-2 text-sm md:text-base">
                <li><a href="#" class="hover:underline">Sistem Informasi Layanan Akademik (SALAM)</a>
                </li>
                <li><a href="#" class="hover:underline">Learning Management System (LMS)</a></li>
                <li><a href="#" class="hover:underline">E-Library UIN Sunan Gunung Djati</a></li>
                <li><a href="#" class="hover:underline">E-Library Teknik Informatika</a></li>
                <li><a href="#" class="hover:underline">Jurnal Online Informatika</a></li>
            </ul>
        </div>
        <div>
            <h3 class="font-bold mb-4 text-lg md:text-xl">Akses Cepat</h3>
            <ul class="space-y-2 text-sm md:text-base">
                <li><a href="#" class="hover:underline">Fakultas Sains Dan Teknologi</a></li>
                <li><a href="#" class="hover:underline">UIN Sunan Gunung Djati</a></li>
                <li><a href="#" class="hover:underline">SINTA Dikti Kemdikbud RI</a></li>
                <li><a href="#" class="hover:underline">Pangkalan Data DIKTI Kemdikbud RI</a></li>
            </ul>
        </div>
    </div>
    <div class="border-t border-black mt-8 pt-4 text-center">
        <p class="text-sm md:text-base">
            © Copyrights. All rights reserved. Developed by <span class="font-bold">Rivaldd</span>, Supported
            by
            <span class="font-bold">Tech Support Informatika</span>
        </p>
    </div>
</footer>

</html>
