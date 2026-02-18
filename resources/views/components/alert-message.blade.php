@props([
    'type' => 'success', // success, error, info, warning
    'message' => '',
])

@php
$colors = [
    'success' => 'bg-green-100 text-green-800',
    'error' => 'bg-red-100 text-red-800',
    'info' => 'bg-blue-100 text-blue-800',
    'warning' => 'bg-yellow-100 text-yellow-800',
];

$classes = $colors[$type] ?? $colors['info'];
@endphp

<div 
    x-data="{ show: true }" 
    x-show="show" 
    x-init="setTimeout(() => show = false, 4000)" 
    class="flex items-center justify-between px-4 py-3 rounded shadow {{ $classes }} mb-4"
    x-transition:enter="transition ease-out duration-300"
    x-transition:enter-start="opacity-0 transform -translate-y-2"
    x-transition:enter-end="opacity-100 transform translate-y-0"
    x-transition:leave="transition ease-in duration-200"
    x-transition:leave-start="opacity-100 transform translate-y-0"
    x-transition:leave-end="opacity-0 transform -translate-y-2"
>
    <span>{{ $message }}</span>
    <button @click="show = false" class="ml-4 text-lg font-bold">&times;</button>
</div>
