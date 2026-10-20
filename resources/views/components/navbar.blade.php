@php
    $waRaw = config('services.whatsapp.number', '6281299994899');
    $waNumber = preg_replace('/^0/', '62', preg_replace('/[^0-9]/', '', $waRaw));
    $waMessage = urlencode(config('services.whatsapp.message', "Halo Admin Hajj Club, saya tertarik dengan program kepemilikan travel haji & umrah bersama.\n\nMohon informasi lebih lanjut. Berikut data singkat saya:\n• Nama: \n• Kota/Domisili: \n• Profesi/Usaha saat ini: \n\nTerima kasih."));
    $waUrl = "https://wa.me/{$waNumber}?text={$waMessage}";
@endphp

<nav x-data="{ mobileOpen: false }" class="sticky top-0 z-50 bg-navy-900/90 backdrop-blur-md border-b border-gold-500/20 shadow-lg">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-20">
            <!-- Brand Logo -->
            <a href="{{ url('/') }}" class="flex items-center group py-1" aria-label="Hajj Club">
                <img src="{{ asset('images/logo.png') }}" alt="Hajj Club Logo" class="h-11 sm:h-12 w-auto object-contain group-hover:scale-105 transition-transform shrink-0">
                <span class="sr-only">HAJJ CLUB</span>
            </a>

            <!-- Desktop Nav Links -->
            <div class="hidden lg:flex items-center space-x-7 text-sm font-medium">
                <a href="{{ url('/#intro') }}" class="text-slate-300 hover:text-gold-400 transition-colors py-1">Tentang Kami</a>
                <a href="{{ url('/#visi-misi') }}" class="text-slate-300 hover:text-gold-400 transition-colors py-1">Visi &amp; Misi</a>
                <a href="{{ url('/#pasar') }}" class="text-slate-300 hover:text-gold-400 transition-colors py-1">Peluang Pasar</a>
                <a href="{{ url('/#value') }}" class="text-slate-300 hover:text-gold-400 transition-colors py-1">UVP</a>
                <a href="{{ url('/#galery') }}" class="text-slate-300 hover:text-gold-400 transition-colors py-1">Galery</a>
                <a href="{{ url('/#roadmap') }}" class="text-slate-300 hover:text-gold-400 transition-colors py-1">Roadmap</a>
            </div>

            <!-- Desktop CTA -->
            <div class="hidden lg:flex items-center">
                <a href="{{ $waUrl }}"
                   target="_blank"
                   rel="noopener noreferrer"
                   onclick="trackConversion('Navbar_Desktop_CTA', '{{ $waUrl }}')"
                   class="bg-gradient-gold text-navy-900 font-bold px-6 py-2.5 rounded-full hover:shadow-lg hover:shadow-gold-500/30 transition-all transform hover:-translate-y-0.5 flex items-center gap-2">
                    <i class="fa-brands fa-whatsapp text-lg"></i>
                    <span>Gabung Sekarang</span>
                </a>
            </div>

            <!-- Mobile Hamburger Button -->
            <div class="flex lg:hidden items-center">
                <button @click="mobileOpen = !mobileOpen"
                        type="button"
                        class="text-slate-300 hover:text-gold-400 p-2 rounded-lg focus:outline-none focus:ring-2 focus:ring-gold-500/50"
                        :aria-expanded="mobileOpen.toString()"
                        aria-label="Toggle navigation menu">
                    <i class="fa-solid" :class="mobileOpen ? 'fa-xmark text-2xl' : 'fa-bars text-xl'"></i>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile Dropdown Menu -->
    <div x-show="mobileOpen"
         x-transition:enter="transition ease-out duration-200"
         x-transition:enter-start="opacity-0 -translate-y-4"
         x-transition:enter-end="opacity-100 translate-y-0"
         x-transition:leave="transition ease-in duration-150"
         x-transition:leave-start="opacity-100 translate-y-0"
         x-transition:leave-end="opacity-0 -translate-y-4"
         @click.away="mobileOpen = false"
         class="lg:hidden bg-navy-950/95 border-b border-gold-500/20 backdrop-blur-xl px-4 pt-4 pb-6 space-y-3 shadow-2xl">
        <a @click="mobileOpen = false" href="{{ url('/#intro') }}" class="block py-2.5 px-3 rounded-lg text-slate-200 hover:bg-navy-800 hover:text-gold-400 font-medium transition">Tentang Kami</a>
        <a @click="mobileOpen = false" href="{{ url('/#visi-misi') }}" class="block py-2.5 px-3 rounded-lg text-slate-200 hover:bg-navy-800 hover:text-gold-400 font-medium transition">Visi &amp; Misi</a>
        <a @click="mobileOpen = false" href="{{ url('/#pasar') }}" class="block py-2.5 px-3 rounded-lg text-slate-200 hover:bg-navy-800 hover:text-gold-400 font-medium transition">Peluang Pasar</a>
        <a @click="mobileOpen = false" href="{{ url('/#value') }}" class="block py-2.5 px-3 rounded-lg text-slate-200 hover:bg-navy-800 hover:text-gold-400 font-medium transition">Unique Value Proposition</a>
        <a @click="mobileOpen = false" href="{{ url('/#galery') }}" class="block py-2.5 px-3 rounded-lg text-slate-200 hover:bg-navy-800 hover:text-gold-400 font-medium transition">Galery</a>
        <a @click="mobileOpen = false" href="{{ url('/#roadmap') }}" class="block py-2.5 px-3 rounded-lg text-slate-200 hover:bg-navy-800 hover:text-gold-400 font-medium transition">Roadmap Perizinan</a>
        <a @click="mobileOpen = false" href="{{ route('privacy.policy') }}" class="block py-2.5 px-3 rounded-lg text-slate-200 hover:bg-navy-800 hover:text-gold-400 font-medium transition">Kebijakan Privasi</a>

        <div class="pt-3 border-t border-slate-800">
            <a href="{{ $waUrl }}"
               target="_blank"
               rel="noopener noreferrer"
               @click="mobileOpen = false; trackConversion('Navbar_Mobile_CTA', '{{ $waUrl }}')"
               class="w-full bg-gradient-gold text-navy-900 font-bold py-3 rounded-xl hover:shadow-lg flex items-center justify-center gap-2">
                <i class="fa-brands fa-whatsapp text-lg"></i>
                <span>Gabung Ownership Sekarang</span>
            </a>
        </div>
    </div>
</nav>
