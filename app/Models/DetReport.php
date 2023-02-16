<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetReport extends Model
{
    use HasFactory;

    protected $table = 'tabel_det_report';
    protected $fillable = ['report_id','aspek_id','group_id','usul_id','stakeholder_id','tanggal', 'jumlah', 'bukti_foto', 'bukti_dokumen','verifikasi_id', 'ket_koreksi'];

    // public function setFilenamesAttribute($value)
    // {
    //     $this->attributes['bukti_foto'] = json_encode($value);
    // }

    protected $casts = [
        'bukti_foto' => 'array',
        'bukti_dokumen' => 'array',
    ];

    public function hReport()
    {
        return $this->hasOne(HeadReport::class, 'id', 'report_id');
    }

    public function pegawai(){
        return $this->belongsTo(DataPegawai::class);
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

    public function validasi()
    {
        return $this->belongsTo(Verifikasi::class, 'verifikasi_id 2');
    } 
}
