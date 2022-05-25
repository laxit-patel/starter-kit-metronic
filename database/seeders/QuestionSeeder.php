<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
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
