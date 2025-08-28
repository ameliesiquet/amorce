<section x-data="{ isOpen: @entangle('showModal') }">
    <div x-show="isOpen" @close-edit-fund-modal.window="$wire.showModal = false" @wire:loading.remove
         class="relative z-10" aria-labelledby="slide-over-title" role="dialog"
         aria-modal="true">
        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>
        <div class="fixed inset-0 overflow-hidden">
            <div class="absolute inset-0 overflow-hidden">
                <div class="pointer-events-none fixed inset-y-0 right-0 flex pl-10">
                    <div class="pointer-events-auto relative w-screen max-w-screen-md bg-white">
                        <div class="flex p-6">
                            <button
                                wire:click="handleCloseEditFundModal"
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
                                <h2 class="text-2xl font-semibold text-gray-800 text-left">Modifier le fond</h2>
                                <form wire:submit.prevent="editProject" class="flex flex-col gap-6 w-full">
                                    <div class="flex flex-col gap-4">
                                        <div>
                                            <label class="block font-medium text-gray-700 mb-1">Name</label>
                                            <input type="text" wire:model.defer="form.name" class="w-full ..." />
                                            @error('form.name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                                        </div>
                                        <div>
                                            <label class="block font-medium text-gray-700 mb-1">Description</label>
                                            <textarea wire:model.defer="form.description" class="w-full ..." rows="4"></textarea>
                                            @error('form.description') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                </form>
                                <div class="mt-6">
                                    <form wire:submit.prevent="editProject">
                                        <x-buttons.yellow-button type="submit"
                                                                class="flex gap-1.5 text-xs lg:text-sm xl:text-l items-center px-2 py-2 lg:px-3 md:py-3 my-auto text-black bg-white rounded-xl shadow-[0px_4px_4px_rgba(0,0,0,0.25)] whitespace-nowrap">
                                            <x-icons.delete/>
                                            <p class="ml-2">Enregistrer</p>
                                        </x-buttons.yellow-button>
                                    </form>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

