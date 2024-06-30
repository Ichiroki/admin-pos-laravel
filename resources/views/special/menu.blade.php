<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-gray-900 antialiased">
        <div class="bg-gray-400 flex items-center justify-center h-screen">
            <div class="border-gray-500 bg-gray-300 md:min-h-[37rem] w-full md:w-11/12 md:rounded-lg shadow-lg flex flex-col md:flex-row justify-between overflow-hidden relative min-h-screen">
                <div class="p-5 w-full md:w-9/12">asdfsdaf</div>
                <div class="p-5 w-full md:w-3/12 bg-gray-50 md:flex flex-col items-center justify-between hidden" id="cart">
                    <h1 class="border-b-2 border-gray-300 block w-full text-center text-2xl font-bold uppercase mb-3 pb-3">Cart</h1>
                    <div>Test</div>
                    <div class="border-t-2 border-gray-300 font-bold uppercase mt-3 pt-3 w-full text-center">
                        <button type="button" class="border-2 border-green-500 px-3 py-2 rounded-md hover:bg-green-500 group transition-all duration-150">
                            <i class="bi bi-cart-check-fill group-hover:text-white transition-all duration-150"></i>
                            <span class="group-hover:text-white transition-all duration-150 font-semibold">Checkout</span>
                        </button>
                    </div>
                </div>
                <div x-data="{ showResponsiveCart: false }">
                    <button type="button" class="rounded-full px-6 py-5 bg-white absolute bottom-7 right-7 hover:ring-4 hover:ring-gray-600 transition" id="floating-btn" @click=" showResponsiveCart = ! showResponsiveCart ">
                        <i class="bi bi-cart-check-fill group-hover:text-white transition-all duration-150"></i>
                    </button>
                    <div x-show="showResponsiveCart" >
                        <div id="overlay" class="bg-gray-50 absolute top-0 w-full bg-[rgba(0,0,0,.5)] p-5 h-screen z-10">
                        asdfsadf</div>
                        {{-- <div class="bg-white rounded-md h-screen">
                            <div class="p-5 relative">
                                <button type="button" class="absolute top-5 right-5" x-on:click="showResponsiveCart = false">
                                    <i class="bi bi-x-circle text-2xl"></i>
                                </button>
                                <h1 class="border-b-2 border-gray-300 block w-full text-center text-2xl font-bold uppercase mb-3 pb-3">Cart</h1>
                                <div>Test</div>
                                <div class="border-t-2 border-gray-300 font-bold uppercase mt-3 pt-3 w-full text-center">
                                    <button type="button" class="border-2 border-green-500 px-3 py-2 rounded-md hover:bg-green-500 group transition-all duration-150">
                                        <i class="bi bi-cart-check-fill group-hover:text-white transition-all duration-150"></i>
                                        <span class="group-hover:text-white transition-all duration-150 font-semibold">Checkout</span>
                                    </button>
                                </div>
                            </div>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>

