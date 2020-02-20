<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail as MustVerifyEmailContract;
use Illuminate\Auth\MustVerifyEmail;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Collection;

class UserCollection extends Collection
{
    public function emails()
    {
        return $this->map(function($user){
            return $user->email;
        });
    }
    public function names()
    {
        return $this->map(function($user){
            return $user->name;
        });
    }
}

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

    public function newCollection(array $models = [])
    {
        return new UserCollection($models);
    }

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

            $add = collect($skills)->diff($this->skillIds());
            $delete = collect($this->skillIds())->diff($skills);

            dump($add);
            dump($delete);

            // ひとつでも送られた時
            $this->skills()->detach($delete);
            $this->skills()->attach($add);
            return true;
        } else {
            // 送られないとき
            $this->skills()->detach(); //ユーザの登録済みのスキルを全て削除
            \Log::warning('User#skillSet'. $skills);
            return false;
        }
    }
}
