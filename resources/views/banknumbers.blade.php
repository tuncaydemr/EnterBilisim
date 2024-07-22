@extends('index')

@section('content')
    <div class="container my-5">
        <div class="row">
            <div class="col">
                <h3 class="text-center fw-bold mb-5">Hesap Numaralarımız</h3>
            </div>
        </div>
        <div class="row d-flex justify-content-evenly">
            <div class="col-12 col-lg-4 mb-5 border border-2 p-5 rounded-5">
                <h4 class="fw-bold mb-4 border-bottom text-center p-3">Hesap 1</h4>
                <p class="fw-bold mb-2">IBAN : TR20 0011 1000 0000 0083 2660 15 </p>
                <p class="fw-bold mb-2">BANKA : QNB Finansbank A.Ş. </p>
                <p class="fw-bold mb-5">ALICI : Ramazan Akdeniz </p>
            </div>
            <div class="col-12 col-lg-4 mb-5 border border-2 p-5 rounded-5">
                <h4 class="fw-bold mb-4 border-bottom text-center p-3">Hesap 2</h4>
                <p class="fw-bold mb-2">IBAN : TR68 0006 7010 0000 0045 9645 55 </p>
                <p class="fw-bold mb-2">BANKA : Yapı ve Kredi Bankası A.Ş. </p>
                <p class="fw-bold mb-5">ALICI : Ramazan Akdeniz </p>
            </div>
        </div>
    </div>
@endsection
