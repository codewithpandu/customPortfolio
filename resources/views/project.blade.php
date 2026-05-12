<x-layout :title="$title">
    <section class="text-gray-600 body-font">
        <div class="container px-5 py-6 grid md:grid-cols-2 lg:grid-cols-3 gap-2">
            @foreach ($projects as $project)
                <div class="p-4 sm:mb-0 mb-6 border rounded-lg">
                    <div class="rounded-lg h-64 overflow-hidden">
                        <img alt="content" class="object-cover object-center h-full w-full"
                            src="{{ asset('img/burger-v1.jpg') }}">
                    </div>
                    <a href="#" class="text-xl font-medium title-font text-gray-900 block mt-5 hover:text-brand">Burger
                        Landing Page</a>
                    <p class="text-base leading-relaxed mt-2">Simple landing page burger promotion. Develop using
                        React
                        & Tailwind Css</p>
                    <a href="/project/{{ $project->slug }}" class="text-brand inline-flex items-center mt-3">Read More
                        <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                            stroke-width="2" class="w-4 h-4 ml-2" viewBox="0 0 24 24">
                            <path d="M5 12h14M12 5l7 7-7 7"></path>
                        </svg>
                    </a>
                </div>
            @endforeach
        </div>
    </section>
</x-layout>