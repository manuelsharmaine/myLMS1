<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('contents')->insert([
            [
                'name' => 'Laravel Introduction',
                'description' => 'Laravel Introduction Description',
                'course_id' => 1
            ],
            [
                'name' => 'Laravel Routing',
                'description' => 'Laravel Introduction Description',
                'course_id' => 1
            ],
            [
                'name' => 'Laravel Migration',
                'description' => 'Laravel Introduction Description',
                'course_id' => 1
            ],
            [
                'name' => 'OOP',
                'description' => 'OOP Description',
                'course_id' => 2
            ],
            [
                'name' => 'Java Packages',
                'description' => 'OOP Description',
                'course_id' => 2
            ],
        ]);
    }
}
