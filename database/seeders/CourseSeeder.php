<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('courses')->insert([
            [
                'name' => 'Laravel Web Development',
                'description' => 'Web Development Description',
                'is_draft' => 0
            ],
            [
                'name' => 'Java',
                'description' => 'Java Development Description',
                'is_draft' => 1
            ],
            [
                'name' => 'Networking',
                'description' => 'Cisco Content',
                'is_draft' => 0
            ],
            [
                'name' => 'Graphics',
                'description' => 'Graphics Content',
                'is_draft' => 0
            ]
        ]);
    }
}
