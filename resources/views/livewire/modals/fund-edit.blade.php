<div x-data="{ isOpen: true }">
    <div x-show="isOpen" class="relative z-10 " aria-labelledby="slide-over-title" role="dialog" aria-modal="true" >
        <!--
          Background backdrop, show/hide based on slide-over state.

          Entering: "ease-in-out duration-500"
            From: "opacity-0"
            To: "opacity-100"
          Leaving: "ease-in-out duration-500"
            From: "opacity-100"
            To: "opacity-0"
        -->
        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>

        <div class="fixed inset-0 overflow-hidden ">
            <div class="absolute inset-0 overflow-hidden ">
                <div class="pointer-events-none fixed inset-y-0 right-0 flex pl-10 ">
                    <!--
                      Slide-over panel, show/hide based on slide-over state.

                      Entering: "transform transition ease-in-out duration-500 sm:duration-700"
                        From: "translate-x-full"
                        To: "translate-x-0"
                      Leaving: "transform transition ease-in-out duration-500 sm:duration-700"
                        From: "translate-x-0"
                        To: "translate-x-full"
                    -->
                    <div class="pointer-events-auto relative w-screen max-w-screen-md ">
                        <!--
                          Close button, show/hide based on slide-over state.

                          Entering: "ease-in-out duration-500"
                            From: "opacity-0"
                            To: "opacity-100"
                          Leaving: "ease-in-out duration-500"
                            From: "opacity-100"
                            To: "opacity-0"
                        -->
                        <div class="absolute left-0 top-0 -ml-8 flex pr-2 pt-4 sm:-ml-10 sm:pr-4 ">
                            <button
                                @click="isOpen = false"
                                type="button"
                                class="relative rounded-md text-gray-300 hover:text-white focus:outline-none focus:ring-2 focus:ring-white">
                                <span class="absolute -inset-2.5"></span>
                                <span class="sr-only">Close panel</span>
                                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                     stroke="currentColor" aria-hidden="true" data-slot="icon">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12"/>
                                </svg>
                            </button>
                        </div>

                        <div class="flex h-full flex-col overflow-y-scroll bg-white py-6 shadow-xl my-auto">
                                <h2 class=" font-bold text-2xl leading-6 text-gray-900" id="slide-over-title">Modifier
                                    le fond</h2>
                                <section class="flex flex-col px-8 py-10 rounded-3xl border border-solid border-black border-opacity-10 max-w-[519px] shadow-[0px_0px_4px_rgba(0,0,0,0.25)] max-md:px-5"
                                    aria-labelledby="section-title">
                                    <div class="flex flex-col w-full max-md:max-w-full">
                                            <h2 id="section-title"
                                                class="flex gap-6 items-start w-full text-2xl font-semibold text-black whitespace-nowrap max-md:max-w-full">
                                                Nom
                                            </h2>
                                            <div
                                                class="flex flex-col gap-4 mt-6 w-full text-xl min-h-[34px] text-zinc-500 max-md:max-w-full">
                                                <p class="flex gap-2.5 items-center self-start">
                                                    Fond général
                                                </p>
                                                <hr>
                                            </div>
                                    </div>

                                    <footer
                                        class="flex gap-10 items-start self-end mt-14 text-xs text-white whitespace-nowrap max-md:mt-10">
                                        <button
                                            class="flex gap-1.5 items-center px-4 py-2.5 bg-rose-500 rounded-md shadow-[0px_0px_4px_rgba(0,0,0,0.5)]"
                                            aria-label="Supprimer"
                                        >
                                            <img
                                                loading="lazy"
                                                src="https://cdn.builder.io/api/v1/image/assets/TEMP/c1f7139474f51d1837a6ea7fbe77ea6520c5d33ea059fe61a3f32a64c9d4acd5?placeholderIfAbsent=true&apiKey=2b615783ce9a425699ca8b86f7f04ecc"
                                                alt=""
                                                class="object-contain shrink-0 self-stretch my-auto w-3.5 aspect-square"
                                            />
                                            <span class="self-stretch my-auto">supprimer</span>
                                        </button>
                                    </footer>
                                    <x.yellow-button>
                                        <x-icons.delete/>
                                        <p>supprimer</p>
                                    </x.yellow-button>
                                </section>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
