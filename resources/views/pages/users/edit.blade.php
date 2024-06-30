<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Tambah Produk') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h1>Edit User</h1>
                    <form class="mt-6" action="{{ route('users.update', ['user' => $user->id]) }}" method="post" enctype="multipart/form-data">
                        @method('put')
                        @csrf
                        <div class="flex flex-col gap-3 w-full justify-between mb-6">
                            <div class="mb-3">
                                <x-input-label for="name">Nama</x-input-label>
                                <x-text-input type="text" name="name" class="mt-3 w-full" value="{{ $user->name }}"></x-text-input>
                                @error('name')
                                    <div class="text-rose-500">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <x-input-label for="email">Email</x-input-label>
                                <x-text-input type="email" name="email" class="mt-3 w-full" value="{{ $user->email }}"></x-text-input>
                                @error('email')
                                    <div class="text-rose-500">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="">
                                <x-input-label for="password">Password</x-input-label>
                                <x-text-input type="password" name="password" class="mt-3 w-full" value="{{ $user->password }}"></x-text-input>
                                @error('password')
                                    <div class="text-rose-500">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <x-button tag="button" type="submit">Submit</x-button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
