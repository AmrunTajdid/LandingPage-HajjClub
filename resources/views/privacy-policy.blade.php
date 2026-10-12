@php
    $waRaw = config('services.whatsapp.number', '6281299994899');
    $waNumber = preg_replace('/^0/', '62', preg_replace('/[^0-9]/', '', $waRaw));
    $waDisplay = config('services.whatsapp.display', '081299994899');
    $waMessage = urlencode("Halo Admin Hajj Club, saya ingin bertanya seputar kebijakan privasi dan keamanan data di Hajj Club.");
    $waUrl = "https://wa.me/{$waNumber}?text={$waMessage}";
@endphp

<x-app-layout
    title="Kebijakan Privasi (Privacy Policy) - Hajj Club"
    description="Kebijakan Privasi resmi Hajj Club. Komitmen transparansi dan pelindungan data pribadi pengguna sesuai UU No. 27 Tahun 2022 (UU PDP) dan standar periklanan digital global.">

    <!-- PAGE HERO BANNER -->
    <header class="relative py-16 sm:py-24 bg-gradient-to-b from-navy-950 via-navy-900 to-navy-950 border-b border-gold-500/20 overflow-hidden">
        <!-- Ambient Gold Glow -->
        <div class="absolute top-0 left-1/2 -translate-x-1/2 w-[600px] h-[300px] bg-gold-500/10 rounded-full blur-3xl pointer-events-none"></div>

        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center">
            <!-- Breadcrumb Navigation -->
            <nav class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-navy-900/80 border border-gold-500/30 text-xs text-slate-300 mb-6 backdrop-blur-md">
                <a href="{{ url('/') }}" class="hover:text-gold-400 transition flex items-center gap-1.5">
                    <i class="fa-solid fa-house text-[10px] text-gold-400"></i>
                    <span>Beranda</span>
                </a>
                <span class="text-slate-600">/</span>
                <span class="text-gold-400 font-semibold">Kebijakan Privasi</span>
            </nav>

            <span class="block text-xs font-bold uppercase tracking-widest text-gold-400 mb-3">Legal &amp; Compliance</span>
            <h1 class="text-3xl sm:text-5xl lg:text-6xl font-serif font-black text-white tracking-tight leading-tight mb-4">
                Kebijakan Privasi <span class="text-gradient-gold">(Privacy Policy)</span>
            </h1>
            <div class="w-24 h-1 bg-gradient-gold mx-auto mb-6 rounded-full"></div>
            <p class="text-slate-300 text-sm sm:text-base max-w-2xl mx-auto leading-relaxed font-light">
                Komitmen penuh <strong class="text-white font-semibold">Hajj Club</strong> terhadap transparansi, kerahasiaan, dan pelindungan data pribadi pengunjung serta calon pemilik travel sesuai ketentuan perundang-undangan Republik Indonesia.
            </p>

            <div class="mt-6 flex flex-wrap items-center justify-center gap-4 text-xs text-slate-400">
                <span class="inline-flex items-center gap-1.5 bg-navy-900/70 border border-slate-800 px-3 py-1.5 rounded-lg">
                    <i class="fa-solid fa-clock text-gold-400"></i> Terakhir Diperbarui: <strong>Oktober 2026</strong>
                </span>
                <span class="inline-flex items-center gap-1.5 bg-navy-900/70 border border-slate-800 px-3 py-1.5 rounded-lg">
                    <i class="fa-solid fa-scale-balanced text-gold-400"></i> Kepatuhan: <strong>UU No. 27/2022 (UU PDP)</strong>
                </span>
            </div>
        </div>
    </header>

    <!-- CONTENT BODY -->
    <article class="py-16 sm:py-20 bg-navy-900/50 relative">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 space-y-12">

            <!-- Ringkasan Komitmen Card -->
            <div class="p-6 sm:p-8 rounded-2xl bg-gradient-to-r from-navy-950 via-navy-900 to-navy-950 border-2 border-gold-500/40 shadow-xl relative overflow-hidden">
                <div class="flex items-start gap-4">
                    <div class="w-12 h-12 rounded-xl bg-gold-500/10 border border-gold-500/30 flex items-center justify-center text-gold-400 shrink-0 text-xl">
                        <i class="fa-solid fa-shield-halved"></i>
                    </div>
                    <div>
                        <h2 class="text-lg sm:text-xl font-serif font-bold text-white mb-2">Prinsip Pokok Pelindungan Data Hajj Club</h2>
                        <p class="text-slate-300 text-sm leading-relaxed font-light">
                            Kami menghargai privasi Anda seutuhnya. Hajj Club <strong class="text-gold-300 font-semibold">tidak pernah menjual, menyewakan, atau mendistribusikan data pribadi Anda</strong> kepada pihak ketiga mana pun tanpa persetujuan sah dari Anda. Data yang kami terima digunakan semata-mata untuk memfasilitasi konsultasi kemitraan kepemilikan travel haji &amp; umrah secara transparan dan profesional.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Pasal 1: Pendahuluan -->
            <section class="space-y-4">
                <div class="flex items-center gap-3 border-b border-gold-500/20 pb-3">
                    <span class="w-8 h-8 rounded-lg bg-gold-500/15 border border-gold-500/40 text-gold-400 font-bold flex items-center justify-center text-xs shrink-0">01</span>
                    <h3 class="text-xl sm:text-2xl font-serif font-bold text-white">Pendahuluan</h3>
                </div>
                <div class="text-slate-300 text-sm sm:text-base leading-relaxed font-light space-y-3 pl-11">
                    <p>
                        Kebijakan Privasi ini menjelaskan bagaimana manajemen <strong class="text-white font-medium">Hajj Club</strong> ("Kami") mengelola, mengumpulkan, memproses, menyimpan, dan melindungi data pribadi pengunjung situs web serta pengguna layanan Kami di situs <strong class="text-gold-300 font-mono text-xs">hajjclub.id</strong>.
                    </p>
                    <p>
                        Dengan mengakses situs web Kami, menggunakan tombol komunikasi resmi (seperti WhatsApp), atau memberikan informasi pribadi kepada Kami, Anda menyatakan telah membaca, memahami, dan menyetujui seluruh ketentuan dalam Kebijakan Privasi ini.
                    </p>
                </div>
            </section>

            <!-- Pasal 2: Data Pribadi yang Kami Kumpulkan -->
            <section class="space-y-4">
                <div class="flex items-center gap-3 border-b border-gold-500/20 pb-3">
                    <span class="w-8 h-8 rounded-lg bg-gold-500/15 border border-gold-500/40 text-gold-400 font-bold flex items-center justify-center text-xs shrink-0">02</span>
                    <h3 class="text-xl sm:text-2xl font-serif font-bold text-white">Data Pribadi yang Kami Kumpulkan</h3>
                </div>
                <div class="text-slate-300 text-sm sm:text-base leading-relaxed font-light space-y-4 pl-11">
                    <p>Kami hanya mengumpulkan data yang relevan dan dibutuhkan untuk komunikasi serta evaluasi kemitraan, yang mencakup:</p>
                    <ul class="space-y-2 list-disc list-inside text-slate-300">
                        <li><strong class="text-white font-medium">Data yang Anda Berikan Secara Sukarela</strong>: Nama lengkap, kota/domisili, nomor telepon/WhatsApp aktif, serta profesi atau bidang usaha saat ini ketika Anda menghubungi Kami melalui format pesan WhatsApp terstruktur.</li>
                        <li><strong class="text-white font-medium">Data Interaksi &amp; Konsultasi</strong>: Notulen diskusi konsultasi kepemilikan travel, pertanyaan kemitraan, dan korespondensi resmi antara Anda dengan tim manajemen Hajj Club.</li>
                        <li><strong class="text-white font-medium">Data Teknis Otomatis</strong>: Alamat IP (Internet Protocol), peramban (browser), sistem operasi, waktu kunjungan, dan halaman yang diakses yang dicatat secara otomatis oleh server demi pemeliharaan sistem keamanan.</li>
                        <li><strong class="text-white font-medium">Data Pelacak &amp; Cookies</strong>: Informasi anonim mengenai kunjungan halaman untuk keperluan analisis performa situs web (melalui Google Analytics / Google Ads conversion tracking).</li>
                    </ul>
                </div>
            </section>

            <!-- Pasal 3: Tujuan Penggunaan Data Pribadi -->
            <section class="space-y-4">
                <div class="flex items-center gap-3 border-b border-gold-500/20 pb-3">
                    <span class="w-8 h-8 rounded-lg bg-gold-500/15 border border-gold-500/40 text-gold-400 font-bold flex items-center justify-center text-xs shrink-0">03</span>
                    <h3 class="text-xl sm:text-2xl font-serif font-bold text-white">Tujuan Pengolahan Data Pribadi</h3>
                </div>
                <div class="text-slate-300 text-sm sm:text-base leading-relaxed font-light space-y-3 pl-11">
                    <p>Informasi pribadi yang Anda berikan kepada Hajj Club digunakan untuk tujuan:</p>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 pt-2">
                        <div class="p-3.5 rounded-xl bg-navy-950/70 border border-slate-800 flex items-start gap-3">
                            <i class="fa-solid fa-check text-gold-400 mt-1 text-xs shrink-0"></i>
                            <span class="text-xs text-slate-300">Memproses dan menindaklanjuti permohonan konsultasi kepemilikan travel haji &amp; umrah bersama.</span>
                        </div>
                        <div class="p-3.5 rounded-xl bg-navy-950/70 border border-slate-800 flex items-start gap-3">
                            <i class="fa-solid fa-check text-gold-400 mt-1 text-xs shrink-0"></i>
                            <span class="text-xs text-slate-300">Mengirimkan proposal resmi, berkas transparansi legalitas, dan jadwal pertemuan tatap muka.</span>
                        </div>
                        <div class="p-3.5 rounded-xl bg-navy-950/70 border border-slate-800 flex items-start gap-3">
                            <i class="fa-solid fa-check text-gold-400 mt-1 text-xs shrink-0"></i>
                            <span class="text-xs text-slate-300">Mengoptimalkan kualitas tampilan website dan pengalaman pengguna saat membaca informasi.</span>
                        </div>
                        <div class="p-3.5 rounded-xl bg-navy-950/70 border border-slate-800 flex items-start gap-3">
                            <i class="fa-solid fa-check text-gold-400 mt-1 text-xs shrink-0"></i>
                            <span class="text-xs text-slate-300">Memenuhi kewajiban administratif dan regulasi hukum Republik Indonesia.</span>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Pasal 4: Kerahasiaan & Keamanan Data (Non-Disclosure) -->
            <section class="space-y-4">
                <div class="flex items-center gap-3 border-b border-gold-500/20 pb-3">
                    <span class="w-8 h-8 rounded-lg bg-gold-500/15 border border-gold-500/40 text-gold-400 font-bold flex items-center justify-center text-xs shrink-0">04</span>
                    <h3 class="text-xl sm:text-2xl font-serif font-bold text-white">Kerahasiaan &amp; Pelindungan Data</h3>
                </div>
                <div class="text-slate-300 text-sm sm:text-base leading-relaxed font-light space-y-3 pl-11">
                    <p>
                        Kami menerapkan standar teknis dan manajerial yang ketat untuk melindungi data pribadi Anda dari akses yang tidak sah, pengungkapan, perubahan, atau perusakan yang melanggar hukum:
                    </p>
                    <ul class="space-y-2 list-disc list-inside text-slate-300">
                        <li><strong class="text-white font-medium">Protokol Enkripsi SSL (HTTPS)</strong>: Seluruh komunikasi pada situs web Kami dilindungi sertifikat keamanan SSL untuk mencegah intersepsi pihak luar.</li>
                        <li><strong class="text-white font-medium">Akses Terbatas</strong>: Hanya personel manajemen resmi Hajj Club yang memiliki otorisasi untuk mengakses informasi konsultasi kemitraan.</li>
                        <li><strong class="text-white font-medium">Bebas Spam &amp; Jual Beli Data</strong>: Kami tidak pernah dan tidak akan pernah menjual atau membagikan data Anda kepada pihak pengiklan pihak ketiga untuk tujuan spam komersial.</li>
                    </ul>
                </div>
            </section>

            <!-- Pasal 5: Penggunaan Cookies & Platform Pihak Ketiga -->
            <section class="space-y-4">
                <div class="flex items-center gap-3 border-b border-gold-500/20 pb-3">
                    <span class="w-8 h-8 rounded-lg bg-gold-500/15 border border-gold-500/40 text-gold-400 font-bold flex items-center justify-center text-xs shrink-0">05</span>
                    <h3 class="text-xl sm:text-2xl font-serif font-bold text-white">Penggunaan Cookies &amp; Platform Pihak Ketiga</h3>
                </div>
                <div class="text-slate-300 text-sm sm:text-base leading-relaxed font-light space-y-3 pl-11">
                    <p>
                        Situs ini dapat menggunakan *cookies* atau teknologi serupa untuk mengingat preferensi Anda dan menganalisis efektivitas promosi. Platform pihak ketiga yang terintegrasi meliputi:
                    </p>
                    <ul class="space-y-2 list-disc list-inside text-slate-300">
                        <li><strong class="text-white font-medium">WhatsApp (Meta Platforms)</strong>: Komunikasi percakapan langsung dilindungi enkripsi *end-to-end* sesuai kebijakan privasi WhatsApp.</li>
                        <li><strong class="text-white font-medium">Google Ads &amp; Google Analytics</strong>: Digunakan semata-mata untuk mengukur konversi iklan digital secara agregat dan anonim tanpa melacak identitas personal sensitif Anda.</li>
                    </ul>
                    <p class="text-xs text-slate-400 italic">
                        Anda memiliki hak untuk menonaktifkan *cookies* melalui pengaturan peramban (browser) Anda kapan saja.
                    </p>
                </div>
            </section>

            <!-- Pasal 6: Hak-Hak Anda sebagai Pemilik Data -->
            <section class="space-y-4">
                <div class="flex items-center gap-3 border-b border-gold-500/20 pb-3">
                    <span class="w-8 h-8 rounded-lg bg-gold-500/15 border border-gold-500/40 text-gold-400 font-bold flex items-center justify-center text-xs shrink-0">06</span>
                    <h3 class="text-xl sm:text-2xl font-serif font-bold text-white">Hak Anda Sesuai UU PDP No. 27 Tahun 2022</h3>
                </div>
                <div class="text-slate-300 text-sm sm:text-base leading-relaxed font-light space-y-3 pl-11">
                    <p>Berdasarkan regulasi pelindungan data pribadi di Indonesia, Anda memiliki hak-hak hukum berikut:</p>
                    <ul class="space-y-2 list-disc list-inside text-slate-300">
                        <li><strong class="text-white font-medium">Hak Informasi</strong>: Mengetahui kejelasan identitas, dasar hukum, dan tujuan perolehan data Anda.</li>
                        <li><strong class="text-white font-medium">Hak Perbaikan (Koreksi)</strong>: Mengajukan pembaruan atau perbaikan terhadap data pribadi Anda yang tidak akurat.</li>
                        <li><strong class="text-white font-medium">Hak Penghapusan (Deletion)</strong>: Meminta penghapusan data kontak Anda dari catatan administrasi Kami jika proses konsultasi telah selesai dan Anda tidak ingin dihubungi kembali.</li>
                        <li><strong class="text-white font-medium">Hak Penarikan Persetujuan</strong>: Menarik kembali persetujuan komunikasi promosi yang sebelumnya Anda berikan.</li>
                    </ul>
                </div>
            </section>

            <!-- Pasal 7: Kontak Resmi Manajemen Hajj Club -->
            <section class="space-y-4">
                <div class="flex items-center gap-3 border-b border-gold-500/20 pb-3">
                    <span class="w-8 h-8 rounded-lg bg-gold-500/15 border border-gold-500/40 text-gold-400 font-bold flex items-center justify-center text-xs shrink-0">07</span>
                    <h3 class="text-xl sm:text-2xl font-serif font-bold text-white">Kontak Petugas Pelindungan Data</h3>
                </div>
                <div class="text-slate-300 text-sm sm:text-base leading-relaxed font-light space-y-4 pl-11">
                    <p>
                        Jika Anda memiliki pertanyaan, keberatan, atau ingin mengajukan permohonan penghapusan data pribadi Anda, silakan hubungi tim manajemen resmi Hajj Club melalui kontak berikut:
                    </p>
                    <div class="p-6 rounded-2xl bg-navy-950/80 border border-gold-500/30 space-y-3">
                        <div class="flex items-center gap-3">
                            <i class="fa-solid fa-building text-gold-400 w-5"></i>
                            <span class="font-semibold text-white">Manajemen Hajj Club</span>
                        </div>
                        <div class="flex items-start gap-3 text-xs sm:text-sm">
                            <i class="fa-solid fa-location-dot text-gold-400 w-5 mt-0.5"></i>
                            <span>Jl. Rose Garden 1 No.86, Jaka Setia, Kec. Bekasi Selatan, Kota Bekasi, Jawa Barat 17147</span>
                        </div>
                        <div class="flex items-center gap-3 text-xs sm:text-sm">
                            <i class="fa-solid fa-envelope text-gold-400 w-5"></i>
                            <a href="mailto:labbaykharamayn@gmail.com" class="text-gold-300 hover:underline">labbaykharamayn@gmail.com</a>
                        </div>
                        <div class="flex items-center gap-3 text-xs sm:text-sm">
                            <i class="fa-brands fa-whatsapp text-emerald-400 w-5 text-base"></i>
                            <a href="{{ $waUrl }}" target="_blank" rel="noopener noreferrer" class="text-emerald-400 hover:underline font-semibold">
                                {{ $waDisplay }} (Hotline Konsultasi Kemitraan)
                            </a>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Bottom CTA Card -->
            <div class="mt-16 pt-10 border-t border-slate-800 flex flex-col sm:flex-row items-center justify-between gap-6 bg-navy-950/60 p-6 sm:p-8 rounded-2xl border border-gold-500/20">
                <div>
                    <h4 class="text-base sm:text-lg font-serif font-bold text-white mb-1">Kembali ke Halaman Utama Hajj Club</h4>
                    <p class="text-xs text-slate-400">Jelajahi model kepemilikan bisnis travel haji &amp; umrah bersama yang transparan dan profesional.</p>
                </div>
                <div class="flex items-center gap-3 shrink-0">
                    <a href="{{ url('/') }}"
                       class="px-5 py-2.5 rounded-xl bg-navy-800 hover:bg-navy-700 text-white text-xs font-semibold border border-slate-700 transition flex items-center gap-2">
                        <i class="fa-solid fa-arrow-left text-[10px]"></i>
                        <span>Ke Beranda</span>
                    </a>
                    <a href="{{ $waUrl }}"
                       target="_blank"
                       rel="noopener noreferrer"
                       class="px-5 py-2.5 rounded-xl bg-gradient-gold text-navy-900 text-xs font-bold hover:shadow-lg transition flex items-center gap-2">
                        <i class="fa-brands fa-whatsapp text-sm"></i>
                        <span>Tanya Admin</span>
                    </a>
                </div>
            </div>

        </div>
    </article>
</x-app-layout>
