<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Users Management') }}
        </h2>
    </x-slot>

    <x-slot name="script">
        <!-- Add any scripts if necessary -->
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Add User Button -->
            <div class="mb-10">
                <a href="{{ route('dashboard.users.create') }}"
                   class="bg-[#facc15] hover:bg-green-700 text-white font-bold py-2 px-4 rounded shadow-lg">
                   + Add User
                </a>
            </div>

            <!-- Table Section -->
            <div class="shadow overflow-hidden sm:rounded-lg">
                <div class="px-4 py-5 bg-white sm:p-6">
                    <table id="crudTable" class="min-w-full table-auto border-collapse border border-gray-200">
                        <thead>
                            <tr class="bg-gray-100 text-gray-700">
                                <th class="px-4 py-3 text-left">ID</th>
                                <th class="px-4 py-3 text-left">Name</th>
                                <th class="px-4 py-3 text-left">Email</th>
                                <th class="px-4 py-3 text-left">Role</th>
                                <th class="px-4 py-3 text-left">Created At</th>
                                <th class="px-4 py-3 text-left">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr class="hover:bg-gray-100 transition duration-150">
                                    <td class="px-4 py-3">{{ $user->id }}</td>
                                    <td class="px-4 py-3">{{ $user->name }}</td>
                                    <td class="px-4 py-3">{{ $user->email ?? '-' }}</td>
                                    <td class="px-4 py-3">{{ $user->roles }}</td>
                                    <td class="px-4 py-3">{{ $user->created_at->format('Y-m-d') }}</td>
                                    <td class="px-4 py-3 flex gap-2">
                                        <a href="{{ route('dashboard.users.edit', $user->id) }}"
                                           class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600">
                                           Edit
                                        </a>
                                        <form action="{{ route('dashboard.users.destroy', $user->id) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600"
                                                onclick="return confirm('Apakah Anda yakin ingin menghapus user ini?');">
                                                Hapus
                                            </button>
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
    
</x-app-layout>
