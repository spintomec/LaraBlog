<form action="{{ route('like.post', $post->id) }}"
    method="post">
    @csrf
    <button
        class="{{ $post->liked() ? 'bg-blue-600' : '' }} px-4 py-2 text-white bg-gray-600">
        like {{ $post->likeCount }}
    </button>
</form>

<form action="{{ route('unlike.post', $post->id) }}"
    method="post">
    @csrf
    <button
        class="{{ $post->liked() ? 'block' : 'hidden'  }} px-4 py-2 text-white bg-red-600">
        unlike
    </button>
</form>
