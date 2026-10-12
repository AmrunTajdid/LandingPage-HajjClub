@php
    $waRaw = config('services.whatsapp.number', '6281299994899');
    $waNumber = preg_replace('/^0/', '62', preg_replace('/[^0-9]/', '', $waRaw));
    $waDisplay = config('services.whatsapp.display', '081299994899');
    $waMessage = urlencode(config('services.whatsapp.message', "Halo Admin Hajj Club, saya tertarik dengan program kepemilikan travel haji & umrah bersama.\n\nMohon informasi lebih lanjut. Berikut data singkat saya:\n• Nama: \n• Kota/Domisili: \n• Profesi/Usaha saat ini: \n\nTerima kasih."));
    $waUrl = "https://wa.me/{$waNumber}?text={$waMessage}";
@endphp

<footer id="kontak" class="bg-navy-950 text-slate-300 pt-20 pb-10 border-t border-gold-500/20 relative overflow-hidden">
    <!-- Subtle Background Glow -->
    <div class="absolute top-0 left-1/2 -translate-x-1/2 w-96 h-24 bg-gold-500/10 blur-3xl pointer-events-none"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12 mb-16">
            <!-- Brand & Info -->
            <div class="lg:col-span-2 space-y-4">
                <div class="flex items-center">
                    <img src="{{ asset('images/logo.png') }}" alt="Hajj Club Logo" class="h-12 sm:h-14 w-auto object-contain">
                    <span class="sr-only">HAJJ CLUB</span>
                </div>
                <p class="text-slate-400 text-sm max-w-md leading-relaxed">
                    Satu-satunya dan pelopor model kepemilikan bersama travel haji dan umroh secara terbuka di Indonesia. Dikelola oleh gabungan profesional berpengalaman, praktisi hukum, dan konsultan legalitas resmi.
                </p>
                <div class="pt-2 flex items-center gap-4">
                    <span class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-navy-800 text-gold-400 text-xs border border-gold-500/30">
                        <i class="fa-solid fa-shield-halved text-xs"></i> Tata Kelola Transparan
                    </span>
                    <span class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-navy-800 text-gold-400 text-xs border border-gold-500/30">
                        <i class="fa-solid fa-scale-balanced text-xs"></i> Legalitas Terjamin
                    </span>
                </div>
            </div>

            <!-- Quick Links -->
            <div>
                <h4 class="text-white font-serif font-bold text-lg mb-4 border-l-2 border-gold-500 pl-3">Navigasi Utama</h4>
                <ul class="space-y-2.5 text-sm">
                    <li><a href="{{ url('/#intro') }}" class="hover:text-gold-400 transition-colors flex items-center gap-2"><i class="fa-solid fa-chevron-right text-[10px] text-gold-500"></i> Profil Pendiri</a></li>
                    <li><a href="{{ url('/#visi-misi') }}" class="hover:text-gold-400 transition-colors flex items-center gap-2"><i class="fa-solid fa-chevron-right text-[10px] text-gold-500"></i> Visi &amp; Misi</a></li>
                    <li><a href="{{ url('/#pasar') }}" class="hover:text-gold-400 transition-colors flex items-center gap-2"><i class="fa-solid fa-chevron-right text-[10px] text-gold-500"></i> Peluang Pasar</a></li>
                    <li><a href="{{ url('/#value') }}" class="hover:text-gold-400 transition-colors flex items-center gap-2"><i class="fa-solid fa-chevron-right text-[10px] text-gold-500"></i> Nilai Unggul (UVP)</a></li>
                    <li><a href="{{ url('/#galery') }}" class="hover:text-gold-400 transition-colors flex items-center gap-2"><i class="fa-solid fa-chevron-right text-[10px] text-gold-500"></i> Galery</a></li>
                    <li><a href="{{ url('/#roadmap') }}" class="hover:text-gold-400 transition-colors flex items-center gap-2"><i class="fa-solid fa-chevron-right text-[10px] text-gold-500"></i> Roadmap Perizinan</a></li>
                    <li><a href="{{ route('privacy.policy') }}" class="hover:text-gold-400 transition-colors flex items-center gap-2"><i class="fa-solid fa-shield-halved text-[10px] text-gold-500"></i> Kebijakan Privasi</a></li>
                </ul>
            </div>

            <!-- Contact & Social -->
            <div>
                <h4 class="text-white font-serif font-bold text-lg mb-4 border-l-2 border-gold-500 pl-3">Hubungi Kami</h4>
                <ul class="space-y-3 text-sm text-slate-400">
                    <li class="flex items-start gap-3">
                        <i class="fa-solid fa-location-dot text-gold-400 mt-1"></i>
                        <span>Jl. Rose Garden 1 No.86, Jaka Setia, Kec. Bekasi Selatan, Kota Bekasi, Jawa Barat 17147</span>
                    </li>
                    <li class="flex items-center gap-3">
                        <i class="fa-solid fa-envelope text-gold-400"></i>
                        <a href="mailto:labbaykharamayn@gmail.com" class="hover:text-gold-400 transition">labbaykharamayn@gmail.com</a>
                    </li>
                    <li class="flex items-center gap-3">
                        <i class="fa-brands fa-whatsapp text-emerald-400 text-base"></i>
                        <a href="{{ $waUrl }}"
                           target="_blank"
                           rel="noopener noreferrer"
                           onclick="trackConversion('Footer_WhatsApp_Link', '{{ $waUrl }}')"
                           class="text-emerald-400 hover:text-emerald-300 font-semibold transition">
                           {{ $waDisplay }}
                        </a>
                    </li>
                    <li class="flex items-center gap-3">
                        <i class="fa-brands fa-instagram text-pink-400 text-base"></i>
                        <a href="{{ config('services.social.instagram', 'https://instagram.com/hajjclub.id') }}"
                           target="_blank"
                           rel="noopener noreferrer"
                           class="hover:text-gold-400 transition">
                           {{ config('services.social.instagram_handle', '@hajjclub.id') }}
                        </a>
                    </li>
                    <li class="flex items-center gap-3">
                        <i class="fa-brands fa-facebook text-blue-400 text-base"></i>
                        <a href="{{ config('services.social.facebook', 'https://facebook.com/hajjclub.id') }}"
                           target="_blank"
                           rel="noopener noreferrer"
                           class="hover:text-gold-400 transition">
                           {{ config('services.social.facebook_handle', 'Hajj Club') }}
                        </a>
                    </li>
                </ul>

                <div class="mt-6">
                    <a href="{{ $waUrl }}"
                       target="_blank"
                       rel="noopener noreferrer"
                       onclick="trackConversion('Footer_CTA_Button', '{{ $waUrl }}')"
                       class="inline-flex items-center justify-center gap-2 w-full bg-gradient-gold text-navy-900 font-bold py-2.5 px-4 rounded-xl text-sm hover:shadow-lg hover:shadow-gold-500/20 transition">
                        <i class="fa-brands fa-whatsapp text-lg"></i>
                        <span>Chat via WhatsApp</span>
                    </a>
                </div>
            </div>
        </div>

        <!-- Copyright & Legal -->
        <div class="pt-8 border-t border-slate-800 text-center flex flex-col sm:flex-row justify-between items-center gap-4 text-xs text-slate-400">
            <p>&copy; {{ date('Y') }} <strong>Hajj Club</strong>. All rights reserved.</p>
            <div class="flex flex-wrap items-center justify-center gap-x-4 gap-y-2">
                <a href="{{ route('privacy.policy') }}" class="hover:text-gold-400 transition-colors underline decoration-slate-700 underline-offset-4">Kebijakan Privasi (Privacy Policy)</a>
                <span class="text-slate-700 hidden sm:inline">|</span>
                <p class="text-slate-400">Pelopor Kepemilikan Travel Haji &amp; Umroh Bersama di Indonesia.</p>
            </div>
        </div>
    </div>
</footer>
