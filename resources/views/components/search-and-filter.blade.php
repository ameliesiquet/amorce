<div class="flex justify-between">
    <form class="flex gap-1.5 items-center self-stretch p-2 my-auto border rounded-xl border-solid border-neutral-400 text-zinc-500">
        <label for="searchInput" class="sr-only">Rechercher un font</label>
        <x-icons.search/>
        <input type="search" id="searchInput" placeholder="Rechercher un font" class="bg-transparent border-none p-0 w-full focus:outline-none focus:ring-0" />
    </form>
    <button aria-label="Filter transactions" class="object-contain shrink-0 self-stretch">
        <x-icons.filter/>
    </button>
</div>
