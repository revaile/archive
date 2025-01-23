
<div class="mb-4">
    <label for="cover" class="block text-sm font-medium text-gray-700 mb-2">Upload Daftar Pustaka</label>
    <div
        class="relative border-2 border-dashed border-gray-300 rounded-lg p-4 text-center hover:border-indigo-500 transition duration-200">
        <input type="file" name="persyaratan[1]" id="cover85" accept="application/pdf"
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
    <label for="cover" class="block text-sm font-medium text-gray-700 mb-2">Upload C.01 Persetujuan Mengikuti KP</label>
    <div
        class="relative border-2 border-dashed border-gray-300 rounded-lg p-4 text-center hover:border-indigo-500 transition duration-200">
        <input type="file" name="persyaratan[2]" id="cover86" accept="application/pdf"
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

    @if ($persyaratanFiles && isset($persyaratanFiles[2]))
        <p class="mt-2 text-sm text-gray-600">File saat ini:
            <a href="{{ asset('storage/' . $persyaratanFiles[2]) }}" target="_blank"
                class="text-blue-500 underline">Lihat file</a>
        </p>
    @else
        <p class="mt-2 text-sm text-red-500">File pada indeks ke-0 tidak ditemukan.</p>
    @endif
</div>
<div class="mb-4">
    <label for="cover" class="block text-sm font-medium text-gray-700 mb-2">Upload C.03 Pembimbing Perusahaan</label>
    <div
        class="relative border-2 border-dashed border-gray-300 rounded-lg p-4 text-center hover:border-indigo-500 transition duration-200">
        <input type="file" name="persyaratan[3]" id="cover87" accept="application/pdf"
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

    @if ($persyaratanFiles && isset($persyaratanFiles[3]))
        <p class="mt-2 text-sm text-gray-600">File saat ini:
            <a href="{{ asset('storage/' . $persyaratanFiles[3]) }}" target="_blank"
                class="text-blue-500 underline">Lihat file</a>
        </p>
    @else
        <p class="mt-2 text-sm text-red-500">File pada indeks ke-0 tidak ditemukan.</p>
    @endif
</div>
<div class="mb-4">
    <label for="cover" class="block text-sm font-medium text-gray-700 mb-2">Upload C.03 Pembimbing Praktik</label>
    <div
        class="relative border-2 border-dashed border-gray-300 rounded-lg p-4 text-center hover:border-indigo-500 transition duration-200">
        <input type="file" name="persyaratan[4]" id="cover88" accept="application/pdf"
            class="absolute inset-0 w-full h-full opacity-0 cursor-pointer">
        <div class="flex items-center justify-center">
            <svg class="w-8 h-8 text-gray-400 mr-2" xmlns="http://www.w3.org/2000/svg"
                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M12 4v16m8-8H4" />
            </svg>
            <span id="preview-cover88" class="text-gray-600">Pilih file PDF</span>
        </div>
    </div>

    @if ($persyaratanFiles && isset($persyaratanFiles[4]))
        <p class="mt-2 text-sm text-gray-600">File saat ini:
            <a href="{{ asset('storage/' . $persyaratanFiles[4]) }}" target="_blank"
                class="text-blue-500 underline">Lihat file</a>
        </p>
    @else
        <p class="mt-2 text-sm text-red-500">File pada indeks ke-0 tidak ditemukan.</p>
    @endif
</div>
<div class="mb-4">
    <label for="cover" class="block text-sm font-medium text-gray-700 mb-2">Upload C.04 Permohonan Seminar</label>
    <div
        class="relative border-2 border-dashed border-gray-300 rounded-lg p-4 text-center hover:border-indigo-500 transition duration-200">
        <input type="file" name="persyaratan[5]" id="cover89" accept="application/pdf"
            class="absolute inset-0 w-full h-full opacity-0 cursor-pointer">
        <div class="flex items-center justify-center">
            <svg class="w-8 h-8 text-gray-400 mr-2" xmlns="http://www.w3.org/2000/svg"
                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M12 4v16m8-8H4" />
            </svg>
            <span id="preview-cover89" class="text-gray-600">Pilih file PDF</span>
        </div>
    </div>

    @if ($persyaratanFiles && isset($persyaratanFiles[5]))
        <p class="mt-2 text-sm text-gray-600">File saat ini:
            <a href="{{ asset('storage/' . $persyaratanFiles[5]) }}" target="_blank"
                class="text-blue-500 underline">Lihat file</a>
        </p>
    @else
        <p class="mt-2 text-sm text-red-500">File pada indeks ke-0 tidak ditemukan.</p>
    @endif
</div>
<div class="mb-4">
    <label for="cover" class="block text-sm font-medium text-gray-700 mb-2">Upload C.05 Nilai Kinerja KP Perusahaan</label>
    <div
        class="relative border-2 border-dashed border-gray-300 rounded-lg p-4 text-center hover:border-indigo-500 transition duration-200">
        <input type="file" name="persyaratan[6]" id="cover90" accept="application/pdf"
            class="absolute inset-0 w-full h-full opacity-0 cursor-pointer">
        <div class="flex items-center justify-center">
            <svg class="w-8 h-8 text-gray-400 mr-2" xmlns="http://www.w3.org/2000/svg"
                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M12 4v16m8-8H4" />
            </svg>
            <span id="preview-cover90" class="text-gray-600">Pilih file PDF</span>
        </div>
    </div>

    @if ($persyaratanFiles && isset($persyaratanFiles[6]))
        <p class="mt-2 text-sm text-gray-600">File saat ini:
            <a href="{{ asset('storage/' . $persyaratanFiles[6]) }}" target="_blank"
                class="text-blue-500 underline">Lihat file</a>
        </p>
    @else
        <p class="mt-2 text-sm text-red-500">File pada indeks ke-0 tidak ditemukan.</p>
    @endif
</div>
<div class="mb-4">
    <label for="cover" class="block text-sm font-medium text-gray-700 mb-2">Upload C.06 Nilai Penulisan Laporan KP</label>
    <div
        class="relative border-2 border-dashed border-gray-300 rounded-lg p-4 text-center hover:border-indigo-500 transition duration-200">
        <input type="file" name="persyaratan[7]" id="cover91" accept="application/pdf"
            class="absolute inset-0 w-full h-full opacity-0 cursor-pointer">
        <div class="flex items-center justify-center">
            <svg class="w-8 h-8 text-gray-400 mr-2" xmlns="http://www.w3.org/2000/svg"
                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M12 4v16m8-8H4" />
            </svg>
            <span id="preview-cover91" class="text-gray-600">Pilih file PDF</span>
        </div>
    </div>

    @if ($persyaratanFiles && isset($persyaratanFiles[7]))
        <p class="mt-2 text-sm text-gray-600">File saat ini:
            <a href="{{ asset('storage/' . $persyaratanFiles[7]) }}" target="_blank"
                class="text-blue-500 underline">Lihat file</a>
        </p>
    @else
        <p class="mt-2 text-sm text-red-500">File pada indeks ke-0 tidak ditemukan.</p>
    @endif
</div>
<div class="mb-4">
    <label for="cover" class="block text-sm font-medium text-gray-700 mb-2">Upload C.07 Nilai Seminar KP</label>
    <div
        class="relative border-2 border-dashed border-gray-300 rounded-lg p-4 text-center hover:border-indigo-500 transition duration-200">
        <input type="file" name="persyaratan[8]" id="cover84" accept="application/pdf"
            class="absolute inset-0 w-full h-full opacity-0 cursor-pointer">
        <div class="flex items-center justify-center">
            <svg class="w-8 h-8 text-gray-400 mr-2" xmlns="http://www.w3.org/2000/svg"
                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M12 4v16m8-8H4" />
            </svg>
            <span id="preview-cover84" class="text-gray-600">Pilih file PDF</span>
        </div>
    </div>

    @if ($persyaratanFiles && isset($persyaratanFiles[8]))
        <p class="mt-2 text-sm text-gray-600">File saat ini:
            <a href="{{ asset('storage/' . $persyaratanFiles[8]) }}" target="_blank"
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
    <label for="persyaratan_0" class="block text-sm font-medium text-gray-700 mb-2">Upload C.08 Rekaptulasi Nilai KP</label>
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
    <label for="persyaratan_1" class="block text-sm font-medium text-gray-700 mb-2">Upload lembar persetujuan seminar KP</label>
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
    <label for="persyaratan_2" class="block text-sm font-medium text-gray-700 mb-2">Upload lembar pengesahan seminar KP</label>
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
    <label for="persyaratan_3" class="block text-sm font-medium text-gray-700 mb-2">F.09 Form Lembar Catatan Seminar</label>
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

<!-- ppt presentasi pdf -->
<div class="mb-4">
    <label for="persyaratan_4" class="block text-sm font-medium text-gray-700 mb-2">ppt presentasi pdf</label>
    <div class="relative border-2 border-dashed border-gray-300 rounded-lg p-4 text-center hover:border-indigo-500 transition duration-200">
        <input type="file" name="persyaratan_2[4]" id="cover96" accept="application/pdf" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer">
        <div class="flex items-center justify-center">
            <svg class="w-8 h-8 text-gray-400 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
            </svg>
            <span  id="preview-cover96" class="text-gray-600">Pilih file PDF</span>
        </div>
    </div>
    @if ($persyaratanFiles && isset($persyaratanFiles[4]))
        <p class="mt-2 text-sm text-gray-600">File saat ini:
            <a href="{{ asset('storage/' . $persyaratanFiles[4]) }}" target="_blank" class="text-blue-500 underline">Lihat file</a>
        </p>
    @else
        <p class="mt-2 text-sm text-red-500">File pada indeks ke-4 tidak ditemukan.</p>
    @endif
</div>

<!-- surat izin KP fakultas -->
<div class="mb-4">
    <label for="persyaratan_5" class="block text-sm font-medium text-gray-700 mb-2">surat izin KP fakultas</label>
    <div class="relative border-2 border-dashed border-gray-300 rounded-lg p-4 text-center hover:border-indigo-500 transition duration-200">
        <input type="file" name="persyaratan_2[5]" id="cover97" accept="application/pdf" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer">
        <div class="flex items-center justify-center">
            <svg class="w-8 h-8 text-gray-400 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
            </svg>
            <span  id="preview-cover97" class="text-gray-600">Pilih file PDF</span>
        </div>
    </div>
    @if ($persyaratanFiles && isset($persyaratanFiles[5]))
        <p class="mt-2 text-sm text-gray-600">File saat ini:
            <a href="{{ asset('storage/' . $persyaratanFiles[5]) }}" target="_blank" class="text-blue-500 underline">Lihat file</a>
        </p>
    @else
        <p class="mt-2 text-sm text-red-500">File pada indeks ke-5 tidak ditemukan.</p>
    @endif
</div>

<!-- surat konfirmasi yayasan -->
<div class="mb-4">
    <label for="persyaratan_6" class="block text-sm font-medium text-gray-700 mb-2">surat konfirmasi yayasan</label>
    <div class="relative border-2 border-dashed border-gray-300 rounded-lg p-4 text-center hover:border-indigo-500 transition duration-200">
        <input type="file" name="persyaratan_2[6]" id="cover98" accept="application/pdf" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer">
        <div class="flex items-center justify-center">
            <svg class="w-8 h-8 text-gray-400 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
            </svg>
            <span  id="preview-cover98" class="text-gray-600">Pilih file PDF</span>
        </div>
    </div>
    @if ($persyaratanFiles && isset($persyaratanFiles[6]))
        <p class="mt-2 text-sm text-gray-600">File saat ini:
            <a href="{{ asset('storage/' . $persyaratanFiles[6]) }}" target="_blank" class="text-blue-500 underline">Lihat file</a>
        </p>
    @else
        <p class="mt-2 text-sm text-red-500">File pada indeks ke-6 tidak ditemukan.</p>
    @endif
</div>

<div class="mb-4">
    <label for="persyaratan_8" class="block text-sm font-medium text-gray-700 mb-2">Upload surat selesai kp</label>
    <div class="relative border-2 border-dashed border-gray-300 rounded-lg p-4 text-center hover:border-indigo-500 transition duration-200">
        <input type="file" name="persyaratan_2[7]" id="cover99" accept="application/pdf" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer">
        <div class="flex items-center justify-center">
            <svg class="w-8 h-8 text-gray-400 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
            </svg>
            <span  id="preview-cover99" class="text-gray-600">Pilih file PDF</span>
        </div>
    </div>
    @if ($persyaratanFiles && isset($persyaratanFiles[7]))
        <p class="mt-2 text-sm text-gray-600">File saat ini:
            <a href="{{ asset('storage/' . $persyaratanFiles[7]) }}" target="_blank" class="text-blue-500 underline">Lihat file</a>
        </p>
    @else
        <p class="mt-2 text-sm text-red-500">File pada indeks ke-6 tidak ditemukan.</p>
    @endif
</div>


