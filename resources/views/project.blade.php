<x-layout :title="$title">
    <section class="text-gray-600 body-font">
        <div class="container px-5 py-6 grid md:grid-cols-2 lg:grid-cols-3 gap-2 ">
            @foreach ($projects as $project)
                <div class="p-4 sm:mb-0 mb-6 border rounded-lg h-full flex flex-col ">
                    <div class="rounded-lg h-64 overflow-hidden">
                        <img alt="content" class="object-cover object-center h-full w-full"
                            src="{{ asset('storage/' . $project->image) }}">
                    </div>
                    <div>
                        <a href="/project/{{ $project->slug }}"
                            class="text-xl font-medium title-font text-gray-900 block mt-5 hover:text-brand">{{ $project->name }}</a>
                        <p class="text-base leading-relaxed mt-2">{{ Str::limit($project->description, 150) }}</p>
                    </div>
                    <div class="flex justify-between">
                        <a href="/project/{{ $project->slug }}" class="text-brand inline-flex items-center mt-3">Read More
                        </a>
                        <a href="{{ $project->url }}" class="text-brand inline-flex items-center mt-3">Demo
                            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" class="w-4 h-4 ml-2" viewBox="0 0 24 24">
                                <path d="M5 12h14M12 5l7 7-7 7"></path>
                            </svg>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
</x-layout>