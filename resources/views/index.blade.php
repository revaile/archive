    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Arsip</title>
        <script src="https://cdn.tailwindcss.com"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css">
    </head>

    <body class="bg-[#F5F6F8]">
        <div class="bg-[#F5F6F8] font-sans max-w-7xl mx-auto">
            <!-- Wrapper untuk Header dan Hero -->
            <div class="relative w-full h-[500px] overflow-hidden">
                <!-- Header -->
                <header class="absolute top-0 left-0 w-full py-6 z-20 bg-transparent ">
                    <div class="container mx-auto px-6 flex items-center justify-between">
                        <!-- Logo -->
                        <a href="#" class="flex items-center">
                            <img src="{{ asset('images/tech.png') }}" alt="Prestasi Icon" class="w-12 h-12 mr-2">
                            <h1 class="text-2xl font-bold text-black ">Archive Documents</h1>
                        </a>

                        <!-- Hamburger Menu (Mobile) -->
                        <div class="md:hidden">
                            <button id="menu-btn" class="focus:outline-none">
                                <svg class="w-6 h-6 text-black" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M4 6h16M4 12h16m-7 6h7" />
                                </svg>
                            </button>
                        </div>

                        <!-- Navigation and Login Button -->
                        <div class="hidden md:flex items-center gap-7">
                            <!-- Navigation -->
                            <nav class="hidden md:flex space-x-11 text-gray-300 mr-20">
                                <a href="{{ route('index') }}"
                                    class="text-white transform hover:scale-105 transition-transform duration-300
                                    {{ request()->routeIs('index') ? 'text-white font-bold' : '' }}">
                                    Home
                                </a>
                                <a href="{{ route('kp') }}"
                                    class="text-white transform hover:scale-105 transition-transform duration-300
                                    {{ request()->routeIs('kp') ? 'text-yellow-500 font-bold' : '' }}">
                                    Kerja Praktek
                                </a>
                                <a href="{{ route('proposal') }}"
                                    class="text-white transform hover:scale-105 transition-transform duration-300
                                    {{ request()->routeIs('proposal') ? 'text-yellow-500 font-bold' : '' }}">
                                    Proposal
                                </a>
                                <a href="{{ route('skripsi') }}"
                                    class="text-white transform hover:scale-105 transition-transform duration-300
                                    {{ request()->routeIs('skripsi') ? 'text-yellow-500 font-bold' : '' }}">
                                    Tugas Akhir
                                </a>
                                {{-- <a href="#ta"
                                    class="text-white transform hover:scale-105 transition-transform duration-300
                                    {{ request()->is('ta') ? 'text-yellow-500 font-bold' : '' }}">
                                    About Us
                                </a> --}}
                            </nav>


                            <!-- Login Button -->
                            <!-- Login Button -->
                            @if (Auth::check())
                                @if (Auth::user()->roles == 'admin')
                                    <a href="{{ url('/dashboard') }}"
                                        class="bg-white text-indigo-950 px-8 py-3 rounded-full font-semibold hover:bg-gray-500 focus:outline-none focus:ring-2 hover:scale-105 transition-transform duration-300 sm:text-sm lg:text-base">
                                        Dashboard
                                    </a>
                                @else
                                    <a href="{{ route('user.mydocuments.index') }}"
                                        class="bg-white text-indigo-950 px-8 py-3 rounded-full font-semibold hover:bg-gray-500 focus:outline-none focus:ring-2 hover:scale-105 transition-transform duration-300 sm:text-sm lg:text-base">
                                        My Documents
                                    </a>
                                @endif
                            @else
                                <a href="{{ route('login') }}"
                                    class="bg-white text-indigo-950 px-8 py-3 rounded-full font-semibold hover:bg-gray-500 focus:outline-none focus:ring-2 hover:scale-105 transition-transform duration-300 sm:text-sm lg:text-base">
                                    Sign In
                                </a>
                                {{-- <a href="{{ route('register') }}"
                                    class="bg-indigo-950 text-white px-8 py-3 rounded-full font-semibold hover:bg-gray-500 focus:outline-none focus:ring-2 hover:scale-105 transition-transform duration-300 sm:text-sm lg:text-base">
                                    Register
                                </a> --}}
                            @endif

                        </div>
                    </div>
                    <!-- Mobile Menu -->
                    <div id="mobile-menu" class="hidden md:hidden bg-gray-800">
                        <nav class="space-y-4 px-6 py-4 text-gray-300">
                            <a href="{{ route('kp') }}"
                                class="block text-white hover:bg-gray-700 rounded px-3 py-2">Kerja Praktek</a>
                            <a href="{{ route('proposal') }}"
                                class="block text-white hover:bg-gray-700 rounded px-3 py-2">Proposal</a>
                            <a href="{{ route('skripsi') }}"
                                class="block text-white hover:bg-gray-700 rounded px-3 py-2">Tugas Akhir</a>
                            <a href="#ta" class="block text-white hover:bg-gray-700 rounded px-3 py-2">About Us</a>
                            @if (Auth::check())
                                @if (Auth::user()->roles == 'admin')
                                    <a href="{{ url('/dashboard') }}"
                                        class="block text-white hover:bg-gray-700 rounded px-3 py-2">
                                        Dashboard
                                    </a>
                                @else
                                    <a href="{{ route('user.mydocuments.index') }}"
                                        class="block text-white hover:bg-gray-700 rounded px-3 py-2">
                                        My Documents
                                    </a>
                                @endif
                            @else
                                <a href="{{ route('login') }}"
                                    class="block text-white hover:bg-gray-700 rounded px-3 py-2">
                                    Sign In
                                </a>
                            @endif
                        </nav>
                    </div>
                </header>

                <script>
                    // JavaScript untuk toggle menu di mobile
                    const menuBtn = document.getElementById('menu-btn');
                    const mobileMenu = document.getElementById('mobile-menu');

                    menuBtn.addEventListener('click', () => {
                        mobileMenu.classList.toggle('hidden');
                    });
                </script>


                <!-- Hero Section -->
                <!-- Hero Section -->
                <section class="relative w-full h-full">
                    <!-- Background Image -->
                    <div class="absolute top-0 right-0 w-full h-full bg-contain bg-right bg-no-repeat z-0"
                        style="background-image: url('{{ asset('images/Image-Hero.png') }}'); border-bottom-right-radius: 70px; overflow: hidden;">
                    </div>

                    <!-- Left Content -->
                    <div
                        class="container mx-auto flex flex-col-reverse lg:flex-row items-center justify-between px-6 lg:px-12 h-full relative z-10">
                        <div class="lg:w-1/2 text-center lg:text-left space-y-6 mt-16 sm:mt-20 md:mt-24">
                            <h2 class="text-4xl sm:text-5xl md:text-6xl font-bold text-gray-900 leading-tight">
                                Showcase Your <br /> Academic Achievements
                            </h2>
                            <p class="text-sm sm:text-base md:text-lg text-gray-700 mt-4 sm:pt-6">
                                Find and share proposals, internships, and final projects to <br>inspire and be
                                inspired.
                            </p>
                            <button onclick="handleRedirect()"
                                class="px-4 sm:px-6 py-2 bg-[#facc15] text-white font-semibold rounded-full hover:bg-gray-700 transform hover:scale-105 transition-transform duration-300">
                                Upload Dokumen
                            </button>

                            <script>
                                function handleRedirect() {
                                    const isLoggedIn = {{ auth()->check() ? 'true' : 'false' }};
                                    const userRole = "{{ auth()->user()->roles ?? '' }}"; // Menyimpan role pengguna (misalnya 'admin' atau 'user')

                                    if (isLoggedIn) {
                                        if (userRole === 'admin') {
                                            window.location.href = "{{ route('dashboard.documents.index') }}";
                                        } else {
                                            window.location.href = "{{ route('user.mydocuments.index') }}";
                                        }
                                    } else {
                                        window.location.href = "{{ route('login') }}";
                                    }
                                }
                            </script>

                        </div>
                    </div>
                </section>
            </div>
            <!-- count -->
            <!-- Count Section -->
            <section class="py-12" data-aos="fade-in">
                <div class="max-w-6xl mx-auto grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6 text-center">
                    @php
                        $customCategories = [];
                        foreach ($categories as $category => $data) {
                            if (in_array($category, ['skripsi', 'artikel'])) {
                                $customCategories['Tugas Akhir'] = ($customCategories['Tugas Akhir'] ?? 0) + $data->count;
                            } elseif (in_array($category, ['proposal', 'proposal_bersama'])) {
                                $customCategories['Proposal'] = ($customCategories['Proposal'] ?? 0) + $data->count;
                            } elseif (in_array($category, ['mbkm', 'magang', 'kp'])) {
                                $customCategories['KP'] = ($customCategories['KP'] ?? 0) + $data->count;
                            } else {
                                $customCategories[ucfirst($category)] = $data->count;
                            }
                        }
                    @endphp
            
                    @foreach ($customCategories as $category => $count)
                        <div
                            class="bg-white shadow-md rounded-lg p-4 sm:p-6 transform hover:scale-105 transition-transform duration-300">
                            <h2 class="text-2xl sm:text-3xl md:text-4xl font-extrabold text-[#facc15]">
                                {{ $count }}+
                            </h2>
                            <p class="mt-2 text-sm sm:text-base md:text-lg text-gray-700 font-medium">
                                {{ $category }}
                            </p>
                        </div>
                    @endforeach
                </div>
            </section>
            
            



            <!-- Section Kp ( -->
            <!-- Section Kp ( -->
            <section class="max-w-6xl mx-auto px-6 py-8">
                <h1 id="kp" class="text-3xl font-bold text-gray-800 mb-8 text-center">All Documents</h1>

                <!-- Horizontal Line -->
                <hr class="border-t-2 border-gray-300 mb-8">
                <!-- Search Box untuk KP -->
                <div class="flex justify-between">
                    <form method="GET" action="{{ route('page') }}" class="relative mb-6 flex flex-wrap gap-4">
                        <input type="text" name="search" placeholder="Search Documents"
                            value="{{ request('search') }}"
                            class="w-full lg:w-80 px-4 py-3 pr-12 rounded-lg shadow focus:outline-none focus:ring-2 focus:ring-blue-500 text-gray-700" />

                        <select name="category"
                            class="w-full lg:w-60 px-4 py-3 rounded-lg shadow focus:outline-none focus:ring-2 focus:ring-blue-500 text-gray-700">
                            <option value="">Pilih Kategori</option>
                            <option value="kp" {{ request('category') == 'kp' ? 'selected' : '' }}>Kerja Praktek
                            </option>
                            <option value="magang" {{ request('category') == 'magang' ? 'selected' : '' }}>Magang
                            </option>
                            <option value="mbkm" {{ request('category') == 'mbkm' ? 'selected' : '' }}>MBKM
                            </option>
                            <option value="proposal" {{ request('category') == 'proposal' ? 'selected' : '' }}>Proposal
                            </option>
                            <option value="skripsi" {{ request('category') == 'skripsi' ? 'selected' : '' }}>Skripsi
                            </option>
                            <option value="artikel" {{ request('category') == 'artikel' ? 'selected' : '' }}>Artikel
                            </option>
                        </select>

                        <select name="year"
                            class="w-full lg:w-60 px-4 py-3 rounded-lg shadow focus:outline-none focus:ring-2 focus:ring-blue-500 text-gray-700">
                            <option value="">Pilih Tahun</option>
                            @foreach ($years as $year)
                                <option value="{{ $year }}" {{ request('year') == $year ? 'selected' : '' }}>
                                    {{ $year }}</option>
                            @endforeach
                        </select>

                        <div class="flex gap-2">
                            <button type="submit"
                                class="px-6 py-3 bg-[#facc15] text-white rounded-lg shadow hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500">
                                Apply Filter
                            </button>
                            <a href="{{ route('page') }}"
                                class="px-6 py-3 bg-gray-500 text-white rounded-lg shadow hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-gray-500 ">
                                Reset
                            </a>
                        </div>
                    </form>
                </div>

                @if ($kpfilteredDocuments->count() > 0)
                <h1 id="documents" class="text-3xl font-bold text-gray-800 mb-8" data-aos="fade-up">Kerja Praktek</h1>
                <!-- Book Container -->
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 " data-aos="fade-up">
                    @foreach ($kpfilteredDocuments as $document)
                        <!-- Book Card -->
                        <a href="{{ route('detail', $document->id) }}"
                            class="bg-yellow-50 shadow-lg rounded-lg overflow-hidden transform hover:scale-105 transition-transform hover:border-2 hover:border-[#facc15]">
                            <img src="{{ $document->cover ? asset('storage/' . $document->cover) : 'https://via.placeholder.com/150x220' }}"
                                alt="Book Cover" class="w-full h-85 object-cover" />
                            <div class="p-4">
                                <h2 class="font-semibold text-lg text-gray-800 mb-2 truncate">
                                    {{ $document->title }}</h2>
                                    <p class="text-gray-500 text-sm mb-1">
                                        {{ $document->category === 'kp' ? 'Kerja Praktek' : ($document->category === 'mbkm' ? strtoupper($document->category) : ucfirst($document->category)) }}
                                    </p>                                    
                                        <p class="text-gray-500 text-sm mb-1 truncate">NIM:
                                    {{ $document->user->email ?? 'No Email' }}</p>
                                    <p class="text-gray-500 text-sm mb-1">Year: {{ $document->year }}</p>
                                <p class="text-gray-400 text-sm truncate">{{ $document->description }}</p>
                            </div>
                        </a>
                    @endforeach
                </div>
            @endif
            </section>

            <!-- Section Kp (Proposal) -->
            <section class="max-w-6xl mx-auto px-6 py-8">
                @if ($proposalfilteredDocuments->count() > 0)
                    <h1 id="proposal" class="text-3xl font-bold text-gray-800 mb-8" data-aos="fade-up">Proposal</h1>
                    <!-- Book Container for Proposal -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6" data-aos="fade-up">
                        @foreach ($proposalfilteredDocuments as $document)
                        <!-- Book Card -->
                            <a href="{{ route('detail', $document->id) }}"
                                class="bg-yellow-50 shadow-lg rounded-lg overflow-hidden transform hover:scale-105 transition-transform hover:border-2 hover:border-[#facc15]">
                                <img src="{{ $document->cover ? asset('storage/' . $document->cover) : 'https://via.placeholder.com/150x220' }}"
                                    alt="Book Cover" class="w-full h-100 object-cover" />
                                <div class="p-4">
                                    <h2 class="font-semibold text-lg text-gray-800 mb-2 truncate">
                                        {{ $document->title }}</h2>
                                    <p class="text-gray-500 text-sm mb-1 truncate">NIM:
                                        {{ $document->user->email ?? 'No Email' }}</p>
                                    <p class="text-gray-500 text-sm mb-1">Year: {{ $document->year }}</p>
                                    <p class="text-gray-400 text-sm truncate">{{ $document->description }}</p>
                                </div>
                            </a>
                        @endforeach
                    </div>
                @endif
            </section>

            <!-- Section Kp (Skripsi) -->
            <section class="max-w-6xl mx-auto px-6 py-8">
                @if ($skripsifilteredDocuments->count() > 0)
                    <h1 id="ta" class="text-3xl font-bold text-gray-800 mb-8" data-aos="fade-up">Tugas Akhir</h1>
                    <!-- Book Container for Skripsi -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6" data-aos="fade-up">
                        @foreach ($skripsifilteredDocuments as $document)
                            <!-- Book Card -->
                            <a href="{{ route('detail', $document->id) }}"
                                class="bg-yellow-50 shadow-lg rounded-lg overflow-hidden transform hover:scale-105 transition-transform hover:border-2 hover:border-[#facc15]">
                                <img src="{{ $document->cover ? asset('storage/' . $document->cover) : 'https://via.placeholder.com/150x220' }}"
                                    alt="Book Cover" class="w-full h-100 object-cover" />
                                <div class="p-4">
                                    <h2 class="font-semibold text-lg text-gray-800 mb-2 truncate">
                                        {{ $document->title }}</h2>
                                        <p class="text-gray-500 text-sm mb-1">
                                            {{ in_array(strtolower($document->category), ['skripsi', 'artikel']) ? ucfirst($document->category) : $document->category }}
                                        </p>                                                                            <p class="text-gray-500 text-sm mb-1 truncate">NIM:
                                        {{ $document->user->email ?? 'No Email' }}</p>
                                    <p class="text-gray-500 text-sm mb-1">Year: {{ $document->year }}</p>
                                    <p class="text-gray-400 text-sm truncate">{{ $document->description }}</p>
                                </div>
                            </a>
                        @endforeach
                    </div>
                @endif
            </section>

        </div>


        <footer class="bg-yellow-400 text-black py-8 px- lg:px-20 " data-aos="fade-up">
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
                        <li><a href="https://salam.uinsgd.ac.id/dashboard/login.php" class="hover:underline">Sistem Informasi Layanan Akademik (SALAM)</a>
                        </li>
                        <li><a href="https://eknows.uinsgd.ac.id/" class="hover:underline">Learning Management System (LMS)</a></li>
                        <li><a href="https://if.uinsgd.ac.id/#" class="hover:underline">Teknik Informatika UIN Sunan Gunung Djati</a></li>
                        <li><a href="https://informatika.digital/" class="hover:underline">Informatika Digital</a></li>
                        <li><a href="https://join.if.uinsgd.ac.id/index.php/join" class="hover:underline">Jurnal Online Informatika</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="font-bold mb-4 text-lg md:text-xl">Akses Cepat</h3>
                    <ul class="space-y-2 text-sm md:text-base">
                        <li><a href="https://fst.uinsgd.ac.id/" class="hover:underline">Fakultas Sains Dan Teknologi</a></li>
                        <li><a href="https://uinsgd.ac.id/" class="hover:underline">UIN Sunan Gunung Djati</a></li>
                        <li><a href="https://sinta.kemdikbud.go.id/" class="hover:underline">SINTA Dikti Kemdikbud RI</a></li>
                        <li><a href="https://pddikti.kemdiktisaintek.go.id/" class="hover:underline">Pangkalan Data DIKTI Kemdikbud RI</a></li>
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
                duration: 1200, // Durasi animasi dalam milidetik
                easing: 'ease-in-out', // Efek easing animasi
                once: true, // Animasi hanya sekali (tidak akan berulang ketika scroll kembali)
                mirror: false // Animasi tidak akan muncul saat scrolling ke atas
            });
        </script>



    </body>


    </html>
