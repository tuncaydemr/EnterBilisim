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
            vertical-align: middle;
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
                <div class="row d-flex justify-content-end mt-5">
                    <div class="col-12 mb-4">
                        <h4 class="text-center">Ürünler Raporu</h4>
                    </div>
                    <div class="col-12 col-lg-3 d-flex justify-content-end mb-5">
                        <a href="{{ route('adminAddProduct') }}" class="btn btn-primary me-5">Yeni Ürün Ekle</a>
                    </div>
                    <div class="col col-lg-10">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Resim</th>
                                    <th scope="col">İsim</th>
                                    <th scope="col">Marka</th>
                                    <th scope="col">Adet</th>
                                    <th scope="col">Fiyat</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($products as $product)

                                    <tr>
                                        <th scope="row">{{ $product->id }}</th>
                                        <td>
                                            <img src="{{ Storage::url('images/' . $product->resim) }}" alt="Image" class="img-fluid" width="150" height="150">
                                        </td>
                                        <td>{{ $product->isim }}</td>
                                        <td>{{ $product->marka }}</td>
                                        <td>{{ $product->adet }}</td>
                                        <td>{{ $product->fiyat }}</td>
                                        <td>
                                            <a href="{{ route('productDelete', $product->id) }}" class="btn btn-danger" role="button">Sil</a>
                                        </td>
                                    </tr>

                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"></script>
</body>

</html>
