<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TestPageTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testLocaleIsChanged()
    {
        $response = $this->get('/test/es');

        $response->assertStatus(200);

        $response->assertSeeText('BOBSHOP | Ropa de ciclismo para bici de carretera, MTB y triatlón');
    }
}
