@props(['funds', 'fund'])

<section x-data="{ isOpen: true }" @close-modal.window="isOpen = false">
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
                                <span class="sr-only">Close panel</span>
                                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                     stroke="#000000" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12"/>
                                </svg>
                            </button>
                        </div>

                        <article class="flex h-full flex-col items-center mx-auto shadow-xl mt-4">
                            <div class="flex flex-col gap-10 w-full max-w-xl">
                                <h2 class="text-2xl font-semibold text-gray-800 text-left">Faire une transaction</h2>

                                <form wire:submit.prevent="makeTransaction"
                                      class="flex flex-col gap-6 w-full px-8 py-10 rounded-3xl border border-solid border-black border-opacity-10 shadow-[0px_0px_4px_rgba(0,0,0,0.25)] max-md:px-5">
                                    @csrf
                                    <input type="hidden" wire:model.defer="form.from_fund" value="{{ $fund->id }}">
                                    <div class="flex flex-col gap-2">
                                        <label class="block text-xl font-medium text-black">De</label>
                                        <div class="mt-1 text-zinc-800 text-s block w-full border-b border-b-gray-500">
                                            {{ $fund->title }}
                                        </div>
                                    </div>
                                    <div class="flex flex-col gap-2">
                                        <label for="to-fund" class="block text-xl font-medium text-black">Vers</label>
                                        <select id="to-fund" name="to_fund" wire:model.defer="form.to_fund" required
                                                class="mt-1 text-zinc-800 text-s block w-full border-b border-b-gray-500 focus:border-b-amber-200 focus:outline-none bg-transparent rounded-lg">
                                            <option value="" disabled selected>-- Choisir un fond --</option>
                                            @foreach ($funds as $f)
                                                @if ($f->id !== $fund->id)
                                                    <option value="{{ $f->id }}">{{ $f->title }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="flex flex-col gap-2">
                                        <label for="amount" class="block text-xl font-medium text-black">Montant</label>
                                        <input id="amount" name="amount" wire:model.defer="form.amount"
                                               placeholder="300€" required
                                               class="mt-1 text-zinc-800 text-s block w-full border-b border-b-gray-500 focus:border-b-amber-200 focus:outline-none bg-transparent rounded-lg">
                                        @error('form.amount')
                                        <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="flex justify-end mt-4">
                                        <x-buttons.yellow-button wire:loading.attr="disabled">
                                            <x-icons.transfer-money />
                                            enregistrer
                                        </x-buttons.yellow-button>
                                    </div>
                                </form>
                            </div>
                        </article>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
