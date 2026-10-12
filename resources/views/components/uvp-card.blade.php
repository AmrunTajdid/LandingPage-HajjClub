@props([
    'icon' => 'fa-solid fa-star',
    'title' => '',
    'subtitle' => '',
    'description' => '',
    'number' => null
])

<div {{ $attributes->merge(['class' => 'group relative bg-navy-800/80 hover:bg-navy-800 p-8 rounded-2xl border border-gold-500/20 hover:border-gold-500/60 shadow-xl transition-all duration-300 transform hover:-translate-y-1.5 flex flex-col justify-between']) }}>
    <!-- Ambient Gold Corner Glow on hover -->
    <div class="absolute -top-10 -right-10 w-24 h-24 bg-gold-500/0 group-hover:bg-gold-500/10 rounded-full blur-2xl transition-all duration-500 pointer-events-none"></div>

    <div>
        <div class="flex items-center justify-between mb-6">
            <!-- Icon Badge -->
            <div class="w-14 h-14 rounded-xl bg-navy-900 border border-gold-500/30 flex items-center justify-center text-gold-400 group-hover:bg-gradient-gold group-hover:text-navy-900 group-hover:border-transparent transition-all duration-300 shadow-md">
                <i class="{{ $icon }} text-2xl"></i>
            </div>

            @if($number)
                <span class="text-xs font-mono font-bold tracking-widest text-gold-500/60 group-hover:text-gold-400 transition-colors">
                    #{{ $number }}
                </span>
            @endif
        </div>

        <h3 class="text-xl font-serif font-bold text-white group-hover:text-gold-400 transition-colors tracking-wide mb-1">
            {{ $title }}
        </h3>

        @if($subtitle)
            <h4 class="text-xs font-semibold uppercase tracking-wider text-gold-500 mb-3">
                {{ $subtitle }}
            </h4>
        @endif

        <p class="text-slate-300 text-sm leading-relaxed font-light">
            {{ $description ?? $slot }}
        </p>
    </div>

    <div class="mt-6 pt-4 border-t border-slate-700/50 flex items-center justify-between text-xs text-slate-400 group-hover:text-gold-400 transition-colors">
        <span>Nilai Unggul Hajj Club</span>
        <i class="fa-solid fa-arrow-right text-[10px] transform group-hover:translate-x-1 transition-transform"></i>
    </div>
</div>
