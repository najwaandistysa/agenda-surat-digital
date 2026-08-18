@props(['disabled' => false])

<input @disabled($disabled) {!! $attributes->merge(['class' => 'border-purple-500/30 bg-[#241a3d] text-white placeholder-gray-400 focus:border-purple-400 focus:ring-purple-400 rounded-md shadow-sm']) !!}>