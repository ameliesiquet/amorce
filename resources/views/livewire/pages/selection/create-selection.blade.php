<x-modal>
        <form wire:submit.prevent="createSelection" class="flex flex-col gap-6 max-h-[100vh] overflow-y-auto">
            <h2 class="text-3xl font-bold text-gray-800">Créer une nouvelle sélection</h2>
            <div class="flex flex-col gap-2">
                <label for="selectionName" class="font-medium text-gray-700">Nom</label>
                <input type="text" id="selectionName" wire:model="selectionName" placeholder="Nom de la séléction"
                       class="border-gray-300 rounded-md p-2 w-full focus:ring-2 "/>
            </div>
            <div class="flex flex-col gap-2">
                <label for="selectionStatus" class="font-medium text-gray-700">Statut</label>
                <select id="selectionStatus" wire:model="selectionStatus"
                        class="border-gray-300 rounded-md p-2 w-full focus:ring-2">
                    <option value="{{ \App\Enum\SelectionStatus::PENDING->value }}">En attente</option>
                    <option value="{{ \App\Enum\SelectionStatus::ACTIVE->value }}">Active</option>
                </select>
            </div>

            <div class="flex flex-col gap-3">
                <div class="flex justify-between items-center">
                    <h3 class="text-lg font-semibold text-gray-700">3 nouveaux candidats</h3>
                    <button type="button" wire:click="drawWinners"
                            class="px-4 py-1 bg-zinc-900 hover:bg-zinc-700 text-white rounded-xl transition flex items-center gap-2">
                        <x-icons.reload/>
                        Recharger (3)
                    </button>
                </div>
                @if(!empty($winners))
                    <ul class="mt-2 flex flex-col gap-3">
                        @foreach($winners as $index => $winner)
                            <li class="flex justify-between items-center p-3 bg-gray-50 rounded-lg shadow-sm">
                                <div>
                                    <p class="font-medium text-gray-800">{{ $winner['name'] }}</p>
                                    <p class="text-sm text-gray-500">{{ $winner['email'] ?? '' }}</p>
                                </div>
                                <button type="button" wire:click="redrawWinner({{ $index }})"
                                        class="px-2 py-2 bg-yellow-400 hover:bg-yellow-500 text-white rounded transition flex items-center gap-2">
                                    <x-icons.reload/>
                                </button>
                            </li>
                        @endforeach
                    </ul>
                @else
                    <p class="text-sm text-gray-500 mt-2">Aucun candidat disponible.</p>
                @endif
            </div>

            <div class="flex flex-col gap-2">
                <h3 class="text-lg font-semibold text-gray-700">Participants actuels</h3>
                <ul class="grid grid-cols-1 md:grid-cols-2 gap-3">
                    @foreach($participants as $participant)
                        <li class="p-3 bg-gray-100 rounded-lg shadow-sm">{{ $participant->name }}</li>

                    @endforeach
                </ul>
            </div>

            @if($errorMessage)
                <div class="text-red-600 p-3 bg-red-100 rounded shadow-sm">{{ $errorMessage }}</div>
            @endif
            <button type="submit"
                    class="px-6 py-2 bg-green-500 hover:bg-green-600 text-white rounded-lg font-medium transition mt-4">
                Créer la sélection
            </button>
        </form>
</x-modal>
