<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

class LoginTest extends DuskTestCase
{
    use RefreshDatabase;
    
    public function setUp(): void
    {
        parent::setUp();
    }
    public function tearDown(): void
    {
        Artisan::call('migrate:refresh');
        parent::tearDown();
    }

    public function testExample()
    {
        $user = factory(User::class)->create([
            'email' => 'test@test.com',
        ]);
        
        $this->browse(function (Browser $browser) use ($user) {
            $browser->visit('/login')
                    ->assertSee('ログイン')
                    ->type('email', $user->email)
                    ->type('password', 'password')
                    ->press('ログイン')
                    ->assertPathIs('/home')
                    ->assertSee('ダッシュボード');
            
            $browser->clickLink("スキル設定")
                    ->assertSee('skills設定')
                    ->check('#skill_1')
                    ->press('送信');
        });
    }
}
