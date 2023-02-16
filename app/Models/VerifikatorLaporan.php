<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VerifikatorLaporan extends Model
{
    use HasFactory;
    protected $table = 'table_det_report';
    protected $fillable = ['verifikasi_id', 'ket_koreksi'];

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

    // public function validasi()
    // {
    //     return $this->belongsTo(Verifikasi::class, 'verifikasi_id 2');
    // }
}