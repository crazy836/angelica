@props(['disabled' => false, 'value' => ''])

<input @disabled($disabled) value="{{ $value }}" {{ $attributes->merge(['class' => 'w-full px-4 py-3 bg-gray-700 border border-gray-600 rounded-lg text-black focus:outline-none focus:ring-2 focus:ring-red-600 focus:border-transparent']) }} style="color: black !important; -webkit-text-fill-color: black !important;">