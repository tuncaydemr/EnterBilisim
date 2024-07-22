@extends('index')

@php
  $userId = session('user');
@endphp

@section('content')
    <div class="product-detail container-fluid mt-4">
        <div class="row p-0 d-flex flex-column flex-md-row align-items-center justify-content-center">
            <div class="col-12 col-md-10">
                <form action="{{ route('basketAdd') }}" method="POST">
                    @csrf

                    <div class="row d-flex flex-column flex-md-row align-items-start justify-content-center">

                        <input type="hidden" name="resim" value="{{ $product->resim }}">
                        <input type="hidden" name="isim" value="{{ $product->isim }}">
                        <input type="hidden" name="marka" value="{{ $product->marka }}">
                        <input type="hidden" name="fiyat" value="{{ $product->fiyat }}">
                        <input type="hidden" name="adet" value="{{ $product->adet }}">
                        <input type="hidden" name="kargo" value="{{ $product->kargo }}">
                        <input type="hidden" name="beden" value="{{ $product->beden }}">

                        <div class="product-img col-12 col-md-6 p-0 text-center">
                            <img src="{{ Storage::url('app/public/assets/images/' . $product->resim) }}" class="img-fluid" alt="Ürün">
                        </div>
                        <div class="product-content border-start border-start col-12 col-md-6">
                            <h2 class="mb-3">{{ $product->isim }}</h2>
                            <div class="border-bottom text-uppercase small d-flex flex-column flex-md-row align-items-start justify-content-start gap-0 gap-md-4">
                                <p class="mb-0">Marka: <strong class="text-secondary text-capitalize">{{ $product->marka }}</strong></p>
                            </div>
                            <div class="price py-3 border-bottom">
                                <p class="mb-0 me-4 d-flex align-items-center gap-4">Fiyatı: <span class="text-decoration-line-through text-body" style="font-size: 20px;">{{ $product->eskiFiyat }} TL</span><span class="text-danger" style="font-size: 30px; font-weight: 700;">{{ $product->fiyat }} TL</span></p>
                            </div>
                            <div class="py-3 border-bottom">
                                <p class="mb-2">Beden Seçenekleri:</p>
                                <div class="form-check d-flex align-items-center p-0">
                                    <input class="form-control-sm" type="radio" value="{{ $product->beden }}" name="beden" id="radio">
                                    <label class="form-check-label mt-1" for="radio">{{ $product->beden }}</label>
                                </div>
                            </div>
                            <div class="quantity py-3 border-bottom">
                                <div class="d-flex align-items-center gap-4 mb-4">
                                    <p class="mb-0"><strong>Adet:</strong></p>
                                    <div class="row">
                                        <div class="col d-flex  align-items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-dash-circle" id="minus" style="cursor: pointer;" viewBox="0 0 16 16">
                                                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/>
                                                <path d="M4 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 4 8"/>
                                            </svg>
                                            <input type="text" class="mx-2 mb-0 text-center border-0 bg-transparent" id="adet" style="width: 30px;" name="adet" value="1">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle" id="plus" style="cursor: pointer;" viewBox="0 0 16 16">
                                                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/>
                                                <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4"/>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="d-grid col-9 col-md-6align-items-center">
                                        <button type="submit" class="btn btn-danger btn-lg">Sepete Ekle</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <div class="Details-tabs container p-4 my-4 border-bottom" style="min-height: 40vh;">
                    <ul class="nav nav-tabs nav-fill mb-3" id="tab-header" role="tablist">
                        <li class="nav-item">
                            <a href="#detail-tabs" class="nav-link active" data-mdb-toggle="tab">Ürün Detayı</a>
                        </li>
                        <li class="nav-item">
                            <a href="#features-tabs" class="nav-link" data-mdb-toggle="tab">Ürün Özellikleri</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="tab-content">
                        <div class="tab-pane fade show active" id="detail-tabs">
                            {{ $product->urunDetay }}
                        </div>
                        <div class="tab-pane fade" id="features-tabs">
                            {{ $product->urunOzellik }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
