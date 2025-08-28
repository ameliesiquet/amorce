<div class="flex flex-col text-sm">
    <aside x-data="{ mobileMenuOpen: false }"
           class="lg:hidden"
    >
        <h2 role="heading" aria-level="2" class="sr-only">Principal Navigation Menu</h2>
        <div
            class="fixed top-0 left-0 w-full pl-5 pr-3.5 py-4 h-15 z-50 flex justify-between items-center bg-zinc-900 p-4 shadow-md text-white">
            <a href="{{ route('dashboard') }}"
               title="Back to Homepage"
               class="flex items-center justify-start"
               wire:navigate>
                <x-application-logo class="w-30 h-30"/>
            </a>
            <button @click="mobileMenuOpen = !mobileMenuOpen" class="p-2 rounded-md cursor-pointer">
                <x-icons.menu-animate/>
            </button>
        </div>
        <div
            x-show="mobileMenuOpen"
            x-transition:enter="transition ease-in-out duration-200"
            x-transition:enter-start="opacity-0 translate-x-full"
            x-transition:enter-end="opacity-100 translate-x-0"
            x-transition:leave="transition ease-in duration-150"
            x-transition:leave-start="opacity-100 translate-x-0"
            x-transition:leave-end="opacity-0 translate-x-full"
            class="fixed top-14 right-0 h-screen w-screen bg-zinc-900 text-white z-40 overflow-y-auto flex flex-col items-center gap-8 pt-8"
        >
            <div class="flex flex-col items-center gap-6">
                {{-- Dashboard --}}
                <div class="mb-4 pl-8 pr-8 pt-2 pb-2
            {{ request()->routeIs('dashboard') ? 'bg-zinc-700' : 'hover:bg-zinc-700 active:bg-gray-700' }}">
                    <a class="group flex gap-3 items-center py-3" href="{{ route('dashboard') }}">
                        <x-icons.home/>
                        <div class="text-white group-hover:text-white group-active:text-white">Dashboard</div>
                    </a>
                </div>

                {{-- Projects --}}
                <div class="mb-4 pl-8 pr-8 pt-2 pb-2
            {{ request()->routeIs('projects') ? 'bg-zinc-700' : 'hover:bg-zinc-700 active:bg-gray-700' }}">
                    <a class="group flex gap-3 items-center py-3" href="{{ route('projects') }}">
                        <x-icons.projects/>
                        <div class="text-white group-hover:text-white group-active:text-white">Projets</div>
                    </a>
                </div>

                {{-- Accounting --}}
                <div class="mb-4 pl-8 pr-8 pt-2 pb-2
            {{ request()->routeIs('accounting') ? 'bg-zinc-700' : 'hover:bg-zinc-700 active:bg-gray-700' }}">
                    <a class="group flex gap-3 items-center py-3" href="{{ route('accounting') }}">
                        <x-icons.accounting/>
                        <div class="text-white group-hover:text-white group-active:text-white">Comptabilité</div>
                    </a>
                </div>

                {{-- Selection --}}
                <div class="mb-4 pl-8 pr-8 pt-2 pb-2
            {{ request()->routeIs('selection') ? 'bg-zinc-700' : 'hover:bg-zinc-700 active:bg-gray-700' }}">
                    <a class="group flex gap-3 items-center py-3" href="{{ route('selection') }}">
                        <x-icons.selections/>
                        <div class="text-white group-hover:text-white group-active:text-white">Détentes</div>
                    </a>
                </div>

                {{-- Meeting --}}
                <div class="mb-4 pl-8 pr-8 pt-2 pb-2
            {{ request()->routeIs('meeting') ? 'bg-zinc-700' : 'hover:bg-zinc-700 active:bg-gray-700' }}">
                    <a class="group flex gap-3 items-center py-3" href="{{ route('meeting') }}">
                        <x-icons.meeting/>
                        <div class="text-white group-hover:text-white group-active:text-white">Réunion</div>
                    </a>
                </div>

                {{-- Newsletter --}}
                <div class="mb-4 pl-8 pr-8 pt-2 pb-2
            {{ request()->routeIs('newsletter') ? 'bg-zinc-700' : 'hover:bg-zinc-700 active:bg-gray-700' }}">
                    <a class="group flex gap-3 items-center py-3" href="{{ route('newsletter') }}">
                        <x-icons.newsletter/>
                        <div class="text-white group-hover:text-white group-active:text-white">Newsletter</div>
                    </a>
                </div>

                {{-- Logout --}}
                <div class="mt-auto pl-8 pr-8 pt-2 pb-2 hover:bg-amber-200 hover:text-zinc-900 active:bg-amber-200">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="text-white underline hover:text-zinc-900 w-full text-left">
                            Déconnexion
                        </button>
                    </form>
                </div>

            </div>
        </div>

    </aside>

    <!-- Desktop -->
    <aside
        class="hidden lg:flex lg:flex-col lg:fixed h-full transition-all duration-300 z-50"
        style="width: 16rem; overflow: visible;"
    >
        <div
            class="h-full pt-6 pb-4 flex flex-col justify-between gap-4 overflow-visible rounded-tr-[16px] rounded-br-[16px] w-full ">
            <div class="bg-zinc-900 min-h-[90vh]  flex flex-col justify-between">
                {{-- Dashboard --}}
                <div class="mb-4 pl-8 pr-8 pt-2 pb-2
            {{ request()->routeIs('dashboard') ? 'bg-zinc-700' : 'hover:bg-zinc-700 active:bg-gray-700' }}">
                    <a class="group flex gap-3 items-center py-3" href="{{ route('dashboard') }}">
                        <x-icons.home/>
                        <div class="text-white group-hover:text-white group-active:text-white">Dashboard</div>
                    </a>
                </div>

                {{-- Projects --}}
                <div class="mb-4 pl-8 pr-8 pt-2 pb-2
            {{ request()->routeIs('projects') ? 'bg-zinc-700' : 'hover:bg-zinc-700 active:bg-gray-700' }}">
                    <a class="group flex gap-3 items-center py-3" href="{{ route('projects') }}">
                        <x-icons.projects/>
                        <div class="text-white group-hover:text-white group-active:text-white">Projets</div>
                    </a>
                </div>

                {{-- Accounting --}}
                <div class="mb-4 pl-8 pr-8 pt-2 pb-2
            {{ request()->routeIs('accounting') ? 'bg-zinc-700' : 'hover:bg-zinc-700 active:bg-gray-700' }}">
                    <a class="group flex gap-3 items-center py-3" href="{{ route('accounting') }}">
                        <x-icons.accounting/>
                        <div class="text-white group-hover:text-white group-active:text-white">Comptabilité</div>
                    </a>
                </div>

                {{-- Selection --}}
                <div class="mb-4 pl-8 pr-8 pt-2 pb-2
            {{ request()->routeIs('selection') ? 'bg-zinc-700' : 'hover:bg-zinc-700 active:bg-gray-700' }}">
                    <a class="group flex gap-3 items-center py-3" href="{{ route('selection') }}">
                        <x-icons.selections/>
                        <div class="text-white group-hover:text-white group-active:text-white">Détentes</div>
                    </a>
                </div>

                {{-- Meeting --}}
                <div class="mb-4 pl-8 pr-8 pt-2 pb-2
            {{ request()->routeIs('meeting') ? 'bg-zinc-700' : 'hover:bg-zinc-700 active:bg-gray-700' }}">
                    <a class="group flex gap-3 items-center py-3" href="{{ route('meeting') }}">
                        <x-icons.meeting/>
                        <div class="text-white group-hover:text-white group-active:text-white">Réunion</div>
                    </a>
                </div>

                {{-- Newsletter --}}
                <div class="mb-4 pl-8 pr-8 pt-2 pb-2
            {{ request()->routeIs('newsletter') ? 'bg-zinc-700' : 'hover:bg-zinc-700 active:bg-gray-700' }}">
                    <a class="group flex gap-3 items-center py-3" href="{{ route('newsletter') }}">
                        <x-icons.newsletter/>
                        <div class="text-white group-hover:text-white group-active:text-white">Newsletter</div>
                    </a>
                </div>

                {{-- Logout --}}
                <div class="mt-auto pl-8 pr-8 pt-2 pb-2 hover:bg-amber-200 hover:text-zinc-900 active:bg-amber-200">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="text-white underline hover:text-zinc-900 w-full text-left">
                            Déconnexion
                        </button>
                    </form>
                </div>

            </div>
        </div>
    </aside>

</div>

