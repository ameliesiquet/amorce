<section x-data  x-show="$wire.showModal" @close-modal.window="$wire.showModal = false" x-cloak>

<div class="fixed inset-0 z-50 bg-gray-500 bg-opacity-50 flex justify-center items-center">
        <div class="bg-white rounded-3xl shadow-xl w-full max-w-4xl p-8 relative">
            <button
                @click="$dispatch('close-modal')"
                type="button"
                class="relative rounded-md text-gray-300 hover:text-white focus:outline-none focus:ring-2 focus:ring-white mb-4">


            <span class="absolute -inset-2.5"></span>
                <span class="sr-only">Close panel</span>
                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                     stroke="#000000" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12"/>
                </svg>
            </button>


            <div class="flex flex-col mx-2 sm:mx-2 gap-2 px-8 py-5 bg-white rounded-3xl border border-solid border-black border-opacity-10  2xl:justify-between shadow-[0px_0px_4px_rgba(0,0,0,0.2)] md:px-12 md:py-10  2xl:px-12">
                <div class="flex flex-col gap-5 justify-center sm:w-full  sm:mx-auto text-xl font-semibold text-black md:text-lg lg:text-xl">
                    <h3 class="flex gap-1.5 items-center self-stretch my-auto">{{ $specificFund->title }}</h3>
                    <hr>
                </div>
                <x-accounting.fund-info-card :total="$total" :income="$income" :expenses="$expenses" />

                <article class="flex flex-col mt-5 sm:w-full">
                    <div class="flex flex-col gap-4 justify-center sm:w-full">
                        <h4 class="text-lg font-semibold text-black md:text-base lg:text-lg">Transactions</h4>
                        <x-search-and-filter field="search" label="Rechercher une transaction"/>
                    </div>
                    <x-accounting.fund-transactions :fund="$specificFund" :transactions="$transactions" :search="$search"></x-accounting.fund-transactions>
                </article>
            </div>
        </div>
    </div>
</section>
