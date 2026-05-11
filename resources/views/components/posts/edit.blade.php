<div class="max-w-3xl bg-white rounded-lg dark:bg-gray-800">
    <form action="/post/{{ $post->slug }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <div class="mb-4">
            <div>
                <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Title</label>
                <input type="text" name="title" id="title"
                    class=" border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                    placeholder="Masukkan judul post" value="{{  old('title') ?? $post->title }}">
                @error('title')
                    <p class="mt-2.5 text-sm text-fg-danger-strong"><span class="font-medium">{{ $message }}</p>
                @enderror
            </div>
            <div class="mt-2">
                <label for="category_id"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Category</label>
                <select id="category_id" name="category_id"
                    class=" bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                    <option selected="" value="">Select category</option>
                    @foreach (App\Models\Category::get() as $category)
                        <option value="{{ $category->id }}" @selected((old('category_id') ?? $post->category_id) == $category->id)>{{ $category->name }}</option>
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

            <img class="h-60 rounded-base mt-4"
                src="{{ $post->image ? asset('storage/' . $post->image) : asset('img/default-image.png') }}"
                alt="{{ $post->title }}">

            <div class="sm:col-span-2 mt-2">
                <label for="body" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Body</label>
                <textarea id="body" name="body" rows="4"
                    class=" block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                    placeholder="Post body article">{{ old('body') ?? $post->body }}</textarea>
                @error('body')
                    <p class="mt-2.5 text-sm text-fg-danger-strong"><span class="font-medium">{{ $message }}</p>
                @enderror
            </div>
        </div>
        <button type="submit"
            class="text-white inline-flex items-center bg-brand cursor-pointer hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
            Save post
        </button>
    </form>
</div>