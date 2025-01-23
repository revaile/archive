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
                            <input 
                                type="file" 
                                name="cover" 
                                id="cover" 
                                accept="image/png, image/jpeg, image/jpg" 
                                class="absolute inset-0 w-full h-full opacity-0 cursor-pointer" 
                                required>
                            <div class="flex items-center justify-center">
                                <svg class="w-8 h-8 text-gray-400 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                                </svg>
                                <span class="text-gray-600" id="cover-preview">Pilih file gambar untuk cover (png, jpg, jpeg)</span>
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
                    
                    <div class="mb-4">
                        <label for="file-bab-2" class="block text-sm font-medium text-gray-700 mb-2">Upload BAB 2</label>
                        <div class="relative border-2 border-dashed border-gray-300 rounded-lg p-4 text-center hover:border-indigo-500 transition duration-200">
                            <input type="file" id="file-bab-2" name="bab2" accept="application/pdf" 
                                class="absolute inset-0 w-full h-full opacity-0 cursor-pointer" required>
                            <div class="flex items-center justify-center">
                                <svg class="w-8 h-8 text-gray-400 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                                </svg>
                                <span class="text-gray-600" id="preview-bab-2">Pilih file PDF</span>
                            </div>
                        </div>
                    </div>

                    <div class="mb-4">
                        <label for="file-bab-3" class="block text-sm font-medium text-gray-700 mb-2">Upload BAB 3</label>
                        <div class="relative border-2 border-dashed border-gray-300 rounded-lg p-4 text-center hover:border-indigo-500 transition duration-200">
                            <input type="file" id="file-bab-3" name="bab3" accept="application/pdf" 
                                class="absolute inset-0 w-full h-full opacity-0 cursor-pointer" required>
                            <div class="flex items-center justify-center">
                                <svg class="w-8 h-8 text-gray-400 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                                </svg>
                                <span class="text-gray-600" id="preview-bab-3">Pilih file PDF</span>
                            </div>
                        </div>
                    </div>
                    
                    <div class="mb-4">
                        <label for="file-bab-4" class="block text-sm font-medium text-gray-700 mb-2">Upload BAB 4</label>
                        <div class="relative border-2 border-dashed border-gray-300 rounded-lg p-4 text-center hover:border-indigo-500 transition duration-200">
                            <input type="file" id="file-bab-4" name="bab4" accept="application/pdf" 
                                class="absolute inset-0 w-full h-full opacity-0 cursor-pointer" required>
                            <div class="flex items-center justify-center">
                                <svg class="w-8 h-8 text-gray-400 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                                </svg>
                                <span class="text-gray-600" id="preview-bab-4">Pilih file PDF</span>
                            </div>
                        </div>
                    </div>

                    <div class="mb-4">
                        <label for="file-1" class="block text-sm font-medium text-gray-700 mb-2">Upload Daftar Pustaka</label>
                        <div class="relative border-2 border-dashed border-gray-300 rounded-lg p-4 text-center hover:border-indigo-500 transition duration-200">
                            <input type="file" id="file-0" name="persyaratan[]" accept="application/pdf" 
                                class="absolute inset-0 w-full h-full opacity-0 cursor-pointer" required>
                            <div class="flex items-center justify-center">
                                <svg class="w-8 h-8 text-gray-400 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                                </svg>
                                <span class="text-gray-600" id="preview-file-0">Pilih file PDF</span>
                            </div>
                        </div>
                    </div>

                    {{--  --}}
                    <div class="space-y-4">
                        <div class="mb-4">
                            <label for="file-1" class="block text-sm font-medium text-gray-700 mb-2">Upload C.01 Persetujuan Mengikuti KP</label>
                            <div class="relative border-2 border-dashed border-gray-300 rounded-lg p-4 text-center hover:border-indigo-500 transition duration-200">
                                <input type="file" id="file-1" name="persyaratan[]" accept="application/pdf" 
                                    class="absolute inset-0 w-full h-full opacity-0 cursor-pointer" required>
                                <div class="flex items-center justify-center">
                                    <svg class="w-8 h-8 text-gray-400 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                                    </svg>
                                    <span class="text-gray-600" id="preview-file-1">Pilih file PDF</span>
                                </div>
                            </div>
                        </div>
                    
                        <!-- Repeat for other files -->
                        <div class="mb-4">
                            <label for="file-3" class="block text-sm font-medium text-gray-700 mb-2">Upload C.03 Pembimbing Perusahaan</label>
                            <div class="relative border-2 border-dashed border-gray-300 rounded-lg p-4 text-center hover:border-indigo-500 transition duration-200">
                                <input type="file" id="file-19" name="persyaratan[]" accept="application/pdf" 
                                    class="absolute inset-0 w-full h-full opacity-0 cursor-pointer" required>
                                <div class="flex items-center justify-center">
                                    <svg class="w-8 h-8 text-gray-400 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                                    </svg>
                                    <span class="text-gray-600" id="preview-file-19">Pilih file PDF</span>
                                </div>
                            </div>
                        </div>
                    
                        <!-- Add more file inputs as needed -->
                        <div class="mb-4">
                            <label for="file-3" class="block text-sm font-medium text-gray-700 mb-2">Upload C.03 Pembimbing Praktik</label>
                            <div class="relative border-2 border-dashed border-gray-300 rounded-lg p-4 text-center hover:border-indigo-500 transition duration-200">
                                <input type="file" id="file-20" name="persyaratan[]" accept="application/pdf" 
                                    class="absolute inset-0 w-full h-full opacity-0 cursor-pointer" required>
                                <div class="flex items-center justify-center">
                                    <svg class="w-8 h-8 text-gray-400 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                                    </svg>
                                    <span class="text-gray-600" id="preview-file-20">Pilih file PDF</span>
                                </div>
                            </div>
                        </div>
                        <div class="mb-4">
                            <label for="file-3" class="block text-sm font-medium text-gray-700 mb-2">Upload C.04 Permohonan Seminar</label>
                            <div class="relative border-2 border-dashed border-gray-300 rounded-lg p-4 text-center hover:border-indigo-500 transition duration-200">
                                <input type="file" id="file-4" name="persyaratan[]" accept="application/pdf" 
                                    class="absolute inset-0 w-full h-full opacity-0 cursor-pointer" required>
                                <div class="flex items-center justify-center">
                                    <svg class="w-8 h-8 text-gray-400 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                                    </svg>
                                    <span class="text-gray-600" id="preview-file-4">Pilih file PDF</span>
                                </div>
                            </div>
                        </div>
                        <div class="mb-4">
                            <label for="file-3" class="block text-sm font-medium text-gray-700 mb-2">Upload C.05 Nilai Kinerja KP Perusahaan </label>
                            <div class="relative border-2 border-dashed border-gray-300 rounded-lg p-4 text-center hover:border-indigo-500 transition duration-200">
                                <input type="file" id="file-5" name="persyaratan[]" accept="application/pdf" 
                                    class="absolute inset-0 w-full h-full opacity-0 cursor-pointer" required>
                                <div class="flex items-center justify-center">
                                    <svg class="w-8 h-8 text-gray-400 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                                    </svg>
                                    <span class="text-gray-600" id="preview-file-5">Pilih file PDF</span>
                                </div>
                            </div>
                        </div>
                        <div class="mb-4">
                            <label for="file-3" class="block text-sm font-medium text-gray-700 mb-2">Upload C.06 Nilai Penulisan Laporan KP</label>
                            <div class="relative border-2 border-dashed border-gray-300 rounded-lg p-4 text-center hover:border-indigo-500 transition duration-200">
                                <input type="file" id="file-6" name="persyaratan[]" accept="application/pdf" 
                                    class="absolute inset-0 w-full h-full opacity-0 cursor-pointer" required>
                                <div class="flex items-center justify-center">
                                    <svg class="w-8 h-8 text-gray-400 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                                    </svg>
                                    <span class="text-gray-600" id="preview-file-6">Pilih file PDF</span>
                                </div>
                            </div>
                        </div>
                        <div class="mb-4">
                            <label for="file-3" class="block text-sm font-medium text-gray-700 mb-2">Upload C.07 Nilai Seminar KP</label>
                            <div class="relative border-2 border-dashed border-gray-300 rounded-lg p-4 text-center hover:border-indigo-500 transition duration-200">
                                <input type="file" id="file-7" name="persyaratan[]" accept="application/pdf" 
                                    class="absolute inset-0 w-full h-full opacity-0 cursor-pointer" required>
                                <div class="flex items-center justify-center">
                                    <svg class="w-8 h-8 text-gray-400 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                                    </svg>
                                    <span class="text-gray-600" id="preview-file-7">Pilih file PDF</span>
                                </div>
                            </div>
                        </div>
                        <div class="mb-4">
                            <label for="file-3" class="block text-sm font-medium text-gray-700 mb-2">Upload C.08 Rekaptulasi Nilai KP</label>
                            <div class="relative border-2 border-dashed border-gray-300 rounded-lg p-4 text-center hover:border-indigo-500 transition duration-200">
                                <input type="file" id="file-8" name="persyaratan_2[]" accept="application/pdf" 
                                    class="absolute inset-0 w-full h-full opacity-0 cursor-pointer" required>
                                <div class="flex items-center justify-center">
                                    <svg class="w-8 h-8 text-gray-400 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                                    </svg>
                                    <span class="text-gray-600" id="preview-file-8">Pilih file PDF</span>
                                </div>
                            </div>
                        </div>
                        <div class="mb-4">
                            <label for="file-3" class="block text-sm font-medium text-gray-700 mb-2">Upload lembar persetujuan seminar KP</label>
                            <div class="relative border-2 border-dashed border-gray-300 rounded-lg p-4 text-center hover:border-indigo-500 transition duration-200">
                                <input type="file" id="file-9" name="persyaratan_2[]" accept="application/pdf" 
                                    class="absolute inset-0 w-full h-full opacity-0 cursor-pointer" required>
                                <div class="flex items-center justify-center">
                                    <svg class="w-8 h-8 text-gray-400 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                                    </svg>
                                    <span class="text-gray-600" id="preview-file-9">Pilih file PDF</span>
                                </div>
                            </div>
                        </div>
                        <div class="mb-4">
                            <label for="file-3" class="block text-sm font-medium text-gray-700 mb-2">Upload lembar pengesahan seminar KP</label>
                            <div class="relative border-2 border-dashed border-gray-300 rounded-lg p-4 text-center hover:border-indigo-500 transition duration-200">
                                <input type="file" id="file-10" name="persyaratan_2[]" accept="application/pdf" 
                                    class="absolute inset-0 w-full h-full opacity-0 cursor-pointer" required>
                                <div class="flex items-center justify-center">
                                    <svg class="w-8 h-8 text-gray-400 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                                    </svg>
                                    <span class="text-gray-600" id="preview-file-10">Pilih file PDF</span>
                                </div>
                            </div>
                        </div>
                        <div class="mb-4">
                            <label for="file-3" class="block text-sm font-medium text-gray-700 mb-2">F.09 Form Lembar Catatan Seminar</label>
                            <div class="relative border-2 border-dashed border-gray-300 rounded-lg p-4 text-center hover:border-indigo-500 transition duration-200">
                                <input type="file" id="file-11" name="persyaratan_2[]" accept="application/pdf" 
                                    class="absolute inset-0 w-full h-full opacity-0 cursor-pointer" required>
                                <div class="flex items-center justify-center">
                                    <svg class="w-8 h-8 text-gray-400 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                                    </svg>
                                    <span class="text-gray-600" id="preview-file-11">Pilih file PDF</span>
                                </div>
                            </div>
                        </div>
                        <div class="mb-4">
                            <label for="file-3" class="block text-sm font-medium text-gray-700 mb-2">ppt presemtasi pdf</label>
                            <div class="relative border-2 border-dashed border-gray-300 rounded-lg p-4 text-center hover:border-indigo-500 transition duration-200">
                                <input type="file" id="file-12" name="persyaratan_2[]" accept="application/pdf" 
                                    class="absolute inset-0 w-full h-full opacity-0 cursor-pointer" required>
                                <div class="flex items-center justify-center">
                                    <svg class="w-8 h-8 text-gray-400 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                                    </svg>
                                    <span class="text-gray-600" id="preview-file-12">Pilih file PDF</span>
                                </div>
                            </div>
                        </div>
                        <div class="mb-4">
                            <label for="file-3" class="block text-sm font-medium text-gray-700 mb-2">surat izin KP fakultas</label>
                            <div class="relative border-2 border-dashed border-gray-300 rounded-lg p-4 text-center hover:border-indigo-500 transition duration-200">
                                <input type="file" id="file-13" name="persyaratan_2[]" accept="application/pdf" 
                                    class="absolute inset-0 w-full h-full opacity-0 cursor-pointer" required>
                                <div class="flex items-center justify-center">
                                    <svg class="w-8 h-8 text-gray-400 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                                    </svg>
                                    <span class="text-gray-600" id="preview-file-13">Pilih file PDF</span>
                                </div>
                            </div>
                        </div>
                        <div class="mb-4">
                            <label for="file-3" class="block text-sm font-medium text-gray-700 mb-2">surat konfirmasi yayasan</label>
                            <div class="relative border-2 border-dashed border-gray-300 rounded-lg p-4 text-center hover:border-indigo-500 transition duration-200">
                                <input type="file" id="file-14" name="persyaratan_2[]" accept="application/pdf" 
                                    class="absolute inset-0 w-full h-full opacity-0 cursor-pointer" required>
                                <div class="flex items-center justify-center">
                                    <svg class="w-8 h-8 text-gray-400 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                                    </svg>
                                    <span class="text-gray-600" id="preview-file-14">Pilih file PDF</span>
                                </div>
                            </div>
                        </div>

                
                        <div class="mb-4">
                            <label for="file-3" class="block text-sm font-medium text-gray-700 mb-2">Upload surat selesai kp</label>
                            <div class="relative border-2 border-dashed border-gray-300 rounded-lg p-4 text-center hover:border-indigo-500 transition duration-200">
                                <input type="file" id="file-16" name="persyaratan_2[]" accept="application/pdf" 
                                    class="absolute inset-0 w-full h-full opacity-0 cursor-pointer" required>
                                <div class="flex items-center justify-center">
                                    <svg class="w-8 h-8 text-gray-400 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                                    </svg>
                                    <span class="text-gray-600" id="preview-file-16">Pilih file PDF</span>
                                </div>
                            </div>
                        </div>
                   
                    </div>

                    
                    <div id="upload-container" class="space-y-4 mb-4"></div>                    
                    <div class="flex justify-end">
                        <a href="{{ route('user.mydocuments.index') }}" class="bg-gray-500 text-white py-2 px-4 rounded shadow-sm hover:bg-gray-700">
                            Batal
                        </a>
                        <button type="submit" class="ml-3 bg-blue-500 text-white py-2 px-4 rounded shadow-sm hover:bg-blue-700">
                            Simpan
                        </button>
                    </div>
                    
                    <script>
                        // Update preview for each file input
                        const updatePreview = (inputElement, previewElement) => {
                            const fileName = inputElement.files[0]?.name || "Pilih file PDF";
                            previewElement.textContent = fileName;
                            previewElement.style.color = fileName !== "Pilih file PDF" ? "#10B981" : "#6B7280"; // Hijau jika ada file, abu jika tidak
                        };

                        document.querySelectorAll('input[type="file"]').forEach(input => {
                            const previewId = `preview-${input.id}`;
                            const previewElement = document.getElementById(previewId);
                            input.addEventListener("change", () => updatePreview(input, previewElement));
                        });
                    
                        // Event listener untuk cover
                        document.getElementById("cover").addEventListener("change", function () {
                            updatePreview(this, document.getElementById("cover-preview"));
                        });
                    
                        // Event listener untuk BAB 1
                        document.getElementById("file").addEventListener("change", function () {
                            updatePreview(this, document.getElementById("file-preview"));
                        });
                    
                        // Event listener untuk BAB 2
                        document.getElementById("file-bab-2").addEventListener("change", function () {
                            updatePreview(this, document.getElementById("preview-bab-2"));
                        });
                    
                        // Event listener untuk BAB 3
                        document.getElementById("file-bab-3").addEventListener("change", function () {
                            updatePreview(this, document.getElementById("preview-bab-3"));
                        });
                    
                        // Event listener untuk BAB 4
                        document.getElementById("file-bab-4").addEventListener("change", function () {
                            updatePreview(this, document.getElementById("preview-bab-4"));
                        });
                    
                        // Untuk file tambahan (dinamis)
                        document.getElementById("add-upload").addEventListener("click", function () {
                            const container = document.getElementById("upload-container");
                    
                            // Periksa apakah semua file sudah ditambahkan
                            if (currentFileIndex >= fileNames.length) {
                                alert("Semua file telah ditambahkan.");
                                return;
                            }
                    
                            const fileName = fileNames[currentFileIndex]; // Ambil nama file saat ini
                            currentFileIndex++; // Tingkatkan indeks ke file berikutnya
                    
                            // Buat elemen div baru untuk upload file
                            const newUploadGroup = document.createElement("div");
                            newUploadGroup.classList.add("mb-4");
                    
                            // Tambahkan elemen ke dalam container
                            container.appendChild(newUploadGroup);
                    
                            // Tambahkan event listener untuk menampilkan nama file
                            const newInput = newUploadGroup.querySelector(`#file-${currentFileIndex}`);
                            const newPreview = newUploadGroup.querySelector(`#preview-file-${currentFileIndex}`);
                    
                            newInput.addEventListener("change", function () {
                                updatePreview(newInput, newPreview);
                            });
                        });
                    </script>     

</x-app-layout>
