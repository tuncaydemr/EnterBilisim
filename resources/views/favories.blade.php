@extends('index')

@section('content')

    @if (Session::has('user'))

        <div class="container">

            @if ($favories->isNotEmpty())

                <div class="row d-flex justify-content-center">
                    <div class="col-12">
                        <h4 class="mb-4">Favorilerim</h4>
                    </div>
                </div>
                <div class="row d-flex justify-content-center">

                    @foreach ($favories as $favorite)

                        <div class="col-12 border border-2 rounded-5 px-5 py-4 mb-4">
                            <div class="row">
                                <div class="col-12 col-md-2 d-flex justify-content-center">
                                    <img src="{{ Storage::url('app/public/assets/images/' . $favorite->resim) }}" alt="Image" class="img-fluid" width="100" height="100">
                                </div>
                                <div class="col-12 col-md-7">
                                    <div class="row">
                                        <div class="col" id="favories">
                                            <h5 class="fw-bold mb-3 mt-4 mt-md-0 text-center text-md-start">{{ $favorite->isim }}</h5>
                                            <p class="mb-3 mb-md-0 mt-4 mt-md-0 text-center text-md-start">Marka: {{ $favorite->marka }}</p>
                                            <p class="d-none d-md-block">Beden: {{ $favorite->beden }}</p>
                                            <p class="d-none d-md-block mb-3">Adet: {{ $favorite->adet }}</p>
                                            <div class="d-md-none d-flex justify-content-between">
                                                <p>Beden: {{ $favorite->beden }}</p>
                                                <p class="mb-3">Adet: {{ $favorite->adet }}</p>
                                            </div>
                                            <p class="fs-5 fw-bold mb-4 mb-md-0 text-center text-md-start">{{ $favorite->fiyat }} TL</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-3 d-flex flex-column justify-content-evenly">
                                    <div class="row">
                                        <div class="col-12 d-grid px-lg-4">
                                            <a href="{{ route('product', $favorite->productId) }}" class="btn btn-danger mb-3 mb-md-0" role="button">Ürüne Git</a>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 d-grid justify-content-center">
                                            <form action="{{ route('favoriesDelete', $favorite->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')

                                                <button type="submit" class="border-0 bg-transparent text-decoration-underline">Kaldır</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    @endforeach

                </div>

            @else

                <div class="row d-flex justify-content-center align-items-center">
                    <div class="col-6 text-center p-5">
                        <h5 class="mb-3">Favorilerinizde Ürün Bulunamadı</h5>
                        <a class="btn btn-danger" href="{{ route('home') }}" role="button">Alışverişe Başla</a>
                    </div>
                </div>

            @endif

        </div>

    @else

        <script>
            $(document).ready(function() {
                openModal();
            });
        </script>

    @endif

@endsection
