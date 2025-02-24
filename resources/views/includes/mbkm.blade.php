
<div class="mb-4">
    <label for="cover" class="block text-sm font-medium text-gray-700 mb-2">Upload Surat Rekomendasi</label>
    <div
        class="relative border-2 border-dashed border-gray-300 rounded-lg p-4 text-center hover:border-indigo-500 transition duration-200">
        <input type="file" name="persyaratan[0]" id="cover85" accept="application/pdf"
            class="absolute inset-0 w-full h-full opacity-0 cursor-pointer">
        <div class="flex items-center justify-center">
            <svg class="w-8 h-8 text-gray-400 mr-2" xmlns="http://www.w3.org/2000/svg"
                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M12 4v16m8-8H4" />
            </svg>
            <span id="preview-cover85" class="text-gray-600">Pilih file PDF</span>
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
    <label for="cover" class="block text-sm font-medium text-gray-700 mb-2">Upload Surat Keterangan di terima MBKM/Magang dari perusahaan</label>
    <div
        class="relative border-2 border-dashed border-gray-300 rounded-lg p-4 text-center hover:border-indigo-500 transition duration-200">
        <input type="file" name="persyaratan[1]" id="cover86" accept="application/pdf"
            class="absolute inset-0 w-full h-full opacity-0 cursor-pointer">
        <div class="flex items-center justify-center">
            <svg class="w-8 h-8 text-gray-400 mr-2" xmlns="http://www.w3.org/2000/svg"
                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M12 4v16m8-8H4" />
            </svg>
            <span id="preview-cover86" class="text-gray-600">Pilih file PDF</span>
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
<div class="mb-4">
    <label for="cover" class="block text-sm font-medium text-gray-700 mb-2">Upload Log Book</label>
    <div
        class="relative border-2 border-dashed border-gray-300 rounded-lg p-4 text-center hover:border-indigo-500 transition duration-200">
        <input type="file" name="persyaratan[2]" id="cover87" accept="application/pdf"
            class="absolute inset-0 w-full h-full opacity-0 cursor-pointer">
        <div class="flex items-center justify-center">
            <svg class="w-8 h-8 text-gray-400 mr-2" xmlns="http://www.w3.org/2000/svg"
                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M12 4v16m8-8H4" />
            </svg>
            <span id="preview-cover87" class="text-gray-600">Pilih file PDF</span>
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
    <label for="persyaratan_0" class="block text-sm font-medium text-gray-700 mb-2">C.04 Lembar Pendaftaran</label>
    <div class="relative border-2 border-dashed border-gray-300 rounded-lg p-4 text-center hover:border-indigo-500 transition duration-200">
        <input type="file" name="persyaratan_2[0]" id="cover92" accept="application/pdf" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer">
        <div class="flex items-center justify-center">
            <svg class="w-8 h-8 text-gray-400 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
            </svg>
            <span  id="preview-cover92" class="text-gray-600">Pilih file PDF</span>
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
    <label for="persyaratan_1" class="block text-sm font-medium text-gray-700 mb-2">Upload Transkrip nilai dari instansi mbkm/magang</label>
    <div class="relative border-2 border-dashed border-gray-300 rounded-lg p-4 text-center hover:border-indigo-500 transition duration-200">
        <input type="file" name="persyaratan_2[1]" id="cover93" accept="application/pdf" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer">
        <div class="flex items-center justify-center">
            <svg class="w-8 h-8 text-gray-400 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
            </svg>
            <span  id="preview-cover93" class="text-gray-600">Pilih file PDF</span>
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
    <label for="persyaratan_2" class="block text-sm font-medium text-gray-700 mb-2">Upload PPT</label>
    <div class="relative border-2 border-dashed border-gray-300 rounded-lg p-4 text-center hover:border-indigo-500 transition duration-200">
        <input type="file" name="persyaratan_2[2]" id="cover94" accept="application/pdf" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer">
        <div class="flex items-center justify-center">
            <svg class="w-8 h-8 text-gray-400 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
            </svg>
            <span  id="preview-cover94" class="text-gray-600">Pilih file PDF</span>
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
    <label for="persyaratan_3" class="block text-sm font-medium text-gray-700 mb-2">Upload Transkrip konversi dari jurusan</label>
    <div class="relative border-2 border-dashed border-gray-300 rounded-lg p-4 text-center hover:border-indigo-500 transition duration-200">
        <input type="file" name="persyaratan_2[3]" id="cover95" accept="application/pdf" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer">
        <div class="flex items-center justify-center">
            <svg class="w-8 h-8 text-gray-400 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
            </svg>
            <span  id="preview-cover95" class="text-gray-600">Pilih file PDF</span>
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



