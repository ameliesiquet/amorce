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

                        <div class="flex h-full flex-col gap-10 overflow-y-scroll  p-12 shadow-xl my-auto">
                            <h2 class="text-2xl font-semibold text-gray-800">Faire une transaction</h2>
                            <form action="/" method="POST"
                                  class="flex flex-col gap-6 m-auto w-full px-8 py-10 rounded-3xl border border-solid border-black border-opacity-10 max-w-[519px] shadow-[0px_0px_4px_rgba(0,0,0,0.25)] max-md:px-5">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <div class="flex flex-col gap-2">
                                    <label for="from-fund" class="block text-xl font-medium text-black">De</label>
                                    <select id="from-fund" name="from_fund" required
                                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-amber-200 focus:ring-amber-200 sm:text-sm">
                                        <option value="">Fond général</option>
                                        <option value="fund1">Fonds spécifique</option>
                                        <option value="fund2">Fonds 2</option>
                                        <option value="fund3">Fonds 3</option>
                                    </select>
                                </div>

                                <div class="flex flex-col gap-2">
                                    <label for="to-fund" class="block text-xl font-medium text-black">Vers</label>
                                    <select id="to-fund" name="to_fund" required
                                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-amber-200 focus:ring-amber-200 sm:text-sm">
                                        <option value="">Fond général</option>
                                        <option value="fund1">Fonds spécifique</option>
                                        <option value="fund2">Fonds 2</option>
                                        <option value="fund3">Fonds 3</option>
                                    </select>
                                </div>

                                <div class="flex flex-col gap-2">
                                    <label for="amount" class="block text-xl font-medium text-black">Montant</label>
                                    <input type="number" id="amount" name="amount" placeholder="300€" required
                                           class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-amber-200 focus:ring-amber-200 sm:text-sm"
                                           min="0" step="0.5">
                                </div>

                                <div class="flex justify-between gap-10 items-start self-end mt-14 text-xs text-white whitespace-nowrap max-md:mt-10">
                                    <x-yellow-button class="flex justify-end">
                                        <x-icons.transfer-money/>
                                        <p>faire la transaction</p>
                                    </x-yellow-button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

