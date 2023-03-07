<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Redirect;

use App\Models\User;
use App\Models\ChMessage;
use App\Models\DataObat;
use App\Models\DataLab;
use App\Models\SchedulePasien;
use App\Models\DataPasien;
use App\Models\DataJadwalObat;

class HomeController extends Controller
{
    public function index(){
        return view('index');
    }

    public function dashboard(){
        $data = DataPasien::where('status', 0)->take(4)->get();
        $msg = ChMessage::take(4)->get();
        $day =  Carbon::now()->isoFormat('dddd');
        $date =  Carbon::now()->isoFormat('D MMMM Y');
        return view('pages/dashboard', ['data' => $data, 'date' => $date, 'day' => $day, 'msg' => $msg]);
    }

    public function konsultasi(){
        return view('pages/consult');
    }

    protected function store_pasien(Request $request){

        $userdata = request()->all();

        $userObject = New User;
        $userdata['username'] = $userObject->generateUserName($request['name']);
        $user = User::create($userdata);


        $datauser = request()->all();

        $klasifikasi = New DataPasien;
        $datauser['klasifikasi'] = $klasifikasi->klasifikasi($request['td_tds'], $request['td_tdd']);
        $datauser['data_id_user'] = Str::slug($user['id']);
        $datauser['slug'] = Str::slug(request('name'));
        $newpasien = DataPasien::create($datauser);

        return Redirect::back()->with('success', 'Data Pasien berhasil ditambahkan!');
    }

    public function stock_obat(){
        $data = DataObat::get();
        return view('pages/stock-obat', ['data' => $data]);
    }

    public function set_timer(){
        $data = DataPasien::get();
        return view('pages/set-timer', ['data' => $data]);
    }

    public function keluhan_pasien(){
        $data = DataPasien::get();
        return view('pages/keluhan', ['data' => $data]);
    }

    public function detail_pasien($slug){
        $data = Datapasien::where('slug', $slug)->get();
        $id = $data->value('id');
        $lab = DataLab::where('data_id_pasien', $id)->get();
        $obat = DataJadwalObat::where('data_id_pasien', $id)->get();
        $sch = SchedulePasien::where('data_id_pasien', $id)->get();
        return view('pages/detail-pasien', ['data' => $data, 'obat' => $obat, 'lab' => $lab, 'sch' => $sch]);
    }

    public function obat_habis(){
        $data = DataPasien::get();
        return view('pages/medicine', ['data' => $data]);
    }

    public function pasien(){
        $data = DataPasien::get();
        return view('pages/pasien', ['data' => $data]);
    }
}
