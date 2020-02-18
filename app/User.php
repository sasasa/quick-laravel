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
        return $this
        ->belongsToMany('App\Skill', 'skill_user')
        ->using(SkillUser::class)->withPivot(['proficiency']);
    }

    public function skillIds()
    {
        // return $this->skills()->get()->map(function($skill){
        //     return $skill->id;
        // })->toArray();
        return $this->skills()->get()->modelKeys();
    }

    public function skillSet($skills)
    {
        if (is_array($skills)) {

            $add = collect($skills)->diff($this->skills()->get()->modelKeys());
            $delete = collect($this->skills()->get()->modelKeys())->diff($skills);

            dump($add);
            dump($delete);

            // ひとつでも送られた時
            $this->skills()->detach($delete); //ユーザの登録済みのスキルを全て削除
            $this->skills()->attach($add); //改めて登録
            return true;
        } else {
            // 送られないとき
            $this->skills()->detach(); //ユーザの登録済みのスキルを全て削除
            \Log::warning('User#skillSet'. $skills);
            return false;
        }
    }
}
