<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataPemeriksaan extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function checkUp(){
        return $this->belongsTo(DataPasien::class, 'data_id_pasien', 'id');
    }
}
