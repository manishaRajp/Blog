<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use App\Models\registration;

class RegisterController extends Controller
{


    function registerUser(Request $req)
    {
        $validated = $req->validate([
            'user' => 'required|max:255',
            'pass' => 'required| min:4|max:7',
            'pswd' => 'required| min:4| max:7',
            'email' => 'required|email',
            'image' => 'required',
        ]);
        $result = DB::table('registrations')
        ->where('email', $req->input('email'))
        ->get();
        $res = json_decode($result, true);
        print_r($res);

        if (sizeof($res) == 0) {
            $data = $req->input();
            $user = new registration;
            $image = uploadFile($req->image, 'profile');
            $data->user_name = $req->user;
            $data->password = $req->pass;
            $data->re_password = $req->pswd;
            $data->email = $req->email;
            $data->profile = $image;
            $user->save();
            $req->session()->flash('register_status', 'User has been registered successfully');
            return redirect('/register');
        } else {
            $req->session()->flash('register_status', 'This Email already exists.');
            return redirect('/register');
        }
    }

    function loginUser(Request $req)
    {
        $validatedData = $req->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $result = DB::table('users')
        ->where('email', $req->input('email'))
        ->get();

        $res = json_decode($result, true);
        print_r($res);

        if (sizeof($res) == 0) {
            $req->session()->flash('error', 'Email Id does not exist. Please register yourself first');
            echo "Email Id Does not Exist.";
            return redirect('login');
        } else {
            echo "Hello";
            $encrypted_password = $result[0]->password;
            $decrypted_password = crypt::decrypt($encrypted_password);
            if ($decrypted_password == $req->input('password')) {
                echo "You are logged in Successfully";
                $req->session()->put('user', $result[0]->name);
                return redirect('/');
            } else {
                $req->session()->flash('error', 'Password Incorrect!!!');
                echo "Email Id Does not Exist.";
                return redirect('login');
            }
        }
    }
}
