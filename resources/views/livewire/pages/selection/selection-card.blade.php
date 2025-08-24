<article class="flex flex-col gap-6 p-6 bg-white rounded-3xl shadow border">
    <h3 class="text-xl font-semibold">Participants attribués</h3>
    <div class="overflow-x-auto">
        <table class=" border border-gray-200 rounded-lg overflow-hidden">
            <thead class="bg-gray-100">
            <tr>
                <th class="px-4 py-2 text-left text-sm font-semibold text-gray-700">Name</th>
                <th class="px-4 py-2 text-left text-sm font-semibold text-gray-700">Email</th>
                <th class="px-4 py-2 text-left text-sm font-semibold text-gray-700">Status</th>
            </tr>
            </thead>
            <tbody>
            @forelse($donators->sortBy('selection_count') as $donator)
                <tr class="border-b border-gray-200 hover:bg-gray-50">
                    <td class="px-4 py-2 text-gray-800">{{ $donator->name }}</td>
                    <td class="px-4 py-2 text-gray-800">{{ $donator->email }}</td>
                    <td class="px-4 py-2 text-gray-800">{{ $donator->selection_count }}</td>

                </tr>
            @empty
                <tr>
                    <td colspan="4" class="px-4 py-2 text-gray-500 text-sm text-center">
                       Il n'y a pas de particpiants attribués à cette déténte
                    </td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>

    <!-- Projets TODO-->
    <section class="flex flex-col px-5 pb-5 rounded-xl max-w-full">
        <header class="flex flex-col justify-center w-full text-xl font-semibold text-black">
            <div class="flex items-center w-full">
                <h1 class="flex gap-1.5 items-center self-stretch my-auto">
                    <img
                        loading="lazy"
                        src="https://cdn.builder.io/api/v1/image/assets/TEMP/7915c9c47de630a1228e8b6b67784a11c7a3f2e44114b73c6388854ab1ed2483?placeholderIfAbsent=true&apiKey=2b615783ce9a425699ca8b86f7f04ecc"
                        alt="Project assignment icon"
                        class="object-contain shrink-0 my-auto w-6 aspect-square"
                    />
                    <span class="gap-2.5 self-stretch my-auto">Projet(s) attribué(s)</span>
                </h1>
            </div>
            <img
                loading="lazy"
                src="https://cdn.builder.io/api/v1/image/assets/TEMP/0796c911cf0a031ce09cc95f661d11c7cd4946ea90bbed48349da1104096469e?placeholderIfAbsent=true&apiKey=2b615783ce9a425699ca8b86f7f04ecc"
                alt="Project overview illustration"
                class="object-contain mt-5 w-full max-md:max-w-full"
            />
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
    </section>
</article>
