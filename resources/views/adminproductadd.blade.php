<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <style>
        .newClass {
            position: fixed;
            left: 0;
            height: 100%;
        }

        body {
            padding-top: 56px;
        }

        td, th {
            text-align: center;
        }

        .custom-navbar {
            background-color: #1e2833; /* İstediğiniz renk kodunu buraya ekleyin */
        }

        .sidebar .nav-link {
            color: #1e2833; /* Menü linklerinin varsayılan rengi */
        }

        .sidebar .nav-link.active {
            color: #fff; /* Aktif menü linkinin rengi */
            background-color: #1e2833; /* Aktif menü linkinin arka plan rengi */
        }

        .sidebar .nav-link:hover {
            background-color: #e9ecef;
            color: #000;
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <nav class="navbar navbar-expand-md navbar-dark custom-navbar fixed-top">
                    <a class="navbar-brand" href="#">Yönetici Paneli</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                </nav>
            </div>
        </div>
        <div class="row">
            <nav id="sidebarMenu" class="col col-md-4 col-lg-2 d-lg-block bg-light sidebar collapse newClass">
                <div class="sidebar-sticky pt-3">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('adminHome') }}">Anasayfa</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="{{ route('adminUsers') }}">Kullanıcılar</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('adminProducts') }}">Ürünler</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('adminOrders') }}">Siparişler</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('adminSettings') }}">Ayarlar</a>
                        </li>
                    </ul>
                </div>
            </nav>
            <div class="col-12">
                <div class="row d-flex justify-content-center mt-5">
                    <div class="col-12 mb-4">
                        <h4 class="text-center">Yeni Ürün Ekle</h4>
                    </div>
                    <div class="col-12 d-flex justify-content-end">
                        <a href="{{ route('adminMenu') }}" class="btn btn-primary me-5">Menü Ekle</a>
                        <a href="{{ route('adminAltMenu') }}" class="btn btn-primary me-5">Alt Menü Ekle</a>
                    </div>
                    <div class="col-12 d-flex justify-content-end mt-3">
                        <a href="{{ route('adminMenuDelete') }}" class="btn btn-primary me-5">Menü Sil</a>
                        <a href="{{ route('adminAltMenuDelete') }}" class="btn btn-primary me-5">Alt Menü Sil</a>
                    </div>
                </div>
                <div class="row d-flex justify-content-center">
                    <div class="col col-md-3 rounded-4 p-5" style="background: #1e2833">
                        <form action="{{ route('productAdd') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="mb-3">
                                <label for="menu" class="form-label text-white">Menü</label>
                                <select class="form-select @error('menu') is-invalid @enderror" name="menu" id="menu">
                                    <option selected>Select one</option>

                                    @foreach ($menus as $menu)

                                        <option value="{{ $menu->id }}">{{ $menu->menu }}</option>

                                    @endforeach

                                </select>
                                @error('menu')
                                    <div class="invalid-feedback">Menü Seçiniz</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="altmenu" class="form-label text-white">Alt Menü</label>
                                <select class="form-select @error('altmenu') is-invalid @enderror" name="altmenu" id="altmenu">
                                    <option selected>Select one</option>

                                    @foreach ($altmenus as $altmenu)

                                        <option value="{{ $altmenu->id }}">{{ $altmenu->altmenu }}</option>

                                    @endforeach

                                </select>
                                @error('altmenu')
                                    <div class="invalid-feedback">Alt Menü Seçiniz</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="name" class="form-label text-white">İsim</label>
                                <input type="text" class="form-control @error('isim') is-invalid @enderror" name="isim" id="isim" />
                                @error('isim')
                                    <div class="invalid-feedback">İsim Giriniz</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="name" class="form-label text-white">Marka</label>
                                <input type="text" class="form-control @error('marka') is-invalid @enderror" name="marka" id="marka" />
                                @error('marka')
                                    <div class="invalid-feedback">Marka Giriniz</div>
                                @enderror
                            </div>
                            <div class="form-group d-flex justify-content-between">
                                <div class="mb-3 col-5">
                                    <label for="name" class="form-label text-white">Adet</label>
                                    <input type="number" class="form-control @error('adet') is-invalid @enderror" name="adet" id="adet" />
                                    @error('adet')
                                        <div class="invalid-feedback">Adet Giriniz</div>
                                    @enderror
                                </div>
                                <div class="mb-3 col-5">
                                    <label for="name" class="form-label text-white">Fiyat</label>
                                    <input type="number" class="form-control @error('fiyat') is-invalid @enderror" name="fiyat" id="fiyat" />
                                    @error('fiyat')
                                        <div class="invalid-feedback">Fiyat Giriniz</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-5">
                                <label for="resim" class="form-label text-white">Resim</label>
                                <input type="file" class="form-control @error('resim') is-invalid @enderror" name="resim" id="resim" />
                                @error('resim')
                                    <div class="invalid-feedback">Resim Seçiniz</div>
                                @enderror
                            </div>
                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary">Ürün Ekle</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"></script>
</body>

</html>
