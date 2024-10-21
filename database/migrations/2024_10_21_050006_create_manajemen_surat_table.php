<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('manajemen_surat', function (Blueprint $table) {
            $table->id();
            $table->foreignId('doc_id')->constrained('master_dokumen')->onDelete('cascade');
            $table->json('data');
            $table->string('doc_number');
            $table->text('title');
            $table->text('desc');
            $table->date('doc_date');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('manajemen_surat');
    }
};
