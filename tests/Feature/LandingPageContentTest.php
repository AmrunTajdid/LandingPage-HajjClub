<?php

namespace Tests\Feature;

use Tests\TestCase;

class LandingPageContentTest extends TestCase
{
    public function test_landing_page_renders_successfully(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertSee('HAJJ CLUB');
        $response->assertDontSee('PT. Khaira Berkah Mandiri');
        $response->assertDontSee('Khaira');
    }

    public function test_landing_page_contains_founders_profile(): void
    {
        $response = $this->get('/');

        $response->assertSee('Purnama Qori Andesta');
        $response->assertSee('Founder Hajj Club');
        $response->assertSee('images/founder.jpg');
        $response->assertDontSee('Co-Founder Hajj Club & Founder Officia.id');
        $response->assertDontSee('Officia.id');
        $response->assertDontSee('Hj. Semah Wafiah');
    }

    public function test_landing_page_uses_ownership_terminology(): void
    {
        $response = $this->get('/');

        $response->assertDontSee('pemilik saham');
        $response->assertDontSee('porsi saham');
        $response->assertDontSee('Kepemilikan Saham Riil');
        $response->assertDontSee('investasi');
        $response->assertSee('Kepemilikan Ownership Riil');
        $response->assertSee('pemilik Ownership');
    }

    public function test_landing_page_contains_vision_and_mission(): void
    {
        $response = $this->get('/');

        $response->assertSee('Visi &amp; Misi', false);
        $response->assertSee('ekosistem kepemilikan bisnis travel haji dan umrah kolaboratif');
        $response->assertSee('inklusif, transparan, dan berkelanjutan');
        $response->assertSee('Sinergi Kepemilikan Bersama');
        $response->assertSee('Good Corporate Governance');
        $response->assertSee('standar pelayanan ibadah berkualitas tinggi');
    }

    public function test_landing_page_does_not_contain_problem_and_solution_sections(): void
    {
        $response = $this->get('/');

        $response->assertDontSee('Problem Analyst');
        $response->assertDontSee('Our Solution');
        $response->assertDontSee('Dikelola secara PRIVATE');
        $response->assertDontSee('Pemilik Berawal dari AGEN SUKSES');
        $response->assertDontSee('Fungsi Owner: Pemilik Travel & Pengawas');
    }

    public function test_landing_page_contains_5_uvp_points(): void
    {
        $response = $this->get('/');

        $response->assertSee('UNIQUE VALUE');
        $response->assertSee('OWNERSHIP');
        $response->assertSee('PROFESSIONAL');
        $response->assertSee('TRANSPARAN');
        $response->assertSee('PELOPOR');
        $response->assertSee('BERKELANJUTAN');
    }

    public function test_landing_page_contains_hero_taglines(): void
    {
        $response = $this->get('/');

        $response->assertSee('Satu-satunya dan travel pertama yang menawarkan solusi kepemilikan bersama');
        $response->assertSee('terbuka, transparan, profesional dan minim resiko');
        $response->assertDontSee('Keluarga dapat mewariskan tempat umrah yang aman dan owner ikut menikmati keuntungan');
    }

    public function test_landing_page_contains_market_potential_titles(): void
    {
        $response = $this->get('/');

        $response->assertSee('Potensi Industri');
        $response->assertSee('Riset Pasar');
        $response->assertSee('Pertumbuhan Berkelanjutan');
        $response->assertSee('Peminat umrah dan haji terus melonjak setiap tahun');
        $response->assertSee('Saudi Vision 2030');
        $response->assertSee('Target Kerajaan Arab Saudi mencapai 30 juta jemaah');
        $response->assertSee('Kampung Haji Indonesia');
        $response->assertSee('Inisiatif diplomasi dan pembangunan fasilitas terpadu jemaah Indonesia');
        $response->assertSee('Bisnis travel haji &amp; umroh salah satu bisnis jangka panjang', false);
        $response->assertSee('sampai akhir jaman.', false);
    }

    public function test_landing_page_does_not_contain_benefit_ownership_section(): void
    {
        $response = $this->get('/');

        $response->assertDontSee('LEGAL BENEFIT');
        $response->assertDontSee('PRIORITY BENEFIT');
        $response->assertDontSee('BENEFIT OWNERSHIP');
        $response->assertDontSee('Hak Mengikuti RUPS');
        $response->assertDontSee('Hak Mentoring Langsung Owner');
    }

    public function test_landing_page_contains_4_year_roadmap_framing_and_cta(): void
    {
        $response = $this->get('/');

        $response->assertDontSee('ownershipChart');
        $response->assertDontSee('Struktur Kepemilikan Saham');

        $response->assertSee('Proses jika membangun sendiri butuh waktu');
        $response->assertSee('lebih dari 4 tahun');
        $response->assertSee('Izin BPW');
        $response->assertSee('Izin PPIU');
        $response->assertSee('Izin PIHK');
        $response->assertSee('Akreditasi A');
        $response->assertSee('Mengapa Menunggu 4 Tahun Jika Anda Bisa');
        $response->assertSee('Gabung Tanpa Menunggu 4 Tahun');
    }

    public function test_landing_page_does_not_contain_konsorsium(): void
    {
        $response = $this->get('/');

        $response->assertDontSee('Konsorsium Haji');
        $response->assertDontSee('Konsorsium');
    }

    public function test_landing_page_has_updated_cta_heading_and_consultation_text(): void
    {
        $response = $this->get('/');

        $response->assertSee('Gabung Bersama Hajj Club Sekarang!');
        $response->assertDontSee('Dan Kembangkan Pasar Anda Sekarang!');
        $response->assertSee('Konsultasi langsung');
        $response->assertDontSee('Konsultasi langsung bersama Founder Hajj Club');
    }

    public function test_landing_page_has_seo_and_google_ads_conversion_tracking(): void
    {
        $response = $this->get('/');

        $response->assertSee('Hajj Club - Pelopor Kepemilikan Travel Haji Bersama');
        $response->assertSee('trackConversion');
        $response->assertSee('https://wa.me/6281299994899');
        $response->assertSee('081299994899');
        $response->assertDontSee('0811903909');
        $response->assertDontSee('62811903909');
        $response->assertDontSee('6281234567890');
    }

    public function test_landing_page_contains_instagram_and_facebook_links(): void
    {
        $response = $this->get('/');

        $response->assertSee('instagram.com/hajjclub.id');
        $response->assertSee('facebook.com/hajjclub.id');
    }

    public function test_landing_page_renders_official_logo_image(): void
    {
        $response = $this->get('/');

        $response->assertSee('images/logo.png');
        $response->assertSee('Hajj Club Logo');
    }

    public function test_landing_page_whatsapp_links_contain_biodata_intake_message(): void
    {
        $response = $this->get('/');

        $response->assertSee('Nama%3A');
        $response->assertSee('Kota%2FDomisili%3A');
        $response->assertSee('Profesi%2FUsaha');
    }

    public function test_landing_page_contains_galery_section_and_photos(): void
    {
        $response = $this->get('/');

        $response->assertSee('Galery');
        $response->assertSee('Galery Bisnis Owner');
        $response->assertSee('bisnis owner travel haji &amp; umroh', false);
        $response->assertDontSee('calon partner');
        $response->assertDontSee('Bukti Nyata Kemitraan');
        $response->assertSee('images/partners/partner-1.jpg');
        $response->assertSee('images/partners/partner-2.jpg');
        $response->assertSee('images/partners/partner-3.jpg');
        $response->assertSee('images/partners/partner-4.jpg');
        $response->assertSee('images/partners/partner-5.jpg');
        $response->assertSee('Langkah Pertama Keluarga Ownership');
        $response->assertSee('Kesepakatan &amp; Legalitas Ownership', false);
        $response->assertSee('Sinergi Kepemilikan &amp; Kepercayaan Ownership', false);
        $response->assertSee('Langkah Konkret Menuju Kepemilikan Travel');
        $response->assertSee('Konsultasi Tatap Muka');
        $response->assertSee('Legalitas Jelas &amp; Sah', false);
    }
}
