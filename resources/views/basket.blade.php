@extends('index')

@php
    if(Session::has('user')) {
        $userId = session('user');
    }
@endphp

@section('content')
    <div class="container">

        @if (isset($userId))

            @if ($basketData->isNotEmpty())

                @if (session('error'))
                    <div class="alert alert-danger">{{ session('error') }}</div>
                @endif

                <div class="row d-flex align-items-start">
                    <div class="col-12">
                        <h4 class="mb-4">Sepetim</h4>
                    </div>
                    <div class="col-12 col-lg-8 px-4">

                        @foreach ($basketData as $item)

                            <div class="row px-2 py-4 border border-2 rounded-5 mb-4">
                                <div class="col-12 col-md-2 d-flex justify-content-center align-items-center">
                                    <img src="{{ Storage::url('app/public/assets/images/' . $item->resim) }}" alt="Image" class="img-fluid" width="100" height="100">
                                </div>
                                <div class="col-12 col-md-7">
                                    <div class="row">
                                        <div class="col">
                                            <h5 class="fw-bold my-3 text-center text-md-start">{{ $item->isim }}</h5>
                                            <p class="my-3 text-center text-md-start">Marka: {{ $item->marka }}</p>
                                            <p class="text-center text-md-start">Beden: {{ $item->beden }}</p>
                                            <p class="fs-5 fw-bold mb-3 text-center text-md-start">{{ $item->fiyat }} TL</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col d-flex flex-column justify-content-between my-4">
                                    <div class="row">
                                        <div class="col d-grid px-4">
                                            @php
                                                $productSearch = App\Models\Basket::where('isim', $item->isim)->first();
                                                $idSearch = App\Models\Product::where('isim', $productSearch->isim)
                                                ->where('marka', $productSearch->marka)
                                                ->first();
                                            @endphp
                                            <a href="{{ route('product', $idSearch->id) }}" class="btn btn-danger mb-3">Ürüne Git</a>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col d-flex justify-content-center align-items-center">
                                            @php
                                                $adetSearch = App\Models\Basket::where('userId', $userId)
                                                ->where('isim', $productSearch->isim)
                                                ->first();
                                            @endphp
                                            <form action="{{ route('adetDown', $adetSearch->id) }}" method="POST">
                                                @csrf

                                                <button type="submit" class="bg-transparent border-0"

                                                    @if ($item->adet <= 1)
                                                        disabled
                                                    @endif

                                                >
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-dash-circle" style="cursor: pointer;" viewBox="0 0 16 16">
                                                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/>
                                                        <path d="M4 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 4 8"/>
                                                    </svg>
                                                </button>
                                            </form>
                                            <p class="mx-2 mb-0">{{ $item->adet }}</p>
                                            <form action="{{ route('adetUp', $adetSearch->id) }}" method="POST">
                                                @csrf

                                                <button type="submit" class="bg-transparent border-0">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle" style="cursor: pointer;" viewBox="0 0 16 16">
                                                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/>
                                                        <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4"/>
                                                    </svg>
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="row d-flex justify-content-center">
                                        <div class="col d-flex justify-content-center">
                                            <form action="{{ route('deleteBasket', $item->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')

                                                <button type="submit" class="btn btn-primary d-flex">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                                                        <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5M11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5"/>
                                                    </svg>
                                                    Sil
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        @endforeach

                    </div>
                    <div class="col-12 col-lg-4 border border-2 rounded-5">
                        <div class="row px-2 py-3">
                            <div class="col-12">
                                <div class="row">
                                    <div class="col">
                                        <h5 class="fw-bold mb-3">Sepet Özeti</h5>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col d-flex justify-content-between">
                                        <p class="mb-0">Sepet Tutarı:</p>
                                        @php
                                            $user = App\Models\Basket::where('userId', $item->userId)->get();
                                            $total = $user->sum('fiyat');

                                            $productKargo = App\Models\Product::where('isim', $item->isim)->first();
                                            $kargo = $productKargo->kargo;

                                            $productCargo = App\Models\Basket::where('isim', $item->isim)->first();
                                            $cargo = $productCargo->kargo;
                                        @endphp
                                        <p class="fw-bold mb-0">{{ $total }},00 TL</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col d-flex justify-content-between">
                                        <p class="mb-0">İndirimli Toplam:</p>
                                        <p class="fw-bold mb-0">{{ $total }},00 TL</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col d-flex justify-content-between">
                                        <p>Kargo Ücreti:</p>

                                        @if ($cargo > 0)
                                            <p class="fw-bold mb-0">{{ $kargo }},00 TL</p>
                                        @else
                                            <p class="fw-bold mb-0">Ücretsiz</p>
                                        @endif
                                    </div>
                                </div>
                                <hr style="height: 10px; border-width: 1px; border-color:black;">
                                <div class="row">
                                    <div class="col d-flex justify-content-between">
                                        <p>Toplam:</p>

                                        @if ($cargo > 0)
                                            <p class="fw-bold">{{ $total + $kargo }},00 TL</p>
                                        @else
                                            <p class="fw-bold">{{ $total }},00 TL</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="row my-2">
                                    <div class="col d-grid px-4">
                                        <a href="{{ route('address') }}" class="btn btn-danger" role="button">Devam Et</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            @else

                <div class="row d-flex justify-content-center align-items-center">
                    <div class="col-6 text-center p-5">
                        <h5 class="mb-3">Sepetinizde Ürün Bulunamadı</h5>
                        <a class="btn btn-danger" href="{{ route('home') }}" role="button">Alışverişe Başla</a>
                    </div>
                </div>

            @endif

        @else

            <script>
                $(document).ready(function() {
                    openModal();
                });
            </script>

        @endif

    </div>

@endsection
