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
                <livewire:fund-card :fund="$fund"/>
        @endforeach
    </section>


    <livewire:specific-funds/>
</main>
