<x-modal title="Créer un fond">
    <form wire:submit.prevent="createFund"
          class="flex flex-col gap-6 w-full px-8 py-10 rounded-3xl border border-black border-opacity-10 shadow">
        @csrf
        <div class="flex flex-col gap-3 w-full">
            <label for="fund-name" class="block text-xl font-medium text-black">
                Nom
            </label>
            <input id="fund-name"
                   type="text"
                   wire:model.defer="title"
                   class="border-b border-gray-500 focus:border-amber-500 focus:outline-none bg-transparent rounded-lg">
            @error('title')
            <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div class="flex justify-end mt-4">
            <x-buttons.yellow-button wire:loading.attr="disabled">
                enregistrer
            </x-buttons.yellow-button>

        </div>
    </form>
</x-modal>
