<?php

namespace App\Models;

use App\Http\Controllers\DataPegawaiController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Verifikator extends Model
{
    use HasFactory;
    protected $table = 'tabel_verifikator';
    protected $guarded = ['id'];

    public function dataPegawai(){
        return $this->hasMany(DataPegawai::class);
    }

    public function headReport(){
        return $this->hasMany(HeadReport::class);
    }

    public function pegVerifikator(){
        return $this->hasMany(PegVerifikator::class, 'id', 'verifikator_id');
    }

}
