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
        Schema::create('master_dokumen', function (Blueprint $table) {
            $table->id();
            $table->string('doc_number');
            $table->text('doc_title');
            $table->text('doc_desc');
            $table->date('doc_date');
            $table->string('doc_rev');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('master_dokumen');
    }
};
