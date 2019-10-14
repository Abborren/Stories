<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Str;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RouteTest extends TestCase
{
    /** @test **/
    public function testForm()
    {
        $response = $this->get('/');
        $response->assertStatus(200);
    }

    /** @test **/
    public function testStore()
    {
        $this->createStory(Str::random(10), $this)
            ->assertStatus(201)
            ->assertJson([
                'created' => true,
                'url' => true
            ]);
    }
    
    // /** @test **/
    public function testGetStory()
    {
        $response = $this->createStory(Str::random(10), $this);
        $url = $response->url;
        $response = $this->get($url);
        $response->assertStatus(200);
    }

    private function createStory($story, $context)
    {
        return $context->withHeaders([
            'X-Header' => 'Value',
        ])->json('POST', '/story', ['body' => $story]);
    }
}
