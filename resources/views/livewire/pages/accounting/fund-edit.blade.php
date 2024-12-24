<!-- Livewire-Komponente in Blade, Modal wird geöffnet -->
<div x-data="{ isOpen: @entangle('isOpen') }" x-show="isOpen">
    <!-- Modal-Inhalt hier -->
    @livewire('modals.fund-edit', ['fundId' => $specificFund->id])  <!-- Fonds-ID übergeben -->
</div>

