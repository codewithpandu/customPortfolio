<nav class="flex" aria-label="Breadcrumb">
    <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">

        <li class="inline-flex items-center">
            <a href="/" class="inline-flex items-center text-sm font-medium text-body hover:text-fg-brand">
                <svg class="w-4 h-4 me-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                    fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m4 12 8-8 8 8M6 10.5V19a1 1 0 0 0 1 1h3v-3a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v3h3a1 1 0 0 0 1-1v-8.5" />
                </svg>
                Home
            </a>
        </li>

        @foreach ($items as $item)
            @if (!$loop->first)
                <li @if($loop->last) aria-current="page" @endif>
                    <div class="flex items-center space-x-1.5">
                        <svg class="w-3.5 h-3.5 rtl:rotate-180 text-body" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m9 5 7 7-7 7" />
                        </svg>

                        @if ($loop->last)
                            <span class="inline-flex items-center text-sm font-medium text-body-subtle">
                                {{ $item['label'] }}
                            </span>
                        @else
                            <a href="{{ $item['url'] }}"
                                class="inline-flex items-center text-sm font-medium text-body hover:text-fg-brand">
                                {{ $item['label'] }}
                            </a>
                        @endif
                    </div>
                </li>
            @endif
        @endforeach
    </ol>
</nav>