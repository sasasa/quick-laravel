<?php

use Illuminate\Database\Seeder;
use App\Skill;
use Faker\Factory as Faker;

class SkillsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //一括削除
        Skill::truncate();
        
        $param = [
            'name' => 'PHP',
            'type' => 1,
        ];
        DB::table('skills')->insert($param);
        $param = [
            'name' => 'JavaScript',
            'type' => 1,
        ];
        DB::table('skills')->insert($param);
        $param = [
            'name' => 'Webデザイン',
            'type' => 2,
        ];
        DB::table('skills')->insert($param);
        $param = [
            'name' => 'イラスト',
            'type' => 2,
        ];
        DB::table('skills')->insert($param);
        $param = [
            'name' => 'HTML',
            'type' => 1,
        ];
        DB::table('skills')->insert($param);
        $param = [
            'name' => 'CSS',
            'type' => 1,
        ];
        DB::table('skills')->insert($param);
    }
}
