<main class="flex flex-col gap-10 p-4 sm:p-8 ml-72">
    <h1 class="mb-8 text-3xl font-bold">Détentes</h1>

    <a href="" wire:click.prevent="openmodal('create-selection')" class="text-xs">
        <x-buttons.yellow-button>
            <x-icons.transfer-money/>
            Créer une nouvelle détente
        </x-buttons.yellow-button>
    </a>

    @if ($modal === 'create-selection')
        <livewire:pages.selection.create-selection
            :key="'create-selection-'.now()->timestamp"
        />
    @endif

    <section class="flex flex-col gap-6">
        @foreach($selections as $selection)
            <article class="flex flex-col gap-6 px-6 py-8 bg-white rounded-3xl border border-solid border-black border-opacity-10 max-w-full shadow-[0px_0px_4px_rgba(0,0,0,0.2)]">
                <div class="flex flex-col gap-2">
                    <h3 class="text-2xl font-semibold">{{ $selection->name }}</h3>
                    <hr>
                </div>

                @foreach($selections as $selection)
                    <livewire:pages.selection.selection-card :selection="$selection" :key="$selection->id" />
                @endforeach

            </article>
        @endforeach
    </section>
</main>
