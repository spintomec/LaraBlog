<div class="hidden w-4/12 -mx-8 lg:block">
    <div class="px-8">
        <h1 class="mb-4 text-xl font-bold text-gray-700">Auteurs les plus actifs</h1>
        <div class="flex flex-col max-w-sm px-6 py-4 mx-auto bg-white rounded-lg shadow-md">
            <ul class="-mx-4">

                @foreach ($authorsClassement as $author)
                <li class="flex items-center py-2"><img
                        src="https://images.unsplash.com/photo-1492562080023-ab3db95bfbce?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=crop&amp;w=731&amp;q=80"
                        alt="avatar" class="object-cover w-10 h-10 mx-4 rounded-full">
                        
                    <p><a href="#" class="mx-1 font-bold text-gray-700 hover:underline">{{ $author->user_name }}</a>
                    <span class="text-sm font-light text-gray-700">{{ $author->post_count }} {{ $author->post_count > 1 ? "Posts" : "Post "}} </span></p>
                </li>
                @endforeach
                
            </ul>
        </div>
    </div>
    <div class="px-8 mt-10">
        <h1 class="mb-4 text-xl font-bold text-gray-700">Categories les plus utilisées</h1>
        <div class="flex flex-col max-w-sm px-4 py-6 mx-auto bg-white rounded-lg shadow-md">
            <ul>
                @foreach ($mostPopularCategories as $category)
                <li>
                    <a href="#" class="mx-1 font-bold text-gray-700 hover:text-gray-600 hover:underline">
                        {{ $category->category_name}}
                    </a> 
                    <span class="text-sm font-light text-gray-700">{{ $category->post_count }} {{ $author->post_count > 1  ? "Posts" : "Post" }} </span> </li>
                @endforeach
                
            </ul>
        </div>
    </div>
    <div class="px-8 mt-10">
        <h1 class="mb-4 text-xl font-bold text-gray-700">Post le plus récent</h1>
        <div class="flex flex-col max-w-sm px-8 py-6 mx-auto bg-white rounded-lg shadow-md">
            <div class="flex items-center justify-center"><a href="#"
                    class="px-2 py-1 text-sm text-green-100 bg-gray-600 rounded hover:bg-gray-500">{{ $lastPost->category_name }}</a>
            </div>
            <div class="mt-4"><a href="#" class="text-lg font-medium text-gray-700 hover:underline">
                {{ $lastPost->title }}</a></div>
            <div class="flex items-center justify-between mt-4">
                <div class="flex items-center"><img
                        src="https://images.unsplash.com/photo-1492562080023-ab3db95bfbce?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=crop&amp;w=731&amp;q=80"
                        alt="avatar" class="object-cover w-8 h-8 rounded-full"><a href="#"
                        class="mx-3 text-sm text-gray-700 hover:underline">{{ $lastPost->user_name }}</a>
                </div>
                <span
                    class="text-sm font-light text-gray-600">{{ Carbon\Carbon::parse($post->create_at)->format('d M Y') }}
                </span>
            </div>
        </div>
    </div>
</div>