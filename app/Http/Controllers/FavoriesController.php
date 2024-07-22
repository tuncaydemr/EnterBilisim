<?php

namespace App\Http\Controllers;

use App\Models\Favories;
use App\Models\Products;
use Illuminate\Http\Request;

class FavoriesController extends Controller
{
    public function favoriesAdd($id)
    {
        $product = Products::find($id);

        $id = $product->id;
        $isim = $product->isim;
        $marka = $product->marka;
        $adet = $product->adet;
        $fiyat = $product->fiyat;
        $beden = $product->beden;
        $resim = $product->resim;


        Favories::insert([
            'productId' => $id,
            'isim' => $isim,
            'resim' => $resim,
            'marka' => $marka,
            'adet' => $adet,
            'beden' => $beden,
            'fiyat' => $fiyat
        ]);

        return redirect()->to('/favories');
    }

    public function favoriesDelete($id)
    {
        $idFound = Favories::find($id);
        $idFound->delete();

        return redirect()->to('/favories');
    }
}
