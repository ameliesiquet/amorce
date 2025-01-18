<main class="flex flex-col gap-10 p-4 sm:p-8  ml-72">
    <h1 class="mb-8 text-3xl font-bold">
        Bonjour {{ Auth::check() ? Auth::user()->name : 'Guest' }} 👋🏻
    </h1>
    <div class="flex gap-10 items-start">
        <livewire:pages.dashboard.calendar/>
        <livewire:pages.dashboard.recent-projects/>
    </div>
</main>
