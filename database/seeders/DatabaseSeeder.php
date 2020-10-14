<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // User::factory(10)->create();
        DB::table('users')->insert([
            [
                'name' => 'thanh tung',
                'email' => 'thanhtungmarine@gmail.com',
                'is_admin' => 1,
                'password' => \bcrypt('123456')
            ]
        ]);
    }
}
