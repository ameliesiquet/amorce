<article x-data="{ open: false }" class="flex flex-col gap-2 border rounded-lg shadow p-4">


    <!-- Header -->
    <header @click="open = !open" class="cursor-pointer flex justify-between items-center">
        <h3 class="text-xl font-semibold">{{ $selection->name }}</h3>
        <button
            class="text-xs lg:text-sm xl:text-l px-2 py-1 text-black bg-amber-200 rounded-xl shadow hover:bg-amber-100">
            <span x-text="open ? '-' : '+'" class="text-xl"></span>
        </button>
    </header>

    <section x-show="open" x-transition class="mt-2 flex flex-col gap-6">
        <button
            type="button"
            wire:click.prevent="openmodal('edit-selection-card')"
            class="text-xs px-3 py-1 ounded shadow align-middle">
            <x-icons.edit></x-icons.edit>
        </button>
        <hr class="mb-2">
        <article class="grid grid-cols-1 md:grid-cols-2 gap-6">
            {{-- Participants confirmés --}}
            <div>
                <h4 class="text-xl font-medium mb-4">Participants confirmés</h4>
                <table class="border border-gray-200 rounded-lg overflow-hidden w-full">
                    <thead class="bg-gray-200">
                    <tr>
                        <th class="px-4 py-2 text-left text-sm font-semibold text-gray-700">Nom</th>
                        <th class="px-4 py-2 text-left text-sm font-semibold text-gray-700">Email</th>
                        <th class="px-4 py-2 text-left text-sm font-semibold text-gray-700">Status</th>
                        <th class="px-4 py-2 text-left text-sm font-semibold text-gray-700">Disponibilité</th>
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
                                    <x-buttons.red-button>
                                        Annuler
                                    </x-buttons.red-button>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            {{-- Participants en attente --}}
            <div>
                <h4 class="text-xl font-medium mb-4">Participants en attente</h4>
                <table class="border border-gray-200 rounded-lg overflow-hidden w-full">
                    <thead class="bg-gray-200">
                    <tr>
                        <th class="px-4 py-2 text-left text-sm font-semibold text-gray-700">Nom</th>
                        <th class="px-4 py-2 text-left text-sm font-semibold text-gray-700">Email</th>
                        <th class="px-4 py-2 text-left text-sm font-semibold text-gray-700">Status</th>
                        <th class="px-4 py-2 text-left text-sm font-semibold text-gray-700">Disponibilité</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($selection->donators->where('disponibility', false) as $donator)
                        <tr class="border-b border-gray-200 hover:bg-gray-50">
                            <td class="px-4 py-2">{{ $donator->name }}</td>
                            <td class="px-4 py-2">{{ $donator->email }}</td>
                            <td class="px-4 py-2">{{ $donator->pivot->status_in_selection }}</td>
                            <td class="px-4 py-2 flex gap-2">
                                <a href="#" wire:click="makeParticipantYes({{ $donator->id }})">
                                    <x-buttons.green-button>
                                        Valider
                                    </x-buttons.green-button>
                                </a>
                                <a href="#" wire:click="releaseDonator({{ $donator->id }})">
                                    <x-buttons.orange-button>
                                        Retirer
                                    </x-buttons.orange-button>
                                </a>

                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                @if($selection->donators->where('disponibility', false)->count() === 0)
                    <a class=" inline-block mt-4" wire:click="pickNewDonator" >
                        <x-buttons.yellow-button>
                            Tirer un nouveau donateur
                        </x-buttons.yellow-button>
                    </a>
                @endif
            </div>
        </article>

        <article class="grid grid-cols-2 gap-6 max-md:grid-cols-1 py-8 pr-8 pl-5 rounded-xl ">
            <div class=" flex flex-col gap-4">
                <h3 class="text-xl font-medium text-black">Projets</h3>
                {{-- Projets --}}
                <div class="flex flex-col gap-6 bg-black p-4 rounded">
                    <h4 class="text-xl font-medium text-white">Projets attribués</h4>
                    <div class="flex flex-wrap gap-2 mb-4">
                        @foreach($selection->projects as $project)
                            <span
                                class="px-3 py-2 bg-blue-300 rounded-full text-sm text-black">{{ $project->name }}</span>
                        @endforeach
                    </div>
                    <div class="flex flex-col items-start gap-4">
                        <h4 class="text-lg font-medium text-white">Ajouter un projet</h4>
                        <div class="flex flex-row gap-6">
                            <select id="newProject" wire:model="newProjectId"
                                    class="border-gray-300 rounded-md shadow-sm w-fit box-border text-black">
                                <option value="">Sélectionner un projet</option>
                                @foreach($projects as $project)
                                    <option value="{{ $project->id }}">{{ $project->name }}</option>
                                @endforeach
                            </select>
                            <button type="button" wire:click="addProject"
                                    class="px-3 py-1 bg-amber-200 rounded-xl text-black">
                                Ajouter
                            </button>
                        </div>
                    </div>
                    <div class="flex flex-col items-start gap-4">
                        <h4 class="text-lg font-medium text-white">Tous les projets en détail</h4>
                        <ul class="flex flex-col gap-4">
                            @foreach($selection->projects as $project)
                                <li class="px-5 py-3.5 bg-white rounded text-black">
                                    <div class="flex justify-between items-center">
                                        <h4 class="text-lg font-semibold">{{ $project->name }}</h4>
                                        <button type="button" wire:click="removeProject({{ $project->id }})"
                                                class="px-2 py-1 bg-red-500 hover:bg-red-600 text-white rounded">
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
            {{-- Notes --}}
            <div class="flex flex-col gap-4">
                <h4 class="text-xl font-medium">Notes</h4>
                <textarea wire:model="markdownNotes"
                          wire:input="enableEditNotes"
                          class="w-full min-h-[200px] p-4 rounded border border-gray-300 text-black"
                          placeholder="Écrivez ici vos notes...">

                </textarea>


            @if (!$notesSaved)
                    <a href="#" wire:click="saveNotes">
                        <x-buttons.yellow-button>
                            Enregistrer
                        </x-buttons.yellow-button>
                    </a>
                @endif

            @if (session()->has('message'))
                    <span class="text-green-500 mt-2">{{ session('message') }}</span>
                @endif
            </div>
        </article>
    </section>

    @if ($modal === 'edit-selection-card')
        <livewire:pages.selection.edit-selection-card
            :key="'edit-selection-card'.now()->timestamp"
        />
    @endif
</article>
