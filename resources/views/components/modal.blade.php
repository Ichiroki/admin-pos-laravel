@props([
    'name',
    'show' => false,
    'maxWidth' => '2xl'
])

<div x-data="{ showModal: @entangle($show) }">
    <div x-show="showModal" x-on:click.outside="showModal = false" class="fixed inset-0 overflow-y-auto flex items-center justify-center z-50">
        <div class="fixed inset-0 bg-black bg-opacity-50"></div> <!-- Overlay -->
        <div x-show="showModal" x-on:click.stop class="fixed inset-0 transition-opacity" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0 bg-black bg-opacity-50"></div>
        <div x-show="showModal" class="bg-white dark:bg-gray-800 rounded-lg overflow-hidden shadow-xl transform transition-all h-32 flex items-center {{ 'w-'.$maxWidth }} sm:mx-auto" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100" x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100" x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95">
            <div class="p-6">
                {{ $slot }}
            </div>
        </div>
    </div>
</div>
