<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Redirect;

use App\Models\User;
use App\Models\DataObat;
use App\Models\DataPasien;
use App\Models\DataJadwalObat;

class ObatController extends Controller
{
    public function stock_obat(){
        $data = DataObat::get();
        return view('pages/stock-obat', ['data' => $data]);
    }

    public function add_obat(Request $request){
        $data = $request->all();

        $data['gambar'] = $request->file('gambar')->getClientOriginalName();
        $request->file('gambar')->storePubliclyAs('image',$request->file('gambar')->getClientOriginalName(),'public');

        $request->file('gambar')-> move(public_path('public/ObatPic'), $request->file('gambar')->getClientOriginalName());

        DataObat::create($data);
        return Redirect::back()->with('success', 'Data berhasil ditambahkan!');
    }

    public function delete_obat($id){
        DataObat::where('id', $id)->delete();
        return Redirect::back()->with('success', 'Data berhasil ditambahkan!');
    }


    public function store_obat(Request $request){
        $dataobat = request()->all();

        $slug = $request->slug;

        $user = DataPasien::where('slug', $slug)->value('id');
        $dataobat['data_id_pasien'] = $user;
        $newdataobat = DataJadwalObat::create($dataobat);
        return Redirect::back()->with('success', 'Data berhasil ditambahkan!');
    }


}
