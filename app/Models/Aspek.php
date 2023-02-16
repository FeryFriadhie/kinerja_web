<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aspek extends Model
{
    use HasFactory;

    protected $fillable = ['id','aspek'];
    protected $table = 'tabel_aspek';
    // protected $guarded = ['id'];

    // relasi 
    public function group()
    {
        return $this->hasMany(AktifitasGroup::class);
    }

    public function usulan()
    {
        return $this->hasMany(AktifitasUsulan::class);
    } 
    public function detReport()
    {
        return $this->hasMany(DetReport::class);
    }

}

