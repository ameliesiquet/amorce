<nav class="bg-zinc-900  flex-grow ">
    <h2 class="sr-only">Navigation</h2>
    <section class="flex flex-col mt-6">
        <div class="mb-4 pl-8 pr-8 pt-2 pb-2 hover:bg-gray-600 active:bg-gray-700">
            <a class="group flex gap-3 items-center py-3 " href="{{ route('dashboard') }}">
                <x-icons.home/>
                <div class="text-white group-hover:text-white group-active:text-white">Dashboard</div>
            </a>
        </div>
        <div class="mb-4 pl-8 pr-8 pt-2 pb-2 hover:bg-gray-600 active:bg-gray-700">
            <a class="group flex gap-3 items-center py-3 " href="{{ route('projects') }}">
                <x-icons.projects/>
                <div class="text-white group-hover:text-white group-active:text-white">Projets</div>
            </a>
        </div>
        <div class="mb-4 pl-8 pr-8 pt-2 pb-2 hover:bg-gray-600 active:bg-gray-700">
            <a class="group flex gap-3 items-center py-3 " href="{{ route('accounting') }}">
                <x-icons.accounting/>
                <div class="text-white group-hover:text-white group-active:text-white">Comptabilité</div>
            </a>
        </div>
        <div class="mb-4 pl-8 pr-8 pt-2 pb-2 hover:bg-gray-600 active:bg-gray-700">
            <a class="group flex gap-3 items-center py-3 " href="{{ route('selection') }}">
                <x-icons.selections/>
                <div class="text-white group-hover:text-white group-active:text-white">Détentes</div>
            </a>
        </div>
        <div class="mb-4 pl-8 pr-8 pt-2 pb-2 hover:bg-gray-600 active:bg-gray-700">
            <a class="group flex gap-3 items-center py-3 " href="{{ route('meeting') }}">
                <x-icons.meeting/>
                <div class="text-white group-hover:text-white group-active:text-white">Réunion</div>
            </a>
        </div>
        <div class="mb-4 pl-8 pr-8 pt-2 pb-2 hover:bg-gray-600 active:bg-gray-700">
            <a class="group flex gap-3 items-center py-3 " href="{{ route('newsletter') }}">
                <x-icons.newsletter/>
                <div class="text-white group-hover:text-white group-active:text-white">Newsletter</div>
            </a>
        </div>
    </section>
</nav>

