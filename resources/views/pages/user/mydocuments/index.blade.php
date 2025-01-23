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
            <div class="shadow-lg rounded-lg overflow-hidden">
                <div class="px-4 py-4 bg-white"> <!-- Ubah px-6 menjadi px-4 -->
                    <table id="crudTable" class="min-w-full table-auto border-collapse border border-gray-200">
                        <thead>
                            <tr class="bg-gray-100 text-gray-700">
                                <th class="px-4 py-3 text-left border-b border-gray-200">NIM</th> <!-- Ubah px-6 menjadi px-4 -->
                                <th class="px-4 py-3 text-center border-b border-gray-200">Judul</th>
                                <th class="px-4 py-3 text-center border-b border-gray-200">Deskripsi</th>
                                <th class="px-4 py-3 text-left border-b border-gray-200">Kategori</th>
                                <th class="px-4 py-3 text-left border-b border-gray-200">Tahun</th>
                                <th class="px-4 py-3 text-left border-b border-gray-200">Status</th>
                                <th class="px-4 py-3 text-left border-b border-gray-200">Cover</th>
                                <th class="px-6 py-3 text-left border-b border-gray-200">Aksi</th> <!-- Tetap lebih lebar untuk Aksi -->
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            @foreach ($documents as $document)
                                <tr class="hover:bg-gray-50 transition duration-150">
                                    <td class="px-4 py-3">{{ $document->user->email ?? 'No Email' }}</td>
                                    <td class="px-4 py-3 text-center">
                                        <div class="truncate w-48 overflow-hidden text-ellipsis" title="{{ $document->title }}">
                                            {{ $document->title }}
                                        </div>
                                    </td>
                                    <td class="px-4 py-3 text-center">
                                        <div class="truncate w-48 overflow-hidden text-ellipsis" title="{{ $document->description }}">
                                            {{ $document->description }}
                                        </div>
                                    </td>
                                    <td class="px-4 py-3">{{ ucfirst($document->category) }}</td>
                                    <td class="px-4 py-3">{{ $document->year ?? 'N/A' }}</td>
                                    <td class="px-4 py-3">
                                        <span class="inline-block px-3 py-1 rounded text-white {{ 
                                            $document->status == 'approved' ? 'bg-green-500' : 
                                            ($document->status == 'pending' ? 'bg-yellow-500' : 'bg-red-500') 
                                        }}">
                                            {{ ucfirst($document->status) }}
                                        </span>
                                    </td>
                                    <td class="px-4 py-3">
                                        @if ($document->cover)
                                            <img src="{{ asset('storage/' . $document->cover) }}" alt="Cover Image"
                                                class="w-12 h-14 object-cover rounded-lg border border-gray-200">
                                        @else
                                            <span class="text-gray-500">No Cover</span>
                                        @endif
                                    </td>
                                    <td class="px-6 py-3 flex gap-2"> <!-- Tetap dengan padding lebih besar -->
                                        @if ($document->status !== 'approved')
                                            <a href="{{ route('user.mydocuments.edit', $document->id) }}"
                                                class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-2 rounded shadow">Edit</a>
                                            <form action="{{ route('user.mydocuments.destroy', $document->id) }}" method="POST" class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-3 py-2 rounded shadow"
                                                    onclick="return confirm('Are you sure?')">Hapus</button>
                                            </form>
                                        @else
                                            <span class="bg-gray-400 text-white px-3 py-2 rounded shadow cursor-not-allowed">Edit</span>
                                            <span class="bg-gray-400 text-white px-3 py-2 rounded shadow cursor-not-allowed">Hapus</span>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            
                       
        </div>
    </div>
    
</x-app-layout>
