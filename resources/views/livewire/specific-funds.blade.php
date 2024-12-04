<div class="flex flex-col gap-6">
    <!-- Search Form -->
    <section class="flex flex-wrap gap-10 justify-between items-center">
        <x-search-and-filter label="Rechercher un fond" field="search"/>
    </section>
    <section class="flex flex-row gap-10">
        @foreach($this->specificFunds as $fund)
            <livewire:specific-fund-card :$fund :key="$fund->id"/>
        @endforeach
    </section>
</div>
