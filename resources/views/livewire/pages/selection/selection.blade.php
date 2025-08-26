<main class="flex flex-col gap-10 p-4 sm:p-8 ml-72">
    <h1 class="text-3xl font-bold">Détentes</h1>

    <a href="" wire:click.prevent="openmodal('create-selection')" class="text-xs">
        <x-buttons.white-button>
            <x-icons.transfer-money/>
            Créer une nouvelle détente
        </x-buttons.white-button>
    </a>

    @if ($modal === 'create-selection')
        <livewire:pages.selection.create-selection
            :key="'create-selection-'.now()->timestamp"
        />
    @endif

    <section class="flex flex-col gap-6">
        <h2 class="mb-2 text-2xl font-bold">Actives</h2>
        @if($activeSelections->isEmpty())
            <p class="text-gray-500 text-sm">Aucune sélection active disponible.</p>
        @else
            @foreach($activeSelections as $selection)
                <livewire:pages.selection.selection-card :selection="$selection" :key="$selection->id" />
            @endforeach
        @endif

        <h2 class="mb-2 text-2xl font-bold">En attente</h2>
        @if($pendingSelections->isEmpty())
            <p class="text-gray-500 text-sm">Aucune sélection en attente disponible.</p>
        @else
            @foreach($pendingSelections as $selection)
                <livewire:pages.selection.selection-card :selection="$selection" :key="$selection->id" />
            @endforeach
        @endif

        <h2 class="mb-2 text-2xl font-bold">Fermées</h2>
        @if($closedSelections->isEmpty())
            <p class="text-gray-500 text-sm">Aucune sélection fermée disponible.</p>
        @else
            @foreach($closedSelections as $selection)
                <livewire:pages.selection.selection-card :selection="$selection" :key="$selection->id" />
            @endforeach
        @endif
    </section>

</main>
