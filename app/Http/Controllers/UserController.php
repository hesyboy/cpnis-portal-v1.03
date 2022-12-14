<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;


class UserController extends Controller
{

    public function index(){
        if (Auth::user()->cannot('owner-role')) {
            Alert::toast('You Have No Access 403', 'error');
            return redirect()->back();
        }
        $users=User::paginate(10);
        return view('user.index',compact('users'));
    }

    public function profile(){
        return view('user.profile');
    }

    public function changePassword(Request $request){

        $validated=$request->validate([
            'password' => 'required|confirmed|min:8',
        ]);

        $user=Auth::user();
        $user->password=Hash::make($request->password);
        $user->update();

        Alert::toast('Your Password Changed', 'success');
        return back();
    }

    public function addUser(){
        return view('user.add-user');
    }

    public function storeUser(Request $request){
        $validated=$request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user=New User();
        $user->name=$request->name;
        $user->email = $request->email;
        $user->role = 0;
        $user->password = Hash::make($request->password);
        $user->save();
        return redirect()->route('users.index');
    }
}
