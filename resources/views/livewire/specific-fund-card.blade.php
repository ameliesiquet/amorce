<section class="flex flex-wrap gap-10 items-center text-black">
    <article
        class="flex flex-col justify-center self-stretch px-8 py-9 my-auto bg-white rounded-3xl border border-solid border-black border-opacity-10 min-h-[231px] shadow-[0px_0px_4px_rgba(0,0,0,0.2)] max-md:px-5">
        <div class="flex flex-col justify-center w-full text-2xl font-semibold">
            <div class="flex gap-10 justify-between items-center w-full">
                <h2 class="flex gap-1.5 items-center self-stretch my-auto">{{$specificFund->title}}</h2>
                <div>
                    <a href="" wire:click.prevent="openmodal('fund-edit',{{$specificFund}})">
                        <x-icons.edit />
                    </a>
                </div>



            </div>

        </div>
        <div class="flex gap-10 mt-5 w-full justify-between">
            <div
                class="flex flex-col justify-center self-end p-5 whitespace-nowrap bg-amber-200 rounded-md border border-solid border-black border-opacity-10 shadow-[0px_0px_4px_rgba(0,0,0,0.25)]">
                <p class="self-start text-xs font-medium text-center">Total</p>
                <p class="mt-1.5 text-2xl font-semibold">{{$specificFund->total}}€</p>
            </div>
            <div class="flex flex-col gap-4 justify-between items-end text-xs">
                <x-yellow-button>
                    <x-icons.add/>
                    <p>
                        Ajouter une transaction
                    </p>
                </x-yellow-button>
                <x-white-button>
                    <x-icons.transfer-money/>
                    Faire une transaction
                </x-white-button>
            </div>
        </div>
    </article>
</section>
