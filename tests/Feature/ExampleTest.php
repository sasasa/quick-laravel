<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Artisan;
use Tests\TestCase;
use App\Skill;
use App\User;

class ExampleTest extends TestCase
{
    use RefreshDatabase;
    
    public function setUp(): void
    {
        parent::setUp();
        $this->seed('SkillsTableSeeder');
    }
    public function tearDown(): void
    {
        Artisan::call('migrate:refresh');
        parent::tearDown();
    }

    public function testLogin() 
    {
        $user = factory(User::class)->create();
        
        $response = $this
            ->actingAs($user) // 追加
            ->get(route('home'));

        $response->assertStatus(200)
            ->assertViewIs('home')
            ->assertSee('スキル設定')
            ->assertSee('スキル習熟度設定');
    }

    public function testBasicTest()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function testSkillsTable()
    {
        $skill = Skill::find(1);
        $this->assertDatabaseHas('skills', [
            "id" => $skill->id,
            "name" => $skill->name,
            "type" => $skill->type_raw,
            "created_at" => $skill->created_at,
            "updated_at" => $skill->updated_at,
        ]);
    }
}
