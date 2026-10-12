@props([
    'number' => '1',
    'title' => '',
    'description' => '',
    'icon' => null,
    'variant' => 'gold'
])

<li class="flex items-start gap-4 p-4 rounded-xl bg-navy-900/60 border border-slate-700/40 hover:border-gold-500/40 hover:bg-navy-900/90 transition-all duration-200">
    <!-- Number or Icon Badge -->
    <div class="flex-shrink-0 w-8 h-8 rounded-lg {{ $variant === 'gold' ? 'bg-gradient-gold text-navy-900 font-bold' : 'bg-gold-500/20 text-gold-400 font-bold border border-gold-500/30' }} flex items-center justify-center text-sm shadow-sm">
        @if($icon)
            <i class="{{ $icon }} text-xs"></i>
        @else
            <span>{{ $number }}</span>
        @endif
    </div>

    <div class="flex-grow">
        <h4 class="font-serif font-bold text-white text-base leading-snug">
            {{ $title }}
        </h4>
        <p class="text-xs sm:text-sm text-slate-300 mt-1 leading-relaxed font-light">
            {{ $description ?? $slot }}
        </p>
    </div>
</li>
