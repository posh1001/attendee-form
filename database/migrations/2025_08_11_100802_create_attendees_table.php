<?php

// database/migrations/2025_08_11_000000_create_attendees_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('attendees', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->string('first_name');
            $table->string('surname');
            $table->string('phone_number')->nullable();
            $table->string('kingschat_handle')->nullable();
            $table->string('group_church')->nullable();
            $table->string('attendance_status')->nullable();
            $table->string('volunteer_functions')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('attendees');
    }
};

