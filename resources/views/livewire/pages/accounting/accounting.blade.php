<main class="flex flex-col mt-2 sm:mt-6 gap-6  sm:gap-8 md:gap-10 py-16 px-8 sm:px-14 md:px-20 lg:px-24 lg:ml-64 ">
    <h1 class=" text-3xl font-bold">Comptabilité</h1>
    <livewire:components.accounting-cards/>

    <section class="flex flex-wrap gap-4 lg:gap-8 sm:justify-between items-center m-auto sm:m-0">
        <a href="">
            <x-yellow-button>
                <x-icons.add/>
                Ajouter un fond
            </x-yellow-button>
        </a>
        <div class="flex gap-4">
            <a href="" wire:click.prevent="openmodal('add-donation',{{$funds}})">
                <x-white-button>
                    <x-icons.add/>
                    <p>
                        Ajouter un don cash
                    </p>
                </x-white-button>
            </a>
            <x-yellow-button>
                <x-icons.import/>
                Importer un fichier CSV
            </x-yellow-button>
        </div>

    </section>

    <section class="grid grid-cols-1 2xl:grid-cols-2 gap-6">
        @foreach($funds as $fund)
                <livewire:pages.accounting.fund-card :fund="$fund"/>
        @endforeach
    </section>


    <livewire:pages.accounting.specific-funds/>
</main>
