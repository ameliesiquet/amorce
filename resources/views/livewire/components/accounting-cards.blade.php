<section class="cards flex flex-wrap gap-10 items-center">
    @foreach($accCards as $accCard)
        <article class="revenue-card flex gap-5 items-start  px-5 py-8 bg-white rounded-2xl shadow-md  sm:w-auto">
            <x-icons.money-square/>
            <div class="flex flex-col">
                <div class="flex justify-between items-end gap-5">
                    <h2 class="text-xl font-medium text-black">{{$accCard['title']}}</h2>
                    <time class="text-base text-gray-600">{{$accCard['time']}}</time>
                </div>
                <div class="flex gap-5 items-center mt-5">
                    <p class="text-4xl font-semibold text-black">{{$accCard['value']}}€</p>
                    <div class="flex items-center gap-1.5 text-{{$accCard['color']}}">
                        <p class="text-xl">{{ $accCard['percentage']}}%</p>
                        <x-icons.green-arrow-up/>
                    </div>
                </div>
            </div>
        </article>
    @endforeach
</section>
