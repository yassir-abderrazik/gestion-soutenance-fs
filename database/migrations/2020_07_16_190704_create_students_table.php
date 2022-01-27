<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->foreignId('supervisor_id')->constrained();
            $table->string('firstname');
            $table->string('lastname');
            $table->string('CIN', 8)->unique();
            $table->string('CNE', 10)->unique();
            $table->date('birthday');
            $table->string('city');
            $table->string('email')->unique();
            $table->string('phone', 10)->unique();
            $table->text('address');
            $table->string('faculty');
            $table->string('specialty');
            $table->string('project');
            $table->string('summary');
            $table->boolean('status')->nullable();
            $table->string('message')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('students');
    }
}
