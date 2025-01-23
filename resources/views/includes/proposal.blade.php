
<div class="mb-4">
    <label for="cover" class="block text-sm font-medium text-gray-700 mb-2">Upload Daftar Pustaka</label>
    <div
        class="relative border-2 border-dashed border-gray-300 rounded-lg p-4 text-center hover:border-indigo-500 transition duration-200">
        <input type="file" name="persyaratan[1]" id="cover20" accept="application/pdf"
            class="absolute inset-0 w-full h-full opacity-0 cursor-pointer">
        <div class="flex items-center justify-center">
            <svg class="w-8 h-8 text-gray-400 mr-2" xmlns="http://www.w3.org/2000/svg"
                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M12 4v16m8-8H4" />
            </svg>
            <span id="preview-cover20" class="text-gray-600">Pilih file PDF</span>
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
{{--  --}}
<div class="mb-4">
    <label for="cover" class="block text-sm font-medium text-gray-700 mb-2">Pendaftaran Seminar Proposal</label>
    <div
        class="relative border-2 border-dashed border-gray-300 rounded-lg p-4 text-center hover:border-indigo-500 transition duration-200">
        <input type="file" name="persyaratan[2]" id="cover21" accept="application/pdf"
            class="absolute inset-0 w-full h-full opacity-0 cursor-pointer">
        <div class="flex items-center justify-center">
            <svg class="w-8 h-8 text-gray-400 mr-2" xmlns="http://www.w3.org/2000/svg"
                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M12 4v16m8-8H4" />
            </svg>
            <span id="preview-cover21" class="text-gray-600">Pilih file PDF</span>
        </div>
    </div>

    @if ($persyaratanFiles && isset($persyaratanFiles[2]))
        <p class="mt-2 text-sm text-gray-600">File saat ini:
            <a href="{{ asset('storage/' . $persyaratanFiles[2]) }}" target="_blank"
                class="text-blue-500 underline">Lihat file</a>
        </p>
    @else
        <p class="mt-2 text-sm text-red-500">File pada indeks ke-0 tidak ditemukan.</p>
    @endif
</div>

@php
    // Pastikan persyaratan didekode dari JSON ke array
    $persyaratanFiles = json_decode($document->persyaratan_2, true);
@endphp

<!-- Upload C.08 Rekaptulasi Nilai KP -->
<div class="mb-4">
    <label for="persyaratan_0" class="block text-sm font-medium text-gray-700 mb-2">Lembar Persetujuan Proposal</label>
    <div class="relative border-2 border-dashed border-gray-300 rounded-lg p-4 text-center hover:border-indigo-500 transition duration-200">
        <input type="file" name="persyaratan_2[0]" id="cover22" accept="application/pdf" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer">
        <div class="flex items-center justify-center">
            <svg class="w-8 h-8 text-gray-400 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
            </svg>
            <span id="preview-cover22" class="text-gray-600">Pilih file PDF</span>
        </div>
    </div>
    @if ($persyaratanFiles && isset($persyaratanFiles[0]))
        <p class="mt-2 text-sm text-gray-600">File saat ini:
            <a href="{{ asset('storage/' . $persyaratanFiles[0]) }}" target="_blank" class="text-blue-500 underline">Lihat file</a>
        </p>
    @else
        <p class="mt-2 text-sm text-red-500">File pada indeks ke-0 tidak ditemukan.</p>
    @endif
</div>

<!-- Upload lembar persetujuan seminar KP -->
<div class="mb-4">
    <label for="persyaratan_1" class="block text-sm font-medium text-gray-700 mb-2">Lembar Pengesahan Hasil Seminar Proposal</label>
    <div class="relative border-2 border-dashed border-gray-300 rounded-lg p-4 text-center hover:border-indigo-500 transition duration-200">
        <input type="file" name="persyaratan_2[1]" id="cover23" accept="application/pdf" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer">
        <div class="flex items-center justify-center">
            <svg class="w-8 h-8 text-gray-400 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
            </svg>
            <span id="preview-cover23" class="text-gray-600">Pilih file PDF</span>
        </div>
    </div>
    @if ($persyaratanFiles && isset($persyaratanFiles[1]))
        <p class="mt-2 text-sm text-gray-600">File saat ini:
            <a href="{{ asset('storage/' . $persyaratanFiles[1]) }}" target="_blank" class="text-blue-500 underline">Lihat file</a>
        </p>
    @else
        <p class="mt-2 text-sm text-red-500">File pada indeks ke-1 tidak ditemukan.</p>
    @endif
</div>

<!-- Upload lembar pengesahan seminar KP -->
<div class="mb-4">
    <label for="persyaratan_2" class="block text-sm font-medium text-gray-700 mb-2">Lembar Catatan Seminar Proposal</label>
    <div class="relative border-2 border-dashed border-gray-300 rounded-lg p-4 text-center hover:border-indigo-500 transition duration-200">
        <input type="file" name="persyaratan_2[2]" id="cover24" accept="application/pdf" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer">
        <div class="flex items-center justify-center">
            <svg class="w-8 h-8 text-gray-400 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
            </svg>
            <span id="preview-cover24" class="text-gray-600">Pilih file PDF</span>
        </div>
    </div>
    @if ($persyaratanFiles && isset($persyaratanFiles[2]))
        <p class="mt-2 text-sm text-gray-600">File saat ini:
            <a href="{{ asset('storage/' . $persyaratanFiles[2]) }}" target="_blank" class="text-blue-500 underline">Lihat file</a>
        </p>
    @else
        <p class="mt-2 text-sm text-red-500">File pada indeks ke-2 tidak ditemukan.</p>
    @endif
</div>

<!-- F.09 Form Lembar Catatan Seminar -->
<div class="mb-4">
    <label for="persyaratan_3" class="block text-sm font-medium text-gray-700 mb-2">Daftar Nilai Seminar Proposal</label>
    <div class="relative border-2 border-dashed border-gray-300 rounded-lg p-4 text-center hover:border-indigo-500 transition duration-200">
        <input type="file" name="persyaratan_2[3]" id="cover25" accept="application/pdf" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer">
        <div class="flex items-center justify-center">
            <svg class="w-8 h-8 text-gray-400 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
            </svg>
            <span id="preview-cover25" class="text-gray-600">Pilih file PDF</span>
        </div>
    </div>
    @if ($persyaratanFiles && isset($persyaratanFiles[3]))
        <p class="mt-2 text-sm text-gray-600">File saat ini:
            <a href="{{ asset('storage/' . $persyaratanFiles[3]) }}" target="_blank" class="text-blue-500 underline">Lihat file</a>
        </p>
    @else
        <p class="mt-2 text-sm text-red-500">File pada indeks ke-3 tidak ditemukan.</p>
    @endif
</div>


