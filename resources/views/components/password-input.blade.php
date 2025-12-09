@props(['disabled' => false, 'value' => ''])

<div class="relative">
    <input @disabled($disabled) value="{{ $value }}" {{ $attributes->merge(['class' => 'w-full px-4 py-3 bg-gray-700 border border-gray-600 rounded-lg text-black focus:outline-none focus:ring-2 focus:ring-red-600 focus:border-transparent pr-12']) }} style="color: black !important; -webkit-text-fill-color: black !important;">
    <button type="button" 
            class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-400 hover:text-gray-600"
            onclick="togglePasswordVisibility('{{ $attributes['id'] }}')">
        <svg id="eye-icon-{{ $attributes['id'] }}" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path id="eye-open-{{ $attributes['id'] }}" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
            <path id="eye-open-{{ $attributes['id'] }}-2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
            <path id="eye-closed-{{ $attributes['id'] }}" class="hidden" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.878 9.878L3 3m6.878 6.878L21 21" />
        </svg>
    </button>
</div>