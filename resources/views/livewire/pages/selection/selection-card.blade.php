<article x-data="{ open: false }" class="flex flex-col gap-2 border rounded-lg shadow p-4">
    <!-- Header -->
    <header @click="open = !open" class="cursor-pointer flex justify-between items-center">
        <h3 class="text-lg font-semibold">{{ $selection->name }}</h3>
        <button class="text-xs lg:text-sm xl:text-l px-2 py-1 text-black bg-amber-200 rounded-xl shadow hover:bg-amber-100">
            <span x-text="open ? '-' : '+'" class="text-xl"></span>
        </button>
    </header>

    <!-- Collapsible content -->
    <section x-show="open" x-transition class="mt-2 flex flex-col gap-6">
        <hr class="mb-2">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            {{-- Participants confirmés --}}
            <div>
                <h4 class="text-xl font-medium mb-4">Participants confirmés</h4>
                <table class="border border-gray-200 rounded-lg overflow-hidden w-full">
                    <thead class="bg-gray-200">
                    <tr>
                        <th class="px-4 py-2 text-left text-sm font-semibold text-gray-700">Nom</th>
                        <th class="px-4 py-2 text-left text-sm font-semibold text-gray-700">Email</th>
                        <th class="px-4 py-2 text-left text-sm font-semibold text-gray-700">Status</th>
                        <th class="px-4 py-2 text-left text-sm font-semibold text-gray-700">Disponibilité</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($selection->donators->where('disponibility', true) as $donator)
                        <tr class="border-b border-gray-200 hover:bg-gray-50">
                            <td class="px-4 py-2">{{ $donator->name }}</td>
                            <td class="px-4 py-2">{{ $donator->email }}</td>
                            <td class="px-4 py-2">{{ $donator->selection_count }}</td>
                            <td class="px-4 py-2">
                                <button type="button" wire:click="makeParticipantNo({{ $donator->id }})"
                                        class="px-2 py-1 bg-red-500 hover:bg-red-600 text-white rounded">
                                    Annuler
                                </button>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

            {{-- Participants en attente --}}
            <div>
                <h4 class="text-xl font-medium mb-4">Participants en attente</h4>
                <table class="border border-gray-200 rounded-lg overflow-hidden w-full">
                    <thead class="bg-gray-200">
                    <tr>
                        <th class="px-4 py-2 text-left text-sm font-semibold text-gray-700">Nom</th>
                        <th class="px-4 py-2 text-left text-sm font-semibold text-gray-700">Email</th>
                        <th class="px-4 py-2 text-left text-sm font-semibold text-gray-700">Status</th>
                        <th class="px-4 py-2 text-left text-sm font-semibold text-gray-700">Disponibilité</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($selection->donators->where('disponibility', false) as $donator)
                        <tr class="border-b border-gray-200 hover:bg-gray-50">
                            <td class="px-4 py-2">{{ $donator->name }}</td>
                            <td class="px-4 py-2">{{ $donator->email }}</td>
                            <td class="px-4 py-2">{{ $donator->pivot->status_in_selection }}</td>
                            <td class="px-4 py-2 flex gap-2">
                                <button type="button" wire:click="makeParticipantYes({{ $donator->id }})"
                                        class="px-2 py-1 bg-green-500 hover:bg-green-600 text-white rounded">
                                    Valider
                                </button>
                                <button type="button" wire:click="redrawParticipant({{ $donator->id }})"
                                        class="px-2 py-1 bg-yellow-400 hover:bg-yellow-500 text-white rounded">
                                    Retirer
                                </button>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Projets TODO-->
        <div class="flex flex-col px-5 pb-5 rounded-xl max-w-full">
            <header class="flex flex-col justify-center w-full text-xl font-semibold text-black">
                <div class="flex items-center w-full">
                    <h1 class="flex gap-1.5 items-center self-stretch my-auto">
                        <span class="gap-2.5 self-stretch my-auto">Projet(s) attribué(s)</span>
                    </h1>
                </div>
            </header>
            <!-- Projet -->
            <main class="flex flex-col mt-5 w-full">
                <article
                    class="flex flex-col py-8 pr-8 pl-5 w-full rounded-xl border border-black border-solid bg-stone-900 shadow-[0px_0px_4px_rgba(0,0,0,0.25)] max-md:pr-5"
                >
                    <h2 class="pb-7 w-full text-xl font-semibold text-white">Travail pour l'agence de liège</h2>
                    <p class="pb-6 mt-3 w-full text-sm leading-5 text-white">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent mattis
                        ligula vel dolor feugiat, eu tempor diam accumsan. Sed lacinia eu nulla
                        in finibus. Donec a lacus ac risus tincidunt tempus. Mauris sit amet
                        metus lupus corruptus ...
                    </p>
                    <footer class="flex gap-10 justify-between items-start mt-3 w-full">
                <span
                    role="status"
                    class="gap-2.5 self-stretch px-2 py-1.5 text-xs text-black bg-sky-200 rounded-[30px]"
                >
                    Agence liège
                </span>
                        <button
                            class="flex gap-2.5 items-center px-1.5 py-2 bg-amber-200 rounded-[30px] w-[21px]"
                            aria-label="Project options"
                        >
                            <img
                                loading="lazy"
                                src="https://cdn.builder.io/api/v1/image/assets/TEMP/45eff1e368f5f93b85df28ace8cae39d9903ce86aa01e02146bf11f23b52138f?placeholderIfAbsent=true&apiKey=2b615783ce9a425699ca8b86f7f04ecc"
                                alt=""
                                class="object-contain self-stretch my-auto w-2 aspect-square stroke-[1px] stroke-zinc-800"
                            />
                        </button>
                    </footer>
                </article>

                <button
                    class="flex gap-4 items-center self-end px-6 py-2.5 mt-4 text-xs text-black whitespace-nowrap bg-amber-200 rounded-md shadow-[0px_4px_4px_rgba(0,0,0,0.25)] max-md:px-5"
                >
                    <img
                        loading="lazy"
                        src="https://cdn.builder.io/api/v1/image/assets/TEMP/2f4eec387146b341f8af4ce70fd511594443eb2e958e01ec808a2bdaef55eff3?placeholderIfAbsent=true&apiKey=2b615783ce9a425699ca8b86f7f04ecc"
                        alt=""
                        class="object-contain shrink-0 self-stretch my-auto w-3.5 aspect-square"
                    />
                    <span>button</span>
                </button>
            </main>
        </div>
    </section>

</article>
