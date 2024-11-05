<div class="m-4">
    {{-- If your happiness depenpds on money, you will never be happy with yourself. --}}
    <x-slot name="title">My todos</x-slot>
    @auth
    @if($todos)
           <div  class="w-1/2 rounded mx-auto py-5 px-8 bg-white">
               <input type="text" placeholder="search" wire:model.live="search" class="rounded-2xl w-full">
               <ul>
                   @foreach($todos as $todo)
                       <div class="bg-gray-200 p-3 my-3 rounded" wire:click="showItemModal">
                           <li>{{$todo->title}}</li>
                           <li>{{$todo->description}}</li>
                       </div>

                   @endforeach
               </ul>
           </div>

    @else
        <p>no existing todos</p>
    @endif
    @endauth
    @guest
        <p>You need to logged in <a href="{{route('login')}}">Login</a> or <a href="{{route('register')}}">Register</a></p>
    @endguest
    <x-tmk.modal wire:model="showModal">
        <x-slot name="header">Header</x-slot>
        <p>test</p>
        <x-slot name="footer">Footer</x-slot>
    </x-tmk.modal>
</div>
