<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-6 py-3 bg-accent-500 hover:bg-accent-600 border-2 border-accent-500 rounded-xl font-semibold text-sm text-white tracking-wide focus:outline-none focus:ring-2 focus:ring-accent-500 focus:ring-offset-2 transition-all duration-200 shadow-lg hover:shadow-xl disabled:opacity-50 disabled:cursor-not-allowed']) }}>
    {{ $slot }}
</button>
