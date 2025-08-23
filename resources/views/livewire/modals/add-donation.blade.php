<x-modal title="Ajouter un don cash">
    <form wire:submit.prevent="addDonation"
          class="flex flex-col gap-6 w-full px-8 py-10 rounded-3xl border border-solid border-black border-opacity-10 shadow-[0px_0px_4px_rgba(0,0,0,0.25)] max-md:px-5">
        @csrf

        <div class="flex flex-col gap-2">
            <label for="date" class="block text-xl font-medium text-black">Date</label>
            <input id="date" wire:model.defer="form.created_at" type="text" placeholder="24/11/24" required
                   pattern="\d{2}/\d{2}/\d{2}" title="Format: d/m/y"
                   class="mt-1 text-zinc-800 text-s block w-full border-b border-b-gray-500 focus:border-b-amber-200 focus:outline-none bg-transparent rounded-lg">
            @error('form.created_at')
            <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
            @enderror
        </div>

        <div class="flex flex-col gap-2">
            <label for="amount" class="block text-xl font-medium text-black">Montant</label>
            <input id="amount" wire:model.defer="form.amount" placeholder="300€" required
                   class="mt-1 text-zinc-800 text-s block w-full border-b border-b-gray-500 focus:border-b-amber-200 focus:outline-none bg-transparent rounded-lg">
            @error('form.amount')
            <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
            @enderror
        </div>

        <div class="flex flex-col gap-2">
            <label for="to-fund" class="block text-xl font-medium text-black">Vers</label>
            <select id="to-fund" wire:model.defer="form.fonds_id" required
                    class="mt-1 text-zinc-800 text-s block w-full border-b border-b-gray-500 focus:border-b-amber-200 focus:outline-none bg-transparent rounded-lg">
                <option value="" disabled selected>-- Choisir un fond --</option>
                @foreach ($funds as $fund)
                    <option value="{{ $fund->id }}">{{ $fund->title }}</option>
                @endforeach
            </select>
            @error('form.fonds_id')
            <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
            @enderror
        </div>

        <div class="flex justify-end mt-4">
            <x-buttons.yellow-button wire:loading.attr="disabled">
                <x-icons.transfer-money />
                ajouter le don
            </x-buttons.yellow-button>
        </div>
    </form>
</x-modal>
