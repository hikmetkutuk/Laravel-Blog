<?php

namespace App\Http\Controllers;

use App\Profile;
use Illuminate\Http\Request;
use App\User;
use Session;


class UsersController extends Controller {
    
    public function __construct() {
        $this->middleware('admin');
    }

    public function index() {
        return view('back.users.index')->with('users', User::all());
    }

    public function create() {
        return view('back.users.create');
    }

    public function store(Request $request) {
        $this->validate($request, [
           'name' => 'required',
            'email' => 'required|email'
        ]);

        $user = User::create([
           'name' => $request->name,
           'email' => $request->email,
           'password' => bcrypt('password')
        ]);

        $profile = Profile::create([
            'user_id' => $user->id,
            'avatar' => '/uploads/avatars/user.png'
        ]);

        Session::flash('success', 'User added succesfully');

        return redirect()->route('users');
    }

    public function admin($id) {
        $user = User::find($id);
        $user->admin = 1;

        $user->save();

        Session::flash('success', 'Succesfully changed user permissions');

        return redirect()->back();
    }

    public function not_admin($id) {
        $user = User::find($id);
        $user->admin = 0;

        $user->save();

        Session::flash('success', 'Succesfully changed user permissions');

        return redirect()->back();
    }

    public function destroy($id) {
        $user = User::find($id);

        $user->profile->delete();

        $user->delete();

        Session::flash('success', "User deleted");

        return redirect()->back();
    }
}
