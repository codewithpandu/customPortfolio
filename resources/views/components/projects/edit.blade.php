@push('style')
    <link href="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.snow.css" rel="stylesheet">
@endpush
<div class="max-w-3xl bg-white rounded-lg dark:bg-gray-800">
    <form action="/projects/{{ $project->slug }}" method="POST" enctype="multipart/form-data" id="project-form">
        @csrf
        @method('PATCH')
        <div class="mb-4 ">
            <div>
                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                <input type="text" name="name" id="name" value="{{ old('name', $project->name) }}"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                @error('name')
                    <p class="mt-2.5 text-sm text-fg-danger-strong"><span class="font-medium">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label for="description"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
                <input type="text" name="description" id="description"
                    value="{{ old('description', $project->description) }}"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                    placeholder="Inster description" required="">
                @error('description')
                    <p class="mt-2.5 text-sm text-fg-danger-strong"><span class="font-medium">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label for="url" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">URL</label>
                <input type="text" name="url" id="url"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                    placeholder="Inster url" required="" value="{{ old('url', $project->url) }}">
                @error('url')
                    <p class="mt-2.5 text-sm text-fg-danger-strong"><span class="font-medium">{{ $message }}</p>
                @enderror
            </div>
            <div class="mt-2">
                <label class="block mb-2.5 text-sm font-medium text-heading" for="image">Image</label>
                <input
                    class="cursor-pointer bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand block w-full shadow-xs placeholder:text-body"
                    id="image" type="file" name="image" accept="image/*" value="{{ old('image', $project->image) }}">
                @error('image')
                    <p class="mt-2.5 text-sm text-fg-danger-strong"><span class="font-medium">{{ $message }}</p>
                @enderror
            </div>
            <div class="sm:col-span-2 mt-2">
                <label for="body" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Body</label>
                <textarea id="body" name="body" rows="4" value="{{ old('body', $project->body) }}"
                    class="hidden p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                    placeholder="Body project">{{ old('body', $project->body)}}</textarea>
                @error('body')
                    <p class="mt-2.5 text-sm text-fg-danger-strong"><span class="font-medium">{{ $message }}</p>
                @enderror
            </div>
            <div id="editor"></div>
        </div>
        <div class="flex items-center space-x-4">
            <button type="submit"
                class="text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Update
                Project</button>
        </div>
    </form>
</div>

@push('script')
    <script src="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.js"></script>

    <script>
        const quill = new Quill('#editor', {
            theme: 'snow',
            placeholder: 'Write post body',
        });

        const postForm = document.getElementById('project-form');
        const postBody = document.getElementById('body');
        const quillEditor = document.getElementById('editor');

        postForm.addEventListener('submit', (e) => {
            e.preventDefault();
            postBody.value = quillEditor.children[0].innerHTML;
            postForm.submit();
        });
    </script>
@endpush