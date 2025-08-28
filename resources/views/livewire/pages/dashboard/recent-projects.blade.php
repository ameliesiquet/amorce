<div class="flex flex-col gap-6 rounded-xl">
    <h2 class="text-xl font-semibold text-black">Mes derniers projets</h2>

    <ul class="grid grid-cols-1 sm:grid-cols-2 gap-6">
        @foreach($projects as $project)
            <li class="bg-zinc-900 rounded-xl shadow-md p-5 flex flex-col justify-between hover:shadow-lg transition-shadow text-white">
                <div class="flex justify-between items-start gap-2">
                    <h3 class="text-lg font-bold">{{ $project->name }}</h3>
                </div>
                <p class="mt-4 text-sm text-white">{{ $project->description }}</p>

                @if($project->tags && count($project->tags) > 0)
                    <div class="mt-3 flex flex-wrap gap-2">
                        @foreach($project->tags as $tag)
                            <span class="px-2 py-1 bg-blue-200 rounded-full text-xs text-black">{{ $tag->name }}</span>
                        @endforeach
                    </div>
                @endif
            </li>
        @endforeach
            <a href="{{ route('projects') }}">
                <x-buttons.yellow-button>Voir tous mes projets</x-buttons.yellow-button>
            </a>
    </ul>
</div>
