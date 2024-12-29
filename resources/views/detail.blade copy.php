<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <div class="bg-[#F5F6F8] min-h-screen flex flex-col relative">
        <!-- Header dengan gambar -->
        <header class="relative">
            <img src="{{ asset('images/Header.png') }}" alt="Header Image" class="w-full h-[70vh] object-cover">
        </header>
    
        <main class="flex-1">
    
            <div class="relative left-1/3 top-[110%] transform -translate-x-1/2 -translate-y-1/4 flex flex-row gap-8 w-full max-w-6xl max-h-fit mx-auto">
                <!-- Section yang menutupi setengah bagian bawah gambar dan berada di tengah -->
                <section class="relative left-0 right-0 bg-white p-8 max-w-4xl mx-auto shadow-lg flex-1">
                    <!-- Konten di dalam section -->
                        <!-- kiri -->
                        <div>
                            <!-- Book Detail Section -->
                            <div class="flex flex-col md:flex-row items-start mb-6">
                                <!-- Book Cover -->
                                <div class="flex flex-col gap-y-5">
                                    <div class="w-full flex justify-center">
                                        <img src="https://via.placeholder.com/220x330" alt="Book Cover"
                                            class="rounded-lg shadow-lg">
                                    </div>
                                    <div class="w-full flex justify-center">
                                        <img src="https://via.placeholder.com/220x330" alt="Book Cover"
                                            class="rounded-lg shadow-lg">
                                    </div>
                                    <div class="w-full flex justify-center">
                                        <img src="https://via.placeholder.com/220x330" alt="Book Cover"
                                            class="rounded-lg shadow-lg">
                                    </div>
                                    <div class="w-full flex justify-center">
                                        <img src="https://via.placeholder.com/220x330" alt="Book Cover"
                                            class="rounded-lg shadow-lg">
                                    </div>
                                </div>
        
                                <!-- Book Information -->
                                <div class="w-full md:w-2/3 mt-6 md:mt-0 md:ml-8">
                                    <h1 class="text-3xl font-bold text-gray-800 mb-2">Garis Waktu</h1>
                                    <p class="text-gray-500 mb-4">
                                        By <span class="font-medium text-gray-700">Fiersa Besari</span> <br>2016
                                    </p>
        
                                    <!-- Synopsis -->
                                    <h2 class="text-lg font-semibold mb-2">Sinopsis</h2>
                                    <p class="text-gray-700 leading-relaxed text-justify">
                                        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ut quos libero esse molestiae
                                        autem, modi deserunt sapiente ipsam perferendis pariatur ab inventore est iure soluta
                                        illum alias porro consectetur provident rerum assumenda laudantium quasi nihil vero!
                                        Totam, eos molestiae. Quae, at? Autem praesentium at, aperiam error maxime repellat
                                        aspernatur vel optio incidunt a, magni illum laudantium explicabo commodi. Aspernatur
                                        vero deserunt labore corporis ipsam quaerat maiores nemo nostrum repellendus nisi
                                        laborum recusandae accusamus impedit, beatae quasi? Libero vitae qui aspernatur voluptas
                                        nihil deserunt, cumque sunt esse doloribus placeat possimus obcaecati dolorum magni,
                                        adipisci mollitia tempora. Accusantium incidunt aperiam maiores! Repellat.
                                    </p>
                                </div>
                            </div>
                        </div>
                    
                </section>
        
                <section class="relative left-0 right-0 p-8 max-w-md mx-auto shadow-lg flex-1 bg-transparent max-h-2">
                    <h1 class="text-white font-bold text-2xl">
                        Cerita serupa
                    </h1>
                    <!-- Konten di dalam section -->
                    <div class="p-4 grid grid-cols-1 gap-6">
                        <!-- Grid untuk setiap buku -->
                        <div class="grid grid-cols-1 divide-y divide-gray-300 gap-y-7">
                            <!-- Item Buku 1 -->
                            <div class="flex flex-row items-start gap-4 py-4 px-4 bg-white">
                                <img src="https://via.placeholder.com/150x220" alt="Book Cover" class="rounded-lg shadow-lg">
                                <div>
                                    <h2 class="text-xl font-bold text-gray-800 mb-1">Judul Buku 1</h2>
                                    <p class="text-sm text-gray-600 mb-2">By <span class="font-medium text-gray-700">Penulis
                                            1</span></p>
                                    <p class="text-gray-500 leading-relaxed text-justify">
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus accumsan elementum
                                        vehicula orci magna.
                                    </p>
                                </div>
                            </div>
        
                            <!-- Item Buku 2 -->
                            <div class="flex flex-row items-start gap-4 py-4 px-4 bg-white">
                                <img src="https://via.placeholder.com/150x220" alt="Book Cover" class="rounded-lg shadow-lg">
                                <div>
                                    <h2 class="text-xl font-bold text-gray-800 mb-1">Judul Buku 2</h2>
                                    <p class="text-sm text-gray-600 mb-2">By <span class="font-medium text-gray-700">Penulis
                                            2</span></p>
                                    <p class="text-gray-500 leading-relaxed text-justify">
                                        Varius nisl sed sit aliquet nullam pretium. Velit vel aliquam amet augue.
                                    </p>
                                </div>
                            </div>
                            <!-- Item Buku 2 -->
                            <div class="flex flex-row items-start gap-4 py-4 px-4 bg-white">
                                <img src="https://via.placeholder.com/150x220" alt="Book Cover" class="rounded-lg shadow-lg">
                                <div>
                                    <h2 class="text-xl font-bold text-gray-800 mb-1">Judul Buku 2</h2>
                                    <p class="text-sm text-gray-600 mb-2">By <span class="font-medium text-gray-700">Penulis
                                            2</span></p>
                                    <p class="text-gray-500 leading-relaxed text-justify">
                                        Varius nisl sed sit aliquet nullam pretium. Velit vel aliquam amet augue.
                                    </p>
                                </div>
                            </div>
                            <!-- Item Buku 2 -->
                            <div class="flex flex-row items-start gap-4 py-4 px-4 bg-white">
                                <img src="https://via.placeholder.com/150x220" alt="Book Cover" class="rounded-lg shadow-lg">
                                <div>
                                    <h2 class="text-xl font-bold text-gray-800 mb-1">Judul Buku 2</h2>
                                    <p class="text-sm text-gray-600 mb-2">By <span class="font-medium text-gray-700">Penulis
                                            2</span></p>
                                    <p class="text-gray-500 leading-relaxed text-justify">
                                        Varius nisl sed sit aliquet nullam pretium. Velit vel aliquam amet augue.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </main>
    </div>
    
 

    <footer class="bg-[#FF971D] text-white py-4 w-full max-w-none">
        <div class="flex items-center justify-center">
            <p class="text-lg font-semibold">By Rivaldd</p>
        </div>
    </footer>
 
</body>


</html>
