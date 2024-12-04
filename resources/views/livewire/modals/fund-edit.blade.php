<div x-data="{ isOpen: true }">
    <div x-show="isOpen" class="relative z-10 " aria-labelledby="slide-over-title" role="dialog" aria-modal="true">
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
                    <div class="pointer-events-auto relative w-screen max-w-screen-md bg-white ">
                        <!--
                          Close button, show/hide based on slide-over state.

                          Entering: "ease-in-out duration-500"
                            From: "opacity-0"
                            To: "opacity-100"
                          Leaving: "ease-in-out duration-500"
                            From: "opacity-100"
                            To: "opacity-0"
                        -->
                        <div class="flex p-6 ">
                            <button
                                @click="isOpen = false"
                                type="button"
                                class="relative rounded-md text-gray-300 hover:text-white focus:outline-none focus:ring-2 focus:ring-white">
                                <span class="absolute -inset-2.5"></span>
                                <span class="sr-only">Close panel</span>
                                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                     stroke="#000000" aria-hidden="true" data-slot="icon">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12"/>
                                </svg>
                            </button>
                        </div>

                        <div class="flex h-full flex-col overflow-y-scroll  p-16 shadow-xl my-auto">
                            <h2 class=" font-bold text-2xl leading-6 text-gray-900" id="slide-over-title">Modifier
                                le fond</h2>
                            <section
                                class="flex flex-col m-auto w-full px-8 py-10 rounded-3xl border border-solid border-black border-opacity-10 max-w-[519px] shadow-[0px_0px_4px_rgba(0,0,0,0.25)] max-md:px-5"
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
                                    class="flex justify-between gap-10 items-start self-end mt-14 text-xs text-white whitespace-nowrap max-md:mt-10">
                                    <x-red-button>
                                        <x-icons.delete stroke="white"/>
                                        <p class="text-white">supprimer</p>
                                    </x-red-button>
                                </footer>
                            </section>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
