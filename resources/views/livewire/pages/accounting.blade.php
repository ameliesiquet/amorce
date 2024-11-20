<main class="flex-1 p-16">
    <h1 class="mb-8 text-3xl font-bold">Comptabilité</h1>
    <!-- Cards -->
    <section class="cards flex flex-wrap gap-10 items-center">
        <!-- Revenue Card -->
        <article class="revenue-card flex gap-5 items-start  px-5 py-8 bg-white rounded-2xl shadow-md  sm:w-auto">
            <svg width="36" height="36" viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                <g id="icon / iconoir / money-square">
                    <path id="Vector"
                          d="M4.5 30.6V5.4C4.5 4.90294 4.90294 4.5 5.4 4.5H30.6C31.0971 4.5 31.5 4.90294 31.5 5.4V30.6C31.5 31.0971 31.0971 31.5 30.6 31.5H5.4C4.90294 31.5 4.5 31.0971 4.5 30.6Z"
                          stroke="#21272A" stroke-width="1.5"/>
                    <path id="Vector_2"
                          d="M18 24.5865V27.75M22.5 12.75C21.4725 11.7225 19.6631 11.0078 18 10.9631L22.5 12.75ZM13.5 22.5C14.4667 23.789 16.2642 24.5241 18 24.5865L13.5 22.5ZM18 10.9631C16.0213 10.9098 14.25 11.805 14.25 14.25C14.25 18.75 22.5 16.5 22.5 21C22.5 23.5665 20.3043 24.6693 18 24.5865V10.9631ZM18 10.9631V8.25V10.9631Z"
                          stroke="#21272A" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                </g>
            </svg>
            <div class="flex flex-col">
                <div class="flex justify-between items-end gap-5">
                    <h2 class="text-xl font-medium text-black">Revenus</h2>
                    <time class="text-base text-gray-600">Dernier mois</time>
                </div>
                <div class="flex gap-5 items-center mt-5">
                    <p class="text-4xl font-semibold text-black">11.032€</p>
                    <div class="flex items-center gap-1.5 text-green-600">
                        <p class="text-xl">8.79%</p>
                        <svg width="34" height="34" viewBox="0 0 34 34" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g id="icon / iconoir / arrow-up">
                                <path id="Vector"
                                      d="M20.3405 11.9256L11.9876 13.4188M13.195 22.1819L20.3405 11.9256L13.195 22.1819ZM20.3405 11.9256L21.8337 20.2785L20.3405 11.9256Z"
                                      stroke="#25A249" stroke-width="1.5" stroke-linecap="round"
                                      stroke-linejoin="round"/>
                            </g>
                        </svg>
                    </div>
                </div>
            </div>
        </article>
        <!-- Expenses Card -->
        <article class="revenue-card flex gap-5 items-start  px-5 py-8 bg-white rounded-2xl shadow-md  sm:w-auto">
            <svg width="36" height="36" viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                <g id="icon / iconoir / money-square">
                    <path id="Vector"
                          d="M4.5 30.6V5.4C4.5 4.90294 4.90294 4.5 5.4 4.5H30.6C31.0971 4.5 31.5 4.90294 31.5 5.4V30.6C31.5 31.0971 31.0971 31.5 30.6 31.5H5.4C4.90294 31.5 4.5 31.0971 4.5 30.6Z"
                          stroke="#21272A" stroke-width="1.5"/>
                    <path id="Vector_2"
                          d="M18 24.5865V27.75M22.5 12.75C21.4725 11.7225 19.6631 11.0078 18 10.9631L22.5 12.75ZM13.5 22.5C14.4667 23.789 16.2642 24.5241 18 24.5865L13.5 22.5ZM18 10.9631C16.0213 10.9098 14.25 11.805 14.25 14.25C14.25 18.75 22.5 16.5 22.5 21C22.5 23.5665 20.3043 24.6693 18 24.5865V10.9631ZM18 10.9631V8.25V10.9631Z"
                          stroke="#21272A" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                </g>
            </svg>
            <div class="flex flex-col">
                <div class="flex flex-col">
                    <div class="flex justify-between items-end gap-5">
                        <h2 class="text-xl font-medium text-black">Dépenses</h2>
                        <time class="text-base text-gray-600">Dernier mois</time>
                    </div>
                    <div class="flex gap-5 items-center mt-5">
                        <p class="text-4xl font-semibold text-black">11.032€</p>
                        <div class="flex items-center gap-1.5 text-red-600">
                            <p class="text-xl">8.79%</p>
                            <svg width="34" height="34" viewBox="0 0 34 34" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M19.5875 22.3211L21.7837 14.125M13.3375 11.4958L19.5875 22.3211L13.3375 11.4958ZM19.5875 22.3211L11.3914 20.125L19.5875 22.3211Z" stroke="#DA1E28" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
        </article>
    </section>
    <livewire:button
        text="Hinzufügen"
        logo='<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M12 2V22M2 12H22" stroke="#000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>'
        bgColor="blue-500"
    />
    <section class="flex flex-wrap gap-9 items-center text-base">
        <button class="flex gap-1.5 items-center self-stretch px-4 py-4 my-auto text-black bg-amber-200 rounded-xl min-h-[49px] shadow-[0px_0px_4px_rgba(0,0,0,0.5)]">
            <img loading="lazy" src="https://cdn.builder.io/api/v1/image/assets/TEMP/4abcd55e8e97bbbcb20824ed29f4323a84e50393e96be7c07f19124d11f5116a?placeholderIfAbsent=true&apiKey=2b615783ce9a425699ca8b86f7f04ecc" alt="" class="object-contain shrink-0 self-stretch my-auto w-3.5 aspect-square" />
            <span>ajouter un fond</span>
        </button>

        <form role="search" class="flex gap-1.5 items-center self-stretch p-4 my-auto rounded-xl border border-solid border-neutral-400 min-w-[240px] text-zinc-500 w-[416px]">
            <label for="searchInput" class="sr-only">Rechercher un font</label>
            <img loading="lazy" src="https://cdn.builder.io/api/v1/image/assets/TEMP/c8ffd2ba7e1e60318db708d8ffb011c71602bd91ba8b9817ded884a4327baacd?placeholderIfAbsent=true&apiKey=2b615783ce9a425699ca8b86f7f04ecc" alt="" class="object-contain shrink-0 self-stretch my-auto aspect-square w-[19px]" />
            <input
                type="search"
                id="searchInput"
                placeholder="Rechercher un font"
                class="bg-transparent border-none outline-none w-full"
            />
        </form>
    </section>

    <x-primary-button> ajouter une transaction</x-primary-button>
</main>
