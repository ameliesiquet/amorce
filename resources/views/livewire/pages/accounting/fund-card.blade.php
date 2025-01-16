<section class="sm:max-w-full w-full mx-0 sm:mx-auto">
    <div class="flex flex-col mx-2 sm:mx-2 gap-2 px-8 py-5 bg-white rounded-3xl border border-solid border-black border-opacity-10  2xl:justify-between shadow-[0px_0px_4px_rgba(0,0,0,0.2)] md:px-12 md:py-10  2xl:px-12">
        <div class="flex flex-col gap-5 justify-center sm:w-full  sm:mx-auto text-xl font-semibold text-black md:text-lg lg:text-xl">
            <h3 class="flex gap-1.5 items-center self-stretch my-auto">{{ $fund->title }}</h3>
            <hr>
        </div>

        <x-fund-info-card :total="$total" :income="$income" :expenses="$expenses" />



        <article class="flex flex-col mt-5 sm:w-full">
            <div class="flex flex-col gap-4 justify-center sm:w-full">
                <h4 class="text-lg font-semibold text-black md:text-base lg:text-lg">Transactions</h4>
                <x-search-and-filter field="search" label="Rechercher une transaction"/>
            </div>
            <x-fund-transactions :fund="$fund" :transactions="$transactions" :search="$search"></x-fund-transactions>



        </article>

        <div class="flex flex-wrap gap-8 items-end justify-between text-xs text-black md:gap-6 lg:gap-8">
            <a href="" wire:click.prevent="openmodal('make-transaction', {{ $fund->id }})" class="text-xs">
                <x-white-button>
                    <x-icons.transfer-money/>
                    Faire une transaction
                </x-white-button>
            </a>
        </div>
    </div>
</section>
