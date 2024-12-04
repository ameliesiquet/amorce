@props(['field','label'])
<div class="flex justify-between">
    <form
        class="flex gap-1.5 items-center self-stretch p-2 my-auto border rounded-xl border-solid border-neutral-400 text-zinc-500">
        <label for="searchInput" class="sr-only">{{$label}}</label>
        <x-icons.search/>
        <input
            type="search"
            id="searchInput"
            placeholder="Rechercher un fond"
            class="bg-transparent border-none p-0 w-full focus:outline-none focus:ring-0"
            wire:model.live="{{$field}}"
        />
    </form>
</div>
