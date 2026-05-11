@push('style')
    <link href="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.snow.css" rel="stylesheet">
@endpush
<div class="max-w-3xl bg-white rounded-lg dark:bg-gray-800">
    <form action="/post" method="POST" enctype="multipart/form-data" id="post-form">
        @csrf
        <div class="mb-4">
            <div>
                <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Title</label>
                <input type="text" name="title" id="title"
                    class=" border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                    placeholder="Masukkan judul post" value="{{  old('title') }}">
                @error('title')
                    <p class=" mt-2.5 text-sm text-fg-danger-strong"><span class="font-medium">{{ $message }}</p>
                @enderror
            </div>
            <div class="mt-2">
                <label for="category_id"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Category</label>
                <select id="category_id" name="category_id"
                    class=" bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                    <option selected="" value="">Select category</option>
                    @foreach (App\Models\Category::get() as $category)
                        <option value="{{ $category->id }}" @selected(old('category_id') == $category->id)>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
                @error('category_id')
                    <p class="mt-2.5 text-sm text-fg-danger-strong"><span class="font-medium">{{ $message }}</p>
                @enderror
            </div>
            <div class="mt-2">
                <label class="block mb-2.5 text-sm font-medium text-heading" for="image_post">Image</label>
                <input
                    class="cursor-pointer bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand block w-full shadow-xs placeholder:text-body"
                    id="image" type="file" name="image" accept="image/*">
                @error('image')
                    <p class="mt-2.5 text-sm text-fg-danger-strong"><span class="font-medium">{{ $message }}</p>
                @enderror
            </div>
            <div class="sm:col-span-2 mt-2">
                <label for="body" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Body</label>
                <textarea id="body" name="body" rows="4"
                    class="hidden block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                    placeholder="Post body article">{{ old('body')}}</textarea>
                @error('body')
                    <p class="mt-2.5 text-sm text-fg-danger-strong"><span class="font-medium">{{ $message }}</p>
                @enderror
            </div>
            <div class="mt-4">
                <div id="editor"></div>
            </div>
        </div>
        <button type="submit"
            class="text-white inline-flex items-center bg-brand cursor-pointer hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
            <svg class="mr-1 -ml-1 w-6 h-6" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                    d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                    clip-rule="evenodd" />
            </svg>
            Add post
        </button>
    </form>
</div>

@push('script')
    <script src="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.js"></script>

    <script>
        const quill = new Quill('#editor', {
            theme: 'snow',
            placeholder: 'Write post body'
        });

        const postForm = document.getElementById('post-form');
        const postBody = document.getElementById('body');
        const quillEditor = document.getElementById('editor');

        postForm.addEventListener('submit', (e) => {
            e.preventDefault();
            postBody.value = quillEditor.children[0].innerHTML;
            postForm.submit();
        });
    </script>
@endpush