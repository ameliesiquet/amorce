<button {{ $attributes->merge(['class' => 'px-4 py-2 bg-amber-200 text-zinc-900 rounded-md hover:bg-amber-300 focus:outline-none focus:ring-2 focus:ring-amber-200']) }}>
    {{ $slot }}
</button>
