<div class="mb-4">
    <label for="cover" class="block text-sm font-medium text-gray-700 mb-2">Upload LoA</label>
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
    <label for="cover" class="block text-sm font-medium text-gray-700 mb-2">Upload ⁠korespodensi reviewer</label>
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
