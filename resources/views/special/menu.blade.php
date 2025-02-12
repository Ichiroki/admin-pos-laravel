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
        <a href="{{ route('dashboard') }}" class="text-gray-400 underline absolute text-sm cursor-default"><< Get back to dashboard</a>
        <div class="bg-gray-400 flex items-center justify-center h-screen overflow-y-hidden">
            <div class="border-gray-500 bg-gray-300 md:min-h-[37rem] w-full md:w-11/12 md:rounded-lg shadow-lg flex flex-col md:flex-row justify-between overflow-hidden relative min-h-screen" x-data="cartSystem()">
                <div class="p-5 w-full md:w-9/12">
                    <div class="bg-gray-50 md:rounded-lg p-5 h-full overflow-auto">
                        <h1 class="text-2xl font-semibold uppercase mb-3 block w-full border-b-2 border-gray-300 pb-3">Pilih Menu</h1>
                        <div class="flex flex-col justify-between h-[500px] overflow-y-auto" id="menu-list">
                            @if(count($foods) > 0)
                            <h1 class="text-xl border-b-4 border-gray-300 w-fit mb-6">Makanan</h1>
                            <div class="flex flex-row flex-wrap gap-3">
                                @foreach ($foods as $food)
                                <div class="flex flex-col items-center border border-gray-300 xl:w-56 lg:w-36 rounded-lg mb-6 overflow-hidden">
                                    <img src="{{asset('images/'. $food->image)}}" class="h-52">
                                    <div class="p-2">
                                        <div class="mt-2 text-center">
                                            <h1>{{ $food->name }}</h1>
                                            <p>Rp. {{ $food->price }}</p>
                                        </div>
                                        <div class="mt-2">
                                            <button type="button" class="border-2 border-green-500 px-3 py-1 rounded-md hover:bg-green-500 group transition-all duration-150" id="cart-btn" x-on:click="addToCart({{ json_encode($food) }})">
                                                <i class="bi bi-plus group-hover:text-white transition-all duration-150 text-sm"></i>
                                                <span class="group-hover:text-white transition-all duration-150 font-semibold text-sm">Tambah</span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            @endif
                            @if(count($drinks) > 0)
                            <h1 class="text-xl border-b-4 border-gray-300 w-fit mb-6">Minuman</h1>
                            <div class="flex flex-row gap-3">
                                @foreach ($drinks as $drink)
                                <div class="flex flex-col items-center border border-gray-300 w-1/4 rounded-lg mb-6 overflow-hidden">
                                    <img src="{{asset('images/'. $drink->image)}}" class="h-52">
                                    <div class="p-2">
                                        <div class="mt-2">
                                            <h1>{{ $drink->name }}</h1>
                                        </div>
                                        <div class="mt-2">
                                            <button type="button" class="border-2 border-green-500 px-3 py-1 rounded-md hover:bg-green-500 group transition-all duration-150" id="cart-btn" x-on:click="addToCart({{ json_encode($drink) }})">
                                                <i class="bi bi-plus group-hover:text-white transition-all duration-150 text-sm"></i>
                                                <span class="group-hover:text-white transition-all duration-150 font-semibold text-sm">Tambah</span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="p-5 w-full md:w-3/12 bg-gray-50 md:flex flex-col items-center justify-between hidden overflow-hidden" id="cart">
                    <div class="w-full overflow-auto">
                        <h1 class="border-b-2 border-gray-300 block w-full text-center text-2xl font-bold uppercase mb-3 pb-3">Cart</h1>
                        <div id="cart" class="w-full overflow-auto flex flex-col gap-3 h-[500px]">
                            <div class="flex flex-row border w-full justify-between h-16 rounded-md">
                                <div class="flex flex-row">
                                    <img src={{ asset('images/NLE-4qcsjFklaR-quasong.jpg') }} class="w-16"/>
                                    <div class="flex flex-col ml-3 justify-center">
                                        <p>Quaso</p>
                                        <p>Rp. 10000</p>
                                    </div>
                                </div>
                                <div class="flex flex-row items-center justify-between gap-3 mr-3">
                                    <button type="button" class="border-2 border-rose-500 px-2 py-1 rounded-md hover:bg-rose-500 group transition-all duration-150">
                                        <i class="bi bi-dash group-hover:text-white transition-all duration-150"></i>
                                    </button>
                                    <button type="button" class="border-2 border-green-500 px-2 py-1 rounded-md hover:bg-green-500 group transition-all duration-150">
                                        <i class="bi bi-plus group-hover:text-white transition-all duration-150"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="border-t-2 border-gray-300 font-bold uppercase mt-3 pt-3 w-full text-center">
                        <div>
                            <button type="button" class="border-2 border-green-500 px-3 py-2 rounded-md hover:bg-green-500 group transition-all duration-150">
                                <i class="bi bi-cart-check-fill group-hover:text-white transition-all duration-150"></i>
                                <span class="group-hover:text-white transition-all duration-150 font-semibold">Checkout</span>
                            </button>
                        </div>
                    </div>
                </div>
                {{-- <div x-data="{ showResponsiveCart: false }" class="block md:hidden">
                    <button type="button" class="rounded-full px-6 py-5 bg-white absolute bottom-7 right-7 hover:ring-4 hover:ring-gray-600 transition" id="floating-btn" @click=" showResponsiveCart = ! showResponsiveCart ">
                        <i class="bi bi-cart-check-fill group-hover:text-white transition-all duration-150"></i>
                    </button>
                    <div x-show="showResponsiveCart">
                        <div id="overlay" class="bg-gray-50 absolute top-0 w-full bg-[rgba(0,0,0,.5)] p-5 h-screen z-10">
                        asdfsadf</div> --}}
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
        <script>
        var foods = {{ Illuminate\Support\Js::from($foods) }}
        let drinks = {{ Illuminate\Support\Js::from($drinks) }}
        let desserts = {{ Illuminate\Support\Js::from($desserts) }}

        document.addEventListener('alpine:init', () => {
            Alpine.data('cartSystem', () => {
                return {
                    cart: [],
                    products: [foods, drinks, desserts],
                    addToCart(product) {
                        let item = this.cart.find(item => item.id === product.id)
                        if(item) {
                            item.quantity++
                        } else {
                            this.cart.push({...product, quantity: 1})
                        }
                    },
                    removeFromCart(index) {
                        this.cart.splice(index, 1)
                    }
                }
            })
        })
        </script>
    </body>
</html>

