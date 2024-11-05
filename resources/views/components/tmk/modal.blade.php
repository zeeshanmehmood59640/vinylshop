<div {{--x-data="{ open: @entangle('showModal') }" --}}
     x-data="{ open: @entangle($attributes->wire('model')) }"
     x-show="open" class="text-left fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50"
     style="display: none;">
    <div class="bg-white rounded-lg shadow-lg w-full max-w-lg p-6">
        <div class="mb-4 flex justify-between">
            {{ $header }}
            <button @click="open = false" class="text-gray-600 text-3xl hover:text-gray-900 font-bold"> &times;</button>
        </div>
        <div class="mt-4">
            {{ $slot }}
        </div>
        <div class="mt-6 flex justify-end">
            {{ $footer }}
        </div>
    </div>
</div>
