<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Update Document') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div>
                <!-- Form for updating a document -->
                <form class="w-full" action="{{ route('dashboard.documents.update', $document->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf <!-- CSRF Protection -->
                    @method('PUT') <!-- HTTP Method Spoofing -->

                    <!-- Tambahkan Input Hidden untuk Category -->
                    <input type="hidden" name="category" value="{{ old('category', $document->category) }}">

                    <!-- User ID Dropdown -->
                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full px-3">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                for="user_id">
                                User_ID
                            </label>
                            <input list="user_list" name="user_id" id="user_id" placeholder="user_id"
                                class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                value="{{ old('user_id', $document->user_id) }}"
                                {{ empty($users) ? 'disabled' : 'required' }}>
                            <datalist id="user_list">
                                @if (!empty($users) && $users->count())
                                    @foreach ($users as $user)
                                        <option value="{{ $user->id }}"
                                            {{ $document->user_id == $user->id ? 'selected' : '' }}>
                                            {{ $user->name }} (ID: {{ $user->id }})
                                        </option>
                                    @endforeach
                                @else
                                    <option value="">No users available</option>
                                @endif
                            </datalist>
                        </div>
                    </div>

                    <!-- nim -->
                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full px-3">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                for="nim">
                                NIM
                            </label>
                            <input name="nim"
                                class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                id="nim" type="text" placeholder="NIM" value="{{ old('nim', $document->nim) }}"
                                required>
                        </div>
                    </div>

                    <!-- Angkatan -->
                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full px-3">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                for="year">
                                Angkatan
                            </label>
                            <input name="year"
                                class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                id="year" type="text" placeholder="year"
                                value="{{ old('year', $document->year) }}">
                        </div>
                    </div>

                    <!-- Title input -->
                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full px-3">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                for="title">
                                Title
                            </label>
                            <input name="title"
                                class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                id="title" type="text" placeholder="Document Title"
                                value="{{ old('title', $document->title) }}" required>
                        </div>
                    </div>

                    <!-- Description input -->
                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full px-3">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                for="description">
                                Description
                            </label>
                            <textarea name="description"
                                class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                id="description" rows="5" placeholder="Write your description here..." required>{{ old('description', $document->description) }}</textarea>
                        </div>
                    </div>

                    <!-- Status selection -->
                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full px-3">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                for="status">
                                Status
                            </label>
                            <select name="status"
                                class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                id="status" required>
                                <option value="pending"
                                    {{ old('status', $document->status) == 'pending' ? 'selected' : '' }}>Pending
                                </option>
                                <option value="approved"
                                    {{ old('status', $document->status) == 'approved' ? 'selected' : '' }}>Approved
                                </option>
                                <option value="rejected"
                                    {{ old('status', $document->status) == 'rejected' ? 'selected' : '' }}>Rejected
                                </option>
                            </select>
                        </div>
                    </div>

                    <!-- Submission Date -->
                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full px-3">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                for="submission_date">
                                Submission Date
                            </label>
                            <input name="submission_date"
                                class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                id="submission_date" type="date"
                                value="{{ old('submission_date', date('Y-m-d', strtotime($document->submission_date))) }}"
                                readonly>
                        </div>
                    </div>

                    <!-- Review Date -->
                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full px-3">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                for="review_date">
                                Review Date
                            </label>
                            <input name="review_date"
                                class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                id="review_date" type="date"
                                value="{{ old('review_date', $document->review_date ? date('Y-m-d', strtotime($document->review_date)) : '') }}"
                                readonly>
                        </div>
                    </div>


                    <!-- Upload Cover -->
                    <div class="mb-4">
                        <label for="cover" class="block text-sm font-medium text-gray-700 mb-2">Upload Cover</label>
                        <div
                            class="relative border-2 border-dashed border-gray-300 rounded-lg p-4 text-center hover:border-indigo-500 transition duration-200">
                            <input type="file" name="cover" id="cover" accept="image/png"
                                class="absolute inset-0 w-full h-full opacity-0 cursor-pointer">
                            <div class="flex items-center justify-center">
                                <svg class="w-8 h-8 text-gray-400 mr-2" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 4v16m8-8H4" />
                                </svg>
                                <span class="text-gray-600">Pilih file Image untuk cover</span>
                            </div>
                        </div>
                        @if ($document->cover)
                            <p class="mt-2 text-sm text-gray-600">File saat ini: {{ $document->cover }}</p>
                        @endif
                    </div>

                    <!-- Upload File PDF -->
                    <div class="mb-4">
                        <label for="file" class="block text-sm font-medium text-gray-700 mb-2">Upload File
                            PDF</label>
                        <div
                            class="relative border-2 border-dashed border-gray-300 rounded-lg p-4 text-center hover:border-indigo-500 transition duration-200">
                            <input type="file" name="file" id="file" accept="application/pdf"
                                class="absolute inset-0 w-full h-full opacity-0 cursor-pointer">
                            <div class="flex items-center justify-center">
                                <svg class="w-8 h-8 text-gray-400 mr-2" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 4v16m8-8H4" />
                                </svg>
                                <span class="text-gray-600">Pilih file PDF</span>
                            </div>
                        </div>
                        @if ($document->file_path)
                            <p class="mt-2 text-sm text-gray-600">File saat ini: {{ $document->file_path }}</p>
                        @endif
                    </div>

                    <div class="flex justify-end">
                        <a href="{{ route('dashboard.documents.index') }}"
                            class="bg-gray-500 text-white py-2 px-4 rounded shadow-sm hover:bg-gray-700">
                            Batal
                        </a>
                        <button type="submit"
                            class="ml-3 bg-blue-500 text-white py-2 px-4 rounded shadow-sm hover:bg-blue-700">
                            Update
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
