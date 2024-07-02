<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Tambah Metode Pembayaran Baru') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h1>Tambah Metode Pembayaran Baru</h1>
                    <form class="mt-6" action="{{ route('methods.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="flex flex-col md:flex-row gap-3 w-full justify-between mb-6">
                            <div class="mb-3 w-full">
                                <x-input-label for="method_name">Nama Metode Pembayaran</x-input-label>
                                <x-text-input type="text" name="method_name" class="mt-3 w-full" placeholder="Ketikkan metode pembayaran baru disini..."></x-text-input>
                                @error('method_name')
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
