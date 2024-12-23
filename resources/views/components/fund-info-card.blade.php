<article class="flex flex-wrap gap-4 md:gap-10 lg:gap-12 xl:gap-14 2xl:gap-6 items-start mt-5 m-auto w-full text-black whitespace-nowrap">
    <div
        class="flex flex-col justify-center py-3 px-3 bg-amber-200 rounded-xl shadow-[0px_0px_4px_rgba(0,0,0,0.25)] flex-1">
        <h2 class="self-start font-medium text-center md:text-l lg:text-xl xl:text-l">Total</h2>
        <p class="mt-2.5 text-l font-semibold md:text-xl lg:text-2xl xl:text-3xl 2xl:text-2xl">{{$fund->total}}€</p>
    </div>
    <div
        class="flex flex-col justify-center py-3 px-3 bg-white rounded-xl shadow-[0px_0px_4px_rgba(0,0,0,0.25)] flex-1">
        <h2 class="self-start font-medium text-center md:text-l lg:text-xl xl:text-l">Revenus</h2>
        <p class="mt-2.5 text-l font-semibold md:text-xl lg:text-2xl xl:text-3xl 2xl:text-2xl">{{$fund->income}}€</p>
    </div>
    <div
        class="flex flex-col justify-center py-3 px-3 bg-white rounded-xl shadow-[0px_0px_4px_rgba(0,0,0,0.25)] flex-1">
        <h2 class="self-start font-medium text-center md:text-l lg:text-xl xl:text-l">Dépenses</h2>
        <p class="mt-2.5 text-l font-semibold md:text-xl lg:text-2xl xl:text-3xl 2xl:text-2xl">{{$fund->expenses}}€</p>
    </div>
</article>
