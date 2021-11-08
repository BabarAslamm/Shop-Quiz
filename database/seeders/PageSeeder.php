<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pages')->insert([
            'name' => 'Home',
            'slug' => 'home'
        ]);

        DB::table('pages')->insert([
            'name' => 'About',
            'slug' => 'about'
        ]);

        DB::table('pages')->insert([
            'name' => 'Hall of fame',
            'slug' => 'half-of-fame'
        ]);

        DB::table('pages')->insert([
            'name' => 'Shop',
            'slug' => 'shop'
        ]);
}

}
