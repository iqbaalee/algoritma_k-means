<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateViewDataNilaiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("DROP VIEW IF EXISTS view_data_nilai");
        DB::statement("
        CREATE VIEW view_data_nilai AS 
        select mhs.id, mhs.nim,
        mhs.nama,
        (select json_arrayagg(
                        json_object(
                            'id_nilai', coalesce(
                                (select max(nm.id)
                                    from nilai_mhs nm
                                    where nm.matkul_id = mat.id and nm.mahasiswa_id = mhs.id), 0),
                                'matkul_id', mat.id,
                                'matkul', mat.nama,
                                'nilai', coalesce((select max(nm.nilai) from nilai_mhs nm where nm.matkul_id = mat.id and nm.mahasiswa_id = mhs.id),0) * mat.sks
                            ))
         from matkul mat) as data_nilai
        from mahasiswa mhs
        ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
    }
}
