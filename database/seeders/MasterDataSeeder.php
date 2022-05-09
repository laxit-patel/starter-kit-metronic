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
        ); // Inserting Course & Batch

        $subject_id = Str::uuid()->toString();

        DB::table('subjects')->insert(
            [
                'id' => $subject_id,
                'name' => 'Grammar',
                'description' => 'Corporate Grammar for employees',
                'course' => $course_id,
                'created_at' => now(),
                'updated_at' => now()
            ]
        ); // Inserting Course & Batch

        DB::table('lessons')->insert(
            [
                'id' => Str::uuid()->toString(),
                'name' => 'Adjectives',
                'description' => 'Detailed lesson on basics of grammar',
                'subject' => $subject_id,
                'created_at' => now(),
                'updated_at' => now()
            ]
        ); // Inserting Course & Batch

        DB::table('lessons')->insert(
            [
                'id' => Str::uuid()->toString(),
                'name' => 'Phrases',
                'description' => 'Simple Phrases',
                'subject' => $subject_id,
                'created_at' => now(),
                'updated_at' => now()
            ]
        ); // Inserting Course & Batch

        DB::table('lessons')->insert(
            [
                'id' => Str::uuid()->toString(),
                'name' => 'Clause',
                'description' => 'Simple Clauses',
                'subject' => $subject_id,
                'created_at' => now(),
                'updated_at' => now()
            ]
        ); // Inserting Course & Batch

        $question_type_id = Str::uuid()->toString();

        DB::table('question_types')->insert(
            [
                'id' => $question_type_id,
                'type' => 'fill in the blanks',
                'instructions' => 'choose the right option that fits in the blank',
                'created_at' => now(),
                'updated_at' => now()
            ]
        ); // Inserting Course & Batch

        $question_id = Str::uuid()->toString();
        DB::table('questions')->insert(
            [
                'id' => $question_id,
                'question' => 'choose the right adjective',
                'marks' => '5',
                'type' => $question_type_id,
                'created_at' => now(),
                'updated_at' => now()
            ]
        ); // Inserting Questions

        DB::table('options')->insert(
            [
                'id' => Str::uuid()->toString(),
                'question' => $question_id,
                'option' => 'she went to market',
                'letter' => 'A',
                'explaination' => 'incorect because no noun present',
                'correct' => true,
                'created_at' => now(),
                'updated_at' => now()
            ]
        ); // Inserting Questions

        DB::table('options')->insert(
            [
                'id' => Str::uuid()->toString(),
                'question' => $question_id,
                'option' => 'Boys are playing',
                'letter' => 'B',
                'explaination' => 'incorect because no noun present',
                'correct' => false,
                'created_at' => now(),
                'updated_at' => now()
            ]
        ); // Inserting Questions

        DB::table('options')->insert(
            [
                'id' => Str::uuid()->toString(),
                'question' => $question_id,
                'option' => 'today is sunday',
                'letter' => 'C',
                'explaination' => 'incorect because no noun present',
                'correct' => false,
                'created_at' => now(),
                'updated_at' => now()
            ]
        ); // Inserting Questions

        DB::table('options')->insert(
            [
                'id' => Str::uuid()->toString(),
                'question' => $question_id,
                'option' => 'what happened riya',
                'letter' => 'D',
                'explaination' => 'incorect because no noun present',
                'correct' => false,
                'created_at' => now(),
                'updated_at' => now()
            ]
        ); // Inserting Questions
        

    }
}
