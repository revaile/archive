<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Documents') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <!-- Create Document Buttons -->
            <div class="mb-10 flex gap-5">
                <a href="{{ route('dashboard.documents.create', ['category' => 'kp']) }}"
                    class="bg-[#facc15] hover:bg-green-700 text-white font-bold py-2 px-4 rounded shadow-lg">
                    + Create KP
                </a>
                <a href="{{ route('dashboard.documents.create', ['category' => 'proposal']) }}"
                    class="bg-[#facc15] hover:bg-green-700 text-white font-bold py-2 px-4 rounded shadow-lg">
                    + Create Proposal
                </a>
                <a href="{{ route('dashboard.documents.create', ['category' => 'skripsi']) }}"
                    class="bg-[#facc15] hover:bg-green-700 text-white font-bold py-2 px-4 rounded shadow-lg">
                    + Create Skripsi
                </a>
            </div>

            <!-- Search Box untuk KP -->
            <!-- Search Box untuk KP -->
            <div class="flex justify-between mb-7">
                <form method="GET" action="{{ route('index') }}"
                    class="relative flex flex-wrap gap-2 w-full items-center">
                    <input type="text" name="search" placeholder="Search Documents" value="{{ request('search') }}"
                        class="flex-1 min-w-[150px] lg:w-auto px-3 py-2 pr-10 rounded-md shadow focus:outline-none focus:ring-2 focus:ring-blue-500 text-gray-700" />

                    <select name="category"
                        class="flex-1 min-w-[120px] lg:w-auto px-3 py-2 rounded-md shadow focus:outline-none focus:ring-2 focus:ring-blue-500 text-gray-700">
                        <option value="">Pilih Kategori</option>
                        <option value="kp" {{ request('category') == 'kp' ? 'selected' : '' }}>Kerja Praktek
                        </option>
                        <option value="skripsi" {{ request('category') == 'skripsi' ? 'selected' : '' }}>Skripsi
                        </option>
                        <option value="proposal" {{ request('category') == 'proposal' ? 'selected' : '' }}>Proposal
                        </option>
                    </select>

                    <select name="year"
                        class="flex-1 min-w-[100px] lg:w-auto px-3 py-2 rounded-md shadow focus:outline-none focus:ring-2 focus:ring-blue-500 text-gray-700">
                        <option value="">Pilih Tahun</option>
                        @foreach ($years as $year)
                            <option value="{{ $year }}" {{ request('year') == $year ? 'selected' : '' }}>
                                {{ $year }}</option>
                        @endforeach
                    </select>

                    <select name="status"
                        class="flex-1 min-w-[120px] lg:w-auto px-3 py-2 rounded-md shadow focus:outline-none focus:ring-2 focus:ring-blue-500 text-gray-700">
                        <option value="">Pilih Status</option>
                        <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                        <option value="approved" {{ request('status') == 'approved' ? 'selected' : '' }}>Approved
                        </option>
                        <option value="rejected" {{ request('status') == 'rejected' ? 'selected' : '' }}>Rejected
                        </option>
                    </select>

                    <div class="flex gap-2">
                        <button type="submit"
                            class="px-4 py-2 bg-blue-500 text-white rounded-md shadow hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500">
                            Apply
                        </button>
                        <a href="{{ route('dashboard.documents.index') }}"
                            class="px-4 py-2 bg-gray-500 text-white rounded-md shadow hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-gray-500">
                            Reset
                        </a>
                    </div>
                </form>
            </div>



            <!-- Documents Table -->
            <div class="shadow overflow-hidden sm:rounded-lg">
                <div class="px-4 py-5 bg-white sm:p-6">
                    <table id="crudTable" class="min-w-full table-auto border-collapse border border-gray-200">
                        <thead>
                            <tr class="bg-gray-100 text-gray-700">
                                <th class="px-4 py-3 text-left">Nim</th>
                                <th class="px-4 py-3 text-left">Angkatan</th> <!-- Tambahkan Kolom Baru -->
                                <th class="px-4 py-3 text-left">Judul</th>
                                <th class="px-4 py-3 text-center">Kategori</th>
                                <th class="px-4 py-3 text-center">Deskripsi</th>
                                <th class="px-4 py-3 text-left">Status</th>
                                <th class="px-4 py-3 text-left">Cover</th>
                                <th class="px-4 py-3 text-left">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($documents as $document)
                                <tr class="hover:bg-gray-100 transition duration-150">
                                    <td class="px-4 py-3">{{ $document->user ? $document->user->email : 'N/A' }}</td>
                                    <td class="px-4 py-3">{{ $document->year ?? 'N/A' }}</td> <!-- Kolom Years -->
                                    <td class="px-4 py-3 truncate max-w-[7rem]" title="{{ $document->title }}">
                                        {{ $document->title }}
                                    </td>
                                    <td class="px-4 py-3 text-center">{{ ucfirst($document->category) }}</td>
                                    <td class="px-4 py-3 text-center">
                                        <div class="truncate w-40" title="{{ $document->description }}">
                                            {{ $document->description }}
                                        </div>
                                    </td>
                                    <td class="px-4 py-3">
                                        @if ($document->file_path)
                                            <a href="{{ route('dashboard.documents.status', $document->id) }}"
                                                class="px-3 py-1 rounded text-white font-semibold
                                                    {{ $document->status == 'pending'
                                                        ? 'bg-yellow-500 hover:bg-yellow-600'
                                                        : ($document->status == 'approved'
                                                            ? 'bg-green-500 hover:bg-green-600'
                                                            : ($document->status == 'rejected'
                                                                ? 'bg-red-500 hover:bg-red-600'
                                                                : 'bg-gray-500')) }}">
                                                {{ ucfirst($document->status) }}
                                            </a>
                                        @else
                                            <span class="text-yellow-500 font-bold">No Document Uploaded</span>
                                        @endif
                                    </td>
                                    <td class="px-4 py-3">
                                        <img src="{{ asset('storage/' . $document->cover) }}" alt="Cover Image"
                                            class="w-16 h-16 object-cover rounded-full ">
                                    </td>
                                    <td class="px-4 py-3 flex gap-2">
                                        <a href="{{ route('dashboard.documents.edit', $document->id) }}"
                                            class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600">
                                            Edit
                                        </a>

                                        <form action="{{ route('dashboard.documents.destroy', $document->id) }}"
                                            method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600"
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
                    <!-- Add Document Count Display -->
                    <div class="mb-4">
                        <p class="text-gray-700 font-semibold">
                            Total Documents: {{ $documents->total() }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
