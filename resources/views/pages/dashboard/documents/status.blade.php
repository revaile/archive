<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Document Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div>
                <!-- Form for creating a new document -->
                <form class="w-full" action="{{ route('dashboard.documents.store') }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf <!-- CSRF Protection -->


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

                    {{-- <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full px-3">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                for="user_id">
                                NIM
                            </label>
                            <div id="user_id"
                                class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                                {{ $document->nim }} </div>
                        </div>
                    </div> --}}

                    <!-- Angkatan (Year) -->
                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full px-3">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                for="year">
                                Angkatan
                            </label>
                            <div id="year"
                                class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                                {{ $document->year ?? 'N/A' }}
                            </div>
                        </div>
                    </div>

                    <!-- Category selection -->
                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full px-3">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                for="category">
                                Category
                            </label>
                            <div name="category"
                                class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                id="category" required>
                                {{ ucfirst($document->category) }}
                            </div>
                        </div>
                    </div>

                    <!-- Title input -->
                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full px-3">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                for="title">
                                Title
                            </label>
                            <div
                                class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                                {{ $document->title }}
                            </div>
                        </div>
                    </div>

                    <!-- Title input -->
                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full px-3">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                for="title">
                                Description
                            </label>
                            <div
                                class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                                {{ $document->description }}
                            </div>
                        </div>
                    </div>




                    <!-- Status selection -->
                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full px-3">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                for="status">
                                Status
                            </label>
                            <div name="status"
                                class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                id="status" required>
                                {{ ucfirst($document->status) }}
                            </div>
                        </div>
                    </div>

                    <!-- Submission Date -->
                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full px-3">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                for="submission_date">
                                Submission Date
                            </label>
                            <p class="bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight">
                                {{ $document->submission_date ?? 'No date available' }}
                            </p>
                        </div>
                    </div>

                    <!-- Review Date -->
                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full px-3">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                for="review_date">
                                Review Date
                            </label>
                            <p class="bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight">
                                {{ $document->review_date ?? 'No date available' }}
                            </p>
                        </div>
                    </div>

                    @if ($document->category === 'kp')
                    @if ($document->persyaratan)
                        <div class="mb-6">
                            {{-- <p class="text-gray-700"><strong>Persyaratan:</strong></p> --}}
                            <div class="flex flex-col gap-4 mt-2">
                                @php
                                    $persyaratanPaths = json_decode($document->persyaratan, true);
                                    $fileNames = [
                                        'Daftar Isi, Table, Gambar',
                                        'Daftar Pustaka',
                                        'C.01 Persetujuan Mengikuti KP',
                                        'C.03 Pembimbing Perusahaan',
                                        'C.03 Pembimbing Praktik',
                                        'C.04 Permohonan Seminar',
                                        'C.05 Nilai Kinerja KP Perusahaan',
                                        'C.06 Nilai Penulisan Laporan KP',
                                        'C.07 Nilai Seminar KP',
                                    ];
                                @endphp
                
                                @if (!empty($persyaratanPaths))
                                    @foreach ($persyaratanPaths as $index => $path)
                                        <div class="mb-4">
                                            <p class="text-gray-500 font-medium">
                                                {{ $fileNames[$index] ?? 'File Persyaratan' }}:
                                            </p>
                                            <iframe src="{{ Storage::url($path) }}" class="border rounded-lg w-full h-[900px] shadow-md"></iframe>
                                        </div>
                                    @endforeach
                                @else
                                    <p class="text-red-500 font-bold">Tidak ada file persyaratan yang diunggah.</p>
                                @endif
                            </div>
                        </div>
                    @else
                        <div class="mb-6">
                            <p class="text-red-500 font-bold">Tidak ada file persyaratan yang diunggah.</p>
                        </div>
                    @endif
                
                    @if ($document->persyaratan_2)
                        <div class="mb-6">
                            {{-- <p class="text-gray-700"><strong>Persyaratan 2:</strong></p> --}}
                            <div class="flex flex-col gap-4 mt-2">
                                @php
                                    $persyaratan2Paths = json_decode($document->persyaratan_2, true);
                                    $fileNames2 = [
                                        'C.08 Rekapitulasi Nilai KP',
                                        'Lembar Persetujuan Seminar KP',
                                        'Lembar Pengesahan Seminar KP',
                                        'F.09 Form Lembar Catatan Seminar',
                                        'PPT Presentasi PDF',
                                        'Surat Izin KP Fakultas',
                                        'Surat Konfirmasi Yayasan',
                                        'Surat Selesai KP'
                                    ];
                                @endphp
                
                                @if (!empty($persyaratan2Paths))
                                    @foreach ($persyaratan2Paths as $index => $path)
                                        <div class="mb-4">
                                            <p class="text-gray-500 font-medium">
                                                {{ $fileNames2[$index] ?? 'File Persyaratan 2' }}:
                                            </p>
                                            <iframe src="{{ Storage::url($path) }}" class="border rounded-lg w-full h-[900px] shadow-md"></iframe>
                                        </div>
                                    @endforeach
                                @else
                                    <p class="text-red-500 font-bold">Tidak ada file persyaratan tambahan yang diunggah.</p>
                                @endif
                            </div>
                        </div>
                    @else
                        <div class="mb-6">
                            <p class="text-red-500 font-bold">Tidak ada file persyaratan tambahan yang diunggah.</p>
                        </div>
                    @endif
                @elseif ($document->category === 'skripsi')
                    @if ($document->persyaratan)
                        <div class="mb-6">
                            {{-- <p class="text-gray-700"><strong>Persyaratan:</strong></p> --}}
                            <div class="flex flex-col gap-4 mt-2">
                                @php
                                    $persyaratanPaths = json_decode($document->persyaratan, true);
                                    $fileNames = [
                                        'Abstrak',
                                        'Daftar Isi, Gambar, Table',
                                        'Daftar Pustaka',
                                        'Artikel Join',
                                        'Lembar Pengesahan Skripsi'
                                    ];
                                @endphp
                
                                @if (!empty($persyaratanPaths))
                                    @foreach ($persyaratanPaths as $index => $path)
                                        <div class="mb-4">
                                            <p class="text-gray-500 font-medium">
                                                {{ $fileNames[$index] ?? 'File Persyaratan' }}:
                                            </p>
                                            <iframe src="{{ Storage::url($path) }}" class="border rounded-lg w-full h-[900px] shadow-md"></iframe>
                                        </div>
                                    @endforeach
                                @else
                                    <p class="text-red-500 font-bold">Tidak ada file persyaratan yang diunggah.</p>
                                @endif
                            </div>
                        </div>
                    @else
                        <div class="mb-6">
                            <p class="text-red-500 font-bold">Tidak ada file persyaratan yang diunggah.</p>
                        </div>
                    @endif
                
                    @if ($document->persyaratan_2)
                        <div class="mb-6">
                            {{-- <p class="text-gray-700"><strong>Persyaratan 2:</strong></p> --}}
                            <div class="flex flex-col gap-4 mt-2">
                                @php
                                    $persyaratan2Paths = json_decode($document->persyaratan_2, true);
                                    $fileNames2 = [
                                        'Lembar Persetujuan Skripsi',
                                        'Surat Pernyataan Jurnal',
                                        'Surat Pernyataan Karya Sendiri (Skripsi)',
                                        'Upload Lembar Bimbingan',
                                        'Upload SK Pembingbing'
                                    ];
                                @endphp
                
                                @if (!empty($persyaratan2Paths))
                                    @foreach ($persyaratan2Paths as $index => $path)
                                        <div class="mb-4">
                                            <p class="text-gray-500 font-medium">
                                                {{ $fileNames2[$index] ?? 'File Persyaratan 2' }}:
                                            </p>
                                            <iframe src="{{ Storage::url($path) }}" class="border rounded-lg w-full h-[900px] shadow-md"></iframe>
                                        </div>
                                    @endforeach
                                @else
                                    <p class="text-red-500 font-bold">Tidak ada file persyaratan tambahan yang diunggah.</p>
                                @endif
                            </div>
                        </div>
                    @else
                        <div class="mb-6">
                            <p class="text-red-500 font-bold">Tidak ada file persyaratan tambahan yang diunggah.</p>
                        </div>
                    @endif
                @elseif ($document->category === 'proposal')
                    @if ($document->persyaratan)
                        <div class="mb-6">
                            {{-- <p class="text-gray-700"><strong>Persyaratan:</strong></p> --}}
                            <div class="flex flex-col gap-4 mt-2">
                                @php
                                    $persyaratanPaths = json_decode($document->persyaratan, true);
                                    $fileNames = [
                                       'Daftar Isi, Table dan Gambar',  
                                        'Daftar Pustaka',  
                                        'Pendaftaran Seminar Proposal'
                                    ];
                                @endphp
                
                                @if (!empty($persyaratanPaths))
                                    @foreach ($persyaratanPaths as $index => $path)
                                        <div class="mb-4">
                                            <p class="text-gray-500 font-medium">
                                                {{ $fileNames[$index] ?? 'File Persyaratan' }}:
                                            </p>
                                            <iframe src="{{ Storage::url($path) }}" class="border rounded-lg w-full h-[900px] shadow-md"></iframe>
                                        </div>
                                    @endforeach
                                @else
                                    <p class="text-red-500 font-bold">Tidak ada file persyaratan yang diunggah.</p>
                                @endif
                            </div>
                        </div>
                    @else
                        <div class="mb-6">
                            <p class="text-red-500 font-bold">Tidak ada file persyaratan yang diunggah.</p>
                        </div>
                    @endif
                
                    @if ($document->persyaratan_2)
                        <div class="mb-6">
                            {{-- <p class="text-gray-700"><strong>Persyaratan 2:</strong></p> --}}
                            <div class="flex flex-col gap-4 mt-2">
                                @php
                                    $persyaratan2Paths = json_decode($document->persyaratan_2, true);
                                    $fileNames2 = [
                                    'Lembar Persetujuan Proposal',  
                                    'Lembar Pengesahan Hasil Seminar Proposal',  
                                    'Lembar Catatan Seminar Proposal',  
                                    'Dafar Nilai Seminar Proposal'
                                    ];
                                @endphp
                
                                @if (!empty($persyaratan2Paths))
                                    @foreach ($persyaratan2Paths as $index => $path)
                                        <div class="mb-4">
                                            <p class="text-gray-500 font-medium">
                                                {{ $fileNames2[$index] ?? 'File Persyaratan 2' }}:
                                            </p>
                                            <iframe src="{{ Storage::url($path) }}" class="border rounded-lg w-full h-[900px] shadow-md"></iframe>
                                        </div>
                                    @endforeach
                                @else
                                    <p class="text-red-500 font-bold">Tidak ada file persyaratan tambahan yang diunggah.</p>
                                @endif
                            </div>
                        </div>
                    @else
                        <div class="mb-6">
                            <p class="text-red-500 font-bold">Tidak ada file persyaratan tambahan yang diunggah.</p>
                        </div>
                    @endif
                    @else
                    <div></div>
                @endif
                
                
                
                
                
                
                    <!-- File Path -->
                    <!-- Cover (File Path) -->
                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full px-3">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                for="file">
                                Cover
                            </label>
                            @if ($document->cover)
                                <img src="{{ asset('storage/' . $document->cover) }}" alt="Cover Image"
                                    class="w-full h-[100%] object-cover">
                            @else
                                <span class="text-gray-500">No Cover</span>
                            @endif
                        </div>
                    </div>
                    <!-- File Path -->
                    <!-- File Path -->
                    <!-- File Path -->
                    @if ($document->file_path)
                        <div class="mb-6">
                            <p class="text-gray-700"><strong>BAB 1:</strong></p>
                            <div class="flex items-center gap-4 mt-2">
                                @if (in_array(pathinfo($document->file_path, PATHINFO_EXTENSION), ['jpg', 'jpeg', 'png', 'pdf']))
                                    <iframe src="{{ Storage::url($document->file_path) }}"
                                        class="border rounded-lg w-full h-[900px] shadow-md">
                                    </iframe>
                                @endif
                            </div>
                        </div>
                    @else
                        <div class="mb-6">
                            <p class="text-red-500 font-bold">No Document Uploaded</p>
                        </div>
                    @endif

                    @if ($document->bab2)
                        <div class="mb-6">
                            <p class="text-gray-700"><strong>BAB 2:</strong></p>
                            <div class="flex items-center gap-4 mt-2">
                                <iframe src="{{ Storage::url($document->bab2) }}"
                                    class="border rounded-lg w-full h-[900px] shadow-md"></iframe>
                            </div>
                        </div>
                    @else
                        <div class="mb-6">
                            <p class="text-red-500 font-bold">No Document Uploaded</p>
                        </div>
                    @endif

                    @if ($document->bab3)
                        <div class="mb-6">
                            <p class="text-gray-700"><strong>BAB 3:</strong></p>
                            <div class="flex items-center gap-4 mt-2">
                                <iframe src="{{ Storage::url($document->bab3) }}"
                                    class="border rounded-lg w-full h-[900px] shadow-md"></iframe>
                            </div>
                        </div>
                    @else
                        <div class="mb-6">
                            <p class="text-red-500 font-bold">No Document Uploaded</p>
                        </div>
                    @endif

                    @if ($document->category === 'skripsi' || $document->category === 'kp')
                    @if ($document->bab4)
                        <div class="mb-6">
                            <p class="text-gray-700"><strong>BAB 4:</strong></p>
                            <div class="flex items-center gap-4 mt-2">
                                <iframe src="{{ Storage::url($document->bab4) }}"
                                    class="border rounded-lg w-full h-[900px] shadow-md"></iframe>
                            </div>
                        </div>
                    @else
                        <div class="mb-6">
                            <p class="text-red-500 font-bold">No Document Uploaded</p>
                        </div>
                    @endif
                    @endif


                    @if ($document->category === 'skripsi')
                    @if ($document->bab5)
                        <div class="mb-6">
                            <p class="text-gray-700"><strong>BAB 5:</strong></p>
                            <div class="flex items-center gap-4 mt-2">
                                <iframe src="{{ Storage::url($document->bab5) }}"
                                    class="border rounded-lg w-full h-[900px] shadow-md"></iframe>
                            </div>
                        </div>
                    @else
                        <div class="mb-6">
                            <p class="text-red-500 font-bold">No Document Uploaded</p>
                        </div>
                    @endif
                    @endif

                    <!-- Submit Button -->
                    <!-- Status Update Section -->
                     <div class="bg-white shadow-md rounded-lg p-6 mt-8">
                        <p class="text-gray-700 text-lg font-semibold mb-4">Ubah Status:</p>
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                            @foreach (['pending' => 'yellow', 'approved' => 'green', 'rejected' => 'red'] as $status => $color)
                            <form method="POST"
                                action="{{ route('dashboard.documents.updateStatus', ['document' => $document->id, 'status' => $status]) }}">
                                @csrf
                                @method('PATCH')
                                <button type="submit"
                                    class="w-full bg-{{ $color }}-500 text-white py-2 px-4 rounded-lg shadow-md hover:bg-{{ $color }}-600 transition duration-200">
                                    {{ ucfirst($status) }}
                                </button>
                            </form>
                        @endforeach                        
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</x-app-layout>
