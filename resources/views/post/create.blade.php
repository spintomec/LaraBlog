{{-- <div class="max-w-4xl px-10 my-4 py-6 bg-white rounded-lg shadow-md"> --}}

<x-app-layout>
    <x-slot name="header">
        <h2 class="text-center font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Créer un post') }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        
        <div class="my-5">
        @foreach ($errors->all() as $error)
            <span class="block text-red-500">{{ $error }}</span>
        @endforeach
        </div>

    </div>

    <div class="flex items-center justify-center">
        <div class="mx-auto w-full max-w-[550px]">
            <form action="{{ route('posts.store') }}" method="post" enctype="multipart/form-data" class ="mt-10">

            @csrf

            <div class="mb-3">
            <!-- Titre -->
            <x-input-label for="title" value="Titre du post" 
                for="name"
                class="mb-3 block text-base font-medium text-[#07074D]"
                />
            <x-text-input id="title" name="title" aria-placeholder="Titre"
                placeholder="Titre du post"
                class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
            />

            </div>
            <div class="mb-3">
            <x-input-label for="content" value="Contenu du post" class="mb-3 block text-base font-medium text-[#07074D]"/>
            <textarea
                rows="4"
                name="content"
                id="content"
                placeholder="Contenu du post"
                class="w-full resize-none rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
            ></textarea>
            </div>

            {{-- @include('partials.upload') --}}
            <x-input-label for="image" value="Image" />
            <x-text-input id="image" type="file" name="image" />
           
            <x-input-label for="category" value="Catégorie" class="mt-3 block text-base font-medium text-[#07074D]"/>
            <select name="category" id="category" class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium outline-none focus:border-[#6A64F1] focus:shadow-md">
                @foreach ($categories as $category)
                    <option class="bg-white" value="{{ $category->id }}"> {{ $category->name }}</option>
                @endforeach
            </select>

            <button class="mt-5 hover:shadow-form rounded-md bg-[#6A64F1] py-3 px-8 text-base font-semibold text-white outline-none">
                Submit
            </button>
        </form>
        </div>
    </div>
</x-app-layout>