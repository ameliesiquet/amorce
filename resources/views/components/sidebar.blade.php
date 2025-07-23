<nav class="justify-end">
    <h2 class="sr-only">Navigation</h2>
    <button data-drawer-target="default-sidebar" data-drawer-toggle="default-sidebar" aria-controls="default-sidebar"
            type="button"
            class="inline-flex items-center p-2 mt-2 ms-3 text-sm text-gray-500 rounded-lg lg:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200">
        <span class="sr-only">Open sidebar</span>
        <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
             xmlns="http://www.w3.org/2000/svg">
            <path clip-rule="evenodd" fill-rule="evenodd"
                  d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"></path>
        </svg>
    </button>

    <aside id="default-sidebar"
           class="fixed top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full lg:translate-x-0 lg:static lg:w-64"
           aria-label="Sidebar">
        <div class="h-full px-3 py-4 overflow-y-auto bg-zinc-900">
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
            <div class="mt-auto pl-8 pr-8 pt-2 pb-2 hover:bg-amber-200 hover:text-zinc-900 active:bg-amber-200">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="text-white underline hover:text-zinc-900 w-full text-left">
                        Déconnexion
                    </button>
                </form>
            </div>
        </div>

    </aside>

</nav>

