<?php

namespace App\Http\Controllers;

use App\User;
use Faker\Provider\File;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{


    public function postSignUp(Request $request){
        $this->validate($request, [
            'email' => 'required|email|unique:users',
            'first_name' => 'required|max:120',
            'password' => 'required|min:4'
        ]);

        $email = $request['email'];
        $first_name = $request['first_name'];
        $password = bcrypt($request['password']);

        $user = new User();
        $user->email = $email;
        $user->first_name = $first_name;
        $user->password = $password;

        $user->save();

        Auth::login($user);

        return redirect()->route('dashboard');


    }

    public function create(){

        return view('auth.users.create');

    }

    public function signInPage(){

        return view('auth.users.signin');
    }

    public function postSignIn(Request $req){

        $this->validate($req, [
            'email' => 'required',
            'password' => 'required'
        ]);

        if(Auth::attempt(
            ['email' => $req['email'],
            'password' => $req['password']])){
             return redirect()->route('dashboard');
        } // end if

        return redirect()->back()
            ->withInput()
            ->with('invalid_info', 'Invalid email or password!');

    }

    public function logOut(){
        Auth::logout();
        return redirect()->route('signin.page');
    }

    public function getAccount(){
        $user = Auth::user();
        $img = Storage::url($user['first_name'] . '-' . $user->id . '.jpg');
        $exists = Storage::exists($user['first_name'] . '-' . $user->id . '.jpg');


        //dd($exists);
        return view('account', ['user' => Auth::user()]);
    }

    public function saveAccount(Request $req){
        $this->validate($req, [
            'first_name' => 'required:max:210'
        ]);

        $user= Auth::user();
        $user->first_name = $req['first_name'];
        $user->update();

        $file = $req->file('image');
        $fileName = $req['first_name'] . '-' . $user->id . '.jpg';
        if($file){

            $file->storeAs('public', $fileName);

            //Storage::putFileAs($fileName, $file, Auth::user()->id);

        }
        return redirect()->route('account');

    } // end saveAccount()

    public function getUserImage($filename){

        $file = Storage::disk('local')->get($filename);

        dd($file);
        return new Response($file, 200);
    }


}
