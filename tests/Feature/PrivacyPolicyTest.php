<?php

namespace Tests\Feature;

use Tests\TestCase;

class PrivacyPolicyTest extends TestCase
{
    public function test_privacy_policy_page_renders_successfully(): void
    {
        $response = $this->get('/privacy-policy');

        $response->assertStatus(200);
        $response->assertSee('Kebijakan Privasi');
        $response->assertSee('Privacy Policy');
        $response->assertSee('Hajj Club');
        $response->assertSee('UU No. 27/2022 (UU PDP)');
        $response->assertSee('labbaykharamayn@gmail.com');
        $response->assertSee('081299994899');
        $response->assertSee('Jl. Rose Garden 1 No.86');
    }

    public function test_landing_page_footer_links_to_privacy_policy(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertSee(route('privacy.policy'));
        $response->assertSee('Kebijakan Privasi (Privacy Policy)');
    }
}
