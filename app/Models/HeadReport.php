<?php

namespace App\Models;

use Dotenv\Validator;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HeadReport extends Model
{
    use HasFactory;

    protected $table = 'tabel_head_report';
    protected $fillable = ['pegawai_id', 'bulan', 'tahun', 'peg_verifikator_id', 'verifikator_id'];

    // relasi antar tabel
    public function detReport()
    {
        return $this->hasOne(DetReport::class, 'report_id', 'id');
    }

    public function pegawai(){
        return $this->belongsTo(DataPegawai::class, 'pegawai_id', 'id_pegawai');
    }

    public function aspek()
    {
        return $this->belongsTo(Aspek::class);
    }

    public function stakeholder()
    {
        return $this->belongsTo(Stakeholder::class);
    }

    public function group()
    {
        return $this->belongsTo(AktifitasGroup::class);
    }

    public function usulan()
    {
        return $this->belongsTo(AktifitasUsulan::class, 'usul_id');
    }

    public function verifikasi()
    {
        return $this->belongsTo(Verifikasi::class, 'verifikasi_id');
    }
    
    public function verifikator()
    {
        return $this->belongsTo(Verifikator::class);
    }

    public function pegVerifikator(){
        return $this->belongsTo(PegVerifikator::class);
    }


    // public function verifikator()
    // {
    //     return $this->belongsTo(Verifikator::class);
    // }

    // public function dataPegawai()
    // {
    //     return $this->belongsTo(DataPegawai::class);
    // }

    // public function Verifikasi()
    // {
    //     return $this->belongsTo(Verfikasi::class);
    // }

    // public function Validator()
    // {
    //     return $this->belongsTo(Validator::class);
    // }

}
