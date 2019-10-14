<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Str;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RouteTest extends TestCase
{
    public function testForm()
    {
        $response = $this->get('/');
        $response->assertStatus(200);
    }
    
    public function testStore()
    {
        $this->createStory(Str::random(10))
            ->assertStatus(201)
            ->assertJson([
                'created' => true,
                'url' => true
            ]);
    }
    
    public function testGetStory()
    {
        $response = $this->createStory(Str::random(10));
        $url = $response->url;
        $response = $this->get($url);
        $response->assertStatus(200);
    }

    private function createStory($story)
    {
        return $this->withHeaders([
            'X-Header' => 'Value',
        ])->json('POST', '/story', ['body' => $story]);


       
    }
}
