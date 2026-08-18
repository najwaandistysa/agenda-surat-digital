@props(['value'])

<label {{ $attributes->merge(['class' => 'block font-medium text-sm text-purple-200']) }}>
    {{ $value ?? $slot }}
</label>