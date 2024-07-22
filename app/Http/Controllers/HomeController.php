<?php

namespace App\Http\Controllers;

use App\Models\AltMenu;
use App\Models\Favories;
use App\Models\Menu;
use App\Models\Products;
use App\Models\Users;

class HomeController extends Controller
{

    public function index()
    {
        $product = Products::all();

        return view('home', ['product' => $product]);
    }

    public function home()
    {
        $product = Products::all();

        return view('home', ['product' => $product]);
    }

    public function favories()
    {
        $favories = Favories::all();

        return view('favories', ['favories' => $favories]);
    }

    public function shops()
    {
        return view('shops');
    }

    public function security()
    {
        return view('security');
    }

    public function bankNumber()
    {
        return view('banknumbers');
    }

    public function admin()
    {
        return view('admin');
    }
}
