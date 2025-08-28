<section class="flex flex-col gap-6">
    <h2 class="text-xl font-bold">Mon calendrier</h2>
    <div class="max-w-4xl mx-auto bg-white rounded-2xl shadow-md p-6">
        <div class="flex justify-between items-center mb-4">
            <button wire:click="previousMonth" class="px-3 py-1 bg-gray-200 rounded">←</button>
            <h3 class="text-lg font-semibold">{{ $currentMonth->format('F Y') }}</h3>
            <button wire:click="nextMonth" class="px-3 py-1 bg-gray-200 rounded">→</button>
        </div>

        <table class="w-full text-center border-collapse">
            <thead>
            <tr>
                @foreach(['Mo','Tu','We','Th','Fr','Sa','Su'] as $day)
                    <th class="p-2 border-b">{{ $day }}</th>
                @endforeach
            </tr>
            </thead>
            <tbody>
            @foreach($calendar as $week)
                <tr>
                    @foreach($week as $day)
                        <td class="p-2 border h-16 align-top w-[14.28%]">
                            @if($day)
                                <div class="flex flex-col gap-1 h-full">
                                    <span class="font-medium">{{ $day->format('d') }}</span>

                                    <div class="flex flex-wrap gap-1 mt-1  h-full overflow-hidden lg:min-w-16">
                                        @foreach($events as $event)
                                            @if($event['date']->isSameDay($day))
                                                <span class="w- h-3 rounded-full bg-indigo-500 md:hidden "></span>

                                                <span
                                                    class="hidden md:block bg-indigo-500 text-white text-xs rounded px-1
                                   overflow-hidden break-words line-clamp-2"
                                                    title="{{ $event['title'] }}">
                            {{ $event['title'] }}
                        </span>
                                            @endif
                                        @endforeach
                                    </div>
                                </div>
                            @endif
                        </td>



                    @endforeach
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</section>
