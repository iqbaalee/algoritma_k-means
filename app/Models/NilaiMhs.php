<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NilaiMhs extends Model
{
    use HasFactory;
    protected $table = 'nilai_mhs';
    protected $guarded = ['id'];
    protected $fillable = ['mahasiswa_id', 'matkul_id', 'nilai'];
    protected $primaryKey = 'id';

    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class);
    }
    public function matkul()
    {
        return $this->belongsTo(Matkul::class);
    }
}
