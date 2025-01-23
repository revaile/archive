<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Update Document') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div>
                <!-- Form for updating a document -->
                <form class="w-full" action="{{ route('dashboard.documents.update', $document->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf <!-- CSRF Protection -->
                    @method('PUT') <!-- HTTP Method Spoofing -->

                    <!-- Tambahkan Input Hidden untuk Category -->
                    <input type="hidden" name="category" value="{{ old('category', $document->category) }}">

                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full px-3">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                for="user_id">
                                NIM
                            </label>
                            <div id="user_id"
                                class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                                {{ $document->user ? $document->user->email : 'N/A' }} </div>
                        </div>
                    </div>
                    <!-- User ID Dropdown -->
                 
                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full px-3">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                for="user_id">
                                User
                            </label>
                            <div id="user_id"
                                class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                                {{ $document->user ? $document->user->name : 'N/A' }}
                            </div>
                        </div>
                    </div>

                    <!-- nim -->
            

                    <!-- Angkatan -->
                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full px-3">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                for="year">
                                Angkatan
                            </label>
                            <input name="year"
                                class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                id="year" type="text" placeholder="year"
                                value="{{ old('year', $document->year) }}">
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
                                id="title" type="text" placeholder="Document Title"
                                value="{{ old('title', $document->title) }}" required>
                        </div>
                    </div>

                    <!-- Description input -->
                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full px-3">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                for="description">
                                Description
                            </label>
                            <textarea name="description"
                                class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                id="description" rows="5" placeholder="Write your description here..." required>{{ old('description', $document->description) }}</textarea>
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
                                <option value="pending"
                                    {{ old('status', $document->status) == 'pending' ? 'selected' : '' }}>Pending
                                </option>
                                <option value="approved"
                                    {{ old('status', $document->status) == 'approved' ? 'selected' : '' }}>Approved
                                </option>
                                <option value="rejected"
                                    {{ old('status', $document->status) == 'rejected' ? 'selected' : '' }}>Rejected
                                </option>
                            </select>
                        </div>
                    </div>

                    {{-- <!-- Submission Date -->
                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full px-3">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                for="submission_date">
                                Submission Date
                            </label>
                            <input name="submission_date"
                                class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                id="submission_date" type="date"
                                value="{{ old('submission_date', date('Y-m-d', strtotime($document->submission_date))) }}"
                                readonly>
                        </div>
                    </div> --}}

                    {{-- <!-- Review Date -->
                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full px-3">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                for="review_date">
                                Review Date
                            </label>
                            <input name="review_date"
                                class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                id="review_date" type="date"
                                value="{{ old('review_date', $document->review_date ? date('Y-m-d', strtotime($document->review_date)) : '') }}"
                                readonly>
                        </div>
                    </div> --}}


                   <!-- Upload Cover -->
                   <div class="mb-4">
                    <label for="cover" class="block text-sm font-medium text-gray-700 mb-2">Upload Cover</label>
                    <div
                        class="relative border-2 border-dashed border-gray-300 rounded-lg p-4 text-center hover:border-indigo-500 transition duration-200">
                        <input type="file" name="cover" id="cover" accept="image/png, image/jpeg, image/jpg" 
                            class="absolute inset-0 w-full h-full opacity-0 cursor-pointer">
                        <div class="flex items-center justify-center">
                            <svg class="w-8 h-8 text-gray-400 mr-2" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 4v16m8-8H4" />
                            </svg>
                            <span id="preview-cover" class="text-gray-600">Pilih file Image untuk cover</span>
                        </div>
                    </div>
                    @if ($document->cover)
                        <p class="mt-2 text-sm text-gray-600">File saat ini:
                            <a href="{{ asset('storage/' . $document->cover) }}" target="_blank"
                                class="text-blue-500 underline">Lihat file</a>
                        </p>
                    @endif
                </div>

            @php
                // Pastikan persyaratan didekode dari JSON ke array
                $persyaratanFiles = json_decode($document->persyaratan, true);
            @endphp
            
             {{-- skripsi daftar isi --}}
             @if ($document->category === 'skripsi')
            <div class="mb-4">
                <label for="cover" class="block text-sm font-medium text-gray-700 mb-2">Abstrak</label>
                <div
                    class="relative border-2 border-dashed border-gray-300 rounded-lg p-4 text-center hover:border-indigo-500 transition duration-200">
                    <input type="file" name="persyaratan[0]" id="cover-abstrak" accept="application/pdf"
                        class="absolute inset-0 w-full h-full opacity-0 cursor-pointer">
                    <div class="flex items-center justify-center">
                        <svg class="w-8 h-8 text-gray-400 mr-2" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 4v16m8-8H4" />
                        </svg>
                        <span id="preview-cover-abstrak" class="text-gray-600">Pilih file PDF</span>
                    </div>
                </div>
            
                @if ($persyaratanFiles && isset($persyaratanFiles[0]))
                    <p class="mt-2 text-sm text-gray-600">File saat ini:
                        <a href="{{ asset('storage/' . $persyaratanFiles[0]) }}" target="_blank"
                            class="text-blue-500 underline">Lihat file</a>
                    </p>
                @else
                    <p class="mt-2 text-sm text-red-500">File pada indeks ke-0 tidak ditemukan.</p>
                @endif
            </div>
            <div class="mb-4">
                <label for="cover" class="block text-sm font-medium text-gray-700 mb-2">Upload Daftar Isi, Table dan Gambar</label>
                <div
                    class="relative border-2 border-dashed border-gray-300 rounded-lg p-4 text-center hover:border-indigo-500 transition duration-200">
                    <input type="file" name="persyaratan[1]" id="cover-daftar" accept="application/pdf"
                        class="absolute inset-0 w-full h-full opacity-0 cursor-pointer">
                    <div class="flex items-center justify-center">
                        <svg class="w-8 h-8 text-gray-400 mr-2" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 4v16m8-8H4" />
                        </svg>
                        <span id="preview-cover-daftar" class="text-gray-600">Pilih file PDF</span>
                    </div>
                </div>
            
                @if ($persyaratanFiles && isset($persyaratanFiles[1]))
                    <p class="mt-2 text-sm text-gray-600">File saat ini:
                        <a href="{{ asset('storage/' . $persyaratanFiles[1]) }}" target="_blank"
                            class="text-blue-500 underline">Lihat file</a>
                    </p>
                @else
                    <p class="mt-2 text-sm text-red-500">File pada indeks ke-0 tidak ditemukan.</p>
                @endif
            </div>
            @endif


            {{-- kp daftar isi --}}
            @if ($document->category === 'kp')
            <div class="mb-4">
                <label for="cover" class="block text-sm font-medium text-gray-700 mb-2">Upload Daftar Isi, Table dan Gambar</label>
                <div
                    class="relative border-2 border-dashed border-gray-300 rounded-lg p-4 text-center hover:border-indigo-500 transition duration-200">
                    <input type="file" name="persyaratan[0]" id="cover" accept="application/pdf"
                        class="absolute inset-0 w-full h-full opacity-0 cursor-pointer">
                    <div class="flex items-center justify-center">
                        <svg class="w-8 h-8 text-gray-400 mr-2" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 4v16m8-8H4" />
                        </svg>
                        <span id="cover-preview" class="text-gray-600">Pilih file PDF</span>
                    </div>
                </div>
        
                @if ($persyaratanFiles && isset($persyaratanFiles[0]))
                    <p class="mt-2 text-sm text-gray-600">File saat ini:
                        <a href="{{ asset('storage/' . $persyaratanFiles[0]) }}" target="_blank"
                            class="text-blue-500 underline">Lihat file</a>
                    </p>
                @else
                    <p class="mt-2 text-sm text-red-500">File pada indeks ke-0 tidak ditemukan.</p>
                @endif
            </div>
             @endif

             {{-- proposal --}}
            @if ($document->category === 'proposal')
            <div class="mb-4">
                <label for="cover" class="block text-sm font-medium text-gray-700 mb-2">Upload Daftar Isi, Table dan Gambar</label>
                <div
                    class="relative border-2 border-dashed border-gray-300 rounded-lg p-4 text-center hover:border-indigo-500 transition duration-200">
                    <input type="file" name="persyaratan[0]" id="cover26" accept="application/pdf"
                        class="absolute inset-0 w-full h-full opacity-0 cursor-pointer">
                    <div class="flex items-center justify-center">
                        <svg class="w-8 h-8 text-gray-400 mr-2" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 4v16m8-8H4" />
                        </svg>
                        <span id="preview-cover26" class="text-gray-600">Pilih file PDF</span>
                    </div>
                </div>
        
                @if ($persyaratanFiles && isset($persyaratanFiles[0]))
                    <p class="mt-2 text-sm text-gray-600">File saat ini:
                        <a href="{{ asset('storage/' . $persyaratanFiles[0]) }}" target="_blank"
                            class="text-blue-500 underline">Lihat file</a>
                    </p>
                @else
                    <p class="mt-2 text-sm text-red-500">File pada indeks ke-0 tidak ditemukan.</p>
                @endif
            </div>
             @endif
        
            


                <!-- Upload File PDF (BAB 1) -->
                <div class="mb-4">
                    <label for="file" class="block text-sm font-medium text-gray-700 mb-2">BAB 1</label>
                    <div
                        class="relative border-2 border-dashed border-gray-300 rounded-lg p-4 text-center hover:border-indigo-500 transition duration-200">
                        <input type="file" name="file" id="file" accept="application/pdf"
                            class="absolute inset-0 w-full h-full opacity-0 cursor-pointer">
                        <div class="flex items-center justify-center">
                            <svg class="w-8 h-8 text-gray-400 mr-2" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 4v16m8-8H4" />
                            </svg>
                            <span id="preview-file">Pilih file PDF</span>
                        </div>
                    </div>
                    <span id="file-preview-1" class="text-gray-600 mt-2"></span>
                    @if ($document->file_path)
                        <p class="mt-2 text-sm text-gray-600">File saat ini:
                            <a href="{{ asset('storage/' . $document->file_path) }}" target="_blank"
                                class="text-blue-500 underline">Lihat file</a>
                        </p>
                    @endif
                </div>

                <!-- Upload BAB 2 -->
                <div class="mb-4">
                    <label for="file-bab-2" class="block text-sm font-medium text-gray-700 mb-2">BAB 2</label>
                    <div
                        class="relative border-2 border-dashed border-gray-300 rounded-lg p-4 text-center hover:border-indigo-500 transition duration-200">
                        <input type="file" name="bab2" id="file-bab-2" accept="application/pdf"
                            class="absolute inset-0 w-full h-full opacity-0 cursor-pointer">
                        <div class="flex items-center justify-center">
                            <svg class="w-8 h-8 text-gray-400 mr-2" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 4v16m8-8H4" />
                            </svg>
                            <span id="preview-file-bab-2">Pilih file PDF</span>
                        </div>
                    </div>
                    @if ($document->bab2)
                        <p class="mt-2 text-sm text-gray-600">File saat ini:
                            <a href="{{ asset('storage/' . $document->bab2) }}" target="_blank"
                                class="text-blue-500 underline">Lihat file</a>
                        </p>
                    @endif
                </div>

                <!-- Upload BAB 3 -->
                <div class="mb-4">
                    <label for="file-bab-3" class="block text-sm font-medium text-gray-700 mb-2">BAB 3</label>
                    <div
                        class="relative border-2 border-dashed border-gray-300 rounded-lg p-4 text-center hover:border-indigo-500 transition duration-200">
                        <input type="file" name="bab3" id="file-bab-3" accept="application/pdf"
                            class="absolute inset-0 w-full h-full opacity-0 cursor-pointer">
                        <div class="flex items-center justify-center">
                            <svg class="w-8 h-8 text-gray-400 mr-2" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 4v16m8-8H4" />
                            </svg>
                            <span id="preview-file-bab-3">Pilih file PDF</span>
                        </div>
                    </div>
                    @if ($document->bab3)
                        <p class="mt-2 text-sm text-gray-600">File saat ini:
                            <a href="{{ asset('storage/' . $document->bab3) }}" target="_blank"
                                class="text-blue-500 underline">Lihat file</a>
                        </p>
                    @endif
                </div>



                <!-- Upload BAB 4 -->
                @if ($document->category !== 'proposal') 
                <div class="mb-4">
                    <label for="file-bab-4" class="block text-sm font-medium text-gray-700 mb-2">BAB 4</label>
                    <div
                        class="relative border-2 border-dashed border-gray-300 rounded-lg p-4 text-center hover:border-indigo-500 transition duration-200">
                        <input type="file" name="bab4" id="file-bab-4" accept="application/pdf"
                            class="absolute inset-0 w-full h-full opacity-0 cursor-pointer">
                        <div class="flex items-center justify-center">
                            <svg class="w-8 h-8 text-gray-400 mr-2" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 4v16m8-8H4" />
                            </svg>
                            <span id="preview-file-bab-4">Pilih file PDF</span>
                        </div>
                    </div>
                    @if ($document->bab4)
                        <p class="mt-2 text-sm text-gray-600">File saat ini:
                            <a href="{{ asset('storage/' . $document->bab4) }}" target="_blank"
                                class="text-blue-500 underline">Lihat file</a>
                        </p>
                    @endif
                </div>
                @endif

                @if ($document->category == 'skripsi') 
                <div class="mb-4">
                    <label for="file-bab-4" class="block text-sm font-medium text-gray-700 mb-2">BAB 5</label>
                    <div
                        class="relative border-2 border-dashed border-gray-300 rounded-lg p-4 text-center hover:border-indigo-500 transition duration-200">
                        <input type="file" name="bab5" id="file-bab-5" accept="application/pdf"
                            class="absolute inset-0 w-full h-full opacity-0 cursor-pointer">
                        <div class="flex items-center justify-center">
                            <svg class="w-8 h-8 text-gray-400 mr-2" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 4v16m8-8H4" />
                            </svg>
                            <span id="preview-file-bab-5">Pilih file PDF</span>
                        </div>
                    </div>
                    @if ($document->bab5)
                        <p class="mt-2 text-sm text-gray-600">File saat ini:
                            <a href="{{ asset('storage/' . $document->bab5) }}" target="_blank"
                                class="text-blue-500 underline">Lihat file</a>
                        </p>
                    @endif
                </div>
                @endif

                

                {{-- kp --}}
                @if ($document->category === 'kp')
                @include('includes.kp')
                @endif

                {{-- skripsi --}}
                @if ($document->category === 'skripsi')
                @include('includes.skripsi')
                @endif
                {{-- skripsi --}}
                @if ($document->category === 'proposal')
                @include('includes.proposal')
                @endif
            
              

            
                <div class="flex justify-end">
                    <a href="{{ route('dashboard.documents.index') }}"
                        class="bg-gray-500 text-white py-2 px-4 rounded shadow-sm hover:bg-gray-700">
                        Batal
                    </a>
                    <button type="submit"
                        class="ml-3 bg-blue-500 text-white py-2 px-4 rounded shadow-sm hover:bg-blue-700">
                        Update
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>


<script>
    // Function untuk memperbarui pratinjau file
    const updatePreview = (inputElement, previewElement) => {
        const fileName = inputElement.files[0]?.name || "Pilih file";
        previewElement.textContent = fileName;
        previewElement.style.color = fileName !== "Pilih file" ? "#10B981" : "#6B7280"; // Hijau jika ada file, abu jika tidak
    };

    // Tambahkan event listener untuk setiap input file
    document.querySelectorAll('input[type="file"]').forEach(input => {
        const previewId = `preview-${input.id}`;
        const previewElement = document.getElementById(previewId);
        input.addEventListener("change", () => updatePreview(input, previewElement));
    });

    // Contoh tambahan untuk cover jika menggunakan ID unik
    document.getElementById("cover").addEventListener("change", function () {
        updatePreview(this, document.getElementById("preview-cover"));
    });
    document.getElementById("file").addEventListener("change", function () {
        updatePreview(this, document.getElementById("preview-file"));
    });
</script>

</x-app-layout>
