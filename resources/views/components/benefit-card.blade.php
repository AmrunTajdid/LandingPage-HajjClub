@props([
    'title' => '',
    'subtitle' => '',
    'icon' => 'fa-solid fa-star',
    'badge' => '',
    'variant' => 'gold'
])

<div {{ $attributes->merge(['class' => 'bg-navy-800/90 rounded-2xl p-6 sm:p-8 border border-gold-500/30 shadow-2xl relative overflow-hidden flex flex-col justify-between']) }}>
    <!-- Header Banner -->
    <div>
        <div class="flex items-center justify-between mb-6">
            <div class="flex items-center gap-3">
                <div class="w-12 h-12 rounded-xl {{ $variant === 'gold' ? 'bg-gradient-gold text-navy-900' : 'bg-navy-900 text-gold-400 border border-gold-500/40' }} flex items-center justify-center text-2xl shadow-lg">
                    <i class="{{ $icon }}"></i>
                </div>
                <div>
                    <h3 class="text-xl sm:text-2xl font-serif font-black text-white tracking-wide">
                        {{ $title }}
                    </h3>
                    @if($subtitle)
                        <p class="text-xs text-gold-400 font-medium">{{ $subtitle }}</p>
                    @endif
                </div>
            </div>

            @if($badge)
                <span class="hidden sm:inline-block px-3 py-1 rounded-full text-xs font-semibold bg-gold-500/15 text-gold-300 border border-gold-500/30">
                    {{ $badge }}
                </span>
            @endif
        </div>

        <!-- Benefit Items List -->
        <ul class="space-y-3.5">
            {{ $slot }}
        </ul>
    </div>

    <!-- Card Footer -->
    <div class="mt-8 pt-5 border-t border-slate-700/60 flex items-center justify-between text-xs text-slate-400">
        <span class="flex items-center gap-1.5 text-gold-400 font-medium">
            <i class="fa-solid fa-circle-check text-xs"></i> Hak Resmi Pemilik Hajj Club
        </span>
        <span class="text-slate-400 font-mono">100% Transparan</span>
    </div>
</div>
