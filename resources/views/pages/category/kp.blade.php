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
    <header class="relative shadow">
        <div class="container mx-auto px-20 py-6 sm:py-10 flex items-center justify-between w-full">
            <!-- Logo -->
            <a href="#" class="flex flex-row items-center">
                <img src="{{ asset('images/tech.png') }}" alt="Prestasi Icon" class="w-10 h-10 sm:w-12 sm:h-12 mr-2">
                <h1 class="col-span-1 sm:col-span-2 text-lg sm:text-2xl font-bold text-gray-800">Archive Documents</h1>
            </a>

            <!-- Navigation -->
            <div class="hidden md:flex items-center justify-center gap-4 mx-auto">
                <nav class="space-x-8 text-gray-600">
                    <a href="{{ route('index') }}"
                        class="text-black transform hover:scale-105 transition-transform duration-300 
                              {{ request()->routeIs('index') ? 'text-yellow-400' : '' }}">Home</a>

                    <a href="{{ route('kp') }}"
                        class="text-black transform hover:scale-105 transition-transform duration-300 
                              {{ request()->routeIs('kp') ? 'text-yellow-400' : '' }}">Kerja
                        Praktek</a>

                    <a href="{{ route('proposal') }}"
                        class="text-black transform hover:scale-105 transition-transform duration-300 
                              {{ request()->routeIs('proposal') ? 'text-yellow-400' : '' }}">Proposal</a>

                    <a href="{{ route('skripsi') }}"
                        class="text-black transform hover:scale-105 transition-transform duration-300 
                              {{ request()->routeIs('skripsi') ? 'text-yellow-400' : '' }}">Tugas
                        Akhir</a>

                    {{-- <a href="#ta"
                        class="text-black transform hover:scale-105 transition-transform duration-300 
                              {{ request()->routeIs('ta') ? 'text-yellow-400' : '' }}">About
                        Us</a> --}}
                </nav>

            </div>

            
            <!-- Search Bar & Login Button -->
            <div class="hidden md:flex items-center gap-4">
                <!-- Search Bar -->

                <form action="{{ route('kp') }}" method="GET" class="relative">
                    <input type="text" name="search" value="{{ old('search', $search) }}"
                        class="px-4 py-2 border border-gray-300 rounded-full text-sm focus:outline-none focus:ring-2 focus:ring-yellow-400"
                        placeholder="Search..." />
                    <button type="submit" class="absolute right-2 top-1/2 transform -translate-y-1/2 text-gray-600">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                            class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M11 17a6 6 0 100-12 6 6 0 000 12zm0 0l3.5 3.5" />
                        </svg>
                    </button>
                </form>

                

                <!-- Login/Sign In or Dashboard Button -->
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

    <!-- Navbar End -->

    <!-- Main Section -->
    <section class="py-12">
        <div class="container mx-auto text-center">
            <h1 class="text-3xl sm:text-5xl font-extrabold text-gray-800 tracking-wide leading-tight">
                Kerja Praktek
            </h1>
    
            <div class="mt-6 flex justify-center">
                <div class="relative w-56 h-1 bg-black rounded-full overflow-hidden">
                    <div class="absolute top-0 left-0 h-full w-full animate-moving-gradient bg-gradient-to-r from-transparent via-white to-transparent"></div>
                    <div class="absolute animate-dot-move left-0 top-1/2 transform -translate-y-1/2 w-3 h-3 bg-white rounded-full shadow-md"></div>
                </div>
            </div>
        </div>
    </section>
    
    <style>
    @keyframes moving-gradient {
        0% { transform: translateX(-100%); }
        100% { transform: translateX(100%); }
    }
    
    @keyframes dot-move {
        0% { left: 0%; }
        50% { left: 50%; }
        100% { left: 100%; }
    }
    
    .animate-moving-gradient {
        animation: moving-gradient 2s infinite linear;
    }
    
    .animate-dot-move {
        animation: dot-move 2s infinite alternate ease-in-out;
    }
    </style>
    
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
    <section class="container mx-auto max-w-7xl mb-20 py-10" data-aos="fade-up">
        <div class="grid grid-cols-1 sm:grid-cols lg:grid-cols-3 gap-6 sm:px-10">
            @forelse ($kp as $document)
                <!-- Book Card -->
                <a href="{{ route('detail', $document->id) }}"
                    class="bg-yellow-50 shadow-lg rounded-lg overflow-hidden transform hover:scale-105 transition-transform hover:border-2 hover:border-[#facc15]">
                    <img src="{{ $document->cover ? asset('storage/' . $document->cover) : 'https://via.placeholder.com/150x220' }}"
                        alt="Book Cover" class="w-full h-85 object-cover" />
                    <div class="p-4">
                        <h2 class="font-semibold text-lg text-gray-800 mb-2 truncate">{{ $document->title }}</h2>
                        <p class="text-gray-500 text-sm mb-1">{{ $document->category=== 'kp' ?'Kerja Praktek' : ucfirst($document->category) }}</p>
                        <p class="text-gray-500 text-sm mb-1 truncate">NIM: {{ $document->user->email ?? 'No Email' }}
                        </p>
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

</html>
