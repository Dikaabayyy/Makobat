<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SchedulePasien extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function schedule(){
        return $this->belongsTo(DataPasien::class, 'data_id_pasien', 'id');
    }
}
