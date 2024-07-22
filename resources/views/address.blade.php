@extends('index')

@php
    if(Session::has('user')) {
        $userId = session('user');
    }
@endphp

@section('content')
    <div class="container">

        @if (isset($userId))

            <div class="row d-flex align-items-start">
                <div class="col-12">
                    <h4 class="mb-4">Adres ve Kargo</h4>
                </div>
                <div class="col col-md-9 px-4">
                    <div class="row px-2 py-4 border border-2 rounded-5 d-flex justify-content-between">
                        <div class="col-8 my-3 px-4">
                            <div class="row">
                                <div class="col">
                                    <h5 class="fw-bold">{{ $users->adSoyad }}</h5>
                                    <p class="my-3">{{ $users->adres }}</p>
                                    <p class="mb-2">{{ $users->phone }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col d-flex flex-column justify-content-evenly">
                            <div class="row">
                                <div class="col d-grid px-4">
                                    <a href="{{ route('account') }}" class="btn btn-danger">Yeni Adres</a>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col d-grid px-4">
                                    <p class="fw-bold text-center">Kargo: MNG Kargo</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col col-md-3 border border-2 rounded-5">
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
                                        $user = App\Models\Basket::where('userId', $userId)->get();
                                        $total = $user->sum('fiyat');
                                        $kargo = $user->sum('kargo');
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
                                    @if ($kargo == 0)
                                        <p class="fw-bold">Ücretsiz</p>
                                    @else
                                        <p class="fw-bold mb-0">{{ $kargo }},00 TL</p>
                                    @endif
                                </div>
                            </div>
                            <hr style="height: 10px; border-width: 1px; border-color:black;">
                            <div class="row">
                                <div class="col d-flex justify-content-between">
                                    <p>Toplam:</p>
                                    <p class="fw-bold">{{ $total + $kargo }},00 TL</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="row my-2">
                                <div class="col d-grid px-4">
                                    <a href="{{ route('payment') }}" class="btn btn-danger" role="button">Ödemeye Geç</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        @else

            <script>window.location = '/loginForm';</script>

        @endif

    </div>

@endsection
