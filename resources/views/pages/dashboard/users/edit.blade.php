<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('User "' . old('name', $user->name) . '" Edit') }}
        </h2>
    </x-slot>
    
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div>   

                <form class="w-full" action="{{ route('dashboard.users.update', $user->id) }}" method="post">
                    @csrf
                    @method('PUT')

                    <!-- Name -->
                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full px-3">
                            <label for="name"
                                class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                                Name
                            </label>
                            <input name="name" id="name" type="text" placeholder="User Name"
                                class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                value="{{ old('name', $user->name) }}" required>
                        </div>
                    </div>

                    <!-- Role -->
                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full px-3">
                            <label for="roles"
                                class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                                Role
                            </label>
                            <select name="roles" id="roles" required
                                class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                                <option value="user" {{ old('roles', $user->roles) == 'user' ? 'selected' : '' }}>User
                                </option>
                                <option value="admin" {{ old('roles', $user->roles) == 'admin' ? 'selected' : '' }}>
                                    Admin</option>
                            </select>
                        </div>
                    </div>

                    <!-- Email -->
                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full px-3">
                            <label for="email"
                                class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                                Email
                            </label>
                            <input name="email" id="email" type="email" placeholder="Email Address"
                                class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                value="{{ old('email', $user->email) }}" required>
                        </div>
                    </div>

                    <!-- Password -->
                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full px-3">
                            <label for="password"
                                class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                                Password (Leave blank to keep current password)
                            </label>
                            <input name="password" id="password" type="password" placeholder="Enter New Password"
                                class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full px-3 text-right">
                            <button type="submit"
                                class="shadow-lg bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                                Update User
                            </button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>
