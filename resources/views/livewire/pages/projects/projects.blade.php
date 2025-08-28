<main class="flex flex-col gap-6">
    <h1 class="mb-8 text-3xl font-bold">Projets</h1>
    <div class="flex flex-col gap-6  rounded-xl">
        <h2 class="text-xl font-semibold text-black">Tous mes projets</h2>

        <ul class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($projects as $project)
                <li class="bg-zinc-900 rounded-xl shadow-md p-5 flex flex-col justify-between hover:shadow-lg transition-shadow text-white">
                    <div class="flex justify-between items-start gap-2">
                        <h3 class="text-lg font-bold ">{{ $project->name }}</h3>
                        <button type="button"  wire:click.stop.prevent="openmodal('edit-project', {{ $project->id }})"
                                class="px-2 py-1 bg-amber-200  rounded hover:bg-amber-300">
                            <x-icons.edit></x-icons.edit>
                        </button>
                    </div>
                    <p class="mt-4 text-sm text-white">{{ $project->description }}</p>

                    @if($project->tags && count($project->tags) > 0)
                        <div class="mt-3 flex flex-wrap gap-2">
                            @foreach($project->tags as $tag)
                                <span class="px-2 py-1 bg-blue-200 rounded-full text-xs ">{{ $tag->name }}</span>
                            @endforeach
                        </div>
                    @endif
                </li>
            @endforeach
        </ul>
    </div>
    @if ($modal === 'edit-project')
        <livewire:pages.projects.edit-project
            :key="'edit-project-' . ($modalParams['timestamp'] ?? now()->timestamp)"
        />
    @endif
</main>
