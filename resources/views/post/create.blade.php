{{-- <div class="max-w-4xl px-10 my-4 py-6 bg-white rounded-lg shadow-md"> --}}

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Créer un post') }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        
        <div class="my-5">
        @foreach ($errors->all() as $error)
            <span class="block text-red-500">{{ $error }}</span>
        @endforeach
        </div>
        

        <form action="{{ route('posts.store') }}" method="post" enctype="multipart/form-data" class ="mt-10">
            
            @csrf
        
            <x-input-label for="title" value="Titre" />
            <x-text-input id="title" name="title" />

            <x-input-label for="content" value="Contenu du post" />
            <textarea name="content" id="content" ></textarea>
            
            <x-input-label for="image" value="Image" />
            <x-text-input id="image" type="file" name="image" />

            <x-input-label for="category" value="Catégorie" />
            <select name="category" id="category">
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}"> {{ $category->name }}</option>
                @endforeach
            </select>

            <x-button style="display: block !important" class="mt-5">Créer mon post</x-button>

        </form>

    </div>
</x-app-layout>