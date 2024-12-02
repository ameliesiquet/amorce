<section class="flex flex-col mt-5 w-full max-w-full">
    <table class="w-full text-xs text-black">
        <thead>
        <tr class="text-sm font-semibold bg-zinc-100 w-full">
            <th class="p-2.5 text-left">Date</th>
            <th class="p-2.5 text-left">Méthode de paiement</th>
            <th class="p-2.5 text-left">Montant</th>
            <th class="p-2.5 text-left">Status</th>
        </tr>
        </thead>
        @foreach ($transactions as $transaction)
        <tbody>
            <tr class="border-t border-neutral-400">
                <td class="p-4">{{ $transaction->created_at->format('d/m/Y') }}</td>
                <td class="p-4">{{ $transaction->transaction_type }}</td>
                <td class="p-4">{{ $transaction->amount }}€</td>
                <td class="p-4">{{ $transaction->status_type }}</td>
            </tr>
        </tbody>
        @endforeach
    </table>

    <!-- Pagination -->
    <nav class="flex gap-4 justify-center items-end py-2.5 mt-2.5 w-full text-xs whitespace-nowrap border-t border-neutral-400" aria-label="Pagination">
        {{ $transactions->links() }}
    </nav>

    <!-- Pagination -->
    {{--<nav
        class="flex gap-4 justify-center items-end py-2.5 mt-2.5 w-full text-xs whitespace-nowrap border-t border-neutral-400"
        aria-label="Pagination">
        <div class="flex gap-6 items-center">
            <div class="flex gap-4 items-center self-stretch py-1.5 my-auto text-zinc-800">
                <button aria-current="page" class="text-yellow-300">1</button>
                <button>2</button>
                <button>3</button>
                <button>4</button>
                <button>5</button>
                <button>6</button>
                <button>7</button>
                <button>8</button>
            </div>
            <span class="self-stretch my-auto text-neutral-400">256</span>
        </div>
    </nav>--}}
</section>
