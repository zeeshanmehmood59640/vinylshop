<div>
    <h2>Records</h2>
    <div class="my-4">{{ $records->links() }}</div>
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 mb-8">
        @foreach ($records as $record)
            <div class="flex space-x-4 {{$record->stock>0 ? "bg-white":"bg-red-100"}} shadow-md rounded-lg p-4 ">
                <div class="inline flex-none w-48">
                    <img src="{{ $record->cover }}" alt="">
                </div>
                <div class="flex-1 relative">
                    <p class="text-lg font-medium">{{ $record->artist }}</p>
                    <p class="italic text-right pb-2 mb-2 border-b border-gray-300">{{ $record->title }}</p>
                    <p>{{ $record->genre_name }}</p>
                    <p>Price: {{ $record->price_euro }}</p>
                    @if($record->stock > 0)
                        <p>Stock: {{ $record->stock }}</p>
                    @else
                        <p class="absolute bottom-4 right-0 -rotate-12 font-bold text-red-500">SOLD OUT</p>
                    @endif
                    <a href="{{$record->listen_url}}" target="_blank"><x-si-musicbrainz class="w-6 hover:text-red-600" /></a>
                </div>
            </div>
        @endforeach
    </div>
    <div class="my-4">{{ $records->links() }}</div>
    <x-tmk.livewire-log :records="$records" />
</div>
