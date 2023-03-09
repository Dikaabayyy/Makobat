<?php

namespace App\Http\Controllers;

use DB;

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

        DB::update('update data_pasiens set status = 1 where slug = ?', [$slug]);;

        $dataschedule['data_id_pasien'] = $user;
        $newdataschedule = SchedulePasien::create($dataschedule);
        return Redirect::back()->with('success', 'Data berhasil ditambahkan!');
    }

    public function delete_schedule(Request $request){
        $dataschedule = request()->all();

        $slug = $request->slug;
        $id = $request->id;

        $user = DataPasien::where('slug', $slug)->value('id');
        $userstatus = $request->status;

        DB::update('update data_pasiens set status = 0 where slug = ?', [$slug]);;

        SchedulePasien::where('id', $id)->delete();
        return Redirect::back()->with('success', 'Data berhasil dihapus!');
    }
}
