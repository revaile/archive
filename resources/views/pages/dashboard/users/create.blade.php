<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {!! __('Create Users') !!}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div>
                <!-- Form for creating a new user -->
                <form class="w-full" action="{{ route('dashboard.users.store') }}" method="post">
                    @csrf  <!-- CSRF Protection -->

                    <!-- Name input -->
                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full px-3">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="name">
                                Name
                            </label>
                            <input name="name"
                                class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                id="name" type="text" placeholder="User Name" value="{{ old('name') }}" required>
                        </div>
                    </div>

                    <!-- Role selection -->
                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full px-3">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="roles">
                                Role
                            </label>
                            <select name="roles"
                                class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                id="roles" required>
                                <option value="user" {{ old('roles') == 'user' ? 'selected' : '' }}>User</option>
                                <option value="admin" {{ old('roles') == 'admin' ? 'selected' : '' }}>Admin</option>
                            </select>
                        </div>
                    </div>

                    <!-- Email input -->
                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full px-3">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="email">
                                Email
                            </label>
                            <input name="email"
                                class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                id="email" type="email" placeholder="Email Address" value="{{ old('email') }}" required>
                        </div>
                    </div>

                    <!-- Password input -->
                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full px-3">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="password">
                                Password
                            </label>
                            <input name="password"
                                class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                id="password" type="password" placeholder="Enter Password" required>
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full px-3 text-right">
                            <button type="submit"
                                class="shadow-lg bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                                Save User
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
