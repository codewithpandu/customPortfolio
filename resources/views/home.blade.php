<x-layout :title="$title">
    <div class="grid md:grid-cols-2 md:gap-8 h-screen md:-mt-12">
        <div class="order-2 md:order-0 place-self-center">
            <p class="text-2xl md:text-2xl font-medium">Hi 👋, I'm Pandu
            </p>
            <h1 class="py-2 text-4xl md:text- font-bold">Web Developer</h1>
            <p class="md:w-lg">Fresh graduate from Universitas Amikom Yogyakarta with experience building modern web
                applications using Laravel, React, and Next.js. Passionate about creating responsive, scalable, and
                user-friendly digital experiences.
            </p>
            <div class="flex gap-1 items-center mt-4">
                <a href="#">
                    <svg class="size-12 hover:fill-brand" fill="#000000" version="1.1" id="Layer_1"
                        xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                        viewBox="-143 145 512 512" xml:space="preserve">
                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                        <g id="SVGRepo_iconCarrier">
                            <path
                                d="M113,145c-141.4,0-256,114.6-256,256s114.6,256,256,256s256-114.6,256-256S254.4,145,113,145z M41.4,508.1H-8.5V348.4h49.9 V508.1z M15.1,328.4h-0.4c-18.1,0-29.8-12.2-29.8-27.7c0-15.8,12.1-27.7,30.5-27.7c18.4,0,29.7,11.9,30.1,27.7 C45.6,316.1,33.9,328.4,15.1,328.4z M241,508.1h-56.6v-82.6c0-21.6-8.8-36.4-28.3-36.4c-14.9,0-23.2,10-27,19.6 c-1.4,3.4-1.2,8.2-1.2,13.1v86.3H71.8c0,0,0.7-146.4,0-159.7h56.1v25.1c3.3-11,21.2-26.6,49.8-26.6c35.5,0,63.3,23,63.3,72.4V508.1z ">
                            </path>
                        </g>
                    </svg>
                </a>
                <a href="#">
                    <svg class="size-14 hover:fill-brand" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"
                        fill="#000000">
                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                        <g id="SVGRepo_iconCarrier">
                            <title>github</title>
                            <rect width="24" height="24" fill="none"></rect>
                            <path
                                d="M12,2A10,10,0,0,0,8.84,21.5c.5.08.66-.23.66-.5V19.31C6.73,19.91,6.14,18,6.14,18A2.69,2.69,0,0,0,5,16.5c-.91-.62.07-.6.07-.6a2.1,2.1,0,0,1,1.53,1,2.15,2.15,0,0,0,2.91.83,2.16,2.16,0,0,1,.63-1.34C8,16.17,5.62,15.31,5.62,11.5a3.87,3.87,0,0,1,1-2.71,3.58,3.58,0,0,1,.1-2.64s.84-.27,2.75,1a9.63,9.63,0,0,1,5,0c1.91-1.29,2.75-1,2.75-1a3.58,3.58,0,0,1,.1,2.64,3.87,3.87,0,0,1,1,2.71c0,3.82-2.34,4.66-4.57,4.91a2.39,2.39,0,0,1,.69,1.85V21c0,.27.16.59.67.5A10,10,0,0,0,12,2Z">
                            </path>
                        </g>
                    </svg></a>
            </div>
        </div>
        <div class="place-self-center">
            <img class="rounded-full size-90 md:size-96 object-cover object-top" src="{{ asset('img/pandu.jpg') }}"
                alt="Pandu Setia Darmawan">
        </div>
    </div>
</x-layout>