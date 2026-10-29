<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- SEO Meta Tags -->
    <title>{{ $title ?? 'Hajj Club - Pelopor Kepemilikan Travel Haji Bersama' }}</title>
    <meta name="description" content="{{ $description ?? 'Hajj Club adalah pelopor model kepemilikan bersama travel haji dan umroh pertama di Indonesia. Transparan, profesional, dan berkelanjutan.' }}">
    <meta name="keywords" content="Hajj Club, kepemilikan travel haji bersama, bisnis travel umroh, ownership travel haji, Purnama Qori Andesta, travel haji transparan">
    <meta name="author" content="Hajj Club">
    <meta name="robots" content="index, follow">
    <link rel="canonical" href="{{ url()->current() }}">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="{{ $title ?? 'Hajj Club - Pelopor Kepemilikan Travel Haji Bersama' }}">
    <meta property="og:description" content="{{ $description ?? 'Solusi kepemilikan usaha travel secara terbuka, transparan, dan profesional bersama Hajj Club.' }}">
    <meta property="og:image" content="{{ asset('images/hero-bg.webp') }}">
    <meta property="og:locale" content="id_ID">

    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:url" content="{{ url()->current() }}">
    <meta name="twitter:title" content="{{ $title ?? 'Hajj Club - Pelopor Kepemilikan Travel Haji Bersama' }}">
    <meta name="twitter:description" content="{{ $description ?? 'Solusi kepemilikan usaha travel secara terbuka, transparan, dan profesional bersama Hajj Club.' }}">
    <meta name="twitter:image" content="{{ asset('images/hero-bg.webp') }}">

    <!-- Favicon & App Icons -->
    <link rel="icon" type="image/svg+xml" href="{{ asset('favicon.svg') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon-16x16.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('apple-touch-icon.png') }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">

    <!-- Google Fonts Preconnect -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=Playfair+Display:ital,wght@0,600;0,700;0,800;0,900;1,700&display=swap" rel="stylesheet">

    <!-- FontAwesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Google Tag Manager (GTM) -->
    @if(config('services.gtm.id'))
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','{{ config('services.gtm.id') }}');</script>
    @endif
    <!-- End Google Tag Manager -->

    <!-- Google tag (gtag.js) for Google Ads -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=AW-18537933251"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'AW-18537933251');
        window.GOOGLE_ADS_CONVERSION_ID = '{{ config('services.google_ads.conversion_id', 'AW-18537933251') }}';
        @if(config('services.ga4.id'))
        gtag('config', '{{ config('services.ga4.id') }}');
        @endif
    </script>
    <!-- End Google tag (gtag.js) -->

    @stack('head')

    <!-- Compiled Assets via Vite -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-navy-900 text-slate-100 font-sans antialiased selection:bg-gold-500 selection:text-navy-900 flex flex-col min-h-screen">
    <!-- Google Tag Manager (noscript) -->
    @if(config('services.gtm.id'))
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id={{ config('services.gtm.id') }}"
    height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    @endif
    <!-- End Google Tag Manager (noscript) -->

    <!-- Navbar Component -->
    <x-navbar />

    <!-- Main Content -->
    <main class="flex-grow">
        {{ $slot ?? '' }}
        @yield('content')
    </main>

    <!-- Footer Component -->
    <x-footer />

    <!-- Floating WhatsApp CTA Button (Conversion-Optimized) -->
    @php
        $waRaw = config('services.whatsapp.number', '6281299994899');
        $waNumber = preg_replace('/^0/', '62', preg_replace('/[^0-9]/', '', $waRaw));
        $waMessage = urlencode(config('services.whatsapp.message', "Halo Admin Hajj Club, saya tertarik dengan program kepemilikan travel haji & umrah bersama.\n\nMohon informasi lebih lanjut. Berikut data singkat saya:\n• Nama: \n• Kota/Domisili: \n• Profesi/Usaha saat ini: \n\nTerima kasih."));
        $waUrl = "https://wa.me/{$waNumber}?text={$waMessage}";
    @endphp
    <div class="fixed bottom-6 right-6 z-40 group">
        <a href="{{ $waUrl }}"
           target="_blank"
           rel="noopener noreferrer"
           onclick="trackConversion('Floating_WhatsApp', '{{ $waUrl }}')"
           class="flex items-center gap-3 bg-emerald-600 hover:bg-emerald-500 text-white font-semibold px-4 py-3 rounded-full shadow-2xl hover:shadow-emerald-500/40 transition-all duration-300 transform hover:scale-105"
           aria-label="Konsultasi WhatsApp Hajj Club">
            <span class="relative flex h-3 w-3">
                <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-white opacity-75"></span>
                <span class="relative inline-flex rounded-full h-3 w-3 bg-white"></span>
            </span>
            <i class="fa-brands fa-whatsapp text-2xl"></i>
            <span class="hidden sm:inline-block text-sm pr-1">Konsultasi Ownership</span>
        </a>
    </div>

    @stack('scripts')
</body>
</html>
