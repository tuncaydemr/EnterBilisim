<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Admin;
use App\Models\Users;
use App\Models\Orders;
use App\Models\AltMenu;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Products;
use App\Models\Settings;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function admin(Request $req)
    {
        $username = $req->username;
        $password = $req->password;

        $admin = Admin::find('1');

        if (($username == $admin->username) && ($password == $admin->password)) {
            Session::put('admin', $admin);

            return redirect()->to('/admin/home');
        } else {
            return redirect()->to('/admin')->with('error', 'Email veya Parola Yanlış.');
        }
    }

    public function adminHome()
    {
        $products = Products::count();
        $orders = Orders::count();
        $users = Users::count();

        return view('adminhome', [
            'products' => $products,
            'orders' => $orders,
            'users' => $users
        ]);
    }

    public function adminUsers()
    {
        $users = Users::all();

        return view('adminusers', [
            'users' => $users
        ]);
    }

    public function adminProducts()
    {
        $products = Products::all();

        return view('adminproducts', [
            'products' => $products
        ]);
    }

    public function adminSettings()
    {
        return view('adminsettings');
    }

    public function userDelete($id)
    {
        $userDelete = Users::find($id);
        $userDelete->delete();

        return redirect()->to('/admin/users');
    }

    public function productDelete($id)
    {
        $productDelete = Products::find($id);

        if ($productDelete) {
            $productDelete->delete();
        }

        return redirect()->to('/admin/products');
    }

    public function orderDelete($id)
    {
        $orderDelete = Orders::find($id);

        if ($orderDelete) {
            $orderDelete->delete();
        }

        return redirect()->to('/admin/orders');
    }

    public function menuDelete($id)
    {
        $menuDelete = Menu::find($id);

        if ($menuDelete) {
            $menuDelete->delete();
        }

        return redirect()->to('/admin/menu-delete');
    }

    public function altMenuDelete($id)
    {
        $altMenuDelete = AltMenu::find($id);

        if ($altMenuDelete) {
            $altMenuDelete->delete();
        }

        return redirect()->to('/admin/alt-menu-delete');
    }

    public function adminMenuDelete()
    {
        $menus = Menu::all();

        return view('adminmenudelete', ['menus' => $menus]);
    }

    public function adminAltMenuDelete()
    {
        $altmenus = AltMenu::all();

        return view('adminaltmenudelete', ['altmenus' => $altmenus]);
    }

    public function adminAddProduct()
    {
        $menus = Menu::all();
        $altmenus = AltMenu::all();

        return view('adminproductadd', [
            'menus' => $menus,
            'altmenus' => $altmenus
        ]);
    }

    public function adminMenu()
    {
        return view('adminmenu');
    }

    public function adminAltMenu()
    {
        $menus = Menu::all();

        return view('adminaltmenu', ['menus' => $menus]);
    }

    public function menuAdd(Request $req)
    {
        $menu = $req->menu;

        Menu::insert([
            'menu' => $menu
        ]);

        return redirect()->route('adminAddProduct');
    }

    public function altMenuAdd(Request $req)
    {
        $menu = $req->menu;
        $altMenu = $req->altmenu;

        $req->validate([
            'menu' => 'required|not_in:Select one',
            'altmenu' => 'required|not_in:Select one'
        ]);

        AltMenu::insert([
            'menu_id' => $menu,
            'altmenu' => $altMenu
        ]);

        return redirect()->route('adminAddProduct');
    }

    public function productAdd(Request $req)
    {

        $req->validate([
            'menu' => 'required|not_in:Select one',
            'altmenu' => 'required|not_in:Select one',
            'isim' => 'required',
            'marka' => 'required',
            'adet' => 'required|numeric',
            'fiyat' => 'required|numeric',
            'resim' => 'required|image'
        ]);

        $menu = $req->menu;
        $altmenu = $req->altmenu;
        $isim = $req->isim;
        $marka = $req->marka;
        $fiyat = $req->fiyat;
        $adet = $req->adet;

        if ($req->hasFile('resim')) {
            $image = $req->file('resim');
            $imageExtension = $image->hashName();
            $newImage = $image->store('images', 'public');

            Storage::setVisibility($newImage, 'public');
        }

        Products::insert([
            'menu_id' => $menu,
            'category_id' => $altmenu,
            'isim' => $isim,
            'marka' => $marka,
            'fiyat' => $fiyat,
            'adet' => $adet,
            'resim' => $imageExtension
        ]);

        return redirect()->to('/admin/products');
    }

    public function settingAdd(Request $req)
    {
        if ($req->hasFile('resim')) {
            $image = $req->file('resim');
            $imageExtension = $image->hashName();
            $newImage = $image->store('images', 'public');

            Storage::setVisibility($newImage, 'public');
        }

        Settings::where('id', 1)->update([
            'logo' => $imageExtension
        ]);

        return redirect()->to('/admin/products');
    }

    public function adminOrders()
    {
        $orders = Orders::all();
        $users = Users::all();

        return view('adminorders', [
            'orders' => $orders,
            'users' => $users
        ]);
    }

    public function orderView($id)
    {
        $order = Orders::find($id);

        return view('adminorderview', [
            'order' => $order
        ]);
    }

    public function orderEdit($id)
    {
        $order = Orders::find($id);

        return view('adminorderedit', [
            'order' => $order
        ]);
    }

    public function orderStatusChange(Request $req, $id)
    {
        Orders::where('id', $id)->update([
            'orders' => $req->siparis
        ]);

        return redirect()->to('/admin/orders');
    }
}
