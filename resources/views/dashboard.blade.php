<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if (session('success'))
                {{ session('success') }}
            @endif

            {{-- <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg"> --}}
                {{-- @foreach ($posts as $post) --}}
                {{-- <div class="flex items-center">
                    {{ $post->title }}
                    <a href="{{ route('posts.edit', $post) }}" class="bg-yellow-500 px-2 py-3">Editer {{ $post->title }}</a>
                    <a href="{{ route('posts.show', $post) }}" class="bg-red-500 px-2 py-3 color-withe">Supprimer {{ $post->title }}</a>
                </div> --}}
                @foreach ($posts as $post)
                        
                <div class="mt-6">
                    <div class="max-w-4xl px-10 py-6 mx-auto bg-white rounded-lg shadow-md">
                        <div class="flex items-center justify-between">
                            <span class="font-light text-gray-600">
                                {{ $post->created_at->format('d M Y') }}
                            </span>
                            <a href="#"
                                class="px-2 py-1 font-bold text-gray-100 bg-gray-600 rounded hover:bg-gray-500">
                                {{ $post->category->name }}
                            </a>
                        </div>
                        <div class="mt-2">
                            <a href="#" class="text-2xl font-bold text-gray-700 hover:underline">
                                {{ $post->title }}
                            </a>
                            <p class="mt-2 text-gray-600">
                                {{ Str::limit($post->content, 120)  }}
                            </p>
                        </div>
                        <div class="flex items-center justify-between mt-4">
                            <a href="{{ route('posts.show', $post) }}">
                                Voir plus
                            </a>
                            <a href="{{ route('posts.edit', $post) }}" class="bg-yellow-500 px-2 py-3">Editer {{ $post->title }}</a>
                            <a href="{{ route('posts.show', $post) }}" class="bg-red-500 px-2 py-3 color-withe">Supprimer {{ $post->title }}</a>
                            <div>
                                <a href="#" class="flex items-center"><img
                                        src="https://images.unsplash.com/photo-1492562080023-ab3db95bfbce?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=crop&amp;w=731&amp;q=80"
                                        alt="avatar" class="hidden object-cover w-10 h-10 mx-4 rounded-full sm:block">
                                    <h1 class="font-bold text-gray-700 hover:underline"> {{ $post->user->name }} </h1>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                    
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
