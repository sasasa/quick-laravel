<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail as MustVerifyEmailContract;
use Illuminate\Auth\MustVerifyEmail;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements MustVerifyEmailContract
{
    use MustVerifyEmail, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function skills()
    {
        return $this->belongsToMany('App\Skill');
    }

    public function skillIds()
    {
        return array_map(function($skill){
            return $skill['id'];
        }, $this->skills()->get()->toArray());
    }

    public function skillSet($skills)
    {
        if (is_array($skills)) {
            // ひとつでも送られた時
            $this->skills()->detach(); //ユーザの登録済みのスキルを全て削除
            $this->skills()->attach($skills); //改めて登録
            return true;
        } else {
            // 送られないとき
            $this->skills()->detach(); //ユーザの登録済みのスキルを全て削除
            \Log::warning('User#skillSet'. $skills);
            return false;
        }
    }
}
