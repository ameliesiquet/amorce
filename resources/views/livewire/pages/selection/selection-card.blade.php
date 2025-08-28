<article x-data="{ open: false }" class="flex flex-col gap-2 border rounded-lg shadow p-4">
    <header @click="open = !open" class="cursor-pointer flex flex-wrap justify-between items-center">
        <h3 class="text-lg sm:text-xl md:text-2xl font-semibold">{{ $selection->name }}</h3>
        <button
            class="text-sm sm:text-base md:text-lg px-2 py-1 text-black bg-amber-200 rounded-xl shadow hover:bg-amber-100">
            <span x-text="open ? '-' : '+'" class="text-xl"></span>
        </button>
    </header>

    <section x-show="open" x-transition class="mt-2 flex flex-col gap-6">
        <hr class="mb-2">

        <article class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <h4 class="text-lg sm:text-xl font-medium mb-4">Participants confirmés</h4>
                <div class="overflow-x-auto">
                    <table class="min-w-full border border-gray-200 rounded-lg overflow-hidden">
                        <thead class="bg-gray-200">
                        <tr>
                            <th class="px-4 py-2 text-left text-sm sm:text-base font-semibold text-gray-700">Nom</th>
                            <th class="px-4 py-2 text-left text-sm sm:text-base font-semibold text-gray-700">Email</th>
                            <th class="px-4 py-2 text-left text-sm sm:text-base font-semibold text-gray-700">Status</th>
                            <th class="px-4 py-2 text-left text-sm sm:text-base font-semibold text-gray-700">Disponibilité</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($selection->donators->where('disponibility', true) as $donator)
                            <tr class="border-b border-gray-200 hover:bg-gray-50">
                                <td class="px-4 py-2">{{ $donator->name }}</td>
                                <td class="px-4 py-2">{{ $donator->email }}</td>
                                <td class="px-4 py-2">{{ $donator->pivot->status_in_selection }}</td>
                                <td class="px-4 py-2">
                                    <a href="#" wire:click="makeParticipantNo({{ $donator->id }})">
                                        <x-buttons.red-button>Annuler</x-buttons.red-button>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div>
                <h4 class="text-lg sm:text-xl font-medium mb-4">Participants en attente</h4>
                <div class="overflow-x-auto">
                    <table class="min-w-full border border-gray-200 rounded-lg overflow-hidden">
                        <thead class="bg-gray-200">
                        <tr>
                            <th class="px-4 py-2 text-left text-sm sm:text-base font-semibold text-gray-700">Nom</th>
                            <th class="px-4 py-2 text-left text-sm sm:text-base font-semibold text-gray-700">Email</th>
                            <th class="px-4 py-2 text-left text-sm sm:text-base font-semibold text-gray-700">Status</th>
                            <th class="px-4 py-2 text-left text-sm sm:text-base font-semibold text-gray-700">Disponibilité</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($selection->donators->where('disponibility', false) as $donator)
                            <tr class="border-b border-gray-200 hover:bg-gray-50">
                                <td class="px-4 py-2">{{ $donator->name }}</td>
                                <td class="px-4 py-2">{{ $donator->email }}</td>
                                <td class="px-4 py-2">{{ $donator->pivot->status_in_selection }}</td>
                                <td class="px-4 py-2 flex flex-wrap gap-2">
                                    <a href="#" wire:click="makeParticipantYes({{ $donator->id }})">
                                        <x-buttons.green-button>Valider</x-buttons.green-button>
                                    </a>
                                    <a href="#" wire:click="releaseDonator({{ $donator->id }})">
                                        <x-buttons.orange-button>Retirer</x-buttons.orange-button>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                @if($selection->donators->where('disponibility', false)->count() === 0)
                    <a class="inline-block mt-4 w-full sm:w-auto" wire:click="pickNewDonator">
                        <x-buttons.yellow-button>Tirer un nouveau donateur</x-buttons.yellow-button>
                    </a>
                @endif
            </div>
        </article>
        <article class="grid grid-cols-2 max-md:grid-cols-1 gap-6 py-8 px-5 rounded-xl">
            <div class="flex flex-col gap-4">
                <h3 class="text-lg sm:text-xl md:text-2xl font-medium text-black">Projets</h3>
                <div class="flex flex-col gap-6 bg-black p-4 rounded">

                    <h4 class="text-lg sm:text-xl font-medium text-white">Projets attribués</h4>
                    <div class="flex flex-wrap gap-2 mb-4">
                        @foreach($selection->projects as $project)
                            <span class="px-3 py-2 bg-blue-300 rounded-full text-sm sm:text-base text-black">{{ $project->name }}</span>
                        @endforeach
                    </div>
                    <div class="flex flex-col items-start gap-4">
                        <h4 class="text-base sm:text-lg font-medium text-white">Ajouter un projet</h4>
                        <div class="flex flex-col sm:flex-row gap-2 sm:gap-6 w-full">
                            <select id="newProject" wire:model="newProjectId" class="border-gray-300 rounded-md shadow-sm w-full sm:w-fit text-black">
                                <option value="">Sélectionner un projet</option>
                                @foreach($projects as $project)
                                    <option value="{{ $project->id }}">{{ $project->name }}</option>
                                @endforeach
                            </select>
                            <button type="button" wire:click="addProject" class="px-3 py-1 bg-amber-200 rounded-xl text-black w-full sm:w-auto">
                                Ajouter
                            </button>
                        </div>
                    </div>
                    <div class="flex flex-col items-start gap-4">
                        <h4 class="text-base sm:text-lg font-medium text-white">Tous les projets en détail</h4>
                        <ul class="flex flex-col gap-4 w-full">
                            @foreach($selection->projects as $project)
                                <li class="px-5 py-3.5 bg-white rounded text-black w-full">
                                    <div class="flex flex-wrap justify-between items-center">
                                        <h4 class="text-base sm:text-lg font-semibold">{{ $project->name }}</h4>
                                        <button type="button" wire:click="removeProject({{ $project->id }})" class="px-2 py-1 bg-red-500 hover:bg-red-600 text-white rounded mt-2 sm:mt-0">
                                            Retirer
                                        </button>
                                    </div>
                                    <h4 class="mt-2 font-semibold">Description</h4>
                                    <p>{{ $project->description }}</p>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="flex flex-col gap-4">
                <h4 class="text-lg sm:text-xl font-medium">Notes</h4>
                <textarea wire:model="markdownNotes" wire:input="enableEditNotes" class="w-full min-h-[150px] sm:min-h-[200px] p-4 rounded border border-gray-300 text-black" placeholder="Écrivez ici vos notes..."></textarea>

                @if (!$notesSaved)
                    <a href="#" wire:click="saveNotes" class="w-full sm:w-auto">
                        <x-buttons.yellow-button>Enregistrer</x-buttons.yellow-button>
                    </a>
                @endif

                @if (session()->has('message'))
                    <span class="text-green-500 mt-2">{{ session('message') }}</span>
                @endif
            </div>
        </article>
    </section>
    @if ($modal === 'edit-selection-card')
        <livewire:pages.selection.edit-selection-card :key="'edit-selection-card'.now()->timestamp" />
    @endif
</article>
