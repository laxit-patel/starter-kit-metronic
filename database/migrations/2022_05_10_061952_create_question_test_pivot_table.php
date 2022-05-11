<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionTestPivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('question_test', function (Blueprint $table) {
            $table->uuid('question_id')->index();
            $table->foreign('question_id')->references('id')->on('questions')->onDelete('cascade');
            $table->uuid('test_id')->index();
            $table->foreign('test_id')->references('id')->on('tests')->onDelete('cascade');
            $table->primary(['question_id', 'test_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('question_test');
    }
}
