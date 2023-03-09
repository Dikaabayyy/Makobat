<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Redirect;
use App\Models\User;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        $apoteker = User::where('role', 'apoteker')->get();
        $dokter = User::where('role', 'dokter')->get();
        return view('admin/admin', ['apoteker' => $apoteker, 'dokter' => $dokter]);
    }

    public function store_account(Request $request){
        $userAcc = request()->all();

        $accObject = New User;
        $userAcc['username'] = $accObject->apodokusername($request['name'], $request['role']);
        $userAcc['role'] = $request['role'];

        $user = User::create($userAcc);

        return Redirect::back()->with('success', 'Account has been created!');

    }

    public function delete_account($id){
        User::where('id', $id)->delete();
        return Redirect::back()->with('success', 'Account has been deleted!');
    }

    public function users(){
        $users = User::where('role', 'pasien')->get();
        return view('admin/users', ['users' => $users]);
    }

    public function settings(){
        return view('admin/settings');
    }

    public function forbidden(){
        return view('auth/forbidden');
    }
}
