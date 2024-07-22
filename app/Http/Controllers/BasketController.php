<?php

namespace App\Http\Controllers;

use App\Models\Users;
use App\Models\Basket;
use App\Models\Orders;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Products;
use Illuminate\Support\Facades\Session;

class BasketController extends Controller
{
    public function basket()
    {
        $userId = session('user');
        if($userId !== null) {
            $basket = Basket::where('userId', $userId)->get();

            return view('basket', ['basketData' => $basket]);
        } else {
            return redirect()->route('registerForm');
        }
    }

    public function basketAdd(Request $req)
    {
        $beden = $req->beden;
        $adet = $req->adet;
        $resim = $req->resim;
        $isim = $req->isim;
        $marka = $req->marka;
        $fiyat = $req->fiyat;
        $kargo = $req->kargo;

        $user = session('user');

        if (!$user) {
            return redirect()->to('/loginForm')->with('error', 'Sepete devam etmek için lütfen giriş yapınız.');
        }

        $existingProduct = Basket::where('userId', $user)->where('isim', $isim)->where('marka', $marka)->first();

        if (!$existingProduct) {
            if ($adet >= 1) {
                $fiyat *= $adet;

                Basket::insert([
                    'userId' => $user,
                    'beden' => $beden,
                    'adet' => $adet,
                    'resim' => $resim,
                    'isim' => $isim,
                    'marka' => $marka,
                    'fiyat' => $fiyat,
                    'kargo' => $kargo
                ]);
            }

            if ($fiyat >= 600) {
                Basket::where('isim', $isim)->update([
                    'kargo' => 0
                ]);
            } else {
                Basket::where('isim', $isim)->update([
                    'kargo' => $kargo
                ]);
            }

            return redirect()->to('/basket');
        } else {
            return redirect()->to('/basket')->with('error', 'Bu Ürün Sepette Bulunmaktadır.');
        }
    }

    public function deleteBasket($id)
    {
        $deleteBasket = Basket::find($id);
        $deleteBasket->delete();

        return redirect()->to('/basket');
    }

    public function adetUp($id)
    {
        $adet = Basket::where('id', $id)->value('adet');
        $adet += 1;

        $idFound = Basket::find($id);
        $isim = $idFound->isim;

        $fiyatFound = Products::where('isim', $isim)->first();
        $fiyat = $fiyatFound->fiyat;
        $fiyat *= $adet;

        Basket::where('isim', $isim)->update([
            'adet' => $adet,
            'fiyat' => $fiyat
        ]);

        if ($fiyat >= 600) {
            Basket::where('isim', $isim)->update([
                'kargo' => 0
            ]);
        } else {
            $yeniKargo = $fiyatFound->kargo;

            Basket::where('isim', $isim)->update([
                'kargo' => $yeniKargo
            ]);
        }

        return redirect()->to('/basket');
    }

    public function adetDown($id)
    {
        $adet = Basket::where('id', $id)->value('adet');
        $idFound = Basket::find($id);
        $isim = $idFound->isim;

        if ($idFound && $idFound->adet >= 1) {
            if ($idFound->adet !== 1) {
                $adet -= 1;

                $fiyatFound = Products::where('isim', $isim)->first();
                $fiyat = $fiyatFound->fiyat;
                $fiyat *= $adet;

                Basket::where('isim', $isim)->update([
                    'adet' => $adet,
                    'fiyat' => $fiyat
                ]);

                if ($fiyat >= 600) {
                    Basket::where('isim', $isim)->update([
                        'kargo' => 0
                    ]);
                } else {
                    $yeniKargo = $fiyatFound->kargo;

                    Basket::where('isim', $isim)->update([
                        'kargo' => $yeniKargo
                    ]);
                }
            }
        }

        return redirect()->to('/basket');
    }

    public function address()
    {
        if (Session::has('user')) {
            $id = session('user');
            $users = Users::find($id);

            return view('address', ['users' => $users]);
        }
    }

    public function payment()
    {
        return view('payment');
    }

    public function payment1()
    {
        $paymentMessage = "Ödeme 1 ekranındaki IBAN'a ödeme yaparak işlemi tamamladınız.";

        $userId = session('user');
        $baskets = Basket::where('userId', $userId)->get();

        foreach ($baskets as $basket) {
            $id = $basket->id;
            $isim = $basket->isim;
            $resim = $basket->resim;
            $marka = $basket->marka;
            $fiyat = $basket->fiyat;
            $beden = $basket->beden;
            $adet = $basket->adet;
            $kargo = $basket->kargo;
        }

        if (isset($id)) {
            Orders::insert([
                'user_id' => $userId,
                'isim' => $isim,
                'resim' => $resim,
                'marka' => $marka,
                'fiyat' => $fiyat,
                'beden' => $beden,
                'adet' => $adet,
                'kargo' => $kargo,
                'orders' => 'Onay Bekliyor'
            ]);

            $deleteBasket = Basket::find($id);
            $deleteBasket->delete();

            return view('payment', compact('paymentMessage'));
        } else {
            return redirect()->to('/basket');
        }
    }

    public function payment2()
    {
        $paymentMessage2 = "Ödeme 2 ekranındaki IBAN'a ödeme yaparak işlemi tamamladınız.";

        $userId = session('user');
        $baskets = Basket::where('userId', $userId)->get();

        foreach ($baskets as $basket) {
            $id = $basket->id;
            $isim = $basket->isim;
            $resim = $basket->resim;
            $marka = $basket->marka;
            $fiyat = $basket->fiyat;
            $beden = $basket->beden;
            $adet = $basket->adet;
            $kargo = $basket->kargo;
        }

        if (isset($id)) {
            Orders::insert([
                'user_id' => $userId,
                'isim' => $isim,
                'resim' => $resim,
                'marka' => $marka,
                'fiyat' => $fiyat,
                'beden' => $beden,
                'adet' => $adet,
                'kargo' => $kargo,
                'orders' => 'Onay Bekliyor'
            ]);

            $deleteBasket = Basket::find($id);
            $deleteBasket->delete();

            return view('payment', compact('paymentMessage2'));
        } else {
            return redirect()->to('/basket');
        }
    }
}
