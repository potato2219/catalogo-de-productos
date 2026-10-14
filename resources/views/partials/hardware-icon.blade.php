@props(['category' => 'Tarjetas Gráficas'])

@php
    $cat = mb_strtolower($category);
@endphp

@if (str_contains($cat, 'gráfic') || str_contains($cat, 'gpu'))
    {{-- GPU Minimal Wireframe --}}
    <svg viewBox="0 0 80 80" fill="none" xmlns="http://www.w3.org/2000/svg" width="70" height="70">
        <rect x="8" y="20" width="64" height="40" rx="3" stroke="#a1a1aa" stroke-width="1.2"/>
        <line x1="6" y1="18" x2="6" y2="62" stroke="#71717a" stroke-width="2" stroke-linecap="round"/>
        <circle cx="28" cy="40" r="12" stroke="#e4e4e7" stroke-width="1.2"/>
        <circle cx="28" cy="40" r="3" fill="#a1a1aa"/>
        <circle cx="52" cy="40" r="12" stroke="#e4e4e7" stroke-width="1.2"/>
        <circle cx="52" cy="40" r="3" fill="#a1a1aa"/>
        <line x1="16" y1="60" x2="48" y2="60" stroke="#71717a" stroke-width="1.2"/>
    </svg>

@elseif (str_contains($cat, 'procesador') || str_contains($cat, 'cpu'))
    {{-- CPU Minimal Architectural Die --}}
    <svg viewBox="0 0 80 80" fill="none" xmlns="http://www.w3.org/2000/svg" width="70" height="70">
        <rect x="14" y="14" width="52" height="52" rx="3" stroke="#71717a" stroke-width="1.2"/>
        <rect x="22" y="22" width="36" height="36" rx="2" stroke="#e4e4e7" stroke-width="1.4"/>
        <rect x="32" y="32" width="16" height="16" stroke="#a1a1aa" stroke-width="1"/>
        <circle cx="40" cy="40" r="2" fill="#fafafa"/>
        <polygon points="16,16 22,16 16,22" fill="#a1a1aa"/>
    </svg>

@elseif (str_contains($cat, 'ram') || str_contains($cat, 'memoria'))
    {{-- RAM Minimal DIMM Stick --}}
    <svg viewBox="0 0 80 80" fill="none" xmlns="http://www.w3.org/2000/svg" width="70" height="70">
        <rect x="10" y="26" width="60" height="28" rx="2" stroke="#a1a1aa" stroke-width="1.2"/>
        <line x1="10" y1="23" x2="70" y2="23" stroke="#e4e4e7" stroke-width="1.2"/>
        <line x1="20" y1="32" x2="20" y2="48" stroke="#52525b" stroke-width="1"/>
        <line x1="28" y1="32" x2="28" y2="48" stroke="#52525b" stroke-width="1"/>
        <line x1="36" y1="32" x2="36" y2="48" stroke="#52525b" stroke-width="1"/>
        <line x1="44" y1="32" x2="44" y2="48" stroke="#52525b" stroke-width="1"/>
        <line x1="52" y1="32" x2="52" y2="48" stroke="#52525b" stroke-width="1"/>
        <line x1="60" y1="32" x2="60" y2="48" stroke="#52525b" stroke-width="1"/>
        <rect x="14" y="54" width="22" height="3" fill="#71717a"/>
        <rect x="42" y="54" width="24" height="3" fill="#71717a"/>
    </svg>

@elseif (str_contains($cat, 'placa') || str_contains($cat, 'motherboard'))
    {{-- Motherboard Minimal Outline --}}
    <svg viewBox="0 0 80 80" fill="none" xmlns="http://www.w3.org/2000/svg" width="70" height="70">
        <rect x="14" y="14" width="52" height="52" rx="3" stroke="#a1a1aa" stroke-width="1.2"/>
        <rect x="22" y="22" width="18" height="18" rx="1" stroke="#e4e4e7" stroke-width="1.2"/>
        <line x1="46" y1="20" x2="46" y2="42" stroke="#71717a" stroke-width="1.2"/>
        <line x1="50" y1="20" x2="50" y2="42" stroke="#71717a" stroke-width="1.2"/>
        <line x1="54" y1="20" x2="54" y2="42" stroke="#71717a" stroke-width="1.2"/>
        <rect x="20" y="48" width="40" height="4" rx="1" stroke="#e4e4e7" stroke-width="1"/>
        <rect x="20" y="56" width="30" height="3" rx="1" stroke="#71717a" stroke-width="1"/>
    </svg>

@elseif (str_contains($cat, 'almacen') || str_contains($cat, 'ssd'))
    {{-- M.2 SSD Minimal Stick --}}
    <svg viewBox="0 0 80 80" fill="none" xmlns="http://www.w3.org/2000/svg" width="70" height="70">
        <rect x="14" y="28" width="52" height="24" rx="2" stroke="#a1a1aa" stroke-width="1.2"/>
        <circle cx="14" cy="40" r="2.5" fill="#09090b" stroke="#71717a" stroke-width="1"/>
        <rect x="22" y="32" width="14" height="16" rx="1" stroke="#e4e4e7" stroke-width="1"/>
        <rect x="40" y="32" width="20" height="16" rx="1" stroke="#71717a" stroke-width="1"/>
        <rect x="66" y="34" width="3" height="12" fill="#a1a1aa"/>
    </svg>

@elseif (str_contains($cat, 'refrig') || str_contains($cat, 'cooler'))
    {{-- Cooler / AIO Pump Minimal --}}
    <svg viewBox="0 0 80 80" fill="none" xmlns="http://www.w3.org/2000/svg" width="70" height="70">
        <rect x="14" y="16" width="52" height="18" rx="2" stroke="#71717a" stroke-width="1.2"/>
        <circle cx="40" cy="56" r="14" stroke="#e4e4e7" stroke-width="1.4"/>
        <circle cx="40" cy="56" r="8" stroke="#a1a1aa" stroke-width="1"/>
        <path d="M26 34 C 26 44, 34 46, 36 50" stroke="#71717a" stroke-width="1.5" stroke-linecap="round"/>
        <path d="M54 34 C 54 44, 46 46, 44 50" stroke="#71717a" stroke-width="1.5" stroke-linecap="round"/>
    </svg>

@elseif (str_contains($cat, 'fuente') || str_contains($cat, 'psu'))
    {{-- PSU Minimal Modular Box --}}
    <svg viewBox="0 0 80 80" fill="none" xmlns="http://www.w3.org/2000/svg" width="70" height="70">
        <rect x="16" y="16" width="48" height="48" rx="3" stroke="#a1a1aa" stroke-width="1.2"/>
        <circle cx="40" cy="38" r="15" stroke="#e4e4e7" stroke-width="1.2"/>
        <circle cx="40" cy="38" r="4" fill="#71717a"/>
        <rect x="22" y="54" width="6" height="5" fill="#71717a"/>
        <rect x="31" y="54" width="6" height="5" fill="#71717a"/>
        <rect x="40" y="54" width="8" height="5" fill="#e4e4e7"/>
        <rect x="51" y="54" width="8" height="5" fill="#e4e4e7"/>
    </svg>

@else
    {{-- Case / Torre Minimal --}}
    <svg viewBox="0 0 80 80" fill="none" xmlns="http://www.w3.org/2000/svg" width="70" height="70">
        <rect x="22" y="14" width="36" height="52" rx="2" stroke="#a1a1aa" stroke-width="1.2"/>
        <rect x="26" y="18" width="24" height="44" stroke="#52525b" stroke-width="0.8"/>
        <circle cx="52" cy="20" r="1.5" fill="#fafafa"/>
        <line x1="28" y1="44" x2="46" y2="44" stroke="#e4e4e7" stroke-width="1"/>
    </svg>
@endif
