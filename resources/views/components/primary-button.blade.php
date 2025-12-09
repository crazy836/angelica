<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center justify-center w-full sm:w-auto px-6 py-3 bg-red-600 text-white font-medium rounded-lg hover:bg-red-700 transition duration-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500']) }}>
    {{ $slot }}
</button>
