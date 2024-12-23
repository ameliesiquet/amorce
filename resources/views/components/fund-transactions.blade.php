@props(['fund','transactions', 'search'])
<section class="flex flex-col mt-5">
    <div class="overflow-x-auto">
        <table class="table-auto text-xs text-black w-full">
            <thead>
            <tr class="font-semibold bg-zinc-100">
                <th class="p-2 text-left">Date</th>
                <th class="p-2 text-left">Méthode de paiement</th>
                <th class="p-2 text-left">Montant</th>
                <th class="p-2 text-left hidden sm:table-cell">Status</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($transactions as $transaction)
                <tr class="border-t border-neutral-400" wire:key="{{$transaction->id}}">
                    <td class="py-3 pr-2 sm:py-4 sm:px-2">
                        {!! $this->highlight($transaction->created_at->format('d/m/Y'), $search) !!}
                    </td>
                    <td class="py-3 pr-2 sm:py-4 sm:px-2">
                        {!! $this->highlight($transaction->transaction_type, $search) !!}
                    </td>
                    <td class="py-3 pr-2 sm:py-4 sm:px-2">
                        {!! $this->highlight($transaction->amount . '€', $search) !!}
                    </td>
                    <td class="py-3 pr-2 sm:py-4 sm:px-2 hidden sm:table-cell">
                        {!! $this->highlight($transaction->status_type, $search) !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <!-- Pagination -->
        <nav
            class="flex gap-4 justify-center items-end py-2.5 mt-2.5  text-xs whitespace-nowrap border-t border-neutral-400"
            aria-label="Pagination">
            {{ $transactions->links() }}
        </nav>
    </div>


</section>
