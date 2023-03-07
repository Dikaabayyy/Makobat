<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataJadwalObat extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function jadwalobat(){
        return $this->hasMany(DataPasien::class, 'data_id_pasien', 'id');
    }
}
