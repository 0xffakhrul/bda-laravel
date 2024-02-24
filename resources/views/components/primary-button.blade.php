<button
    {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center justify-center px-4 py-2 bg-rose-700 dark:bg-rose-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-rose-800 uppercase tracking-widest hover:bg-rose-700 dark:hover:bg-white focus:bg-rose-700 dark:focus:bg-white active:bg-rose-900 dark:active:bg-rose-300 focus:outline-none focus:ring-2 focus:ring-rose-500 focus:ring-offset-2 dark:focus:ring-offset-rose-800 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
