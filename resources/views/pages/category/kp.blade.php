<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <style>
        html,
        body {
            height: 100%;
            margin: 0;
            display: flex;
            flex-direction: column;
        }

        body>*:not(footer) {
            flex: 1;
        }

        footer {
            flex-shrink: 0;
        }
    </style>
    <title>Kerja praktek</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link
        href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800&family=Rubik:wght@400;500;600;700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css">

</head>

<body class="bg-gray-100 font-sans">
    <!-- Navbar Start -->
    <!-- Navbar Start -->
    <header class="bg-white shadow">
        <div class="container px-6 sm:px-10 lg:px-20 py-4 flex justify-between items-center sm:ml-10">
            <a href="#" class="flex items-center mb-4 sm:mr-16">
                <!-- Added mb-4 for margin-bottom on small screens -->
                <img src="{{ asset('images/tech.png') }}" alt="Prestasi Icon" class="w-10 h-10 sm:w-12 sm:h-12 mr-2">
                <h1 class="hidden sm:block text-lg sm:text-xl font-bold text-gray-800">Archive Documents</h1>
            </a>

            <!-- Navigation Menu -->
            <nav id="menu"
                class="hidden md:flex md:space-x-6 absolute md:static bg-white w-full md:w-auto left-0 top-16 md:top-auto md:left-auto shadow md:shadow-none z-10 mt-4 sm:mt-0">
                <!-- Added mt-4 for margin-top on small screens -->
                <a href="{{ route('index') }}"
                    class="block md:inline-block text-black px-4 py-2 md:p-0 transform hover:scale-105 transition-transform duration-300 text-xs sm:text-sm">Home</a>
                <a href="{{ route('kp') }}"
                    class="block md:inline-block text-black px-4 py-2 md:p-0 transform hover:scale-105 transition-transform duration-300 text-xs sm:text-sm">Kerja
                    Praktek</a>
                <a href="{{ route('proposal') }}"
                    class="block md:inline-block text-black px-4 py-2 md:p-0 transform hover:scale-105 transition-transform duration-300 text-xs sm:text-sm">Proposal</a>
                <a href="{{ route('skripsi') }}"
                    class="block md:inline-block text-black px-4 py-2 md:p-0 transform hover:scale-105 transition-transform duration-300 text-xs sm:text-sm">Tugas
                    Akhir</a>
                <a href="#ta"
                    class="block md:inline-block text-black px-4 py-2 md:p-0 transform hover:scale-105 transition-transform duration-300 text-xs sm:text-sm">About
                    Us</a>
            </nav>

            <!-- Search and Login -->
            <div class="hidden md:flex items-center space-x-4 ml-4">
                <form method="GET" action="{{ route('kp') }}" class="relative">
                    <input type="text" name="search" value="{{ request('search') }}" placeholder="Search"
                        class="pl-10 pr-4 py-2 bg-gray-200 text-sm rounded-full focus:outline-none">
                    <span class="absolute top-1/2 left-3 transform -translate-y-1/2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 16l2-2m4-4l2-2M3 21v-4a4 4 0 014-4h3" />
                        </svg>
                    </span>
                    <input type="hidden" name="year" value="{{ request('year') }}">
                </form>
                <!-- Login Button -->
                <div class="hidden md:flex">
                    @if (Auth::check())
                        @if (Auth::user()->roles == 'admin')
                            <a href="{{ url('/dashboard') }}"
                                class="bg-yellow-400 text-white px-6 py-2 sm:px-4 sm:py-3 rounded-full font-semibold hover:bg-gray-500 focus:outline-none focus:ring-2 hover:scale-105 transition-transform duration-300">Dashboard</a>
                        @else
                            <a href="{{ route('user.mydocuments.index') }}"
                                class="bg-yellow-400 text-white px-6 py-2 sm:px-4 sm:py-3 rounded-full font-semibold hover:bg-gray-500 focus:outline-none focus:ring-2 hover:scale-105 transition-transform duration-300">My
                                Documents</a>
                        @endif
                    @else
                        <a href="{{ route('login') }}"
                            class="bg-yellow-400 text-white px-6 py-2 sm:px-4 sm:py-3 rounded-full font-semibold hover:bg-gray-500 focus:outline-none focus:ring-2 hover:scale-105 transition-transform duration-300">Sign
                            In</a>
                    @endif
                </div>
            </div>
        </div>
    </header>
    <!-- Navbar End -->

    <!-- Main Section -->
    <section class="py-12">
        <div class="container mx-auto px-6 sm:px-10 lg:px-20 text-center">
            <h1 class="text-2xl sm:text-4xl font-bold text-gray-800" >Kerja Praktek</h1>

            <!-- Filter Section Start -->
            <div class="mt-6">
                <form method="GET" action="{{ route('kp') }}">
                    <label for="yearFilter" class="text-gray-700 font-medium text-lg">Filter by Year:</label>
                    <select name="year" id="yearFilter" onchange="this.form.submit()"
                        class="mt-2 px-4 py-2 border border-gray-300 rounded-lg text-gray-700">
                        <option value="">All Years</option>
                        @foreach ($years as $filterYear)
                            <option value="{{ $filterYear }}"
                                {{ request('year') == $filterYear ? 'selected' : '' }}>
                                {{ $filterYear }}
                            </option>
                        @endforeach
                    </select>
                </form>
            </div>
            <!-- Filter Section End -->

            <div class="mt-6">
                <hr class="border-t-2 border-gray-300 mb-8">
            </div>
        </div>
    </section>

    <!-- JavaScript for Toggle Menu -->
    <script>
        const menuToggle = document.getElementById('menu-toggle');
        const menu = document.getElementById('menu');

        menuToggle.addEventListener('click', () => {
            menu.classList.toggle('hidden');
        });
    </script>




    <!-- Hero Section End -->

    <!-- Content Section Start -->
    <section class="container mx-auto py-10 max-w-7xl" data-aos="fade-up">
        <div class="grid grid-cols-1 sm:grid-cols lg:grid-cols-3 gap-6 sm:px-10">
            @forelse ($kp as $document)
                <!-- Book Card -->
                <a href="{{ route('detail', $document->id) }}"
                    class="bg-yellow-50 shadow-lg rounded-lg overflow-hidden transform hover:scale-105 transition-transform hover:border-2 hover:border-[#facc15]">
                    <img src="{{ $document->cover ? asset('storage/' . $document->cover) : 'https://via.placeholder.com/150x220' }}"
                        alt="Book Cover" class="w-full h-85 object-cover" />
                    <div class="p-4">
                        <h2 class="font-semibold text-lg text-gray-800 mb-2 truncate">{{ $document->title }}</h2>
                        <p class="text-gray-500 text-sm mb-1 truncate">NIM: {{ $document->user->email ?? 'No Email' }}</p>
                        <p class="text-gray-500 text-sm mb-1">Year: {{ $document->year }}</p>
                        <p class="text-gray-400 text-sm truncate">{{ $document->description }}</p>
                    </div>
                </a>
            @empty
                <p class="text-gray-600">No documents found for your search query.</p>
            @endforelse
        </div>
    </section>

    <!-- Content Section End -->

    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
    <script>

        AOS.init({
            duration: 1200, // Durasi animasi dalam milidetik
            easing: 'ease-in-out', // Efek easing animasi
            once: true, // Animasi hanya sekali (tidak akan berulang ketika scroll kembali)
            mirror: false // Animasi tidak akan muncul saat scrolling ke atas
        });
    </script>


</body>
<!-- Footer Start -->
<footer class="bg-yellow-400 text-black py-8 px-6 lg:px-20" data-aos="fade-up">
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
