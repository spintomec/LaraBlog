<!-- component -->
<!-- This is an example component -->

<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.0/dist/alpine.min.js" defer></script>

<script src="https://cdn.jsdelivr.net/gh/alpine-collective/alpine-magic-helpers@0.3.x/dist/index.js"></script>


<div x-data="{photoName: null, photoPreview: null}">
    <!-- Photo File Input -->
    <input type="file" class="hidden" x-ref="photo" x-on:change="
                        photoName = $refs.photo.files[0].name;
                        const reader = new FileReader();
                        reader.onload = (e) => {
                            photoPreview = e.target.result;
                        };
                        reader.readAsDataURL($refs.photo.files[0]);
    ">

    <label class="block text-gray-700 text-base font-medium text-[#07074D] mb-3 " for="photo">
        Image <span class="text-red-600"> </span>
    </label>
    {{-- <div class="mt-3 mb-3" x-show="! photoPreview">
        @if (isset($post))
            <img  src="{{ asset('/storage/' . $post->image) }}" class="w-40 h-40 shadow">
        @else
            <img  src="{{ asset('/storage/' .'placeholder.png') }}" class="w-40 h-40 shadow">
        @endif
    </div> --}}

    
        <!-- New Profile Photo Preview -->
        <div class="mt-3 mb-3" x-show="photoPreview" style="display: none;">
            <span class="block w-40 h-40 shadow" x-bind:style="'background-size: cover; background-repeat: no-repeat; background-position: center center; background-image: url(\'' + photoPreview + '\');'" style="background-size: cover; background-repeat: no-repeat; background-position: center center; background-image: url('null');">
            </span>
        </div>
        <button type="button" class="inline-flex items-center px-3 py-2 hover:shadow-form rounded-md bg-[#3380FF] text-sm font-base text-white outline-none" x-on:click.prevent="$refs.photo.click()">
            Nouvelle Image
        </button>
</div>