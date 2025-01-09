<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Documents') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mb-10 flex gap-5">
                @if ($documents->pluck('category')->contains('kp'))
                    <span
                        class="bg-[#facc15] text-white font-bold py-2 px-4 rounded shadow-lg opacity-50 cursor-not-allowed">
                        + Upload KP
                    </span>
                @else
                    <a href="{{ route('user.mydocuments.create', ['category' => 'kp']) }}"
                        class="bg-[#facc15] hover:bg-green-700 text-white font-bold py-2 px-4 rounded shadow-lg">
                        + Upload KP
                    </a>
                @endif

                @if ($documents->pluck('category')->contains('proposal'))
                    <span
                        class="bg-[#facc15] text-white font-bold py-2 px-4 rounded shadow-lg opacity-50 cursor-not-allowed">
                        + Upload Proposal
                    </span>
                @else
                    <a href="{{ route('user.mydocuments.create', ['category' => 'proposal']) }}"
                        class="bg-[#facc15] hover:bg-green-700 text-white font-bold py-2 px-4 rounded shadow-lg">
                        + Upload Proposal
                    </a>
                @endif

                @if ($documents->pluck('category')->contains('skripsi'))
                    <span
                        class="bg-[#facc15] text-white font-bold py-2 px-4 rounded shadow-lg opacity-50 cursor-not-allowed">
                        + Upload Skripsi
                    </span>
                @else
                    <a href="{{ route('user.mydocuments.create', ['category' => 'skripsi']) }}"
                        class="bg-[#facc15] hover:bg-green-700 text-white font-bold py-2 px-4 rounded shadow-lg">
                        + Upload Skripsi
                    </a>
                @endif
            </div>


            <div class="shadow overflow-hidden sm:rounded-lg">
                <div class="px-4 py-5 bg-white sm:p-6">
                    <table id="crudTable" class="min-w-full table-auto">
                        <thead>
                            <tr class="bg-gray-100 text-gray-700">
                                <th class="px-4 py-3 text-left">NIM</th>
                                <th class="px-4 py-3 text-center">Judul</th>
                                <th class="px-4 py-3 text-center">Deskripsi</th>
                                <th class="px-4 py-3 text-left">Kategori</th>
                                <th class="px-4 py-3 text-left">Tahun</th>
                                <th class="px-4 py-3 text-left">Status</th>
                                <th class="px-4 py-3 text-left">Cover</th>
                                <th class="px-4 py-3 text-left">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($documents as $document)
                                <tr class="hover:bg-gray-100 transition duration-150">
                                    <td class="px-4 py-3">{{ $document->user->email ?? 'No Email' }}</td>
                                    <td class="px-10 py-3 text-center">
                                        <div class="truncate w-40 overflow-hidden text-ellipsis" title="{{ $document->title }}">
                                            {{ $document->title }}
                                        </div>
                                    </td>
                                    <td class="px-4 py-3 text-center">
                                        <div class="truncate w-40 overflow-hidden text-ellipsis" title="{{ $document->description }}">
                                            {{ $document->description }}
                                        </div>
                                    </td>                                                                      <td class="px-4 py-3">{{ ucfirst($document->category) }}</td>
                                    <td class="px-4 py-3">{{ $document->year ?? 'N/A' }}</td> <!-- Kolom Years -->
                                    <td class="px-4 py-3">
                                        <span
                                            class="{{ $document->status == 'approved' ? 'bg-green-400' : 'bg-yellow-400' }} text-white px-3 py-1 rounded">
                                            {{ ucfirst($document->status) }}
                                        </span>
                                    </td>
                                    <td class="px-4 py-3">
                                        @if ($document->cover)
                                            <img src="{{ asset('storage/' . $document->cover) }}" alt="Cover Image"
                                                class="w-16 h-16 object-cover rounded-full ">
                                        @else
                                            <span class="text-gray-500">No Cover</span>
                                        @endif
                                    </td>

                                    <td class="px-4 py-3 flex gap-2">
                                        <a href="{{ route('user.mydocuments.edit', $document->id) }}"
                                            class="bg-blue-500 text-white px-3 py-1 rounded">Edit</a>
                                        <form action="{{ route('user.mydocuments.destroy', $document->id) }}"
                                            method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded"
                                                onclick="return confirm('Are you sure?')">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    {{-- <footer class="bg-yellow-400 text-black py-8 px-20">
        <div class="container mx-auto flex flex-col md:flex-row justify-between">
            <div class="mb-6 md:mb-0">
                <img src="{{ asset('images/tech.png') }}" alt="Logo IF" class="inline-block w-20">
                <p class="mt-4">
                    Teknik Informatika<br>
                    Universitas Islam Negeri Sunan Gunung Djati<br>
                    Jalan A.H Nasution No. 105, Cipadung, Cibiru, Kota Bandung, Jawa Barat 40614
                </p>
            </div>
            <div class="mb-6 md:mb-0">
                <h3 class="font-bold mb-4">Layanan Akademik</h3>
                <ul class="space-y-2">
                    <li><a href="#" class="hover:underline">Sistem Informasi Layanan Akademik (SALAM)</a>
                    </li>
                    <li><a href="#" class="hover:underline">Learning Management System (LMS)</a></li>
                    <li><a href="#" class="hover:underline">E-Library UIN Sunan Gunung Djati</a></li>
                    <li><a href="#" class="hover:underline">E-Library Teknik Informatika</a></li>
                    <li><a href="#" class="hover:underline">Jurnal Online Informatika</a></li>
                </ul>
            </div>
            <div>
                <h3 class="font-bold mb-4">Akses Cepat</h3>
                <ul class="space-y-2">
                    <li><a href="#" class="hover:underline">Fakultas Sains Dan Teknologi</a></li>
                    <li><a href="#" class="hover:underline">UIN Sunan Gunung Djati</a></li>
                    <li><a href="#" class="hover:underline">SINTA Dikti Kemdikbud RI</a></li>
                    <li><a href="#" class="hover:underline">Pangkalan Data DIKTI Kemdikbud RI</a></li>
                </ul>
            </div>
        </div>
        <div class="border-t border-black mt-8 pt-4 text-center">
            <p class="text-sm text-center mt-4">
                © Copyrights. All rights reserved. Developed by <span class="font-bold">Rivaldd</span>, Supported
                by <span class="font-bold">Tech Support Informatika</span>
            </p>
        </div>
    </footer> --}}
</x-app-layout>
