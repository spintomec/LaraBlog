{{-- <div class="max-w-4xl px-10 my-4 py-6 bg-white rounded-lg shadow-md"> --}}

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __($post->title) }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        
       <img src="{{ asset('/storage/' . $post->image) }}" alt="">
        <div>
            {{ $post->content }}
       </div>

    </div>
</x-app-layout>