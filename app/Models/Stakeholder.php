<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stakeholder extends Model
{
    use HasFactory;
    protected $table = 'tabel_stakeholder';
    protected $guarded = ['id'];

    public function detReport(){
        return $this->hasMany(DetReport::class);
    }
}
