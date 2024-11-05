@props([
    'type'=>'neutral',

])
@php
    $type_options=[
        'neutral'=>'bg-gray-500',
        'success'=>'bg-green-700',
        'warning'=>'bg-red-700',
        "confirm"=>"bg-blue-600 hover:bg-blue-800"
];
$style=$type_options[$type];
@endphp
<button  {{ $attributes->merge(['class'=>'px-5 py-2  text-white '.$style])}}>{{$slot}}</button>