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
        Schema::create('detail_master_dokumen', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('doc_id');
            $table->string('placeholder');
            $table->enum('type', ['DATE', 'STRING', 'INTEGER', 'DROPDOWN_NAMA', 'DROPDOWN_SATKER']);
            $table->text('desc')->nullable();
            $table->timestamps();
            $table->softDeletes();
            
            $table->foreign('doc_id')
                  ->references('id')
                  ->on('master_dokumen')
                  ->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('detail_master_dokumen');
    }
};
