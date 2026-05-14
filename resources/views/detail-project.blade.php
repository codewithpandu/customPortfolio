<x-layout :title="$title">
    <main class="pt-8 pb-16 lg:pt-16 lg:pb-24 bg-white dark:bg-gray-900 antialiased">
        <div class="flex justify-between px-4 mx-auto max-w-7xl ">
            <article class="w-full max-w-2xl mx-auto">
                <div>
                    <a href="/project" class="text-sm text-gray-600 mb-4 block hover:text-black">← Kembali</a>
                    <h1 class="text-3xl font-bold mb-4">{{ $project->name }}</h1>
                    <div class="mb-2">
                        <img class="w-full " src="{{ asset('img/burger-v1.jpg') }}" alt="">
                    </div>
                    <div class="mt-4 editor">
                        {!! $project->body !!}
                    </div>
                </div>
            </article>
        </div>
    </main>
</x-layout>