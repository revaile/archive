<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WeServe</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://api.fontshare.com/v2/css?f[]=clash-display@600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
</head>

<body class="bg-[#F1F4F5]">
    <header class="relative bg-cover bg-bottom min-h-screen"
        style="background-image: url('{{ asset('images/bk.jpg') }}')">
        <!-- Overlay untuk membuat konten tetap terbaca -->
        <div class="absolute inset-0 bg-black/50"></div>

        <nav class="relative z-50 flex flex-row max-w-6xl mx-auto justify-between items-center py-6">
            <img src="{{ asset('images/logo-light.svg') }}" alt="">
            <ul class="flex flex-row gap-x-7">
                <li><a href="" class="text-base text-white hover:text-violet-300 hover:font-semibold">Home</a>
                </li>
                <li><a href="" class="text-base text-white hover:text-violet-300 hover:font-semibold">Skripsi</a>
                </li>
                <li><a href=""
                        class="text-base text-white hover:text-violet-300 hover:font-semibold">Proposal</a></li>
                <li><a href="" class="text-base text-white hover:text-violet-300 hover:font-semibold">Kerja
                        Praktek</a></li>
            </ul>

            <div class="flex flex-row items-center gap-2">
                <a href="#">
                    <svg width="25" height="24" viewBox="0 0 25 24" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <!-- Ikon svg -->
                    </svg>
                </a>
                @if (Auth::check())
                    @if (Auth::user()->roles == 'admin')
                        <a href="{{ url('/dashboard') }}"
                            class="bg-white text-indigo-950 px-8 py-3 rounded-full font-semibold hover:bg-gray-500 focus:outline-none focus:ring-2 hover:scale-105 transition-transform duration-300">
                            Dashboard
                        </a>
                    @else
                        <a href="{{ route('user.mydocuments.index') }}"
                            class="bg-white text-indigo-950 px-8 py-3 rounded-full font-semibold hover:bg-gray-500 focus:outline-none focus:ring-2 hover:scale-105 transition-transform duration-300">
                            My Documents
                        </a>
                    @endif
                @else
                    <a href="{{ route('login') }}"
                        class="bg-white text-indigo-950 px-8 py-3 rounded-full font-semibold hover:bg-gray-500 focus:outline-none focus:ring-2 hover:scale-105 transition-transform duration-300">
                        Sign In
                    </a>
                @endif




            </div>
        </nav>

        <section class="relative z-10 flex items-center justify-center text-center min-h-screen mt-[-90px]">
            <div class="flex flex-row items-center justify-between">
                <!-- Konten Kiri -->
                <div class="flex flex-col gap-y-10 p-6 rounded-md text-center items-center justify-center ">
                    <h1 class="text-white text-[70px] leading-none" style="font-family: 'Clash Display', sans-serif;">
                        Selamat Datang <br> Wargi Informatika
                    </h1>
                    <p class="text-base font-medium text-white leading-loose">
                        We provide a variety of servers to grow your users <br>
                        acquisition much user-friendly and boosting up sales.
                    </p>
                    {{-- <div class="flex flex-row gap-x-4 items-center">
                        <a href="#" class="bg-violet-700 hover:bg-indigo-950 rounded-full text-white px-10 py-4">
                            Try Free Trial
                        </a>
                        <a href="#" class="flex gap-x-2 text-white">
                            <svg width="25" height="24" viewBox="0 0 25 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <!-- Ikon svg -->
                            </svg>
                            Schedule a Demo
                        </a>    
                    </div> --}}
                </div>
            </div>
        </section>
    </header>

    <section class="py-12">
        <div class="max-w-6xl mx-auto grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6 text-center">
            @foreach ($categories as $category => $data)
                <div
                    class="bg-white shadow-md rounded-lg p-6 transform hover:scale-105 transition-transform duration-300">
                    <h2 class="text-5xl font-extrabold text-violet-700">{{ $data->count }}+</h2>
                    <p class="mt-3 text-gray-700 font-medium">{{ ucfirst($category) }}</p>
                </div>
            @endforeach
        </div>
    </section>



    <section class="features max-w-6xl mx-auto py-12  ">
        <h3 class="text-indigo-950 text-5xl text-center mb-12" style="font-family: 'Clash Display', sans-serif;">All
            Documents</h3>
        <div class="grid grid-cols-3 gap-x-8">
            <div class="my-cards bg-white rounded-2xl flex flex-col gap-y-8 py-8 px-5 ">
                <svg width="47" height="46" viewBox="0 0 47 46" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path d="M32.0292 27.6V16.2917C32.0292 15.2375 31.1667 14.375 30.1125 14.375H24.5541"
                        stroke="#640EF1" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" />
                    <path d="M27.4292 11.5L23.9792 14.375L27.4292 17.25" stroke="#640EF1" stroke-width="3"
                        stroke-linecap="round" stroke-linejoin="round" />
                    <path d="M14.9708 19.55V27.6" stroke="#640EF1" stroke-width="3" stroke-linecap="round"
                        stroke-linejoin="round" />
                    <path
                        d="M15.2584 18.975C17.3225 18.975 18.9959 17.3017 18.9959 15.2375C18.9959 13.1734 17.3225 11.5 15.2584 11.5C13.1942 11.5 11.5208 13.1734 11.5208 15.2375C11.5208 17.3017 13.1942 18.975 15.2584 18.975Z"
                        stroke="#640EF1" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" />
                    <path
                        d="M14.9708 34.5C16.8762 34.5 18.4208 32.9554 18.4208 31.05C18.4208 29.1446 16.8762 27.6 14.9708 27.6C13.0654 27.6 11.5208 29.1446 11.5208 31.05C11.5208 32.9554 13.0654 34.5 14.9708 34.5Z"
                        stroke="#640EF1" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" />
                    <path
                        d="M32.0292 34.5C33.9346 34.5 35.4792 32.9554 35.4792 31.05C35.4792 29.1446 33.9346 27.6 32.0292 27.6C30.1238 27.6 28.5792 29.1446 28.5792 31.05C28.5792 32.9554 30.1238 34.5 32.0292 34.5Z"
                        stroke="#640EF1" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" />
                    <path
                        d="M17.75 42.1666H29.25C38.8333 42.1666 42.6667 38.3333 42.6667 28.75V17.25C42.6667 7.66665 38.8333 3.83331 29.25 3.83331H17.75C8.16668 3.83331 4.33334 7.66665 4.33334 17.25V28.75C4.33334 38.3333 8.16668 42.1666 17.75 42.1666Z"
                        stroke="#640EF1" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" />
                </svg>

                <div class="flex flex-col gap-y-1">
                    <h3 class="font-bold text-2xl text-indigo-950">
                        Skripsi
                    </h3>
                    <p class="text-base text-gray-500 leading-relaxed">
                        Making your project mor e secure avoiding DDoS
                    </p>
                </div>
                <a href="" class="font-semibold text-violet-700 text-base">
                    Learn More
                </a>
            </div>
            <div class="my-cards bg-white rounded-2xl flex flex-col gap-y-8 py-8 px-5">
                <svg width="47" height="46" viewBox="0 0 47 46" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M25.2633 4.33167L37.7408 11.0592C39.1975 11.845 39.1975 14.0875 37.7408 14.8733L25.2633 21.6008C24.1517 22.195 22.8483 22.195 21.7367 21.6008L9.25917 14.8733C7.80251 14.0875 7.80251 11.845 9.25917 11.0592L21.7367 4.33167C22.8483 3.73751 24.1517 3.73751 25.2633 4.33167Z"
                        stroke="#640EF1" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" />
                    <path
                        d="M7.41916 19.4158L19.015 25.2233C20.4525 25.9516 21.3725 27.4275 21.3725 29.0375V40.0008C21.3725 41.5917 19.705 42.6075 18.2867 41.8983L6.69083 36.0908C5.25333 35.3625 4.33333 33.8867 4.33333 32.2767V21.3133C4.33333 19.7225 6.00083 18.7066 7.41916 19.4158Z"
                        stroke="#640EF1" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" />
                    <path
                        d="M39.5808 19.4158L27.985 25.2233C26.5475 25.9516 25.6275 27.4275 25.6275 29.0375V40.0008C25.6275 41.5917 27.295 42.6075 28.7133 41.8983L40.3092 36.0908C41.7467 35.3625 42.6667 33.8867 42.6667 32.2767V21.3133C42.6667 19.7225 40.9992 18.7066 39.5808 19.4158Z"
                        stroke="#640EF1" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" />
                </svg>


                <div class="flex flex-col gap-y-1">
                    <h3 class="font-bold text-2xl text-indigo-950">
                        Proposal </h3>
                    <p class="text-base text-gray-500 leading-relaxed">
                        Only install what your business needs to grow </p>
                </div>
                <a href="" class="font-semibold text-violet-700 text-base">
                    Learn More
                </a>
            </div>
            <!--
            akan diposisikan relatif terhadap batas parent
            -->
            <div class="relative my-cards bg-[#080C2E] rounded-2xl flex flex-col">
                <div class="absolute top-5 right-5">
                    <svg width="178" height="221" viewBox="0 0 178 221" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <g filter="url(#filter0_f_1_371)">
                            <ellipse cx="97.65" cy="102.527" rx="32.0478" ry="76.7916"
                                transform="rotate(30 97.65 102.527)" fill="#424560" />
                        </g>
                        <defs>
                            <filter id="filter0_f_1_371" x="0.27005" y="-15.8951" width="194.76" height="236.845"
                                filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                                <feFlood flood-opacity="0" result="BackgroundImageFix" />
                                <feBlend mode="normal" in="SourceGraphic" in2="BackgroundImageFix"
                                    result="shape" />
                                <feGaussianBlur stdDeviation="25" result="effect1_foregroundBlur_1_371" />
                            </filter>
                        </defs>
                    </svg>
                </div>
                <!-- z index itu saling timpa kaya stack -->
                <div class="z-10 flex flex-col gap-y-8 py-8 px-5">
                    <svg width="47" height="46" viewBox="0 0 47 46" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path d="M13.6867 34.7875V30.82" stroke="white" stroke-width="3" stroke-linecap="round" />
                        <path d="M23.5 34.7875V26.8525" stroke="white" stroke-width="3" stroke-linecap="round" />
                        <path d="M33.3133 34.7875V22.8658" stroke="white" stroke-width="3" stroke-linecap="round" />
                        <path d="M33.3133 11.2125L32.4317 12.2475C27.5442 17.9592 20.9892 22.0034 13.6867 23.8242"
                            stroke="white" stroke-width="3" stroke-linecap="round" />
                        <path d="M27.6975 11.2125H33.3133V16.8092" stroke="white" stroke-width="3"
                            stroke-linecap="round" stroke-linejoin="round" />
                        <path
                            d="M17.75 42.1666H29.25C38.8333 42.1666 42.6667 38.3333 42.6667 28.75V17.25C42.6667 7.66665 38.8333 3.83331 29.25 3.83331H17.75C8.16667 3.83331 4.33334 7.66665 4.33334 17.25V28.75C4.33334 38.3333 8.16667 42.1666 17.75 42.1666Z"
                            stroke="white" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                    <div class="flex flex-col gap-y-1">
                        <h3 class="font-bold text-2xl text-white">
                            Kuliah Praktek
                        </h3>
                        <p class="text-base text-gray-500 leading-relaxed">
                            Decide the business flow based on latest reports </p>
                    </div>
                    <a href="" class="font-semibold text-white text-base">
                        Learn More
                    </a>
                </div>

            </div>

        </div>

    </section>



    {{-- <section class="showcase mx-auto py-12  ">
        <div class="flex flex-col leading-tight gap-y-8">
            <div class="flex flex-col gap-y-2 text-center">
                <h3 class="text-indigo-950 text-5xl" style="font-family: 'Clash Display', sans-serif;">Our Show Case</h3>
                <p class="text-base font-medium text-gray-500 leading-loose">
                    We provide a variety of servers to grow your users <br>
                    acquisition much user-friendly and boosting up sales.
                </p>
            </div>
        
        
        <div class="flex flex-wrap gap-x-10 justify-center">
            <!-- group itu div efek hover -->
            <div class= " group relative">
                <!-- jusify harus pakai flex -->
                <div class="group-hover:opacity-100 opacity-0 absolute justify-center w-full flex bottom-8 transition-all ease-out duration-500 ">
                     <a href="" class="bg-violet-700 rounded-full px-7 py-3 shadow-2xl shadow-violet-700 text-white font-semibold hover:bg-[#080C2E]">View Detail</a>
                </div>
                <img src="assets/showcase1.png" alt="" class="group-hover:border-4 border-violet-700 transition-all ease-out duration-500 rounded-2xl w-[320px] h-[220px]">
            </div>
            <div class="group relative">
                <div class="group-hover:opacity-100 opacity-0 absolute justify-center w-full flex bottom-8  transition-all ease-out duration-500 ">
                    <a href="" class="bg-violet-700 rounded-full px-7 py-3 shadow-2xl shadow-violet-700 text-white font-semibold hover:bg-[#080C2E]">View Detail</a>
               </div>
                <img src="assets/showcase2.png" alt="" class="group-hover:border-4 border-violet-700  rounded-2xl w-[320px] h-[220px]  transition-all ease-out duration-500">
            </div>
            <div class="group relative">
                <div class="group-hover:opacity-100 opacity-0 absolute justify-center w-full flex bottom-8 transition-all ease-out duration-500">
                    <a href="" class="bg-violet-700 rounded-full px-7 py-3 shadow-2xl shadow-violet-700 text-white font-semibold hover:bg-[#080C2E]">View Detail</a>
               </div>
                <img src="assets/showcase3.png" alt="" class="group-hover:border-4 border-violet-700  rounded-2xl w-[320px] h-[220px]  transition-all ease-out duration-500">
            </div>
            <div class="group relative">
                <div class="group-hover:opacity-100 opacity-0 absolute justify-center w-full flex bottom-8 transition-all ease-out duration-500 ">
                    <a href="" class="bg-violet-700 rounded-full px-7 py-3 shadow-2xl shadow-violet-700 text-white font-semibold hover:bg-[#080C2E]">View Detail</a>
               </div>
                <img src="assets/showcase4.png" alt="" class="group-hover:border-4 border-violet-700  rounded-2xl w-[320px] h-[220px]  transition-all ease-out duration-500">
            </div>
       

        </div>
    </div>

    </section> --}}


</body>

</html>
