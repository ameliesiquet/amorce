<section class="flex flex-col gap-6 p-6">
    <h1 class="text-3xl font-bold mb-6">Réunion</h1>
    <div class="mb-6 max-w-md">
        <input type="text" placeholder="Rechercher une réunion"
               class="w-full border border-gray-300 rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-amber-200" />
    </div>
    <div class="flex flex-col lg:flex-row gap-6">
        <div class="flex-1 bg-white rounded-2xl shadow-md p-6 max-w-lg">
            <livewire:pages.dashboard.calendar />
        </div>
        <div class="flex-1 bg-white rounded-2xl shadow-md p-6 max-w-lg">
            <h2 class="text-xl font-semibold mb-4">Aujourd’hui - 02/11/2024</h2>

            <div class="bg-gray-900 text-white rounded-xl p-6 flex flex-col gap-4">
                <h3 class="text-lg font-bold">{{ $project->name }}</h3>
                <p class="mt-4 text-sm">{{ $project->description }}</p>

                @if($project->tags && $project->tags->count() > 0)
                    <div class="mt-3 flex flex-wrap gap-2">
                        @foreach($project->tags as $tag)
                            <span class="px-2 py-1 bg-blue-200 rounded-full text-xs text-black">{{ $tag->name }}</span>
                        @endforeach
                    </div>
                @endif
                <div class="mt-4 inline-block">
                    <x-buttons.yellow-button>
                        download PDF
                    </x-buttons.yellow-button>
                </div>

            </div>

        </div>
</section>
