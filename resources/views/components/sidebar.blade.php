<nav class="bg-zinc-900  flex-grow ">
    <h2 class="sr-only">Navigation</h2>
    <section class="flex flex-col mt-6">
        <div class="mb-4 pl-8 pr-8 pt-2 pb-2 hover:bg-gray-600 active:bg-gray-700">
            <a class="group flex gap-3 items-center py-3 " href="{{ route('dashboard') }}">
                <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                     width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="m4 12 8-8 8 8M6 10.5V19a1 1 0 0 0 1 1h3v-3a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v3h3a1 1 0 0 0 1-1v-8.5"/>
                </svg>
                <div class="text-white group-hover:text-white group-active:text-white">Dashboard</div>
            </a>
        </div>
        <div class="mb-4 pl-8 pr-8 pt-2 pb-2 hover:bg-gray-600 active:bg-gray-700">
            <a class="group flex gap-3 items-center py-3 " href="{{ route('projects') }}">
                <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                     width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M13.5 8H4m0-2v13a1 1 0 0 0 1 1h14a1 1 0 0 0 1-1V9a1 1 0 0 0-1-1h-5.032a1 1 0 0 1-.768-.36l-1.9-2.28a1 1 0 0 0-.768-.36H5a1 1 0 0 0-1 1Z"/>
                </svg>
                <div class="text-white group-hover:text-white group-active:text-white">Projets</div>
            </a>
        </div>
        <div class="mb-4 pl-8 pr-8 pt-2 pb-2 hover:bg-gray-600 active:bg-gray-700">
            <a class="group flex gap-3 items-center py-3 " href="{{ route('accounting') }}">
                <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                     width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M6 10h9.231M6 14h9.231M18 5.086A5.95 5.95 0 0 0 14.615 4c-3.738 0-6.769 3.582-6.769 8s3.031 8 6.769 8A5.94 5.94 0 0 0 18 18.916"/>
                </svg>
                <div class="text-white group-hover:text-white group-active:text-white">Comptabilité</div>
            </a>
        </div>
        <div class="mb-4 pl-8 pr-8 pt-2 pb-2 hover:bg-gray-600 active:bg-gray-700">
            <a class="group flex gap-3 items-center py-3 " href="{{ route('selection') }}">
                <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                     width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-width="2"
                          d="M18.796 4H5.204a1 1 0 0 0-.753 1.659l5.302 6.058a1 1 0 0 1 .247.659v4.874a.5.5 0 0 0 .2.4l3 2.25a.5.5 0 0 0 .8-.4v-7.124a1 1 0 0 1 .247-.659l5.302-6.059c.566-.646.106-1.658-.753-1.658Z"/>
                </svg>
                <div class="text-white group-hover:text-white group-active:text-white">Détentes</div>
            </a>
        </div>
        <div class="mb-4 pl-8 pr-8 pt-2 pb-2 hover:bg-gray-600 active:bg-gray-700">
            <a class="group flex gap-3 items-center py-3 " href="{{ route('meeting') }}">
                <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                     width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-width="2"
                          d="M4.5 17H4a1 1 0 0 1-1-1 3 3 0 0 1 3-3h1m0-3.05A2.5 2.5 0 1 1 9 5.5M19.5 17h.5a1 1 0 0 0 1-1 3 3 0 0 0-3-3h-1m0-3.05a2.5 2.5 0 1 0-2-4.45m.5 13.5h-7a1 1 0 0 1-1-1 3 3 0 0 1 3-3h3a3 3 0 0 1 3 3 1 1 0 0 1-1 1Zm-1-9.5a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0Z"/>
                </svg>
                <div class="text-white group-hover:text-white group-active:text-white">Réunion</div>
            </a>
        </div>
        <div class="mb-4 pl-8 pr-8 pt-2 pb-2 hover:bg-gray-600 active:bg-gray-700">
            <a class="group flex gap-3 items-center py-3 " href="{{ route('newsletter') }}">
                <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                     width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M15 4h3a1 1 0 0 1 1 1v15a1 1 0 0 1-1 1H6a1 1 0 0 1-1-1V5a1 1 0 0 1 1-1h3m0 3h6m-6 5h6m-6 4h6M10 3v4h4V3h-4Z"/>
                </svg>
                <div class="text-white group-hover:text-white group-active:text-white">Newsletter</div>
            </a>
        </div>
    </section>
</nav>

