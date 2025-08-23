<section x-data="{ isOpen: true }" @close-modal.window="isOpen = false">
    <div x-show="isOpen" class="fixed inset-0 z-50 flex items-center justify-center bg-gray-900 bg-opacity-50">
        <div class="bg-white rounded-lg w-full max-w-2xl p-6 relative">
            <button @click="isOpen = false" class="absolute top-4 right-4 text-gray-500 hover:text-black">
                ✕
            </button>

            <h2 class="text-xl font-bold mb-4">Importer un fichier CSV</h2>

            <input type="file" wire:model="upload" class="mb-4">

            <div class="mb-4">
                <label for="fund_id">Sélectionner un fond :</label>
                <select wire:model="fund_id" id="fund_id" class="border rounded p-2 w-full mt-2">
                    <option value="">Choisir un fond</option>
                    @foreach($funds as $fund)
                        <option value="{{ $fund->id }}">{{ $fund->title }}</option>
                    @endforeach
                </select>
            </div>
            <button wire:click="import" class="px-4 py-2 bg-amber-200 text-zinc-900 rounded-md hover:bg-amber-300 focus:outline-none focus:ring-2 focus:ring-amber-200">
                Importer
            </button>

            @if($imported)
                <p class="text-green-600 mt-4">Import terminé ✅</p>
            @endif
        </div>
    </div>
</section>
