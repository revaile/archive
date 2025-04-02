<table id="crudTable" class="min-w-full table-auto border-collapse border border-gray-200">
    <thead>
        <tr class="bg-gray-100 text-gray-700">
            <th class="px-2 py-3 text-left border-b border-gray-200">Nim</th>
            <th class="px-2 py-3 text-center border-b border-gray-200">Angkatan</th>
            <th class="px-2 py-3 text-center border-b border-gray-200">Judul</th>
            <th class="px-2 py-3 text-center border-b border-gray-200">Kategori</th>
            <th class="px-2 py-3 text-center border-b border-gray-200">Deskripsi</th>
            <th class="px-2 py-3 text-left border-b border-gray-200">Status</th>
            <th class="px-2 py-3 text-left border-b border-gray-200">Cover</th>
            <th class="px-4 py-3 text-left border-b border-gray-200">Aksi</th>
        </tr>
    </thead>
    <tbody class="divide-y divide-gray-200">
        @foreach ($documents as $document)
            <tr class="hover:bg-gray-50 transition duration-150">
                <td class="px-2 py-3">{{ $document->user ? $document->user->email : 'N/A' }}</td>
                <td class="px-2 py-3 text-center">{{ $document->year ?? 'N/A' }}</td>
                <td class="px-2 py-3 text-center">
                    <div class="truncate w-48 overflow-hidden text-ellipsis" title="{{ $document->title }}">
                        {{ $document->title }}
                    </div>
                </td>
                <td class="px-2 py-3 text-center">{{ ucfirst($document->category) }}</td>
                <td class="px-2 py-3 text-center">
                    <div class="truncate w-48 overflow-hidden text-ellipsis" title="{{ $document->description }}">
                        {{ $document->description }}
                    </div>
                </td>
                <td class="px-2 py-3">
                    @if ($document->file_path)
                        <a href="{{ route('dashboard.documents.status', $document->id) }}"
                            class="inline-block px-3 py-1 rounded text-white font-semibold {{ 
                                $document->status == 'pending' ? 'bg-yellow-500 hover:bg-yellow-600' : 
                                ($document->status == 'approved' ? 'bg-green-500 hover:bg-green-600' : 
                                ($document->status == 'rejected' ? 'bg-red-500 hover:bg-red-600' : 'bg-gray-500')) }}">
                            {{ ucfirst($document->status) }}
                        </a>
                    @else
                        <span class="text-yellow-500 font-bold">No Document Uploaded</span>
                    @endif
                </td>
                <td class="px-2 py-3">
                    @if ($document->cover)
                        <img src="{{ asset('storage/' . $document->cover) }}" alt="Cover Image"
                            class="w-12 h-14 object-cover rounded-lg border border-gray-200">
                    @else
                        <span class="text-gray-500">No Cover</span>
                    @endif
                </td>
                <td class="px-4 py-3 flex gap-2">
                    <a href="{{ route('dashboard.documents.edit', $document->id) }}"
                        class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-2 rounded shadow">Edit</a>
                    <form action="{{ route('dashboard.documents.destroy', $document->id) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-3 py-2 rounded shadow"
                            onclick="return confirm('Are you sure?')">Hapus</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

<div class="mt-4">
    {{ $documents->links() }}
</div>
