<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AktifitasUsulan extends Model
{
    use HasFactory;

    protected $fillable = ['id_usul', 'aspek_id', 'group_id', 'aktifitas_usulan', 'menit', 'waktu_pengisian', 'output'];
    protected $table = 'tabel_aktifitas_usul';
    // protected $guarded = ['id'];

    // relasi antar tabel

    public function aspek()
    {
        return $this->belongsTo(Aspek::class);
    }

    public function group()
    {
        return $this->belongsTo(AktifitasGroup::class);
    }

    public function detReport()
    {
        return $this->hasMany(DetReport::class);
    }
}
