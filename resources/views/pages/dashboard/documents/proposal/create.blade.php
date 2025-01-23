<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Document ' . ucfirst($category)) }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div>
                <!-- Form for creating a new document -->
                <form class="w-full" action="{{ route('dashboard.documents.store') }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf <!-- CSRF Protection -->


                       <!-- Tambahkan Input Hidden untuk Category -->
                       <input type="hidden" name="category" value="proposal">

                   <!-- User ID Dropdown -->
                   <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full px-3">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                            for="user_id">
                            User_ID
                        </label>
                        <input list="user_list" name="user_id" id="user_id" placeholder="user_id"
                            class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                            {{ empty($users) ? 'disabled' : 'required' }}>
                        <datalist id="user_list">
                            @if (!empty($users) && $users->count())
                                @foreach ($users as $user)
                                    <option value="{{ $user->id }}">{{ $user->name }} (Nim:
                                        {{ $user->email }})</option>
                                @endforeach
                            @else
                                <option value="">No users available</option>
                            @endif
                        </datalist>
                    </div>
                </div>

                    <!-- nim -->
                    <!-- nim -->
                    {{-- <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full px-3">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="nim">
                                NIM
                            </label>
                            <input name="nim"
                                class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                id="nim" type="text" placeholder="NIM" value="{{ old('nim') }}" required>
                        </div>
                    </div> --}}
                    <!-- angkatan -->
                <!-- Angkatan -->
                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full px-3">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="year">
                            Angkatan
                        </label>
                        <input name="year"
                            class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                            id="year" type="text" placeholder="year" value="{{ old('year') }}">
                    </div>
                </div>

                    <!-- Title input -->
                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full px-3">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                for="title">
                                Title
                            </label>
                            <input name="title"
                                class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                id="title" type="text" placeholder="Document Title" value="{{ old('title') }}"
                                required>
                        </div>
                    </div>
               
                    <!-- Description input -->
                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full px-3">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="description">
                                Description
                            </label>
                            <textarea name="description"
                                class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                id="description" rows="5" placeholder="Write your description here..." required>{{ old('description') }}</textarea>
                        </div>
                    </div>



                    <!-- Status selection -->
                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full px-3">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                for="status">
                                Status
                            </label>
                            <select name="status"
                                class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                id="status" required>
                                <option value="pending" {{ old('status') == 'pending' ? 'selected' : '' }}>Pending
                                </option>
                                <option value="approved" {{ old('status') == 'approved' ? 'selected' : '' }}>Approved
                                </option>
                                <option value="rejected" {{ old('status') == 'rejected' ? 'selected' : '' }}>Rejected
                                </option>
                            </select>
                        </div>
                    </div>

                    <!-- Submission Date -->
              

                    <!-- Review Date -->
               

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
                        <label for="file-1" class="block text-sm font-medium text-gray-700 mb-2">Upload Daftar Isi, Table, Gambar</label>
                        <div class="relative border-2 border-dashed border-gray-300 rounded-lg p-4 text-center hover:border-indigo-500 transition duration-200">
                            <input type="file" id="file-33" name="persyaratan[]" accept="application/pdf" 
                                class="absolute inset-0 w-full h-full opacity-0 cursor-pointer" required>
                            <div class="flex items-center justify-center">
                                <svg class="w-8 h-8 text-gray-400 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                                </svg>
                                <span class="text-gray-600" id="preview-file-33">Pilih file PDF</span>
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
                    
                    {{-- <div class="mb-4">
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
                    </div> --}}

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
                        <!-- Repeat for other files -->
                        {{-- <div class="mb-4">
                            <label for="file-3" class="block text-sm font-medium text-gray-700 mb-2">Upload Resi UKT</label>
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
                        </div> --}}
                    
                        <!-- Add more file inputs as needed -->
                        <div class="mb-4">
                            <label for="file-3" class="block text-sm font-medium text-gray-700 mb-2">Upload Pendaftaran Seminar Proposal</label>
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
                            <label for="file-3" class="block text-sm font-medium text-gray-700 mb-2">Upload Lembar Persetujuan Proposal</label>
                            <div class="relative border-2 border-dashed border-gray-300 rounded-lg p-4 text-center hover:border-indigo-500 transition duration-200">
                                <input type="file" id="file-4" name="persyaratan_2[]" accept="application/pdf" 
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
                            <label for="file-3" class="block text-sm font-medium text-gray-700 mb-2">Lembar Pengesahan Hasil Seminar Proposal</label>
                            <div class="relative border-2 border-dashed border-gray-300 rounded-lg p-4 text-center hover:border-indigo-500 transition duration-200">
                                <input type="file" id="file-5" name="persyaratan_2[]" accept="application/pdf" 
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
                            <label for="file-3" class="block text-sm font-medium text-gray-700 mb-2">Lembar Catatan Seminar Proposal</label>
                            <div class="relative border-2 border-dashed border-gray-300 rounded-lg p-4 text-center hover:border-indigo-500 transition duration-200">
                                <input type="file" id="file-6" name="persyaratan_2[]" accept="application/pdf" 
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
                            <label for="file-1" class="block text-sm font-medium text-gray-700 mb-2">Upload Daftar Nilai Seminar Proposal</label>
                            <div class="relative border-2 border-dashed border-gray-300 rounded-lg p-4 text-center hover:border-indigo-500 transition duration-200">
                                <input type="file" id="file-1" name="persyaratan_2[]" accept="application/pdf" 
                                    class="absolute inset-0 w-full h-full opacity-0 cursor-pointer" required>
                                <div class="flex items-center justify-center">
                                    <svg class="w-8 h-8 text-gray-400 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                                    </svg>
                                    <span class="text-gray-600" id="preview-file-1">Pilih file PDF</span>
                                </div>
                            </div>
                        </div>
                       
                   
                    </div>

                    
                    <div id="upload-container" class="space-y-4 mb-4"></div>                    
                    <div class="flex justify-end">
                        <a href="{{ route('dashboard.documents.index') }}" class="bg-gray-500 text-white py-2 px-4 rounded shadow-sm hover:bg-gray-700">
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
