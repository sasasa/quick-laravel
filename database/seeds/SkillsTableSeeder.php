<?php

use Illuminate\Database\Seeder;

class SkillsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
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
