@props(['fund','transactions', 'search'])

<section class="flex flex-col mt-5 w-full max-w-full">
    <table class="max-w-full text-xs text-black">
        <thead>
        <tr class="text-s font-semibold bg-zinc-100 w-full">
            <th class="p-2.5 text-left">Date</th>
            <th class="p-2.5 text-left">Méthode de paiement</th>
            <th class="p-2.5 text-left">Montant</th>
            <th class="p-2.5 text-left">Status</th>
        </tr>
        </thead>
        <tbody >
        @foreach ($transactions as $transaction)
            <tr class="border-t border-neutral-400" wire:key="{{$transaction->id}}">
                <td class="py-4 px-2">
                    {!! $this->highlight($transaction->created_at->format('d/m/Y'), $search) !!}
                </td>
                <td class="py-4 px-2">
                    {!! $this->highlight($transaction->transaction_type, $search) !!}
                </td>
                <td class="py-4 px-2">
                    {!! $this->highlight($transaction->amount . '€', $search) !!}
                </td>
                <td class="py-4 px-2">
                    {!! $this->highlight($transaction->status_type, $search) !!}
                </td>
            </tr>
        @endforeach

        </tbody>
    </table>

    <!-- Pagination -->
    <nav
        class="flex gap-4 justify-center items-end py-2.5 mt-2.5 w-full text-xs whitespace-nowrap border-t border-neutral-400"
        aria-label="Pagination">
        {{ $transactions->links() }}
    </nav>
</section>
