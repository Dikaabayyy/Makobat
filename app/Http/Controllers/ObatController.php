<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Redirect;

use App\Models\User;
use App\Models\DataPasien;
use App\Models\DataJadwalObat;

class ObatController extends Controller
{
    public function store_obat(Request $request){
        $dataobat = request()->all();

        $slug = $request->slug;

        $user = DataPasien::where('slug', $slug)->value('id');
        $dataobat['data_id_pasien'] = $user;
        $newdataobat = DataJadwalObat::create($dataobat);
        return Redirect::back()->with('success', 'Data berhasil ditambahkan!');
    }
}
