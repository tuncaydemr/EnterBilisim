@extends('index')

@section('content')

    <div id="hero" class="hero-slider container-fluid bg-light">
        <div class="row d-flex align-items-center justify-content-center">
            <div class="col-md-9 col-12 py-5 mt-5">
                <div class="owl-carousel owl-theme owl-hero-slider">
                    <div class="item slide-item d-flex flex-md-row flex-column-reverse">
                        <div class="slide-item-content p-4 text-center text-md-start">
                            <p class="text-secondary small mb-0">Multimat %100 Malt ve Hruma Suyu</p>
                            <h2 class="font-weight-bold">Avantajlı Fiyatlar!</h2>
                            <a class="btn btn-danger text-uppercase my-4" href="#">Alışverişe Başla</a>
                        </div>
                        <div class="slide-item-image">
                            <img class="img-fluid" src="{{ asset('slider/araba.jpg') }}" alt="Slider" />
                        </div>
                    </div>
                    <div class="item slide-item d-flex flex-md-row flex-column-reverse">
                        <div class="slide-item-content p-4 text-center text-md-start">
                            <p class="text-secondary small mb-0">Multimat %100 Malt ve Hruma Suyu</p>
                            <h2 class="font-weight-bold">Avantajlı Fiyatlar!</h2>
                            <a class="btn btn-danger text-uppercase my-4" href="#">Alışverişe Başla</a>
                        </div>
                        <div class="slide-item-image">
                            <img class="img-fluid" src="{{ asset('slider/canta.jpg') }}" alt="Slider" />
                        </div>
                    </div>
                    <div class="item slide-item d-flex flex-md-row flex-column-reverse">
                        <div class="slide-item-content p-4 text-center text-md-start">
                            <p class="text-secondary small mb-0">Multimat %100 Malt ve Hruma Suyu</p>
                            <h2 class="font-weight-bold">Avantajlı Fiyatlar!</h2>
                            <a class="btn btn-danger text-uppercase my-4" href="#">Alışverişe Başla</a>
                        </div>
                        <div class="slide-item-image">
                            <img class="img-fluid" src="{{ asset('slider/elbise.jpg') }}" alt="Slider" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="category-thumb" class="category-list-thumb container-fluid h-auto d-none d-lg-block">
        <div class="row d-flex align-items-center justify-content-center">
            <div class="col-10 py-4">
                <div class="row">
                    <div class="col-12 my-4">
                        <h4>Kategoriler</h4>
                    </div>
                    <div class="col-12">
                        <div class="row">
                            <div class="col d-flex justify-content-evenly">
                                <a href="{{ route('menu', ['menu' => Str::slug('bebek giyim')]) }}" class="text-decoration-none d-flex flex-column align-items-center">
                                    <div class="category-thumb-image">
                                        <img src="{{ asset('slider/araba.jpg') }}" class="img-fluid" alt="Kategori" />
                                    </div>
                                    <div class="category-thumb-text">
                                        <p class="text-dark text-center">Bebek Giyim</p>
                                    </div>
                                </a>
                                <a href="{{ route('menu', ['menu' => Str::slug('erkek çocuk giyim')]) }}" class="text-decoration-none d-flex flex-column align-items-center">
                                    <div class="category-thumb-image">
                                        <img src="{{ asset('slider/canta.jpg') }}" class="img-fluid" alt="Kategori" />
                                    </div>
                                    <div class="category-thumb-text">
                                        <p class="text-dark text-center">Erkek Çocuk Giyim</p>
                                    </div>
                                </a>
                                <a href="{{ route('menu', ['menu' => 'kız-çocuk-giyim']) }}" class="text-decoration-none d-flex flex-column align-items-center">
                                    <div class="category-thumb-image">
                                        <img src="{{ asset('slider/elbise.jpg') }}" class="img-fluid" alt="Kategori" />
                                    </div>
                                    <div class="category-thumb-text">
                                        <p class="text-dark text-center">Kız Çocuk Giyim</p>
                                    </div>
                                </a>
                                <a href="{{ route('menu', ['menu' => 'bebek-arabası']) }}" class="text-decoration-none d-flex flex-column align-items-center">
                                    <div class="category-thumb-image">
                                        <img src="{{ asset('slider/oyuncak.jpg') }}" class="img-fluid" alt="Kategori" />
                                    </div>
                                    <div class="category-thumb-text">
                                        <p class="text-dark text-center">Bebek Arabası</p>
                                    </div>
                                </a>
                                <a href="{{ route('menu', ['menu' => 'oyuncak']) }}" class="text-decoration-none d-flex flex-column align-items-center">
                                    <div class="category-thumb-image">
                                        <img src="{{ asset('slider/oyuncak-2.jpg') }}" class="img-fluid" alt="Kategori" />
                                    </div>
                                    <div class="category-thumb-text">
                                        <p class="text-dark text-center">Oyuncak</p>
                                    </div>
                                </a>
                                <a href="{{ route('menu', ['menu' => 'kitap-&-kırtasiye']) }}" class="text-decoration-none d-flex flex-column align-items-center">
                                    <div class="category-thumb-image">
                                        <img src="{{ asset('slider/valiz-banner.jpg') }}" class="img-fluid" alt="Kategori" />
                                    </div>
                                    <div class="category-thumb-text">
                                        <p class="text-dark text-center">Kitap & Kırtasiye</p>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="product-list" class="container-fluid mt-5">
        <div class="row d-flex align-items-center justify-content-center">
            <div class="col-12 col-md-10 py-4">
                <div class="row">
                    <div class="col-12 my-4">
                        <h4>Ürünler</h4>
                    </div>
                </div>
                <div class="row mb-3">

                    @foreach ($product as $products)

                        <div class="col-12 col-md-6 col-lg-3">
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

                    @endforeach

                </div>
            </div>
        </div>
    </div>

@endsection
