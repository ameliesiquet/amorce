<article class="flex flex-wrap gap-7 justify-between items-start mt-5 w-full text-black whitespace-nowrap">
    <h2 class="hidden">Finances</h2>
    <div class="flex flex-col justify-center items-end py-5 pr-4 pl-4 bg-amber-200 rounded-xl shadow-[0px_0px_4px_rgba(0,0,0,0.25)]">
        <h3 class="self-start text-sm font-medium text-center">Total</h3>
        <p class="mt-2.5 text-xl font-semibold">{{ number_format($total, 2) }}€</p>
    </div>

    <div class="flex gap-7">
        <div class="flex flex-col justify-center py-5 pr-4 pl-4 bg-white rounded-xl shadow-[0px_0px_4px_rgba(0,0,0,0.25)] w-full">
            <h3 class="self-start text-sm font-medium text-center">Revenus</h3>
            <p class="mt-2.5 text-xl font-semibold">{{ number_format($income, 2) }}€</p>
        </div>

        <div class="flex flex-col justify-center py-5 pr-4 pl-4 bg-white rounded-xl shadow-[0px_0px_4px_rgba(0,0,0,0.25)] w-full">
            <h3 class="self-start text-sm font-medium text-center">Dépenses</h3>
            <p class="mt-2.5 text-xl font-semibold">{{ number_format($expenses, 2) }}€</p>
        </div>
    </div>
</article>
