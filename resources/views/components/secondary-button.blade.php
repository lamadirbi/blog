@props(['type' => 'submit'])

<button {{ $attributes->merge(['type' => $type, 'class' => 'inline-flex items-center px-6 py-3 bg-white border-2 border-primary-200 rounded-xl font-semibold text-sm text-primary-700 tracking-wide hover:bg-primary-50 focus:outline-none focus:ring-2 focus:ring-primary-500 focus:ring-offset-2 transition-all duration-200 shadow-sm hover:shadow-md disabled:opacity-50 disabled:cursor-not-allowed']) }}>
    {{ $slot }}
</button>
