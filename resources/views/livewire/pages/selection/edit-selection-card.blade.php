<x-modal>
    <form wire:submit.prevent="updateSelection"
          class="flex flex-col gap-6 max-h-[100vh] overflow-y-auto">
        <h2 class="text-3xl font-bold text-gray-800">Modifier la sélection</h2>

        <!-- Nom -->
        <div class="flex flex-col gap-2">
            <label for="selectionName" class="font-medium text-gray-700">Nom</label>
            <input type="text" id="selectionName" wire:model="selectionName"
                   class="border-gray-300 rounded-md p-2 w-full focus:ring-2 "/>
        </div>

        <!-- Statut -->
        <div class="flex flex-col gap-2">
            <label for="selectionStatus" class="font-medium text-gray-700">Statut</label>
            <select id="selectionStatus" wire:model="selectionStatus"
                    class="border-gray-300 rounded-md p-2 w-full focus:ring-2">
                <option value="{{ \App\Enum\SelectionStatus::PENDING->value }}">En attente</option>
                <option value="{{ \App\Enum\SelectionStatus::ACTIVE->value }}">Active</option>
            </select>
        </div>

        <!-- Participants (optional read-only Anzeige) -->
        <div class="flex flex-col gap-2">
            <h3 class="text-lg font-semibold text-gray-700">Participants actuels</h3>
            <ul class="grid grid-cols-1 md:grid-cols-2 gap-3">
                @foreach($selection->donators as $participant)
                    <li class="p-3 bg-gray-100 rounded-lg shadow-sm">{{ $participant->name }}</li>
                @endforeach
            </ul>
        </div>

        @if($errorMessage)
            <div class="text-red-600 p-3 bg-red-100 rounded shadow-sm">{{ $errorMessage }}</div>
        @endif

        <!-- Save Button -->
        <button type="submit"
                class="px-6 py-2 bg-blue-500 hover:bg-blue-600 text-white rounded-lg font-medium transition mt-4">
            Sauvegarder les modifications
        </button>
    </form>
</x-modal>
