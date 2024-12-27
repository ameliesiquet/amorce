<div class="flex flex-col gap-6">
    <!-- Search Form -->
    <section class="flex flex-wrap gap-10 justify-between items-center">
        <x-search-and-filter label="Rechercher un fond" field="search"/>
    </section>
    <section class="grid grid-cols-1 xl:grid-cols-2 2xl:grid-cols-3 gap-x-14 gap-y-8">
        @foreach($this->specificFunds as $fund)
            <livewire:pages.accounting.specific-fund-card :$fund wire:key="fund-{{ $fund->id }}"/>
        @endforeach
    </section>
</div>
