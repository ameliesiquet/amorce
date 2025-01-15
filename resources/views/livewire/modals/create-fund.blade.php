<section  x-data="{ isOpen: true }" @close-modal.window="isOpen = false">
    <div x-show="isOpen" @wire:loading.remove  class="relative z-10" aria-labelledby="slide-over-title" role="dialog" aria-modal="true">
        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>
        <div class="fixed inset-0 overflow-hidden">
            <div class="absolute inset-0 overflow-hidden">
                <div class="pointer-events-none fixed inset-y-0 right-0 flex pl-10">
                    <div class="pointer-events-auto relative w-screen max-w-screen-md bg-white">
                        <div class="flex p-6">
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
                        <div class="flex h-full flex-col items-center mx-auto shadow-xl mt-4">
                            <div class="flex flex-col gap-10 w-full max-w-xl">
                                <h2 class="text-2xl font-semibold text-gray-800 text-left">Créer un fond</h2>
                                <form  wire:submit.prevent="createFund"
                                       class="flex flex-col gap-6 w-full px-8 py-10 rounded-3xl border border-solid border-black border-opacity-10 shadow-[0px_0px_4px_rgba(0,0,0,0.25)] max-md:px-5">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <div class="flex flex-col gap-3 w-full max-md:max-w-full">
                                        <label for="fund-name"
                                               id="section-title"
                                               class="block text-xl font-medium text-black">
                                            Nom
                                        </label>
                                        <input id="fund-name"
                                               name="general-background"
                                               type="text"
                                               wire:model.defer="title"
                                               class="mt-1 text-zinc-800 text-s block w-full border-t-0 border-l-0 border-r-0 border-b-1 border-b-gray-500 focus:border-b-amber-200 focus:outline-none focus:ring-white outline-none bg-transparent">
                                        @error('form.title')
                                        <span class="text-red-500 text-sm mt-1">
                                            {{ $message }}
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="flex w-full justify-between mt-4">
                                        <x-yellow-button>
                                            <p>enregistrer</p>
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
</section>
