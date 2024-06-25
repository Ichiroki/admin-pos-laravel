@props(['tag' => 'link', 'route', 'type'])

@if($tag === "link")
    <a href="{{ $route }}" {{$attributes->merge(['class' => "block w-fit p-3 py-1 shadow-lg shadow-gray-500/50 bg-black text-white rounded-lg text-[15px] cursor-pointer active:scale-[.97]"])}}>{{ $slot }}</a>
@elseif ($tag === "button")
    <button {{$attributes->merge(['type' => $type,'class' => 'block w-fit p-3 py-1 shadow-lg shadow-gray-500/50 bg-black text-white rounded-lg text-[15px] cursor-pointer active:scale-[.97]'])}}>{{ $slot }}</button>
@endif
