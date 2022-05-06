<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class MasterDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $course_id = Str::uuid()->toString();

        DB::table('courses')->insert(
            [
                'id' => $course_id,
                'name' => 'English Speaking',
                'description' => 'This course focuses on corporate employee. it teaches them professional conversation skills',
                'created_at' => now(),
                'updated_at' => now()
            ]
        );

        DB::table('batches')->insert(
            [
                'id' => Str::uuid()->toString(),
                'name' => 'A',
                'description' => 'Batch A',
                'course' => $course_id,
                'created_at' => now(),
                'updated_at' => now()
            ]
        );

        DB::table('batches')->insert( 
            [
                'id' => Str::uuid()->toString(),
                'name' => 'B',
                'description' => 'Batch B',
                'course' => $course_id,
                'created_at' => now(),
                'updated_at' => now()
            ]
        );

        DB::table('batches')->insert(
            [
                'id' => Str::uuid()->toString(),
                'name' => 'C',
                'description' => 'Batch C',
                'course' => $course_id,
                'created_at' => now(),
                'updated_at' => now()
            ]
        );
    }
}
