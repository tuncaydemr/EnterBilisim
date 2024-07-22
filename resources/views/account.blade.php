@php
    use Carbon\Carbon;
@endphp

@extends('index')

@section('content')

    @if (Session::has('user'))

        <div class="row d-flex justify-content-center">
            <div class="col-12 col-md-10">
                <div class="row p-0 my-4 justify-content-between ">
                    <div class="col-md-3 px-4 mb-5 col-12 rounded-2">
                        <div class="nav flex-md-column justify-content-between nav-tabs text-center">
                            <a class="nav-link active text-capitalize text-md-start px-0 py-3" id="my-account-tab" data-mdb-toggle="tab" href="#my-account-content" role="tab" aria-controls="my-account" aria-selected="true">
                                Hesap Bilgilerim
                            </a>
                            <a class="nav-link text-capitalize text-md-start px-0 py-3" id="my-address-tab" data-mdb-toggle="tab" href="#my-address-content" role="tab" aria-controls="my-address-content" aria-selected="false">
                                Adres Bilgilerim
                            </a>
                            <a class="nav-link text-capitalize text-md-start px-0 py-3" id="my-orders" data-mdb-toggle="tab" href="#my-orders-content" role="tab" aria-controls="my-orders-content" aria-selected="false">
                                Tüm Siparişlerim
                            </a>

                            <a class="nav-link text-capitalize text-md-start px-0 py-3" id="my-password" data-mdb-toggle="tab" href="#my-password-content" role="tab" aria-controls="my-password-content" aria-selected="false">
                                Şifre Değiştirme
                            </a>
                        </div>
                    </div>
                    <div class="col-md-9 col-12">
                        <div class="tab-content p-0" id="v-tabs-tabContent">
                            <div class="tab-pane fade show active" id="my-account-content" role="tabpanel"aria-labelledby="my-account-tab">
                                <h4 class="mb-4">Üyelik Bilgilerim</h4>
                                <form action="{{ route('accountChange', $users->id) }}" method="GET" class="row g-4 p-4 my-2 border rounded-2 shadow-sm">
                                    <div class="col-md-6">
                                        <div class="form-outline">
                                            <input type="text" class="form-control form-control-lg" value="{{ $users->ad }}" name="name" required />
                                            <label for="name" class="form-label">Ad</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-outline">
                                            <input type="text" class="form-control form-control-lg" value="{{ $users->soyad }}" name="surname" required />
                                            <label for="surname" class="form-label">Soyad</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-outline">
                                            <input type="tel" class="form-control form-control-lg" value="{{ $users->phone }}" name="phone" required />
                                            <label for="phone" class="form-label">Telefon</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-outline">
                                            <input type="email" name="email" value="{{ $users->email }}" class="form-control form-control-lg" />
                                            <label class="form-label" for="email">Email</label>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <button class="btn btn-danger" type="submit">Kaydet</button>
                                    </div>
                                </form>
                            </div>

                            <div class="tab-pane fade" id="my-address-content" role="tabpanel" aria-labelledby="my-address-tab">
                                <h4 class="mb-5">Adreslerim</h4>
                                <form action="{{ route('accountChange2', $users->id) }}" method="GET" class="row g-4 p-4 border rounded-2 shadow-sm">
                                    <div class="col-md-6">
                                        <div class="form-outline">
                                            <input type="text" class="form-control form-control-lg" value="{{ $users->adres }}" name="adres" required />
                                            <label for="adres" class="form-label">Adres</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-outline">
                                            <input type="text" class="form-control form-control-lg" value="{{ $users->binaNo }}" name="binaNo" required />
                                            <label for="binaNo" class="form-label">Bina No</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-outline">
                                            <input type="text" class="form-control form-control-lg" value="{{ $users->kat }}" name="kat" required />
                                            <label for="kat" class="form-label">Kat</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-outline">
                                            <input type="text" name="daireNo" class="form-control form-control-lg" value="{{ $users->daireNo }}" />
                                            <label class="form-label" for="daireNo">Daire No</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-outline">
                                            <input type="text" class="form-control form-control-lg" value="{{ $users->ilce }}" name="ilce" required />
                                            <label for="ilce" class="form-label">İlçe</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-outline">
                                            <input type="text" name="sehir" class="form-control form-control-lg" value="{{ $users->sehir }}" />
                                            <label class="form-label" for="sehir">Şehir</label>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <button class="btn btn-danger" type="submit">Kaydet</button>
                                    </div>
                                </form>
                            </div>

                            <div class="tab-pane fade" id="my-orders-content" role="tabpanel" aria-labelledby="my-orders">
                                <h4 class="mb-4">Siparişlerim</h4>
                                <div class="row g-4 py-4 my-2 border rounded-2 shadow-sm">
                                    <div class="table-responsive border-top">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Sipariş Tarihi</th>
                                                    <th scope="col">Sipariş Durumu</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                @foreach ($orders as $order)
                                                    @php
                                                        $tarih = $order->created_at;
                                                        $newTarih = Carbon::parse($tarih)->toDateString();
                                                    @endphp

                                                    <tr>
                                                        <td>&nbsp;{{ $newTarih }}</td>
                                                        <td>&nbsp;&nbsp;&nbsp;{{ $order->orders }}</td>
                                                    </tr>

                                                @endforeach

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="my-password-content" role="tabpanel" aria-labelledby="my-password">

                                @if (session('error'))
                                    <div class="alert alert-danger">{{ session('error') }}</div>
                                @endif

                                <h4>Sifre Değiştirme</h4>
                                <div class="container p-2 border rounded-2 shadow-sm mb-2">
                                    <form action="{{ route('accountChange3', $users->id) }}" method="GET" class="row p-4 gap-4">
                                        <div class="col-md-6">
                                            <div class="form-outline">
                                                <input type="password" class="form-control form-control-lg" name="password" required />
                                                <label for="password" class="form-label">Mevcut Şifre</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-outline">
                                                <input type="password" class="form-control form-control-lg" name="newpassword" required />
                                                <label for="newpassword" class="form-label">Yeni Şifre</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-outline">
                                                <input type="password" class="form-control form-control-lg" name="againpassword" required />
                                                <label for="againpassword" class="form-label">Yeni Şifre Tekrar*</label>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <button class="btn btn-danger" type="submit">Kaydet</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    @else

        <script>
            $(document).ready(function() {
                openModal();
            });
        </script>

    @endif

@endsection
