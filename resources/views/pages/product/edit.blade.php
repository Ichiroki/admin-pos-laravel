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
                    <form class="mt-6" action="{{ route('products.update', ["product" => $product->id]) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="flex flex-col md:flex-row gap-3 w-full justify-between mb-6">
                            <div class="mb-3 md:w-1/2">
                                <x-input-label for="name">Nama Produk</x-input-label>
                                <x-text-input type="text" name="name" class="mt-3 w-full" value="{{ $product->name }}"></x-text-input>
                                @error('name')
                                    <div class="text-rose-500">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="md:w-1/2">
                                <x-input-label for="category">Kategori</x-input-label>
                                <x-text-input type="text" name="category" class="mt-3 w-full" value="{{ $product->category }}"></x-text-input>
                                @error('category')
                                    <div class="text-rose-500">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="flex flex-col md:flex-row gap-3 w-full justify-between mb-6">
                            <div class="mb-3 md:w-1/2">
                                <x-input-label for="qty">Quantity</x-input-label>
                                <x-text-input type="text" name="qty" class="mt-3 w-full" value="{{ $product->qty }}"></x-text-input>
                                @error('qty')
                                    <div class="text-rose-500">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="md:w-1/2">
                                <x-input-label for="discount">Diskon</x-input-label>
                                <x-text-input type="number" name="discount" class="mt-3 w-full" value="{{ $product->discount }}"></x-text-input>
                                @error('discount')
                                    <div class="text-rose-500">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                         <div class="flex flex-col gap-3 w-full justify-between">
                            <div class="mb-3 md:w-full">
                                <x-input-label for="description">Deskripsi</x-input-label>
                                <x-textarea name="description" class="w-full">{{ $product->description }}</x-textarea>
                                @error('description')
                                    <div class="text-rose-500">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="">
                                <x-input-label for="image" class="mb-3">Gambar</x-input-label>
                                <img src="{{ asset('images/' . $product->image) }}" alt="Gambar Produk" class="w-32 h-32">
                                <x-text-input type="file" name="image" class="mt-3 w-full px-4 h-16"/>
                                @error('image')
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
