<main class="flex flex-col gap-10 p-4 sm:p-8  ml-72">
    <h1 class="mb-8 text-3xl font-bold">Comptabilité</h1>
    <!-- Accounting Cards -->
    <livewire:components.accounting-cards/>

    <section class="flex flex-wrap gap-10 justify-between items-center">
        <!-- Add Button  -->
        <x-yellow-button>
            <x-icons.add/>
            Ajouter un fond
        </x-yellow-button>

        <!-- Import Button  -->
        <x-yellow-button>
            <x-icons.import/>
            Importer un fichier CSV
        </x-yellow-button>
    </section>

    <section class="flex flex-row gap-10">
        @foreach($funds as $fund)
            <div class="flex flex-col gap-4">
                <livewire:fund-card :fund="$fund"/>
            </div>
        @endforeach
    </section>
    <section class="flex flex-wrap gap-10 justify-between items-center">
        <!-- Search Form-->
        <form class="flex gap-1.5 items-center self-stretch p-3 my-auto rounded-xl border border-solid border-neutral-400 text-zinc-500">
            <label for="searchInput" class="sr-only">Rechercher un font</label>
            <x-icons.search/>
            <input type="search" id="searchInput" placeholder="Rechercher un font" class="bg-transparent border-none p-0 w-full"/>
        </form>
    </section>


    <section class="flex flex-row gap-10">
        @foreach($specificFunds as $specificFund)
            @livewire('specific-fund-card', ['fund' => $specificFund])
        @endforeach
    </section>
</main>
