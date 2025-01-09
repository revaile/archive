<!-- resources/views/pages/user/mydocuments/create.blade.php -->
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Upload ' . ucfirst($category)) }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow overflow-hidden sm:rounded-lg p-6">
                <form method="POST" action="{{ route('user.mydocuments.store') }}" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="category" value="{{ $category }}">
                    {{-- <div class="mb-4">
                        <label for="nim" class="block text-sm font-medium text-gray-700">Nim</label>
                        <input type="text" name="nim" id="nim"
                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                    </div> --}}
                    <div class="mb-4">
                        <label for="email" class="block text-sm font-medium text-gray-700">Nim</label>
                        <input type="text" name="email" id="email" value="{{ $email }}" readonly
                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                            required>
                    </div>
                    

                    <div class="mb-4">
                        <label for="title" class="block text-sm font-medium text-gray-700">Judul
                            {{ ucfirst($category) }}</label>
                        <input type="text" name="title" id="title"
                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                            required>
                    </div>

                    @if ($category == 'skripsi')
                        <div class="mb-4">
                            <label for="abstract" class="block text-sm font-medium text-gray-700">Abstrak</label>
                            <textarea name="abstract" id="abstract" rows="4"
                                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                required></textarea>
                        </div>
                    @endif

                    <div class="mb-4">
                        <label for="year" class="block text-sm font-medium text-gray-700">Tahun</label>
                        <input type="text" name="year" id="year"
                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                            required>
                    </div>

                    <div class="mb-4">
                        <label for="description" class="block text-sm font-medium text-gray-700">Deskripsi</label>
                        <textarea name="description" id="description" rows="4"
                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                            required></textarea>
                    </div>

                    <div class="mb-4">
                        <label for="cover" class="block text-sm font-medium text-gray-700 mb-2">Upload Cover</label>
                        <div class="relative border-2 border-dashed border-gray-300 rounded-lg p-4 text-center hover:border-indigo-500 transition duration-200">
                            <input type="file" name="cover" id="cover" accept="application/png" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer" required>
                            <div class="flex items-center justify-center">
                                <svg class="w-8 h-8 text-gray-400 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                                </svg>
                                <span class="text-gray-600" id="cover-preview">Pilih file Image untuk cover</span>
                            </div>
                        </div>
                    </div>
                    
                    <div class="mb-4">
                        <label for="file" class="block text-sm font-medium text-gray-700 mb-2">Upload BAB 1</label>
                        <div class="relative border-2 border-dashed border-gray-300 rounded-lg p-4 text-center hover:border-indigo-500 transition duration-200">
                            <input type="file" name="file" id="file" accept="application/pdf" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer" required>
                            <div class="flex items-center justify-center">
                                <svg class="w-8 h-8 text-gray-400 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                                </svg>
                                <span class="text-gray-600" id="file-preview">Pilih file PDF</span>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Tempat untuk elemen form tambahan -->
                    <div id="upload-container" class="space-y-4 mb-4"></div>
                    
                    <div class="flex justify-end mb-4">
                        <button type="button" id="add-upload" class="flex items-center bg-green-500 text-white py-2 px-4 rounded-lg shadow-md hover:bg-green-600 transition duration-200">
                            <svg class="w-5 h-5 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                            </svg>
                            Tambah File
                        </button>
                    </div>
                    
                    <div class="flex justify-end">
                        <a href="{{ route('user.mydocuments.index') }}" class="bg-gray-500 text-white py-2 px-4 rounded shadow-sm hover:bg-gray-700">
                            Batal
                        </a>
                        <button type="submit" class="ml-3 bg-blue-500 text-white py-2 px-4 rounded shadow-sm hover:bg-blue-700">
                            Simpan
                        </button>
                    </div>
                    
                    <script>
                        let currentBab = 1; // Melacak BAB yang sedang ditambahkan
                    
                        document.getElementById('add-upload').addEventListener('click', function () {
                            const container = document.getElementById('upload-container');
                    
                            // Periksa apakah sudah sampai BAB 4
                            if (currentBab >= 4) {
                                alert('Anda hanya dapat mengunggah sampai BAB 4.');
                                return;
                            }
                    
                            currentBab++; // Tingkatkan BAB ke berikutnya
                    
                            // Buat elemen div baru untuk upload PDF
                            const newUploadGroup = document.createElement('div');
                            newUploadGroup.classList.add('mb-4'); // Menambahkan margin bawah seperti pada BAB 1
                    
                            // Tambahkan elemen label dan div untuk input
                            newUploadGroup.innerHTML = `
                            <label for="file-bab-${currentBab}" class="block text-sm font-medium text-gray-700 mb-2">
                                Upload BAB ${currentBab}
                            </label>
                            <div class="relative border-2 border-dashed border-gray-300 rounded-lg p-4 text-center hover:border-indigo-500 transition duration-200">
                                <input type="file" id="file-bab-${currentBab}" name="bab${currentBab}" accept="application/pdf" 
                                    class="absolute inset-0 w-full h-full opacity-0 cursor-pointer" required>
                                <div class="flex items-center justify-center">
                                    <svg class="w-8 h-8 text-gray-400 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                                    </svg>
                                    <span class="text-gray-600" id="preview-bab-${currentBab}">Pilih file PDF</span>
                                </div>
                            </div>
                        `;
                    
                            // Tambahkan elemen ke dalam container
                            container.appendChild(newUploadGroup);
                    
                            // Tambahkan event listener untuk menampilkan nama file
                            const newInput = newUploadGroup.querySelector(`#file-bab-${currentBab}`);
                            const newPreview = newUploadGroup.querySelector(`#preview-bab-${currentBab}`);
                    
                            newInput.addEventListener('change', function (e) {
                                const fileName = e.target.files[0]?.name || 'Pilih file PDF';
                                newPreview.textContent = fileName;
                            });
                        });
                    
                        // Event listener untuk input file cover
                        document.getElementById('cover').addEventListener('change', function (e) {
                            const fileName = e.target.files[0]?.name || 'Pilih file Image untuk cover';
                            document.getElementById('cover-preview').textContent = fileName;
                        });
                    
                        // Event listener untuk input file BAB 1
                        document.getElementById('file').addEventListener('change', function (e) {
                            const fileName = e.target.files[0]?.name || 'Pilih file PDF';
                            document.getElementById('file-preview').textContent = fileName;
                        });
                    </script>


</x-app-layout>
