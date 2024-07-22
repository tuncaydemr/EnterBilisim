@extends('index')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">

                @if (isset($data['menu'][0]->menu))

                    <h3 class="mb-4">{{ $data['menu'][0]->menu }}</h3>

                @endif

            </div>
        </div>
        <div class="row">
            <div class="col-12 col-md-3">
                <div class="row">
                    <div class="col">
                        <h5 class="border-bottom mt-3 pb-2">Kategoriler</h5>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col">
                        <ul class="list-unstyled" id="categories">

                            @php
                                $menu = $data['menu'][0]->menu;
                                $menu = Str::lower(str_replace(' ', '-', $menu));
                                $menuID = $data['menu'][0]->id;
                            @endphp

                            @foreach ($data['altmenu'] as $altmenu)

                                @php
                                    $altMenu = Str::slug($altmenu->altmenu);
                                @endphp

                                <li>
                                    <a href="{{ route('altmenu', ['menu' => $menu,'altmenu' => $altMenu, 'id' => $altmenu->id]) }}">{{ $altmenu->altmenu }}</a>
                                </li>

                            @endforeach

                            <li class="mt-4 mb-5">
                                <a href="{{ route('menu', ['menu' => $menu]) }}" class="fw-bold">Tüm Ürünler</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-9 mb-5">
                <div class="row">
                    <div class="col">
                        <h5 class="border-bottom mt-3 pb-2">Ürünler</h5>
                    </div>
                </div>
                <div class="row mb-3">

                    @if (isset($data['products']))

                        @foreach ($data['products'] as $products)

                            @if ($products->menu_id == $menuID)

                                <div class="col-12 col-md-6 col-lg-4">
                                    <form action="{{ route('basketAdd') }}" method="POST">
                                        @csrf

                                        <input type="hidden" name="resim" value="{{ $products->resim }}">
                                        <input type="hidden" name="isim" value="{{ $products->isim }}">
                                        <input type="hidden" name="marka" value="{{ $products->marka }}">
                                        <input type="hidden" name="fiyat" value="{{ $products->fiyat }}">
                                        <input type="hidden" name="adet" value="1">
                                        <input type="hidden" name="kargo" value="{{ $products->kargo }}">
                                        <input type="hidden" name="beden" value="{{ $products->beden }}">

                                        <div class="card product-card p-2 border mb-2">
                                            <div class="add-fav position-absolute px-2 py-1 rounded-circle border bg-light">
                                                <a href="{{ route('favoriesAdd', $products->id) }}">
                                                    <i class="far fa-heart"></i>
                                                </a>
                                            </div>
                                            <img src="{{ Storage::url('app/public/assets/images/' . $products->resim) }}" class="card-img-top" alt="Ürünler"/>
                                            <div class="card-body d-flex flex-column p-0 text-center">
                                                <a href="{{ route('product', $products->id) }}" class="card-text text-decoration-none text-secondary d-flex justify-content-center align-items-center" style="height: 50px;">{{ $products->isim }}</a>
                                                <p class="card-text text-decoration-none text-secondary">Marka: {{ $products->marka }}</p>
                                                <div class="price d-flex flex-column flex-lg-row py-0 py-md-3">
                                                    <p class="old-price text-secondary m-0 me-lg-2">{{ $products->eskiFiyat }} TL</p>
                                                    <p class="new-price text-secondary mb-0 text-danger">{{ $products->fiyat }} TL</p>
                                                </div>
                                                <div class="add-to-cart d-grid col-11 mx-auto">
                                                    <button type="submit" class="btn btn-danger w-full text-capitalize">Sepete Ekle</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                            @endif

                        @endforeach

                    @endif

                    @if (isset($data['altMenuProduct']))

                        @foreach ($data['altMenuProduct'] as $altMenuProduct)

                            <div class="col-12 col-md-6 col-lg-4">
                                <form action="{{ route('basketAdd') }}" method="POST">
                                    @csrf

                                    <input type="hidden" name="resim" value="{{ $altMenuProduct->resim }}">
                                    <input type="hidden" name="isim" value="{{ $altMenuProduct->isim }}">
                                    <input type="hidden" name="marka" value="{{ $altMenuProduct->marka }}">
                                    <input type="hidden" name="fiyat" value="{{ $altMenuProduct->fiyat }}">
                                    <input type="hidden" name="adet" value="1">
                                    <input type="hidden" name="kargo" value="{{ $altMenuProduct->kargo }}">
                                    <input type="hidden" name="beden" value="{{ $altMenuProduct->beden }}">

                                    <div class="card product-card p-2 border mb-2">
                                        <div class="add-fav position-absolute px-2 py-1 rounded-circle border bg-light">
                                            <a href="{{ route('favoriesAdd', $altMenuProduct->id) }}">
                                                <i class="far fa-heart"></i>
                                            </a>
                                        </div>
                                        <img src="{{ Storage::url('app/public/assets/images/' . $altMenuProduct->resim) }}" class="card-img-top" alt="Ürünler"/>
                                        <div class="card-body d-flex flex-column p-0 text-center">
                                            <a href="{{ route('product', $altMenuProduct->id) }}" class="card-text text-decoration-none text-secondary d-flex justify-content-center align-items-center" style="height: 50px;">{{ $altMenuProduct->isim }}</a>
                                            <p class="card-text text-decoration-none text-secondary">Marka: {{ $altMenuProduct->marka }}</p>
                                            <div class="price d-flex flex-column flex-lg-row py-0 py-md-3">
                                                <p class="old-price text-secondary m-0 me-lg-2">{{ $altMenuProduct->eskiFiyat }} TL</p>
                                                <p class="new-price text-secondary mb-0 text-danger">{{ $altMenuProduct->fiyat }} TL</p>
                                            </div>
                                            <div class="add-to-cart d-grid col-11 mx-auto">
                                                <button type="submit" class="btn btn-danger w-full text-capitalize">Sepete Ekle</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>

                        @endforeach

                    @endif

                </div>
            </div>
        </div>
    </div>
@endsection
