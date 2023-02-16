<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PegVerifikator extends Model
{
    use HasFactory;
    
    protected $table = 'tabel_peg_verifikator';

    protected $guarded = ['id'];

    public function verifikator(){
        return $this->belongsTo(Verifikator::class, 'verifikator_id', 'id');
    }

    public function pegawai(){
        return $this->belongsTo(DataPegawai::class, 'pegawai_id', 'id_pegawai');
    }

    public function headReport(){
        return $this->hasMany(HeadReport::class);
    }
}
