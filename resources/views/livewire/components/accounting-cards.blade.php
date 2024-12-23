<section class="cards flex flex-wrap gap-4 sm:gap-10 items-center">
    @foreach($accCards as $accCard)
        <article class="revenue-card flex gap-5 items-start px-4 py-4 sm:px-6 sm:py-6 bg-white rounded-2xl shadow-md  sm:w-auto md:px-5 md:py-8">
            <div class="flex flex-col">
                <div class="flex justify-between items-end gap-3">
                    <h2 class=" text-sm sm:text-l font-medium text-black md:text:xl">{{$accCard['title']}}</h2>
                    <time class="text-xs sm:text-sm text-gray-600">{{$accCard['time']}}</time>
                </div>
                <div class="flex gap-5 items-center mt-2 sm:mt-5">
                    <p class="text-xl font-semibold text-black md:text-3xl lg:text:4xl">{{$accCard['value']}}€</p>
                    <div class="flex items-center gap-0.5 text-{{$accCard['color']}} md:gap-1.5">
                        <p class="text-l md:text:xl">{{ $accCard['percentage']}}%</p>
                        <x-icons.green-arrow-up/>
                    </div>
                </div>
            </div>
        </article>
    @endforeach
</section>
