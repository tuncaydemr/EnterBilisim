<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\AltMenu;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use App\Models\Products;

class AltMenuController extends Controller
{
    public function altmenu($menu, $altMenu)
    {
        $menuSorgusu = Str::title(str_replace('-', ' ', $menu));
        $altMenuId = Products::where('isim', $altMenu)->get();
        $menuSorgu = Menu::where('menu', $menuSorgusu)->get();


        $altmenu = AltMenu::where('menu_id', $menuSorgu[0]->id)->get();

        $data = [
            'altMenuProduct' => $altMenuId,
            'menu' => $menuSorgu,
            'altmenu' => $altmenu
        ];

        return view('menu', ['data' => $data]);
    }
}
