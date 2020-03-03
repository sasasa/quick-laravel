<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Artisan;

class LoginTest extends DuskTestCase
{
    // これをONにすると何故か動かなくなるのでONにせずにテスト出来る様にする
    // use RefreshDatabase;
    
    public function setUp(): void
    {
        parent::setUp();
        Artisan::call('db:seed');
        $user = User::where('email', 'test@test.com')->first();
        if (is_null($user))
        {
            factory(User::class)->create([
                'email' => 'test@test.com',
            ]);
        }
    }
    public function tearDown(): void
    {
        Artisan::call('migrate:refresh');
        parent::tearDown();
    }

    public function testExample()
    {
        $user = User::where('email', 'test@test.com')->first();

        $this->browse(function (Browser $browser, Browser $browser2) use ($user) {
            // 正しいログインしてダッシュボードに遷移する事
            $browser->visit('/login')
                    ->assertSee('ログイン')
                    ->type('email', $user->email)
                    ->type('password', 'password')
                    ->press('ログイン')
                    ->assertPathIs('/home')
                    ->assertSee('ダッシュボード');

            // スキル設定画面に遷移して１番目と3番目のスキルを選択して設定できていること
            $browser->clickLink("スキル設定")
                    ->assertSee('skills設定')
                    ->check('#skill_1')
                    ->check('#skill_3')
                    ->press('送信')
                    ->assertPathIs('/skilluser')
                    ->assertChecked('#skill_1')
                    ->assertChecked('#skill_3');
            // スキル習熟度設定に遷移してスキル習熟度を設定できること
            $browser->visit('/home')
                    ->assertSee('スキル習熟度設定')
                    ->clickLink("スキル習熟度設定")
                    ->value('#skill_1', 8)
                    ->value('#skill_3', 10)
                    ->press('送信')
                    ->assertPathIs('/proficiency')
                    ->assertInputValue('#skill_1', 8);
            // 記事投稿画面に遷移して記事とそのコメントを画像付きで投稿できること
            // 投稿したコメントと記事を削除できること
            $browser->visit('/home')
                    ->assertSee('ポリモーフィック関連と画像添付')
                    ->clickLink("ポリモーフィック関連と画像添付")
                    ->assertPathIs('/posts')
                    ->type('subject', "ここにタイトルが入ります。")
                    ->type('body', "ここにサンプルが入ります。\nここにサンプルが入ります。\nここにサンプルが入ります。\nここにサンプルが入ります。\nここにサンプルが入ります。\nここにサンプルが入ります。\n")
                    ->attach('files[]', storage_path('app/files/logo.jpg'))
                    ->press('投稿')
                    ->assertPathIs('/posts')
                    ->assertSee("ここにタイトルが入ります。")
                    ->assertSee("ここにサンプルが入ります。\nここにサンプルが入ります。\nここにサンプルが入ります。\nここにサンプルが入ります。\nここにサンプルが入ります。\nここにサンプルが入ります。\n")
                    ->type('comment_body', "ここにコメントが入ります。")
                    ->attach('comment_files[]', storage_path('app/files/neko.jpg'))->press('コメント投稿')
                    ->assertSee("ここにコメントが入ります。")
                    ->press('コメント削除')
                    ->acceptDialog()
                    ->assertDontSee("ここにコメントが入ります。")
                    ->press('記事の削除')
                    ->acceptDialog()
                    ->assertDontSee("ここにタイトルが入ります。");
        });
    }
}
