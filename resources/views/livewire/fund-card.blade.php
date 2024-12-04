<div class="flex flex-col gap-4 px-10 py-7 bg-white rounded-3xl border border-solid border-black border-opacity-10 max-w-full shadow-[0px_0px_4px_rgba(0,0,0,0.2)] max-md:px-5">
    <section class="flex flex-col gap-5 justify-center w-full text-2xl font-semibold text-black max-md:max-w-full">
        <h3 class="flex gap-1.5 items-center self-stretch my-auto">{{$fund->title}}</h3>
        <hr>
    </section>

    <x-fund-info-card :fund="$fund"/>

    <!-- Transactions Section -->
    <section class="flex flex-col mt-5 w-full">
        <div class="flex flex-col gap-4 justify-center w-full">
            <div class="flex gap-3 items-start align-middle self-start text-xl font-semibold text-black">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M6 9L12 15L18 9" stroke="#21272A" stroke-width="1.5" stroke-linecap="round"
                          stroke-linejoin="round"/>
                </svg>
                <h2>Transactions</h2>
            </div>
            <x-search-and-filter field="search" label="Rechercher une transaction" />

        </div>
        <x-fund-transactions :fund="$fund" :transactions="$this->transactions"></x-fund-transactions>
    </section>
    <!-- Action Buttons -->
    <div class="flex flex-wrap gap-10 items-end justify-between  w-full text-xs text-black mt-auto">
        <a href="" wire:click.prevent="openmodal('make-transaction',{!! $fund !!})">

        <x-white-button >
                <x-icons.transfer-money/>
                Faire une transaction
            </x-white-button>
        </a>

        <x-yellow-button>
            <x-icons.add/>
            Ajouter une transaction
        </x-yellow-button>
    </div>
</div>
