<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CMSSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('c_m_s')->insert([
            'title' => 'Our Humble Beginnings',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt ut voluptatum eius sapiente, totam reiciendis temporibus qui quibusdam, recusandae sit vero unde, sed, incidunt et ea quo dolore laudantium consectetur!',
            'image' => 'light.jpg'
        ]);
        DB::table('c_m_s')->insert([
            'title' => 'Our Humble Beginnings',
            'description' => 'The people I respect most behave as if they were immortal and as if society was eternal. Both assumptions are false: both of them must be accepted as true if we are to go on eating and working and loving, and are to keep open a few breathing holes for the human spirit.',
            'image' => 'AboutUs2.jpg'
        ]);
        DB::table('c_m_s')->insert([
            'title' => 'RealityS',
            'description' => 'No small part of the cruelty, oppression, miscalculation, and general mismanagement of human relations is due to the fact that in our dealings with others we do not see them as persons at all, but only as specimens or representatives of some type or other.... We react to the sample instead of to the rea’ person.',
            'image' => 'AboutUs1.jpg',
        ]);
    }
}
