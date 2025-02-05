<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserQuizRecordsTable extends Migration
{
    public function up()
    {
        Schema::create('user_quiz_records', function (Blueprint $table) {
            $table->id()->autoIncrement(); 
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); 
            $table->foreignId('quiz_id')->constrained('quiz')->onDelete('cascade');
            $table->boolean('completed')->default(false);
            $table->timestamps(); 
        });
    }

    public function down()
    {
        Schema::dropIfExists('user_quiz_records');
    }
}
