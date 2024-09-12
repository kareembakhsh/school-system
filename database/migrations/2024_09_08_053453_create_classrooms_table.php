<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClassroomsTable extends Migration
{
    public function up()
    {
        Schema::create('classrooms', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('subjects'); // Store multiple subjects as a comma-separated string
            $table->decimal('fees', 8, 2); // Adjust precision as needed
            $table->text('timetable'); // Store timetable as a JSON string
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('classrooms');
    }
}
