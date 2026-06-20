<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
{
    Schema::create('members', function (Blueprint $table) {
        $table->id();
        $table->string('nama_lengkap');
        $table->string('nomor_telepon')->unique(); // Unique agar tidak ada nomor ganda
        $table->enum('tier_level', ['Junior', 'Mid-Level', 'Senior Coder'])->default('Junior');
        $table->integer('total_poin')->default(0); // Dimulai dari 0
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
        Schema::dropIfExists('members');
    }
}
