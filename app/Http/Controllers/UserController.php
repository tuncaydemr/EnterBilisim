<?php

namespace App\Http\Controllers;

use App\Models\Orders;
use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function registerForm()
    {
        return view('register');
    }

    public function logout()
    {
        Session::forget('user');

        return redirect()->to('/home');
    }

    public function account()
    {
        $id = session('user');
        $user = Users::find($id);

        $order = Orders::where('user_id', $id)->get();

        $data = [
            'user' => $user,
            'order' => $order
        ];

        return view('account', ['data' => $data]);
    }

    public function login(Request $req)
    {
        $email = $req->loginEmail;
        $password = $req->loginPassword;
        $user = Users::where('email', $email)->first();

        $validator = $req->validate([
            'loginEmail' => 'required|exists:users,email',
            'loginPassword' => 'required'
        ]);

        if ($user && ($password === $user->password) && $validator) {
            Session::put('user', $user);
        }

        return redirect()->to('/home');
    }

    public function register(Request $req)
    {
        $adSoyad = $req->registerUsername;
        $email = $req->registerEmail;
        $pass = $req->registerPassword;

        Users::insert([
            'adSoyad' => $adSoyad,
            'email' => $email,
            'password' => $pass
        ]);

        return redirect()->to('/home');
    }

    public function myAccount($id)
    {
        $users = Users::find($id);
        $orders = Orders::where('user_id', $id)->get();

        return view('account', ['users' => $users, 'orders' => $orders]);
    }

    public function accountChange(Request $req, $id)
    {
        $name = $req->name;
        $surname = $req->surname;
        $email = $req->email;
        $phone = $req->phone;

        Users::where('id', $id)->update([
            'ad' => $name,
            'soyad' => $surname,
            'email' => $email,
            'phone' => $phone
        ]);

        return redirect()->to('/account');
    }

    public function accountChange2(Request $req, $id)
    {
        $adres = $req->adres;
        $binaNo = $req->binaNo;
        $kat = $req->kat;
        $daireNo = $req->daireNo;
        $ilce = $req->ilce;
        $sehir = $req->sehir;

        Users::where('id', $id)->update([
            'adres' => $adres,
            'binaNo' => $binaNo,
            'kat' => $kat,
            'daireNo' => $daireNo,
            'ilce' => $ilce,
            'sehir' => $sehir
        ]);

        return redirect()->to('/account');
    }

    public function accountChange3(Request $req, $id)
    {
        $mevcutSifre = $req->password;
        $sifre = $req->newpassword;
        $yeniSifre = $req->againpassword;

        $user = Users::find($id);

        if (($mevcutSifre === $user->password) && ($sifre === $yeniSifre)) {
            $user->update([
                'password' => $sifre
            ]);

            return redirect()->to('/account');
        } else {
            return redirect()->to('/account')->with('error', 'Lütfen tekrar deneyiniz.');
        }
    }
}
