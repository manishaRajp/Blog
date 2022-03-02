<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('settings')->insert([
            'logo' => 'blog_logo14.jpg',
            'website' => 'Copyright Your Website 2021',
            'link_1' => 'https://ads.twitter.com/login',
            'link_2' => 'https://www.facebook.com/',
            'link_3' => 'https://www.linkedin.cn/signup',
        ]);
    }
}
