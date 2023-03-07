<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Redirect;

use App\Models\User;
use App\Models\DataLab;
use App\Models\DataPasien;

class LabController extends Controller
{
    public function store_datalab(Request $request){
        $datalab = request()->all();

        $slug = $request->slug;

        $user = DataPasien::where('slug', $slug)->value('id');
        $datalab['data_id_pasien'] = $user;
        $newdatalab = DataLab::create($datalab);
        return Redirect::back()->with('success', 'Data berhasil ditambahkan!');
    }
}
