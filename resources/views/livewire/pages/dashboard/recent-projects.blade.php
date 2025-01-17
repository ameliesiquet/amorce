<section class="recent-project">
    <div
        class="flex flex-col gap-4 px-8 py-5 mx-auto w-full bg-white rounded-3xl border border-solid border-black border-opacity-10 max-w-sm shadow-[0px_0px_4px_rgba(0,0,0,0.25)]"
        role="region" aria-label="Current Projects Section">
        <div class="flex flex-col gap-2 justify-center w-full text-2xl font-semibold text-black">
            <div class="flex justify-between items-center">
                <h2 class="gap-2.5 self-stretch my-auto">Projets en cours</h2>
                <x-icons.edit/>
            </div>
            <hr>
        </div>
        <x-search-and-filter field="search" label="Rechercher un projet"/>
        <div class="flex flex-col gap-4">
            <div
                class="flex overflow-hidden over flex-col py-6 px-4  w-full border rounded-xl border-black border-opacity-10 shadow-[0px_4px_4px_rgba(0,0,0,0.25)]"
                role="list">
                <div
                    class="flex flex-col items-start py-8 pr-8 pl-5 w-full rounded-xl border border-black border-solid bg-stone-900 shadow-[0px_0px_4px_rgba(0,0,0,0.25)]"
                    role="listitem">
                    <div class="py-0.5 text-xl font-semibold text-white">
                        Travail pour l'agence de liège
                    </div>
                    <div class="mt-3 text-xs leading-4 text-white">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent mattis
                        ligula vel dolor feugiat, eu tempor diam accumsan. Sed lacinia eu nulla
                        in finibus. Donec a lacus ac risus tincidunt tempus. Mauris sit amet
                        metus lupus corruptus ...
                    </div>
                    <div class="flex gap-10 justify-between items-start mt-3 w-full">
                        <x-blue-button>
                            Agence liège
                        </x-blue-button>
                        <x-see-arrow-right/>
                    </div>
                </div>
                <div
                    class="flex flex-col items-start py-8 pr-8 pl-5 mt-4 w-full rounded-xl border border-black border-solid bg-stone-900 shadow-[0px_0px_4px_rgba(0,0,0,0.25)]"
                    role="listitem">
                    <div class="py-0.5 text-xl font-semibold text-white">
                        Travail pour l'agence de liège
                    </div>
                    <div class="mt-3 text-xs leading-4 text-white">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent mattis
                        ligula vel dolor feugiat, eu tempor diam accumsan. Sed lacinia eu nulla
                        in finibus. Donec a lacus ac risus tincidunt tempus. Mauris sit amet
                        metus lupus corruptus ...
                    </div>
                    <div class="flex gap-10 justify-between items-start mt-3 w-full">
                        <x-blue-button>
                            Agence liège
                        </x-blue-button>
                        <x-see-arrow-right/>
                    </div>
                </div>
            </div>
            <div class="m-auto">
                <x-yellow-button>
                    Ajouter un projet
                    <x-icons.add/>
                </x-yellow-button>
            </div>
        </div>

    </div>
</section>
