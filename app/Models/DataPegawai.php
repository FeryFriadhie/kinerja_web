<?php

namespace App\Models;

use App\Models\Verifikator;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class DataPegawai extends Authenticatable
{
    use HasRoles;
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'tabel_data_pegawai';

    protected $fillable = ['nik','email', 'peg_verifikator_id', 'id_pegawai', 'nama_pegawai', 'role', 'password', 'verifikator_id'];

    protected $guarded = ['id'];    
    
    protected $hidden = [
        'password', 'remember_token',
       ];

    // relasi
    public function detReport()
    {
        return $this->hasMany(detReport::class);
    } 
    
    public function headReport()
    {
        return $this->hasMany(headReport::class);
    }

    // public function pegVerifikator(){
    //     return $this->hasMany(PegVerifikator::class, 'peg_verifikator_id', 'id_peg_verifikator');
    // }

    // public function verifikator(){
    //     return $this->belongsTo(DataPegawai::class);
    // }

    // public function user(){
    //     return $this->hasOne(User::class, 'pegawai_id', 'id');
    // }



    /**
     * @param  integer  $value
     * @return \Illuminate\Database\Eloquent\Casts\Attribute
     */
    protected function role(): Attribute
    {
        return new Attribute(
            get: fn ($value) =>  ["Member", "Verifikator", "Validator", "Administrator"][$value],
        );
    }

}
