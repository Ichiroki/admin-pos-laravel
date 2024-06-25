<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h1>Add New Product</h1>
                    <form class="mt-6" action="{{ route('products.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="flex flex-col md:flex-row gap-3 w-full justify-between">
                            <div class="mb-6 md:w-1/2">
                                <x-input-label for="name">Nama Produk</x-input-label>
                                <x-text-input name="name" class="mt-3 w-full">test</x-text-input>
                                @error('name')
                                    <div class="text-rose-500">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="md:w-1/2">
                                <x-input-label for="category">Kategori</x-input-label>
                                <x-text-input name="category" class="mt-3 w-full"></x-text-input>
                            </div>
                        </div>
                        <div class="flex flex-col md:flex-row gap-3 w-full justify-between">
                            <div class="mb-6 md:w-1/2">
                                <x-input-label for="description">Deskripsi</x-input-label>
                                <x-text-input name="description" class="mt-3 w-full">test</x-text-input>
                            </div>
                            <div class="md:w-1/2">
                                <x-input-label for="image">Gambar</x-input-label>
                                <x-text-input name="image" class="mt-3 w-full" type="image" />
                            </div>
                        </div>
                        <div class="flex flex-col md:flex-row gap-3 w-full justify-between">
                            <div class="mb-6 md:w-1/2">
                                <x-input-label for="qty">Quantity</x-input-label>
                                <x-text-input name="qty" class="mt-3 w-full">test</x-text-input>
                            </div>
                            <div class="md:w-1/2">
                                <x-input-label for="discount">Diskon</x-input-label>
                                <x-text-input name="discount" class="mt-3 w-full"></x-text-input>
                            </div>
                        </div>
                        <x-button tag="button" type="submit">Submit</x-button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
