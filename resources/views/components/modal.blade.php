@props([
    'title' => null,
    'isOpen' => true,
])

<section x-data="{ isOpen: @js($isOpen) }" @close-modal.window="isOpen = false">
    <div x-show="isOpen" class="relative z-10" aria-labelledby="slide-over-title" role="dialog" aria-modal="true">
        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>
        <div class="fixed inset-0 overflow-hidden p-4">
            <div class="absolute inset-0 overflow-hidden">
                <div class="pointer-events-none fixed inset-y-0 right-0 flex pl-10">
                    <div class="pointer-events-auto relative w-screen max-w-screen-md bg-white">

                        <div class="flex p-6 mt-10 lg:mt-0">
                            <button @click="isOpen = false" type="button"
                                    class="relative rounded-md text-gray-300 hover:text-white focus:outline-none focus:ring-2 focus:ring-white">
                                <span class="absolute -inset-2.5"></span>
                                <span class="sr-only">Fermer</span>
                                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                     stroke="#000000" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12"/>
                                </svg>
                            </button>
                        </div>
                        <article class="flex h-full flex-col items-center mx-auto shadow-xl mt-4">
                            <div class="flex flex-col gap-10 w-full max-w-xl">

                                @if($title)
                                    <h2 class="text-2xl font-semibold text-gray-800 text-left">{{ $title }}</h2>
                                @endif

                                {{ $slot }}

                            </div>
                        </article>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
