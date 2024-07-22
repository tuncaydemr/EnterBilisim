@extends('index')

@section('content')
    <div class="container mt-3">
        <div class="row mb-4">
            <div class="col">
                <h2 class="text-center mb-4">Havale ile ödeme</h2>
                <p>1- Havale/EFT komisyon ücretleri bankaların kendi uygulaması olup bankadan bankaya değişiklik göstermektedir.</p>
                <p>2- Ödeme tarafımıza ulaştığında gerekli kontroller yapılarak en kısa sürede siparişiniz onaylanır.</p>
                <p>3- Havale/EFT ödemelerinizde Alıcı ismi mutlaka "Ramazan Akdeniz" olmalıdır.</p>
                <p>4- 3 iş günü içerisinde ödemesi gerçekleşmeyen siparişler otomatik olarak iptal edilecektir.</p>
            </div>
        </div>
        <div class="row">
            <div class="col">
                @if (isset($paymentMessage))
                    <div class="alert alert-success">{{ $paymentMessage }}</div>
                @endif
                @if (isset($paymentMessage2))
                    <div class="alert alert-success">{{ $paymentMessage2 }}</div>
                @endif
            </div>
        </div>
    </div>

    <div class="container d-flex justify-content-evenly align-items-center" style="height: 450px;">
        <form action="{{ route('payment1') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="row border border-2 p-5 rounded-5 flex-column">
                <div class="col">
                    <h4 class="fw-bold mb-4 border-bottom text-center">Ödeme 1</h4>
                    <p class="fw-bold mb-2">IBAN : TR20 0011 1000 0000 0083 2660 15 </p>
                    <p class="fw-bold mb-2">BANKA : QNB Finansbank A.Ş. </p>
                    <p class="fw-bold mb-5">ALICI : Ramazan Akdeniz </p>
                </div>
                <div class="mb-5">
                    <label for="" class="form-label text-black">Dekont Yükle</label>
                    <input type="file" class="form-control" name="dekont1" required />
                </div>
                <div class="col d-grid px-4">
                    <button type="submit" class="btn btn-danger">Siparişi Tamamla</button>
                </div>
            </div>
        </form>
        <form action="{{ route('payment2') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="row border border-2 p-5 rounded-5 flex-column">
                <div class="col">
                    <h4 class="fw-bold mb-4 border-bottom text-center">Ödeme 2</h4>
                    <p class="fw-bold mb-2">IBAN : TR68 0006 7010 0000 0045 9645 55 </p>
                    <p class="fw-bold mb-2">BANKA : Yapı ve Kredi Bankası A.Ş. </p>
                    <p class="fw-bold mb-5">ALICI : Ramazan Akdeniz </p>
                </div>
                <div class="mb-5">
                    <label for="" class="form-label text-black">Dekont Yükle</label>
                    <input type="file" class="form-control" name="dekont2" required />
                </div>
                <div class="col d-grid px-4">
                    <button type="submit" class="btn btn-danger">Siparişi Tamamla</button>
                </div>
            </div>
        </form>
    </div>
@endsection
