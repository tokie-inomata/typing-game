<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'name' => '管理用アカウント',
            'email' => 'kanri@kanrisya.com',
            'password' => bcrypt('kanri1234'),
            'admin_flag' => '1',
        ];

        DB::table('users')->insert($param);
    }
}
