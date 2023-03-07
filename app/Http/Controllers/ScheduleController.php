<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Redirect;

use App\Models\User;
use App\Models\DataPasien;
use App\Models\SchedulePasien;

class ScheduleController extends Controller
{
    public function add_schedule(Request $request){
        $dataschedule = request()->all();

        $slug = $request->slug;

        $user = DataPasien::where('slug', $slug)->value('id');
        $dataschedule['data_id_pasien'] = $user;
        $newdataschedule = SchedulePasien::create($dataschedule);
        return Redirect::back()->with('success', 'Data berhasil ditambahkan!');
    }
}
