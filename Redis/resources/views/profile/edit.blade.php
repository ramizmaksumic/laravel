<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <header class="mb-6">
                    <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                        Profilna slika
                    </h2>
                    <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                        Uploadujte novu profilnu sliku (JPG, PNG, max 4MB).
                    </p>
                </header>

                <div>
                    <img src="/storage/images/avatars/{{ Auth::user()->image }}" alt="Profilna slika" class="w-32 h-32 rounded-full object-cover mt-4">
                </div>

                <form action="{{ route('profile.changeAvatar') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                    @csrf

                    {{-- Current photo --}}
                    <div class="flex items-center gap-4">

                        <div class="flex-1">
                            <label for="photo" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                Nova slika
                            </label>

                            <input
                                id="photo"
                                name="photo"
                                type="file"
                                accept="image/png,image/jpeg,image/jpg"
                                class="mt-2 block w-full text-sm text-gray-700 dark:text-gray-300
                           file:mr-4 file:rounded-lg file:border-0
                           file:bg-indigo-600 file:px-4 file:py-2 file:text-sm file:font-semibold file:text-white
                           hover:file:bg-indigo-700
                           focus:outline-none"
                                required>

                            @error('photo')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    {{-- Submit --}}
                    <div class="flex items-center justify-end gap-3">
                        <button
                            type="submit"
                            class="inline-flex items-center justify-center rounded-xl bg-indigo-600 px-5 py-3 text-sm font-semibold text-white shadow-sm
                       transition hover:bg-indigo-700 focus:outline-none focus:ring-4 focus:ring-indigo-500/30">
                            Upload
                        </button>
                    </div>
                </form>
            </div>

            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>