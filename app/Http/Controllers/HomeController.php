<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use Validator;
use App\Http\Requests\CreateUserRequest;

class HomeController extends Controller
{
    public function create(){
        return view ('create_user');
    }
    
    public function store1(Request $request){
        $request->validate([
            'name'      =>'required',
            'password'  =>'required|min:6',
            'email'     =>'required|email|unique:users'
        ]);

        $user           = new User;
        $user->name     = $request->name;
        $user->password = bcrypt($request->password);
        $user->email    = $request->email;
        $user->save();

        return back()->with('success','user create successfully');
    }
    public function store2(Request $request){
        $rules = [
            'name'      => 'required',
            'password'  => 'required|min:6',
            'email'     => 'required|email|unique:users'
        ];

        $messages = [
            'name.required'     => 'nama wajib di isi bro',
            'password.required' => 'password wajib di isi bro',
            'password.min'      => 'password minimal kurang bro',
            'email.required'    => 'email wajib di isi bro',
            'email.email'       => 'email tidak valid bro',
            'email.unique'       => 'email sudah terdaftar bro',
        ];

        $validator = Validator::make($request->all(),$rules,$messages);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }

        $user           = new User;
        $user->name     = $request->name;
        $user->password = bcrypt($request->password);
        $user->email    = $request->email;
        $user->save();

        return back()->with('success','user created successfully');

    }

    public function store3(CreateUserRequest $request){
        $user           = new User;
        $user->name     = $request->name;
        $user->password = bcrypt($request->password);
        $user->email    = $request->email;
        $user->save();

        return back()->with('success','User created successfully');
    }

}
