<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;
class DataPasien extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function user(){
        return $this->belongsTo(User::class, 'data_id_user', 'id');
    }

    public function obat(){
        return $this->belongsTo(DataJadwalObat::class, 'id', 'data_id_pasien');
    }

    public function obatTest($id){
        return DB::table('data_jadwal_obats')
        ->selectRaw('*')
        ->where('data_id_pasien', '=', $id)
        ->get();
    }

    public function getRouteKeyName(){
        return 'slug';
    }

    public function klasifikasi($td_tds, $td_tdd){
        if($td_tds < 120 && $td_tdd < 80){
            return $klasifikasi = "Normal";
        }elseif($td_tds >= 120 && $td_tds <= 139 && $td_tdd >= 80 && $td_tdd <= 89){
            return $klasifikasi = "Pra-Hipertensi";
        }elseif($td_tds >= 140 && $td_tds <= 159 && $td_tdd >= 90 && $td_tdd <= 99){
            return $klasifikasi = "Hipertensi Tingkat 1";
        }elseif($td_tds > 160 && $td_tdd > 100){
            return $klasifikasi = "Hipertensi Tingkat 2";
        }elseif($td_tds > 140 &&  $td_tdd < 90){
            return $klasifikasi = "Hipertensi Sistolik Terisolasi";
        }
    }

    public function classification($klasifikasi){
        if($klasifikasi =='Normal'){
            return '<div class="u-j">
                        <span class="u-normal">Normal</span>
                    </div>';
        }elseif($klasifikasi =='Pra-Hipertensi'){
            return '<div class="u-j">
                        <span class="u-praH">Pra-Hipertensi</span>
                    </div>';
        }elseif($klasifikasi =='Hipertensi Tingkat 1'){
            return '<div class="u-j">
                        <span class="u-HT1">Hipertensi Tingkat 1</span>
                    </div>';
        }elseif($klasifikasi =='Hipertensi Tingkat 2'){
            return '<div class="u-j">
                        <span class="u-HT2">Hipertensi Tingkat 2</span>
                    </div>';
        }elseif($klasifikasi =='Hipertensi Sistolik Terisolasi'){
            return '<div class="u-j">
                        <span class="u-HST">Hipertensi Sistolik Terisolasi</span>
                    </div>';
        }
    }

    public function cigarettes($cigarettes){
        if($cigarettes =='Yes'){
            return '<i class="bi bi-check-square"></i>';
        }elseif($cigarettes =='No'){
            return '<i class="bi bi-square"></i>';
        }
    }

    public function diet($diet){
        if($diet =='Yes'){
            return '<i class="bi bi-check-square"></i>';
        }elseif($diet =='No'){
            return '<i class="bi bi-square"></i>';
        }
    }

    public function alcohol($alcohol){
        if($alcohol =='Yes'){
            return '<i class="bi bi-check-square"></i>';
        }elseif($alcohol =='No'){
            return '<i class="bi bi-square"></i>';
        }
    }
}
