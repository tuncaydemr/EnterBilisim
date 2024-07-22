<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\AltMenu;
use App\Models\Products;

class MenuController extends Controller
{
    public function menu($menu)
    {
        $menuSorgusu = Str::title(str_replace('-', ' ', $menu));
        $products = Products::all();
        $menuSorgu = Menu::where('menu', $menuSorgusu)->get();

        $altMenu = AltMenu::where('menu_id', $menuSorgu[0]->id)->get();

        $data = [
            'products' => $products,
            'menu' => $menuSorgu,
            'altmenu' => $altMenu
        ];

        return view('menu', ['data' => $data]);
    }
}
