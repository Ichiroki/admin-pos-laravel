<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Metode Pembayaran') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="mb-6 flex justify-between gap-3 items-center">
                        <p>Daftar Metode Pembayaran</p>
                        <x-button route="{{ route('methods.create') }}">Buat Metode Baru</x-button>
                    </div>
                    <div class="overflow-auto">
                        @if(session('success'))
                            <div x-data="{ open: true }">
                                <div class="bg-green-300/40 border-2 border-green-400 py-3 px-3 rounded-md text-gray-800 flex items-center flex-row justify-between" x-show="open">
                                <div>
                                    <i class="bi bi-exclamation-circle-fill mr-2"></i>
                                    {{ session('success') }}
                                </div>
                                    <i class="bi bi-x-lg cursor-pointer" @click="open = ! open"></i>
                                </div>
                            </div>
                        @endif
                        <table class="items-center bg-transparent w-full border-collapse">
                            <thead>
                                <tr>
                                    <th class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                    No
                                    </th>
                                    <th class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                    Nama Metode
                                    </th>
                                    <th class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                    Aksi
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($methods as $method)
                                <tr>
                                    <th class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 text-left text-blueGray-700 ">
                                    {{ $loop->iteration }}
                                    </th>
                                    <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 ">
                                    {{ $method->method_name }}
                                    </td>
                                    <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 flex gap-3">
                                        <x-button tag="link" route="{{ route('methods.edit', ['method' => $method->id]) }}">Edit</x-button>
                                        <div x-data="{ showModal: false }">
                                            <x-button tag="button" x-on:click="showModal = true">Delete</x-button>
                                            <x-modal name="delete-modal" show="$entangle('showModal')">
                                                <p class="mb-6">Are you sure you want to delete this method?</p>
                                                    <form action="{{ route('methods.destroy', ['method' => $method->id]) }}" method="post">
                                                        @csrf
                                                        @method('delete')
                                                        <div class="flex items-center justify-between flex-row">
                                                            <x-button tag="button" x-on:click="showModal = false">Cancel</x-button>
                                                            <x-button tag="button" type="submit">Delete</x-button>
                                                        </div>
                                                    </form>
                                            </x-modal>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

