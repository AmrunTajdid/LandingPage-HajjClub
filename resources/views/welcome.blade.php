@php
    $waRaw = config('services.whatsapp.number', '6281299994899');
    $waNumber = preg_replace('/^0/', '62', preg_replace('/[^0-9]/', '', $waRaw));
    $waDefaultMessage = config('services.whatsapp.message', "Halo Admin Hajj Club, saya tertarik dengan program kepemilikan travel haji & umrah bersama.\n\nMohon informasi lebih lanjut. Berikut data singkat saya:\n• Nama: \n• Kota/Domisili: \n• Profesi/Usaha saat ini: \n\nTerima kasih.");
    $waUrlHero = "https://wa.me/{$waNumber}?text=" . urlencode($waDefaultMessage);
    $waUrlCta = "https://wa.me/{$waNumber}?text=" . urlencode($waDefaultMessage);

    /*
     |--------------------------------------------------------------------------
     | HERO BACKGROUND SLIDER (TAMPILAN HD & SLIDE OTOMATIS)
     |--------------------------------------------------------------------------
     | Gambar background dapat ditambah / diubah dengan mudah di array berikut.
     | Mendukung format WebP, JPEG, PNG baik path lokal maupun URL eksternal.
     */
    $heroSlides = [
        [
            'image' => asset('images/hero-slide-1.webp'),
            'title' => 'Kemegahan Ka\'bah & Menara Jam',
            'location' => 'Masjidil Haram, Makkah'
        ],
        [
            'image' => asset('images/hero-slide-2.webp'),
            'title' => 'Keindahan Payung & Kubah Hijau',
            'location' => 'Masjid Nabawi, Madinah'
        ],
        [
            'image' => asset('images/hero-slide-3.webp'),
            'title' => 'Baitullah & Tawaf Jamaah Haji',
            'location' => 'Makkah Al-Mukarramah'
        ],
    ];
@endphp

<x-app-layout>
    <!-- HERO SECTION (HD SLIDESHOW & LIVE CINEMATIC BACKGROUND) -->
    <header x-data="{
                activeSlide: 0,
                slidesCount: {{ count($heroSlides) }},
                slides: {{ Js::from($heroSlides) }},
                timer: null,
                init() {
                    this.start();
                },
                start() {
                    this.timer = setInterval(() => {
                        this.next();
                    }, 6000);
                },
                stop() {
                    if (this.timer) clearInterval(this.timer);
                },
                next() {
                    this.activeSlide = (this.activeSlide + 1) % this.slidesCount;
                },
                prev() {
                    this.activeSlide = (this.activeSlide - 1 + this.slidesCount) % this.slidesCount;
                },
                goTo(index) {
                    this.activeSlide = index;
                    this.stop();
                    this.start();
                }
            }"
            @mouseenter="stop()"
            @mouseleave="start()"
            class="relative min-h-[94vh] flex items-center justify-center overflow-hidden border-b border-gold-500/20 py-24 lg:py-32">

        <!-- BACKGROUND SLIDES CONTAINER WITH KEN BURNS & CROSSFADE -->
        <div class="absolute inset-0 -z-20 overflow-hidden select-none pointer-events-none">
            @foreach($heroSlides as $index => $slide)
                <div class="absolute inset-0 bg-cover bg-center bg-no-repeat transition-all duration-1000 ease-out"
                     :class="{
                         'opacity-100 scale-105 animate-kenburns z-10': activeSlide === {{ $index }},
                         'opacity-0 scale-100 z-0': activeSlide !== {{ $index }}
                     }"
                     style="background-image: url('{{ $slide['image'] }}'); transition: opacity 1400ms cubic-bezier(0.4, 0, 0.2, 1), transform 8000ms ease-out;"
                     role="img"
                     aria-label="{{ $slide['title'] }}">
                </div>
            @endforeach
        </div>

        <!-- HIGH-DEFINITION CINEMATIC CONTRAST OVERLAY (VIVID YET READABLE) -->
        <div class="absolute inset-0 bg-gradient-to-b from-navy-950/85 via-navy-950/40 to-navy-950/95 -z-10 pointer-events-none"></div>
        <div class="absolute inset-0 bg-[radial-gradient(ellipse_at_center,_var(--tw-gradient-stops))] from-transparent via-navy-950/35 to-navy-950/85 -z-10 pointer-events-none"></div>

        <!-- WARM AMBIENT GOLD SPIRITUAL GLOW -->
        <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[700px] h-[450px] bg-gold-500/10 rounded-full blur-3xl pointer-events-none -z-10 animate-pulse" style="animation-duration: 5s;"></div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center relative z-10">
            <!-- Badge Pelopor -->
            <div class="inline-flex items-center px-4 py-2 rounded-full bg-navy-900/80 border border-slate-700/80 text-slate-200 text-xs sm:text-sm font-medium mb-8 backdrop-blur-md">
                <span>Pelopor Kepemilikan Travel Haji & Umrah Bersama</span>
            </div>

            <!-- Headline -->
            <h1 class="text-4xl sm:text-6xl lg:text-7xl font-serif font-black tracking-tight text-white mb-6 leading-tight drop-shadow-[0_4px_16px_rgba(0,0,0,0.85)]">
                HAJJ CLUB<br>
                <span class="text-gradient-gold">
                    Buka Bisnis Travel Haji & Umrah Tanpa Perlu Mulai dari Nol
                </span>
            </h1>

            <!-- Tagline (Enlarged & High-Impact) -->
            <div class="max-w-5xl mx-auto my-10">
                <div class="p-6 sm:p-8 rounded-2xl bg-navy-950/85 border-2 border-gold-500/60 backdrop-blur-md shadow-2xl shadow-gold-500/10">
                    <p class="text-xl sm:text-2xl md:text-3xl lg:text-[34px] font-serif font-black text-white leading-snug drop-shadow-lg text-balance" style="text-wrap: balance;">
                        Satu-satunya dan travel pertama yang menawarkan solusi kepemilikan bersama secara<br class="hidden sm:inline">
                        <span class="text-gradient-gold">terbuka, transparan, profesional dan minim resiko</span>
                    </p>
                </div>
            </div>

            <!-- Action CTAs -->
            <div class="flex flex-col sm:flex-row justify-center items-center gap-4 max-w-md sm:max-w-none mx-auto mb-10">
                <a href="{{ $waUrlHero }}"
                   target="_blank"
                   rel="noopener noreferrer"
                   onclick="trackConversion('Hero_WhatsApp_CTA', '{{ $waUrlHero }}')"
                   class="w-full sm:w-auto bg-gradient-gold text-navy-900 font-bold text-base sm:text-lg px-8 py-4 rounded-xl shadow-gold hover:shadow-gold-lg hover:scale-105 transition-all duration-200 flex items-center justify-center gap-3">
                    <i class="fa-brands fa-whatsapp text-2xl"></i>
                    <span>Menjadi Pemilik Travel</span>
                    <i class="fa-solid fa-arrow-right text-xs"></i>
                </a>

                <a href="#roadmap"
                   class="w-full sm:w-auto bg-navy-900/80 backdrop-blur-md border border-gold-500/40 text-gold-300 font-bold text-base sm:text-lg px-8 py-4 rounded-xl hover:bg-gold-500/10 hover:border-gold-500 transition-all flex items-center justify-center gap-2">
                    <i class="fa-solid fa-route text-base"></i>
                    <span>Pelajari Roadmap</span>
                </a>
            </div>

            <!-- SLIDE CONTROLS & LOCATION BADGE -->
            <div class="inline-flex items-center gap-3 px-4 py-2 rounded-full bg-navy-950/75 backdrop-blur-md border border-gold-500/30 shadow-lg mx-auto mb-12">
                <!-- Prev Button -->
                <button type="button"
                        @click="prev()"
                        class="w-6 h-6 rounded-full flex items-center justify-center text-slate-300 hover:text-gold-400 hover:bg-navy-800 transition"
                        title="Foto Sebelumnya"
                        aria-label="Previous Slide">
                    <i class="fa-solid fa-chevron-left text-[10px]"></i>
                </button>

                <!-- Indicator Dots -->
                <div class="flex items-center gap-2">
                    @foreach($heroSlides as $index => $slide)
                        <button type="button"
                                @click="goTo({{ $index }})"
                                class="h-2 rounded-full transition-all duration-300"
                                :class="activeSlide === {{ $index }} ? 'w-6 bg-gradient-gold shadow-gold' : 'w-2 bg-slate-600 hover:bg-slate-400'"
                                aria-label="Slide {{ $index + 1 }}">
                        </button>
                    @endforeach
                </div>

                <!-- Next Button -->
                <button type="button"
                        @click="next()"
                        class="w-6 h-6 rounded-full flex items-center justify-center text-slate-300 hover:text-gold-400 hover:bg-navy-800 transition"
                        title="Foto Berikutnya"
                        aria-label="Next Slide">
                    <i class="fa-solid fa-chevron-right text-[10px]"></i>
                </button>

                <!-- Dynamic Location Badge -->
                <div class="h-4 w-[1px] bg-slate-700 mx-1"></div>
                <div class="text-[11px] text-gold-300 font-medium tracking-wide flex items-center gap-1.5 min-w-[140px] text-left">
                    <i class="fa-solid fa-location-dot text-[10px] text-gold-400"></i>
                    <span x-text="slides[activeSlide]?.location"></span>
                </div>
            </div>

            <!-- Key Trust Badges -->
            <div class="pt-8 border-t border-slate-800/80 grid grid-cols-2 md:grid-cols-4 gap-6 max-w-4xl mx-auto text-left">
                <div class="flex items-center gap-3 bg-navy-950/60 backdrop-blur-md p-3 rounded-xl border border-slate-800/80 hover:border-gold-500/30 transition">
                    <div class="w-10 h-10 rounded-lg bg-navy-800 border border-gold-500/30 flex items-center justify-center text-gold-400 shrink-0">
                        <i class="fa-solid fa-handshake-angle text-lg"></i>
                    </div>
                    <div>
                        <h4 class="text-xs font-bold text-white uppercase tracking-wider">Model Perdana</h4>
                        <p class="text-[11px] text-slate-400">Kepemilikan Kolektif</p>
                    </div>
                </div>

                <div class="flex items-center gap-3 bg-navy-950/60 backdrop-blur-md p-3 rounded-xl border border-slate-800/80 hover:border-gold-500/30 transition">
                    <div class="w-10 h-10 rounded-lg bg-navy-800 border border-gold-500/30 flex items-center justify-center text-gold-400 shrink-0">
                        <i class="fa-solid fa-certificate text-lg"></i>
                    </div>
                    <div>
                        <h4 class="text-xs font-bold text-white uppercase tracking-wider">Legalitas Resmi</h4>
                        <p class="text-[11px] text-slate-400">Badan Hukum Berizin</p>
                    </div>
                </div>

                <div class="flex items-center gap-3 bg-navy-950/60 backdrop-blur-md p-3 rounded-xl border border-slate-800/80 hover:border-gold-500/30 transition">
                    <div class="w-10 h-10 rounded-lg bg-navy-800 border border-gold-500/30 flex items-center justify-center text-gold-400 shrink-0">
                        <i class="fa-solid fa-scale-balanced text-lg"></i>
                    </div>
                    <div>
                        <h4 class="text-xs font-bold text-white uppercase tracking-wider">Dewan Pengawas</h4>
                        <p class="text-[11px] text-slate-400">Pengawasan Komisaris</p>
                    </div>
                </div>

                <div class="flex items-center gap-3 bg-navy-950/60 backdrop-blur-md p-3 rounded-xl border border-slate-800/80 hover:border-gold-500/30 transition">
                    <div class="w-10 h-10 rounded-lg bg-navy-800 border border-gold-500/30 flex items-center justify-center text-gold-400 shrink-0">
                        <i class="fa-solid fa-award text-lg"></i>
                    </div>
                    <div>
                        <h4 class="text-xs font-bold text-white uppercase tracking-wider">Tata Kelola</h4>
                        <p class="text-[11px] text-slate-400">Good Corporate Governance</p>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- SECTION: PROFIL FOUNDER (INTRO) -->
    <section id="intro" class="py-24 bg-navy-950 border-b border-gold-500/10 relative">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto mb-16">
                <span class="text-xs font-bold uppercase tracking-widest text-gold-400">Pendiri Utama</span>
                <h2 class="text-3xl sm:text-5xl font-serif font-black text-white mt-2 mb-4">
                    Tokoh di Balik <span class="text-gradient-gold">Hajj Club</span>
                </h2>
                <div class="w-24 h-1 bg-gradient-gold mx-auto mb-6 rounded-full"></div>
                <p class="text-slate-300 text-sm sm:text-base leading-relaxed font-light">
                    Hajj Club diinisiasi oleh pemimpin visioner guna menghadirkan ekosistem travel haji dan umroh yang amanah, akuntabel, dan transparan melalui model kepemilikan bersama.
                </p>
            </div>

            <div class="max-w-4xl mx-auto">
                <!-- Founder Card with High-Definition Portrait -->
                <div class="bg-navy-900/90 rounded-3xl p-6 sm:p-10 border border-gold-500/30 shadow-2xl hover:border-gold-500/60 transition-all group overflow-hidden">
                    <div class="flex flex-col md:flex-row items-center md:items-stretch gap-8 lg:gap-10">
                        <!-- Founder Portrait Photo (HD) -->
                        <div class="w-full sm:w-80 md:w-5/12 shrink-0">
                            <div class="relative h-full min-h-[380px] sm:min-h-[420px] rounded-2xl overflow-hidden border-2 border-gold-500/40 shadow-2xl group/photo bg-navy-950">
                                <img src="{{ asset('images/founder.jpg') }}?v={{ filemtime(public_path('images/founder.jpg')) }}"
                                     alt="Purnama Qori Andesta - Founder Hajj Club"
                                     loading="lazy"
                                     class="w-full h-full object-cover object-top group-hover/photo:scale-105 transition-transform duration-700">
                                
                                <!-- Subtle Dark Gradient Overlay at Bottom -->
                                <div class="absolute inset-0 bg-gradient-to-t from-navy-950/90 via-transparent to-transparent pointer-events-none"></div>

                                <!-- Floating Badge on Photo -->
                                <div class="absolute bottom-4 left-4 right-4 pointer-events-none">
                                    <span class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-navy-950/90 backdrop-blur-md border border-gold-500/50 text-gold-300 text-xs font-bold shadow-lg">
                                        <i class="fa-solid fa-star text-gold-400 text-xs"></i>
                                        <span>Founder Hajj Club</span>
                                    </span>
                                </div>
                            </div>
                        </div>

                        <!-- Founder Information & Narrative -->
                        <div class="flex-1 flex flex-col justify-between">
                            <div>
                                <div class="flex items-center gap-2 mb-2">
                                    <span class="px-3 py-1 rounded-full bg-gold-500/10 border border-gold-500/30 text-gold-400 text-xs font-bold uppercase tracking-wider">
                                        Pendiri &amp; Pemimpin Visi
                                    </span>
                                </div>
                                <h3 class="text-2xl sm:text-4xl font-serif font-black text-white mt-1 mb-1">
                                    Purnama Qori Andesta
                                </h3>
                                <p class="text-gold-300 text-sm font-semibold tracking-wide mb-6">
                                    Founder Hajj Club
                                </p>

                                <blockquote class="text-slate-300 text-sm sm:text-base leading-relaxed font-light mb-6 border-l-2 border-gold-500/50 pl-4 py-1 italic">
                                    “Mendirikan Hajj Club pada <strong>Juni 2026</strong> sebagai wadah pelopor kepemilikan bersama travel haji dan umroh berbasis kolaborasi terbuka dan tata kelola profesional. Berkomitmen mentransformasi industri travel konvensional menjadi bisnis yang inklusif, modern, dan memberikan manfaat jangka panjang bagi seluruh pemilik Ownership.”
                                </blockquote>

                                <div class="space-y-2.5 text-xs text-slate-300 mb-6">
                                    <div class="flex items-center gap-2.5">
                                        <i class="fa-solid fa-circle-check text-gold-400 text-sm"></i>
                                        <span>Inisiator Kepemilikan Bisnis Travel Religi Bersama</span>
                                    </div>
                                    <div class="flex items-center gap-2.5">
                                        <i class="fa-solid fa-shield-halved text-gold-400 text-sm"></i>
                                        <span>Penerapan Good Corporate Governance (GCG)</span>
                                    </div>
                                    <div class="flex items-center gap-2.5">
                                        <i class="fa-solid fa-calendar-check text-gold-400 text-sm"></i>
                                        <span>Memimpin Sejak Juni 2026</span>
                                    </div>
                                </div>
                            </div>

                            <div class="pt-6 border-t border-slate-800 flex flex-col sm:flex-row items-center justify-between gap-4">
                                <span class="text-xs text-slate-400 flex items-center gap-2">
                                    <i class="fa-solid fa-certificate text-gold-400"></i> Terverifikasi Manajemen Resmi
                                </span>
                                <a href="{{ $waUrlHero }}"
                                   target="_blank"
                                   rel="noopener noreferrer"
                                   onclick="trackConversion('Founder_Card_CTA', '{{ $waUrlHero }}')"
                                   class="w-full sm:w-auto inline-flex items-center justify-center gap-2 px-5 py-2.5 rounded-xl bg-gradient-gold text-navy-900 font-bold text-xs hover:shadow-lg hover:shadow-gold-500/20 transition">
                                    <i class="fa-brands fa-whatsapp text-sm"></i>
                                    <span>Konsultasi dengan Founder</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Collaboration & Governance Visual Banner -->
            <div class="mt-12 max-w-4xl mx-auto bg-navy-900/50 rounded-2xl p-6 sm:p-8 border border-slate-800 flex flex-col sm:flex-row items-center justify-between gap-6">
                <div class="flex items-center gap-4">
                    <div class="w-12 h-12 rounded-xl bg-gold-500/10 border border-gold-500/30 flex items-center justify-center text-gold-400 shrink-0 text-xl">
                        <i class="fa-solid fa-shield-halved"></i>
                    </div>
                    <div>
                        <h4 class="text-base font-serif font-bold text-white">Tata Kelola &amp; Perlindungan Hukum</h4>
                        <p class="text-xs text-slate-400">Menyatukan kepemimpinan modern dengan standar Good Corporate Governance.</p>
                    </div>
                </div>

                <a href="{{ $waUrlHero }}"
                   target="_blank"
                   rel="noopener noreferrer"
                   onclick="trackConversion('Intro_Konsultasi_CTA', '{{ $waUrlHero }}')"
                   class="inline-flex items-center gap-2 px-5 py-2.5 rounded-xl bg-navy-800 hover:bg-navy-700 text-gold-300 border border-gold-500/30 text-xs font-semibold transition shrink-0">
                    <i class="fa-brands fa-whatsapp text-sm text-emerald-400"></i>
                    <span>Konsultasi dengan Founder</span>
                </a>
            </div>

            <!-- VISI & MISI HAJJ CLUB -->
            <div id="visi-misi" class="mt-20 pt-16 border-t border-gold-500/15">
                <div class="text-center max-w-3xl mx-auto mb-14">
                    <span class="text-xs font-bold uppercase tracking-widest text-gold-400">Fondasi & Arah Strategis</span>
                    <h3 class="text-2xl sm:text-4xl font-serif font-black text-white mt-2 mb-4">
                        Visi & Misi <span class="text-gradient-gold">Hajj Club</span>
                    </h3>
                    <div class="w-20 h-1 bg-gradient-gold mx-auto mb-4 rounded-full"></div>
                    <p class="text-slate-300 text-xs sm:text-sm leading-relaxed font-light">
                        Komitmen jangka panjang kami dalam mentransformasi dan memimpin ekosistem bisnis travel religi di Indonesia secara profesional.
                    </p>
                </div>

                <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-stretch">
                    <!-- VISI CARD (5 COLS) -->
                    <div class="lg:col-span-5 bg-gradient-to-br from-navy-900 via-navy-900/95 to-navy-950 rounded-2xl p-8 sm:p-10 border border-gold-500/30 shadow-xl relative overflow-hidden flex flex-col justify-between group hover:border-gold-500/60 transition-all">
                        <div class="absolute -top-12 -right-12 w-40 h-40 bg-gold-500/10 rounded-full blur-2xl pointer-events-none"></div>

                        <div>
                            <div class="flex items-center justify-between mb-6">
                                <div class="w-14 h-14 rounded-2xl bg-gold-500/15 border border-gold-500/40 flex items-center justify-center text-gold-400 text-2xl shadow-gold group-hover:scale-105 transition-transform">
                                    <i class="fa-solid fa-compass"></i>
                                </div>
                                <span class="px-3.5 py-1.5 rounded-full bg-navy-800 text-gold-400 border border-gold-500/30 text-xs font-bold uppercase tracking-wider">
                                    Visi Perusahaan
                                </span>
                            </div>

                            <h4 class="text-xs uppercase tracking-widest text-slate-400 font-semibold mb-3">Visi Utama</h4>
                            <blockquote class="text-white font-serif text-lg sm:text-xl leading-relaxed italic border-l-2 border-gold-500 pl-4 py-1 drop-shadow">
                                “Menjadi ekosistem kepemilikan bisnis travel haji dan umrah kolaboratif terdepan di Indonesia yang inklusif, transparan, dan berkelanjutan.”
                            </blockquote>
                        </div>

                        <div class="mt-8 pt-6 border-t border-slate-800/80 flex flex-wrap gap-2">
                            <span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg bg-navy-800/80 border border-gold-500/20 text-gold-300 text-xs font-medium">
                                <i class="fa-solid fa-check text-[10px] text-gold-400"></i> Inklusif
                            </span>
                            <span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg bg-navy-800/80 border border-gold-500/20 text-gold-300 text-xs font-medium">
                                <i class="fa-solid fa-check text-[10px] text-gold-400"></i> Transparan
                            </span>
                            <span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg bg-navy-800/80 border border-gold-500/20 text-gold-300 text-xs font-medium">
                                <i class="fa-solid fa-check text-[10px] text-gold-400"></i> Berkelanjutan
                            </span>
                        </div>
                    </div>

                    <!-- MISI LIST (7 COLS) -->
                    <div class="lg:col-span-7 flex flex-col justify-between gap-4">
                        <!-- Misi 1 -->
                        <div class="bg-navy-900/80 rounded-2xl p-6 sm:p-7 border border-slate-800 hover:border-gold-500/40 transition-all flex items-start gap-5 group">
                            <div class="w-12 h-12 rounded-xl bg-gold-500/10 border border-gold-500/30 text-gold-400 font-bold flex items-center justify-center shrink-0 text-base group-hover:bg-gradient-gold group-hover:text-navy-900 transition-colors shadow-sm">
                                01
                            </div>
                            <div class="flex-1">
                                <div class="flex items-center gap-2 mb-1.5">
                                    <h5 class="text-sm sm:text-base font-serif font-bold text-white">Sinergi Kepemilikan Bersama</h5>
                                    <span class="text-[10px] uppercase font-semibold text-gold-400 bg-gold-500/10 px-2 py-0.5 rounded border border-gold-500/20">Inklusif</span>
                                </div>
                                <p class="text-slate-300 text-xs sm:text-sm leading-relaxed font-light">
                                    Membangun sinergi kepemilikan bersama yang memberikan akses luas bagi mitra untuk tumbuh di industri travel religi.
                                </p>
                            </div>
                        </div>

                        <!-- Misi 2 -->
                        <div class="bg-navy-900/80 rounded-2xl p-6 sm:p-7 border border-slate-800 hover:border-gold-500/40 transition-all flex items-start gap-5 group">
                            <div class="w-12 h-12 rounded-xl bg-gold-500/10 border border-gold-500/30 text-gold-400 font-bold flex items-center justify-center shrink-0 text-base group-hover:bg-gradient-gold group-hover:text-navy-900 transition-colors shadow-sm">
                                02
                            </div>
                            <div class="flex-1">
                                <div class="flex items-center gap-2 mb-1.5">
                                    <h5 class="text-sm sm:text-base font-serif font-bold text-white">Tata Kelola Perusahaan Baik (GCG) Menuju IPO</h5>
                                    <span class="text-[10px] uppercase font-semibold text-emerald-400 bg-emerald-500/10 px-2 py-0.5 rounded border border-emerald-500/20">Transparan</span>
                                </div>
                                <p class="text-slate-300 text-xs sm:text-sm leading-relaxed font-light">
                                    Menerapkan tata kelola perusahaan yang baik (Good Corporate Governance) untuk mengantarkan ekosistem menuju status perusahaan terbuka (IPO).
                                </p>
                            </div>
                        </div>

                        <!-- Misi 3 -->
                        <div class="bg-navy-900/80 rounded-2xl p-6 sm:p-7 border border-slate-800 hover:border-gold-500/40 transition-all flex items-start gap-5 group">
                            <div class="w-12 h-12 rounded-xl bg-gold-500/10 border border-gold-500/30 text-gold-400 font-bold flex items-center justify-center shrink-0 text-base group-hover:bg-gradient-gold group-hover:text-navy-900 transition-colors shadow-sm">
                                03
                            </div>
                            <div class="flex-1">
                                <div class="flex items-center gap-2 mb-1.5">
                                    <h5 class="text-sm sm:text-base font-serif font-bold text-white">Standar Pelayanan Ibadah Berkualitas Tinggi</h5>
                                    <span class="text-[10px] uppercase font-semibold text-blue-400 bg-blue-500/10 px-2 py-0.5 rounded border border-blue-500/20">Amanah</span>
                                </div>
                                <p class="text-slate-300 text-xs sm:text-sm leading-relaxed font-light">
                                    Menyajikan standar pelayanan ibadah berkualitas tinggi, amanah, dan berorientasi pada kepuasan jamaah.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- SECTION: MARKET POTENTIAL & RESEARCH -->
    <section id="pasar" class="py-24 bg-navy-900 border-b border-gold-500/10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto mb-16">
                <span class="text-xs font-bold uppercase tracking-widest text-gold-400">Peluang Emas Bisnis Ibadah</span>
                <h2 class="text-3xl sm:text-5xl font-serif font-black text-white mt-2 mb-4">
                    Potensi Industri & <span class="text-gradient-gold">Riset Pasar</span>
                </h2>
                <div class="w-24 h-1 bg-gradient-gold mx-auto mb-6 rounded-full"></div>
                <p class="text-slate-300 text-sm sm:text-base leading-relaxed font-light">
                    Pertumbuhan pasar ibadah haji dan umroh Indonesia bergerak eksponensial, didorong oleh demografi umat Islam terbesar di dunia serta kebijakan ekspansi global Saudi Arabia.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Market Card 1 -->
                <div class="bg-navy-950/80 p-8 sm:p-9 rounded-2xl border border-gold-500/30 hover:border-gold-500/60 shadow-xl hover:shadow-gold-500/10 transition-all flex flex-col items-center text-center group">
                    <div class="w-16 h-16 rounded-2xl bg-navy-800 border border-gold-500/40 text-gold-400 flex items-center justify-center text-3xl mb-6 shadow-md group-hover:scale-110 group-hover:border-gold-400 transition-all">
                        <i class="fa-solid fa-chart-line"></i>
                    </div>
                    <h3 class="text-2xl font-serif font-black text-white group-hover:text-gold-300 transition-colors mb-3">Pertumbuhan Berkelanjutan</h3>
                    <p class="text-slate-300 text-sm leading-relaxed font-light">
                        Peminat umrah dan haji terus melonjak setiap tahun, menjadikan industri religi kebal resesi dengan perputaran dana ratusan triliun rupiah.
                    </p>
                </div>

                <!-- Market Card 2 -->
                <div class="bg-navy-950/80 p-8 sm:p-9 rounded-2xl border border-gold-500/30 hover:border-gold-500/60 shadow-xl hover:shadow-gold-500/10 transition-all flex flex-col items-center text-center group">
                    <div class="w-16 h-16 rounded-2xl bg-navy-800 border border-gold-500/40 text-gold-400 flex items-center justify-center text-3xl mb-6 shadow-md group-hover:scale-110 group-hover:border-gold-400 transition-all">
                        <i class="fa-solid fa-bullseye"></i>
                    </div>
                    <h3 class="text-2xl font-serif font-black text-white group-hover:text-gold-300 transition-colors mb-3">Saudi Vision 2030</h3>
                    <p class="text-slate-300 text-sm leading-relaxed font-light">
                        Target Kerajaan Arab Saudi mencapai 30 juta jemaah per tahun membuka akses visa dan fasilitas ibadah yang semakin masif dan modern.
                    </p>
                </div>

                <!-- Market Card 3 -->
                <div class="bg-navy-950/80 p-8 sm:p-9 rounded-2xl border border-gold-500/30 hover:border-gold-500/60 shadow-xl hover:shadow-gold-500/10 transition-all flex flex-col items-center text-center group">
                    <div class="w-16 h-16 rounded-2xl bg-navy-800 border border-gold-500/40 text-gold-400 flex items-center justify-center text-3xl mb-6 shadow-md group-hover:scale-110 group-hover:border-gold-400 transition-all">
                        <i class="fa-solid fa-kaaba"></i>
                    </div>
                    <h3 class="text-2xl font-serif font-black text-white group-hover:text-gold-300 transition-colors mb-3">Kampung Haji Indonesia</h3>
                    <p class="text-slate-300 text-sm leading-relaxed font-light">
                        Inisiatif diplomasi dan pembangunan fasilitas terpadu jemaah Indonesia di Tanah Suci memperkokoh ekosistem bisnis jangka panjang.
                    </p>
                </div>
            </div>

            <!-- Callout Statement: Bisnis Jangka Panjang Sampai Akhir Jaman -->
            <div class="mt-12 max-w-4xl mx-auto p-6 sm:p-8 rounded-2xl bg-gradient-to-r from-navy-950 via-navy-900 to-navy-950 border-2 border-gold-500/40 shadow-2xl shadow-gold-500/10 text-center relative overflow-hidden group">
                <div class="absolute inset-0 bg-gold-500/5 opacity-0 group-hover:opacity-100 transition-opacity pointer-events-none"></div>
                <div class="flex items-center justify-center gap-3 mb-2 text-gold-400">
                    <i class="fa-solid fa-star-and-crescent text-sm sm:text-base"></i>
                    <span class="text-xs font-bold uppercase tracking-widest text-gold-400">Peluang Sepanjang Masa</span>
                    <i class="fa-solid fa-star-and-crescent text-sm sm:text-base"></i>
                </div>
                <p class="text-xl sm:text-2xl md:text-3xl font-serif font-black text-white leading-relaxed drop-shadow-md">
                    “Bisnis travel haji &amp; umroh salah satu bisnis jangka panjang <span class="text-gradient-gold">sampai akhir jaman.</span>”
                </p>
            </div>
        </div>
    </section>

    <!-- SECTION: UNIQUE VALUE PROPOSITION (5 POIN) -->
    <section id="value" class="py-24 bg-navy-900 border-b border-gold-500/10 relative">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto mb-16">
                <span class="text-xs font-bold uppercase tracking-widest text-gold-400">Mengapa Memilih Kami</span>
                <h2 class="text-3xl sm:text-5xl font-serif font-black text-white mt-2 mb-4">
                    UNIQUE VALUE <span class="text-gradient-gold">PROPOSITION</span>
                </h2>
                <div class="w-24 h-1 bg-gradient-gold mx-auto mb-6 rounded-full"></div>
                <p class="text-slate-300 text-sm sm:text-base leading-relaxed font-light">
                    Lima pilar keunggulan kompetitif yang membedakan Hajj Club dari travel mana pun di Indonesia.
                </p>
            </div>

            <!-- 5 UVP Cards using custom Blade Component -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- UVP 1 -->
                <x-uvp-card
                    icon="fa-solid fa-chart-pie"
                    number="01"
                    title="OWNERSHIP"
                    subtitle="Kepemilikan Ownership Riil"
                    description="Kesempatan emas memiliki Ownership nyata dalam pertumbuhan bisnis travel haji dan umroh yang bernilai miliaran rupiah."
                />

                <!-- UVP 2 -->
                <x-uvp-card
                    icon="fa-solid fa-users-gear"
                    number="02"
                    title="PROFESSIONAL"
                    subtitle="Manajemen Ahli & Teruji"
                    description="Dikelola langsung oleh gabungan praktisi senior berlatar belakang korporat, keuangan terstruktur, dan berpengalaman puluhan tahun."
                />

                <!-- UVP 3 -->
                <x-uvp-card
                    icon="fa-solid fa-laptop-code"
                    number="03"
                    title="TRANSPARAN"
                    subtitle="Teknologi Digital Terbuka"
                    description="Sistem pelaporan terbuka yang terintegrasi platform digital modern, mempermudah akses informasi kinerja bagi seluruh mitra pemilik."
                />

                <!-- UVP 4 -->
                <x-uvp-card
                    icon="fa-solid fa-medal"
                    number="04"
                    title="PELOPOR"
                    subtitle="Inovasi Pertama di Indonesia"
                    description="Belum pernah ada model kepemilikan travel haji & umroh bersama yang terbuka dan berkekuatan hukum resmi di Indonesia sebelumnya."
                />

                <!-- UVP 5 -->
                <x-uvp-card
                    icon="fa-solid fa-route"
                    number="05"
                    title="BERKELANJUTAN"
                    subtitle="Roadmap Strategis 5 Tahun"
                    description="Roadmap terukur 5 tahun untuk ekspansi bertahap dari izin BPW, PPIU, hingga PIHK, demi nilai aset usaha yang bertumbuh eksponensial."
                    class="lg:col-span-2"
                />
            </div>
        </div>
    </section>

    <!-- SECTION: GALERY BISNIS OWNER TRAVEL HAJI & UMROH -->
    <section id="galery"
             x-data="{
                 activeModal: null,
                 photos: [
                     {
                         src: '{{ asset('images/partners/partner-1.jpg') }}',
                         title: 'Langkah Pertama Keluarga Mitra',
                         category: 'Komitmen & Antusiasme Keluarga',
                         desc: 'Bisnis owner travel haji & umroh bersama keluarga memantapkan langkah awal bergabung dalam kepemilikan travel haji & umrah bersama Hajj Club.'
                     },
                     {
                         src: '{{ asset('images/partners/partner-2.jpg') }}',
                         title: 'Kesepakatan & Legalitas Kemitraan',
                         category: 'Sinergi Legalitas Resmi',
                         desc: 'Penyerahan berkas kesepakatan kemitraan kepemilikan bersama yang terbuka, transparan, dan berlandaskan Good Corporate Governance.'
                     },
                     {
                         src: '{{ asset('images/partners/partner-3.jpg') }}',
                         title: 'Langkah Konkret Menuju Kepemilikan Travel',
                         category: 'Penyerahan Proposal Resmi',
                         desc: 'Penyerahan proposal dan berkas kepemilikan resmi kepada bisnis owner travel haji & umroh yang siap bertumbuh bersama Hajj Club.'
                     }
                 ]
             }"
             class="py-24 bg-gradient-to-b from-navy-900 via-navy-950 to-navy-900 border-b border-gold-500/10 relative overflow-hidden">

        <!-- Alias anchor for legacy #mitra links -->
        <div id="mitra" class="sr-only"></div>

        <!-- Background Ambient Glow -->
        <div class="absolute top-1/3 left-1/2 -translate-x-1/2 w-[600px] h-[350px] bg-gold-500/5 rounded-full blur-3xl pointer-events-none"></div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <!-- Section Header -->
            <div class="text-center max-w-3xl mx-auto mb-16">
                <span class="text-xs font-bold uppercase tracking-widest text-gold-400">Galery</span>
                <h2 class="text-3xl sm:text-5xl font-serif font-black text-white mt-2 mb-4">
                    Galery Bisnis Owner <span class="text-gradient-gold">Travel Haji &amp; Umroh</span>
                </h2>
                <div class="w-24 h-1 bg-gradient-gold mx-auto mb-6 rounded-full"></div>
                <p class="text-slate-300 text-sm sm:text-base leading-relaxed font-light">
                    Dokumentasi dan galery para bisnis owner travel haji &amp; umroh yang telah mengambil langkah pertama mereka untuk memiliki bisnis travel haji &amp; umrah bersama Hajj Club.
                </p>
            </div>

            <!-- Photos Showcase Grid (1 Tall Portrait + 2 Landscape Stacked) -->
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 lg:gap-8 items-stretch mb-14">
                <!-- Photo 1: Vertical Portrait (5 Cols) -->
                <div class="lg:col-span-5 flex flex-col">
                    <div @click="activeModal = photos[0]"
                         class="group relative flex-1 min-h-[480px] lg:min-h-[580px] rounded-3xl overflow-hidden border-2 border-gold-500/30 hover:border-gold-500/70 shadow-2xl transition-all duration-300 cursor-pointer bg-navy-900">
                        <img src="{{ asset('images/partners/partner-1.jpg') }}"
                             alt="Langkah Pertama Bisnis Owner Travel Haji & Umroh"
                             loading="lazy"
                             class="w-full h-full object-cover object-top group-hover:scale-105 transition-transform duration-700">

                        <!-- Dark Gradient Overlay for Readability -->
                        <div class="absolute inset-0 bg-gradient-to-t from-navy-950 via-navy-950/40 to-transparent"></div>

                        <!-- Top Floating Badge -->
                        <div class="absolute top-4 left-4 right-4 flex items-center justify-between pointer-events-none">
                            <span class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-navy-950/85 backdrop-blur-md border border-gold-500/40 text-gold-300 text-xs font-bold shadow-lg">
                                <i class="fa-solid fa-users text-gold-400"></i>
                                <span>Komitmen Keluarga</span>
                            </span>
                            <span class="w-9 h-9 rounded-full bg-navy-950/80 backdrop-blur-md border border-gold-500/30 text-gold-300 flex items-center justify-center text-xs group-hover:bg-gradient-gold group-hover:text-navy-900 transition-colors shadow-lg">
                                <i class="fa-solid fa-expand"></i>
                            </span>
                        </div>

                        <!-- Bottom Content -->
                        <div class="absolute bottom-0 inset-x-0 p-6 sm:p-8">
                            <span class="text-[11px] font-mono uppercase tracking-wider text-gold-400 font-semibold block mb-1">
                                Dokumentasi Ownership 01
                            </span>
                            <h3 class="text-xl sm:text-2xl font-serif font-black text-white mb-2 group-hover:text-gold-200 transition-colors">
                                Langkah Pertama Keluarga Mitra
                            </h3>
                            <p class="text-slate-300 text-xs sm:text-sm font-light leading-relaxed mb-3">
                                Bisnis owner travel haji &amp; umroh bersama keluarga memantapkan langkah awal bergabung dalam kepemilikan travel haji &amp; umrah bersama Hajj Club.
                            </p>
                            <span class="inline-flex items-center gap-1.5 text-xs text-gold-400 font-semibold group-hover:underline">
                                <span>Lihat Foto Kualitas Penuh</span>
                                <i class="fa-solid fa-arrow-right text-[10px]"></i>
                            </span>
                        </div>
                    </div>
                </div>

                <!-- Photos 2 & 3: Landscape Stacked (7 Cols) -->
                <div class="lg:col-span-7 flex flex-col justify-between gap-6 lg:gap-8">
                    <!-- Photo 2 -->
                    <div @click="activeModal = photos[1]"
                         class="group relative flex-1 min-h-[270px] rounded-3xl overflow-hidden border-2 border-gold-500/30 hover:border-gold-500/70 shadow-2xl transition-all duration-300 cursor-pointer bg-navy-900">
                        <img src="{{ asset('images/partners/partner-2.jpg') }}"
                             alt="Penyerahan Dokumen Ownership Hajj Club"
                             loading="lazy"
                             class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">

                        <div class="absolute inset-0 bg-gradient-to-t from-navy-950 via-navy-950/50 to-transparent"></div>

                        <!-- Top Floating Badge -->
                        <div class="absolute top-4 left-4 right-4 flex items-center justify-between pointer-events-none">
                            <span class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-navy-950/85 backdrop-blur-md border border-gold-500/40 text-gold-300 text-xs font-bold shadow-lg">
                                <i class="fa-solid fa-file-signature text-gold-400"></i>
                                <span>Sinergi Legalitas</span>
                            </span>
                            <span class="w-9 h-9 rounded-full bg-navy-950/80 backdrop-blur-md border border-gold-500/30 text-gold-300 flex items-center justify-center text-xs group-hover:bg-gradient-gold group-hover:text-navy-900 transition-colors shadow-lg">
                                <i class="fa-solid fa-expand"></i>
                            </span>
                        </div>

                        <!-- Bottom Content -->
                        <div class="absolute bottom-0 inset-x-0 p-6 sm:p-7">
                            <span class="text-[11px] font-mono uppercase tracking-wider text-gold-400 font-semibold block mb-1">
                                Dokumentasi Ownership 02
                            </span>
                            <h3 class="text-lg sm:text-xl font-serif font-black text-white mb-1.5 group-hover:text-gold-200 transition-colors">
                                Kesepakatan &amp; Legalitas Kemitraan
                            </h3>
                            <p class="text-slate-300 text-xs sm:text-sm font-light leading-relaxed">
                                Penyerahan berkas kesepakatan kemitraan kepemilikan bersama yang terbuka, transparan, dan profesional.
                            </p>
                        </div>
                    </div>

                    <!-- Photo 3 -->
                    <div @click="activeModal = photos[2]"
                         class="group relative flex-1 min-h-[270px] rounded-3xl overflow-hidden border-2 border-gold-500/30 hover:border-gold-500/70 shadow-2xl transition-all duration-300 cursor-pointer bg-navy-900">
                        <img src="{{ asset('images/partners/partner-3.jpg') }}"
                             alt="Penyerahan Proposal Resmi Hajj Club"
                             loading="lazy"
                             class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">

                        <div class="absolute inset-0 bg-gradient-to-t from-navy-950 via-navy-950/50 to-transparent"></div>

                        <!-- Top Floating Badge -->
                        <div class="absolute top-4 left-4 right-4 flex items-center justify-between pointer-events-none">
                            <span class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-navy-950/85 backdrop-blur-md border border-gold-500/40 text-gold-300 text-xs font-bold shadow-lg">
                                <i class="fa-solid fa-handshake-angle text-gold-400"></i>
                                <span>Proposal Ownership</span>
                            </span>
                            <span class="w-9 h-9 rounded-full bg-navy-950/80 backdrop-blur-md border border-gold-500/30 text-gold-300 flex items-center justify-center text-xs group-hover:bg-gradient-gold group-hover:text-navy-900 transition-colors shadow-lg">
                                <i class="fa-solid fa-expand"></i>
                            </span>
                        </div>

                        <!-- Bottom Content -->
                        <div class="absolute bottom-0 inset-x-0 p-6 sm:p-7">
                            <span class="text-[11px] font-mono uppercase tracking-wider text-gold-400 font-semibold block mb-1">
                                Dokumentasi Ownership 03
                            </span>
                            <h3 class="text-lg sm:text-xl font-serif font-black text-white mb-1.5 group-hover:text-gold-200 transition-colors">
                                Langkah Konkret Menuju Kepemilikan Travel
                            </h3>
                            <p class="text-slate-300 text-xs sm:text-sm font-light leading-relaxed">
                                Penyerahan proposal dan berkas kepemilikan resmi kepada bisnis owner travel haji &amp; umroh yang siap bertumbuh bersama Hajj Club.
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Trust Highlights Strip -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-5 max-w-5xl mx-auto mb-10">
                <div class="bg-navy-950/70 border border-gold-500/20 rounded-2xl p-5 flex items-center gap-4">
                    <div class="w-12 h-12 rounded-xl bg-gold-500/10 border border-gold-500/30 flex items-center justify-center text-gold-400 shrink-0 text-xl">
                        <i class="fa-solid fa-comments"></i>
                    </div>
                    <div>
                        <h4 class="text-sm font-bold text-white">Konsultasi Tatap Muka</h4>
                        <p class="text-xs text-slate-400">Diskusi terbuka &amp; transparan langsung bersama tim manajemen.</p>
                    </div>
                </div>

                <div class="bg-navy-950/70 border border-gold-500/20 rounded-2xl p-5 flex items-center gap-4">
                    <div class="w-12 h-12 rounded-xl bg-gold-500/10 border border-gold-500/30 flex items-center justify-center text-gold-400 shrink-0 text-xl">
                        <i class="fa-solid fa-certificate"></i>
                    </div>
                    <div>
                        <h4 class="text-sm font-bold text-white">Legalitas Jelas &amp; Sah</h4>
                        <p class="text-xs text-slate-400">Berkas kemitraan berkekuatan hukum dengan tata kelola profesional.</p>
                    </div>
                </div>

                <div class="bg-navy-950/70 border border-gold-500/20 rounded-2xl p-5 flex items-center gap-4">
                    <div class="w-12 h-12 rounded-xl bg-gold-500/10 border border-gold-500/30 flex items-center justify-center text-gold-400 shrink-0 text-xl">
                        <i class="fa-solid fa-chart-line"></i>
                    </div>
                    <div>
                        <h4 class="text-sm font-bold text-white">Tumbuh Bersama</h4>
                        <p class="text-xs text-slate-400">Menjadi bagian dari pelopor ekosistem travel haji bersama di Indonesia.</p>
                    </div>
                </div>
            </div>

            <!-- CTA Prompt Button -->
            <div class="text-center">
                <a href="{{ $waUrlCta }}"
                   target="_blank"
                   rel="noopener noreferrer"
                   onclick="trackConversion('Partners_Social_Proof_CTA', '{{ $waUrlCta }}')"
                   class="inline-flex items-center justify-center gap-3 bg-gradient-gold text-navy-900 font-black text-base sm:text-lg px-8 py-4 rounded-2xl shadow-gold hover:shadow-gold-lg hover:scale-105 transition-all duration-200">
                    <i class="fa-brands fa-whatsapp text-2xl"></i>
                    <span>Ambil Langkah Pertama Anda Sekarang</span>
                    <i class="fa-solid fa-arrow-right text-xs"></i>
                </a>
            </div>
        </div>

        <!-- FULL-RESOLUTION HD LIGHTBOX MODAL -->
        <div x-show="activeModal !== null"
             x-transition:enter="transition ease-out duration-300"
             x-transition:enter-start="opacity-0 scale-95"
             x-transition:enter-end="opacity-100 scale-100"
             x-transition:leave="transition ease-in duration-200"
             x-transition:leave-start="opacity-100 scale-100"
             x-transition:leave-end="opacity-0 scale-95"
             @keydown.escape.window="activeModal = null"
             class="fixed inset-0 z-50 flex items-center justify-center p-4 sm:p-6 bg-navy-950/95 backdrop-blur-2xl"
             style="display: none;">

            <!-- Backdrop Click to Close -->
            <div @click="activeModal = null" class="absolute inset-0"></div>

            <!-- Modal Content Card -->
            <div class="relative z-10 max-w-4xl w-full bg-navy-900 rounded-3xl border-2 border-gold-500/50 shadow-2xl overflow-hidden flex flex-col max-h-[92vh]">
                <!-- Header -->
                <div class="px-6 py-4 border-b border-slate-800 flex items-center justify-between bg-navy-950">
                    <div>
                        <span class="text-xs font-mono uppercase tracking-wider text-gold-400 font-semibold" x-text="activeModal?.category"></span>
                        <h4 class="text-lg font-serif font-bold text-white" x-text="activeModal?.title"></h4>
                    </div>
                    <button type="button"
                            @click="activeModal = null"
                            class="w-10 h-10 rounded-full bg-navy-800 hover:bg-gold-500 hover:text-navy-900 text-slate-300 flex items-center justify-center transition"
                            aria-label="Tutup Preview">
                        <i class="fa-solid fa-xmark text-lg"></i>
                    </button>
                </div>

                <!-- HD Image Area -->
                <div class="p-4 sm:p-6 flex-1 overflow-auto flex items-center justify-center bg-navy-950/50">
                    <img :src="activeModal?.src"
                         :alt="activeModal?.title"
                         class="max-h-[65vh] w-auto max-w-full rounded-2xl object-contain shadow-2xl border border-gold-500/30">
                </div>

                <!-- Footer Description & CTA -->
                <div class="px-6 py-4 border-t border-slate-800 bg-navy-950 flex flex-col sm:flex-row items-center justify-between gap-4">
                    <p class="text-xs sm:text-sm text-slate-300 font-light" x-text="activeModal?.desc"></p>
                    <a href="{{ $waUrlCta }}"
                       target="_blank"
                       rel="noopener noreferrer"
                       onclick="trackConversion('Modal_Lightbox_CTA', '{{ $waUrlCta }}')"
                       class="inline-flex items-center gap-2 px-5 py-2.5 rounded-xl bg-gradient-gold text-navy-900 font-bold text-xs hover:shadow-lg transition shrink-0">
                        <i class="fa-brands fa-whatsapp text-base"></i>
                        <span>Konsultasi Kemitraan</span>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- SECTION: ROADMAP PERIZINAN & TARGET USAHA -->
    <section id="roadmap" class="py-24 bg-navy-950 border-b border-gold-500/10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto mb-16">
                <span class="text-xs font-bold uppercase tracking-widest text-gold-400">Realitas Perizinan Travel</span>
                <h2 class="text-3xl sm:text-5xl font-serif font-black text-white mt-2 mb-4">
                    Proses jika membangun sendiri butuh waktu <span class="text-gradient-gold">lebih dari 4 tahun.</span>
                </h2>
                <div class="w-24 h-1 bg-gradient-gold mx-auto mb-6 rounded-full"></div>
                <p class="text-slate-300 text-sm sm:text-base leading-relaxed font-light">
                    Mendirikan bisnis travel haji & umroh secara mandiri dari nol memerlukan proses perizinan berjenjang, audit regulasi Kementerian Agama, dan waktu tunggu hingga 4 tahun sebelum beroperasi mandiri.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                <!-- Step 1 -->
                <div class="bg-navy-900/80 rounded-2xl p-6 border border-gold-500/20 hover:border-gold-500/50 shadow-xl transition-all flex flex-col justify-between">
                    <div>
                        <div class="flex items-center justify-between mb-4">
                            <span class="text-xs font-mono font-bold text-gold-400 bg-gold-500/10 px-2.5 py-1 rounded-full border border-gold-500/20">TAHUN 1 – 2</span>
                            <span class="text-xs text-slate-400">Fase 1</span>
                        </div>
                        <h3 class="text-2xl font-serif font-bold text-white mb-2">Izin BPW</h3>
                        <p class="text-gold-400 text-xs font-semibold mb-3">Biro Perjalanan Wisata</p>
                        <p class="text-slate-300 text-sm leading-relaxed font-light">
                            Wajib beroperasi aktif sebagai Biro Perjalanan Wisata minimal 2 tahun sebagai syarat mutlak pengajuan izin umrah ke Kemenag RI.
                        </p>
                    </div>
                    <div class="mt-6 pt-4 border-t border-slate-800 text-xs text-slate-400 flex items-center gap-2">
                        <i class="fa-solid fa-clock text-gold-400"></i> Waktu: 2 Tahun Penuh
                    </div>
                </div>

                <!-- Step 2 -->
                <div class="bg-navy-900/80 rounded-2xl p-6 border border-gold-500/20 hover:border-gold-500/50 shadow-xl transition-all flex flex-col justify-between">
                    <div>
                        <div class="flex items-center justify-between mb-4">
                            <span class="text-xs font-mono font-bold text-gold-400 bg-gold-500/10 px-2.5 py-1 rounded-full border border-gold-500/20">TAHUN KE-3</span>
                            <span class="text-xs text-slate-400">Fase 2</span>
                        </div>
                        <h3 class="text-2xl font-serif font-bold text-white mb-2">Izin PPIU</h3>
                        <p class="text-gold-400 text-xs font-semibold mb-3">Izin Umrah Resmi Kemenag</p>
                        <p class="text-slate-300 text-sm leading-relaxed font-light">
                            Pengajuan izin Penyelenggara Perjalanan Ibadah Umrah dengan syarat deposit jaminan bank, audit finansial, dan verifikasi lapangan.
                        </p>
                    </div>
                    <div class="mt-6 pt-4 border-t border-slate-800 text-xs text-slate-400 flex items-center gap-2">
                        <i class="fa-solid fa-clock text-gold-400"></i> Waktu: 1 Tahun Proses
                    </div>
                </div>

                <!-- Step 3 -->
                <div class="bg-navy-900/80 rounded-2xl p-6 border border-gold-500/20 hover:border-gold-500/50 shadow-xl transition-all flex flex-col justify-between">
                    <div>
                        <div class="flex items-center justify-between mb-4">
                            <span class="text-xs font-mono font-bold text-gold-400 bg-gold-500/10 px-2.5 py-1 rounded-full border border-gold-500/20">TAHUN KE-4</span>
                            <span class="text-xs text-slate-400">Fase 3</span>
                        </div>
                        <h3 class="text-2xl font-serif font-bold text-white mb-2">Izin PIHK</h3>
                        <p class="text-gold-400 text-xs font-semibold mb-3">Penyelenggara Haji Khusus</p>
                        <p class="text-slate-300 text-sm leading-relaxed font-light">
                            Izin puncak Penyelenggara Ibadah Haji Khusus (PIHK) resmi untuk memperoleh kuota haji khusus mandiri di tingkat nasional.
                        </p>
                    </div>
                    <div class="mt-6 pt-4 border-t border-slate-800 text-xs text-slate-400 flex items-center gap-2">
                        <i class="fa-solid fa-clock text-gold-400"></i> Waktu: 1 Tahun Audit
                    </div>
                </div>

                <!-- Step 4 - Target Utama -->
                <div class="bg-gradient-to-b from-navy-900 to-navy-950 rounded-2xl p-6 border-2 border-gold-500/60 shadow-gold transition-all flex flex-col justify-between relative overflow-hidden">
                    <div class="absolute -top-8 -right-8 w-24 h-24 bg-gold-500/15 rounded-full blur-xl pointer-events-none"></div>

                    <div>
                        <div class="flex items-center justify-between mb-4">
                            <span class="text-xs font-mono font-bold text-navy-900 bg-gradient-gold px-2.5 py-1 rounded-full">TOTAL ESTIMASI</span>
                            <span class="text-xs text-gold-400 font-bold">~4 TAHUN</span>
                        </div>
                        <h3 class="text-2xl font-serif font-black text-white mb-2">Akreditasi A</h3>
                        <p class="text-gold-400 text-xs font-semibold mb-3">Standar Kualitas Tertinggi</p>
                        <p class="text-slate-300 text-sm leading-relaxed font-light">
                            Meraih predikat Akreditasi A dan kesiapan melayani minimal <strong>1.000 jemaah</strong> per tahun secara mandiri dan profesional.
                        </p>
                    </div>
                    <div class="mt-6 pt-4 border-t border-gold-500/30 text-xs text-gold-300 font-medium flex items-center gap-2">
                        <i class="fa-solid fa-hourglass-half text-gold-400"></i> Butuh Waktu Panjang & Modal Besar
                    </div>
                </div>
            </div>

            <!-- High-Impact CTA Banner: Skip the 4-year wait -->
            <div class="mt-14 max-w-5xl mx-auto rounded-3xl bg-gradient-to-r from-navy-900 via-navy-950 to-navy-900 border-2 border-gold-500/50 p-8 sm:p-12 shadow-2xl relative overflow-hidden">
                <!-- Background ambient glow -->
                <div class="absolute -top-24 -right-24 w-72 h-72 bg-gold-500/15 rounded-full blur-3xl pointer-events-none"></div>

                <div class="relative z-10 flex flex-col lg:flex-row items-center justify-between gap-8 text-center lg:text-left">
                    <div class="max-w-2xl">
                        <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-gold-500/20 text-gold-300 text-xs sm:text-sm font-bold border border-gold-500/40 mb-4">
                            <i class="fa-solid fa-bolt-lightning text-gold-400"></i>
                            <span>Solusi Cepat &amp; Praktis Bersama Hajj Club</span>
                        </div>
                        <h3 class="text-2xl sm:text-3xl md:text-4xl font-serif font-black text-white leading-tight mb-3">
                            Mengapa Menunggu 4 Tahun Jika Anda Bisa <span class="text-gradient-gold">Memilikinya Sekarang?</span>
                        </h3>
                        <p class="text-slate-200 text-base sm:text-lg leading-relaxed font-light">
                            Bersama <strong>Hajj Club</strong>, Anda tidak perlu membuang waktu 4 tahun, birokrasi berbelit, dan risiko modal dari nol. Dapatkan kepemilikan bisnis travel resmi hari ini juga dan nikmati keuntungannya bersama kami!
                        </p>
                    </div>

                    <div class="shrink-0 w-full lg:w-auto">
                        <a href="{{ $waUrlCta }}"
                           target="_blank"
                           rel="noopener noreferrer"
                           onclick="trackConversion('Roadmap_Skip_Wait_CTA', '{{ $waUrlCta }}')"
                           class="inline-flex items-center justify-center gap-3 w-full sm:w-auto bg-gradient-gold text-navy-900 font-black text-base sm:text-lg px-8 py-4 sm:px-10 sm:py-5 rounded-2xl shadow-gold hover:shadow-gold-lg hover:scale-105 transition-all duration-200">
                            <i class="fa-brands fa-whatsapp text-2xl"></i>
                            <span>Gabung Tanpa Menunggu 4 Tahun</span>
                            <i class="fa-solid fa-arrow-right text-xs"></i>
                        </a>
                        <p class="text-xs text-slate-400 mt-2 text-center lg:text-right">
                            Konsultasi langsung
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- SECTION: CALL TO ACTION (GOOGLE ADS CONVERSION READY) -->
    <section class="py-24 bg-gradient-to-b from-navy-950 via-navy-900 to-navy-950 relative overflow-hidden text-center">
        <!-- Glow Overlay -->
        <div class="absolute inset-0 bg-[radial-gradient(ellipse_at_center,_rgba(212,175,55,0.15),transparent_70%)] pointer-events-none"></div>

        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <span class="inline-block py-1.5 px-4 rounded-full bg-gold-500/20 text-gold-400 text-xs sm:text-sm font-semibold mb-6 border border-gold-500/40 shadow-sm">
                Kesempatan Terbatas Bagi Calon Pemilik
            </span>

            <h2 class="text-3xl sm:text-5xl lg:text-6xl font-serif font-black text-white mb-6 leading-tight">
                Wujudkan Bisnis Travel Haji & Umrah Anda<br>
                <span class="text-gradient-gold">Gabung Bersama Hajj Club Sekarang!</span>
            </h2>

            <p class="max-w-2xl mx-auto text-slate-300 text-base sm:text-lg mb-10 leading-relaxed font-light">
                Ambil bagian dalam kepemilikan bisnis yang menguntungkan sekaligus bernilai ibadah jariyah. Konsultasikan kemitraan Anda langsung bersama tim kami.
            </p>

            <div class="flex flex-col sm:flex-row justify-center items-center gap-5">
                <a href="{{ $waUrlCta }}"
                   target="_blank"
                   rel="noopener noreferrer"
                   onclick="trackConversion('Bottom_Main_CTA', '{{ $waUrlCta }}')"
                   class="w-full sm:w-auto bg-gradient-gold text-navy-900 font-black text-lg px-10 py-5 rounded-2xl shadow-gold hover:shadow-gold-lg hover:scale-105 transition-all duration-200 flex items-center justify-center gap-3">
                    <i class="fa-brands fa-whatsapp text-2xl"></i>
                    <span>Hubungi Kami di WhatsApp</span>
                    <i class="fa-solid fa-arrow-right text-xs"></i>
                </a>

                <a href="#intro"
                   class="w-full sm:w-auto bg-navy-800/80 hover:bg-navy-800 text-slate-200 border border-slate-700 hover:border-gold-500 font-semibold text-lg px-8 py-5 rounded-2xl transition">
                    Pelajari Profil Founder
                </a>
            </div>

            <!-- Guarantee Note -->
            <p class="text-xs text-slate-400 mt-8 flex items-center justify-center gap-2">
                <i class="fa-solid fa-lock text-gold-400"></i>
                Konsultasi gratis tanpa kewajiban. Data & privasi Anda terjamin 100% aman.
            </p>
        </div>
    </section>
</x-app-layout>
