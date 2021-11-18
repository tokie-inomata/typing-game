<?php

use Illuminate\Database\Seeder;

class QuestionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'id' => '1',
            'jp_question' => 'テストようもんだい',
            'ro_question' => 'tesutoyou monndai',
            'insect_name' => 'カブトムシ',
            'on_image' => 'Beetle.png',
            'off_image' => 'shadow_Beetle.png',
            'type' => '1',
        ];
        DB::table('questions')->insert($param);

        $param = [
            'id' => '2',
            'jp_question' => 'テストようもんだい2',
            'ro_question' => 'tesutoyou monndai2',
            'insect_name' => 'てんとう虫',
            'on_image' => 'Ladybug.png',
            'off_image' => 'shadow_Ladybug.png',
            'type' => '2',
        ];
        DB::table('questions')->insert($param);

        $param = [
            'id' => '3',
            'jp_question' => 'テストようもんだい3',
            'ro_question' => 'tesutoyou monndai3',
            'insect_name' => 'ちょうちょ',
            'on_image' => 'butterfly.png',
            'off_image' => 'shadow_butterfly.png',
            'type' => '3',
        ];
        DB::table('questions')->insert($param);

    }
}
