<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNilaiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nilai', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->float('na_matkul1');
            $table->float('na_matkul2');
            $table->float('na_matkul3');
            $table->float('na_matkul4');
            $table->float('na_matkul5');
            $table->float('na_matkul6');
            $table->float('na_matkul7');
            $table->float('na_matkul8');
            $table->float('na_matkul9');
            $table->float('na_matkul10');
            $table->float('na_matkul11');
            $table->float('na_matkul12');
            $table->float('na_matkul13');
            $table->float('na_matkul14');
            $table->float('na_matkul15');
            $table->float('na_matkul16');
            $table->float('na_matkul17');
            $table->float('na_matkul18');
            $table->float('na_matkul19');
            $table->float('na_matkul20');
            $table->float('na_matkul21');
            $table->float('na_matkul22');
            $table->float('na_matkul23');
            $table->float('na_matkul24');

            $table->unsignedBigInteger('mahasiswa_id');
            $table->foreign('mahasiswa_id')->references('id')->on('mahasiswa')->cascadeOnDelete();

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
        Schema::dropIfExists('nilai');
    }
}
