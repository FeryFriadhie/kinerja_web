<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AktifitasGroup extends Model
{
    use HasFactory;
    
    protected $fillable = ['id_group', 'aspek_id', 'group_aktifitas']; 
    protected $table = 'tabel_group_aktifitas';
    // protected $guarded = ['id'];

    // relasi antar tabel
    public function aspek()
    {
        return $this->belongsTo(Aspek::class);
    }

    public function usulan()
    {
        return $this->hasMany(aktifitasUsulan::class);
    }

    public function detReport()
    {
        return $this->hasMany(DetReport::class);
    }

}
