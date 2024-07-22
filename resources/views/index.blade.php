@php
    $user = Session::get('user');
@endphp

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Enter Bilişim</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="//use.fontawesome.com/releases/v5.0.7/css/all.css" />
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
</head>

<body>
    <header>
        <nav class="container-fluid">
            <div class="row">
                <div class="col-12 text-center p-2 border-bottom">
                    <a class="mx-2 text-decoration-none text-secondary small" href="{{ route('home') }}">Anasayfa</a>
                    <a class="mx-2 text-decoration-none text-secondary small"
                        href="{{ route('shops') }}">Mağazalarımız</a>
                    <a class="mx-2 text-decoration-none text-secondary small" href="tel:+905355021131">Müşteri
                        Hizmetleri</a>
                </div>
            </div>
            <div
                class="navbar-bottom navbar navbar-expand-lg row py-5 border-bottom align-items-center justify-content-center">
                <div class="col">
                    <div class="row justify-content-around">
                        <div class="col-6 col-lg-2 text-lg-center">
                            @php
                                $settings = App\Models\Settings::all();
                            @endphp

                            @foreach ($settings as $setting)
                                <img src="{{ Storage::url('images/' . $setting->logo) }}" alt="Logo" width="150"
                                    height="50">
                            @endforeach
                        </div>
                        <div class="col-6 d-lg-none text-end">
                            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                                data-bs-target="#header">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                        </div>
                        <div id="header" class="d-lg-none collapse bg-secondary">
                            <div class="navbar-nav p-5 my-5">
                                <div class="col-12 mb-5 px-2 position-relative d-flex align-items-center">
                                    <input type="text" class="form-control rounded-5"
                                        placeholder="Aramak istediğiniz ürünü yazınız..." />
                                    <label class="position-absolute end-0 me-3">
                                        <i class="fas fa-search text-secondary fa-lg"></i>
                                    </label>
                                </div>
                                <ul class="navbar-nav flex-row justify-content-around mb-3 mb-lg-0">

                                    @if (Session::has('user'))
                                        <li class="nav-item me-4">
                                            <a href="{{ route('my.account', $user->id) }}" class="btn btn-primary"
                                                role="button">Hesabım</a>
                                        </li>

                                        <li class="nav-item">
                                            <form action="{{ route('logout') }}" method="POST">
                                                @csrf

                                                <button type="submit" class="btn btn-primary">Çıkış Yap</button>
                                            </form>
                                        @else
                                            <button type="button" class="btn btn-primary loginRegister">
                                                Giriş Yap
                                            </button>

                                            <a href="{{ route('favories') }}" class="btn btn-primary">
                                                Favoriler
                                            </a>

                                            <a href="{{ route('basket') }}" class="btn btn-primary">
                                                Sepet
                                            </a>
                                        </li>
                                    @endif

                                </ul>

                                <div class="rounded-0 d-grid gap-3 my-3 d-none loginRegisterOpen">
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#login">
                                        Giriş Yap
                                    </button>
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#register">
                                        Kayıt Ol
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div id="login" class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false">
                            <div class="modal-dialog modal-dialog-centered modal-fullscreen-sm-down">
                                <div class="modal-content p-3">
                                    <form action="{{ route('login') }}" method="POST" novalidate>
                                        @csrf

                                        <div class="modal-header">
                                            <h3>Giriş Yap</h3>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                id="modalCloseButton"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="mb-3 form-group">
                                                <label for="loginEmail" class="form-label">Email</label>
                                                <input type="email"
                                                    class="form-control
                                                    @error('loginEmail')
                                                        is-invalid
                                                    @enderror
                                                "
                                                    name="loginEmail" id="loginEmail">
                                                @error('loginEmail')
                                                    <div class="text-danger p-2 rounded invalid-feedback">
                                                        {{ ucfirst($message) }}</div>
                                                @enderror
                                            </div>
                                            <div class="mb-3 form-group">
                                                <label for="loginPassword" class="form-label">Parola</label>
                                                <input type="password"
                                                    class="form-control
                                                    @error('loginPassword')
                                                        is-invalid
                                                    @enderror
                                                "
                                                    name="loginPassword" id="loginPassword">
                                                @error('loginPassword')
                                                    <div class="invalid-feedback p-2 rounded">
                                                        <div class="text-danger">1- Minimum 8 karakter</div>
                                                        <div class="text-danger">2- En az 1 büyük harf</div>
                                                        <div class="text-danger">3- En az 1 küçük harf</div>
                                                        <div class="text-danger">4- En az 1 rakam</div>
                                                        <div class="text-danger">5- En az 1 özel karakter</div>
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal"
                                                id="modalCloseButton2">Çıkış</button>
                                            <button type="submit" class="btn btn-primary">Giriş Yap</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div id="register" class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false">
                            <div class="modal-dialog modal-dialog-centered modal-fullscreen-sm-down">
                                <div class="modal-content p-3">
                                    <form action="{{ route('register') }}" method="POST" novalidate>
                                        @csrf

                                        <div class="modal-header">
                                            <h3>Kayıt Ol</h3>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                id="modalCloseButton3"></button>
                                        </div>

                                        @if (session('success'))
                                            <div class="alert alert-success">
                                                {{ session('success') }}
                                            </div>
                                        @endif

                                        <div class="modal-body">
                                            <div class="mb-3">
                                                <label for="registerUsername" class="form-label">Kullanıcı Adı</label>
                                                <input type="text"
                                                    class="form-control
                                                    @error('registerUsername')
                                                        is-invalid
                                                    @enderror
                                                "
                                                    name="registerUsername" id="registerUsername">
                                                @error('registerUsername')
                                                    <div class="text-danger p-2 rounded invalid-feedback">
                                                        {{ ucfirst($message) }}</div>
                                                @enderror
                                            </div>
                                            <div class="mb-3">
                                                <label for="registerEmail" class="form-label">Email</label>
                                                <input type="email"
                                                    class="form-control
                                                    @error('registerEmail')
                                                        is-invalid
                                                    @enderror
                                                "
                                                    name="registerEmail" id="registerEmail">
                                                @error('registerEmail')
                                                    <div class="text-danger p-2 rounded invalid-feedback">
                                                        {{ ucfirst($message) }}</div>
                                                @enderror
                                            </div>
                                            <div class="mb-3">
                                                <label for="registerPassword" class="form-label">Parola</label>
                                                <input type="password"
                                                    class="form-control
                                                    @error('registerPassword')
                                                        is-invalid
                                                    @enderror
                                                "
                                                    name="registerPassword" id="registerPassword">
                                                @error('registerPassword')
                                                    <div class="invalid-feedback p-2 rounded">
                                                        <div class="text-danger">1- Minimum 8 karakter</div>
                                                        <div class="text-danger">2- En az 1 büyük harf</div>
                                                        <div class="text-danger">3- En az 1 küçük harf</div>
                                                        <div class="text-danger">4- En az 1 rakam</div>
                                                        <div class="text-danger">5- En az 1 özel karakter</div>
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal"
                                                id="modalCloseButton4">Çıkış</button>
                                            <button type="submit" class="btn btn-primary">Kayıt Ol</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-5 px-2 position-relative d-none d-lg-flex align-items-center">
                            <input type="text" class="form-control rounded-5" placeholder="Aramak istediğiniz ürünü yazınız..." />
                            <label class="position-absolute end-0 me-3">
                                <i class="fas fa-search text-secondary fa-lg"></i>
                            </label>
                        </div>
                        <div class="col-3 d-none d-lg-flex mb-3 mb-lg-0">

                            @if (Session::has('user'))
                                <div class="row">
                                    <div class="col">
                                        <a href="{{ route('my.account', $user->id) }}" class="btn btn-primary"
                                            role="button">Hesabım</a>
                                    </div>
                                    <div class="col">
                                        <a href="{{ route('favories') }}" class="btn btn-primary">
                                            Favoriler
                                        </a>
                                    </div>
                                    <div class="col">
                                        <a href="{{ route('basket') }}" class="btn btn-primary">
                                            Sepet
                                        </a>
                                    </div>
                                    <div class="col">
                                        <form action="{{ route('logout') }}" method="POST">
                                            @csrf

                                            <button type="submit" class="btn btn-primary">Çıkış</button>
                                        </form>
                                    </div>
                                </div>
                            @else
                                <div class="row">
                                    <div class="col">
                                        <div class="dropdown">
                                            <button class="btn btn-primary" type="button" data-bs-toggle="dropdown">
                                                Giriş Yap
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li>
                                                    <a class="dropdown-item" type="button" data-bs-toggle="modal"
                                                        data-bs-target="#login">Giriş Yap</a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item" type="button" data-bs-toggle="modal"
                                                        data-bs-target="#register">Kayıt Ol</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <a href="{{ route('favories') }}" class="btn btn-primary">
                                            Favoriler
                                        </a>
                                    </div>
                                    <div class="col">
                                        <a href="{{ route('basket') }}" class="btn btn-primary">
                                            Sepet
                                        </a>
                                    </div>
                                </div>
                            @endif

                        </div>
                    </div>
                </div>
            </div>
            @php
                $menus = App\Models\Menu::all();
                $altmenus = App\Models\AltMenu::all();
            @endphp
            <div class="row">
                <div class="col bg-danger">
                    <div class="container">
                        <div class="row">
                            <div class="col p-0 d-flex">

                                @foreach ($menus as $menu)

                                    @php
                                        $menuSlug = Str::lower(str_replace(' ', '-', $menu->menu));
                                    @endphp

                                    <div class="dropdownDw">
                                        <button class="btn rounded-0 px-4 py-3 dropdown" type="button" data-bs-toggle="dropdown">{{ $menu->menu }}</button>
                                        <ul class="dropdown-menu rounded-0">

                                            @foreach ($altmenus as $altmenu)

                                                @php
                                                    $altMenuSlug = Str::lower(str_replace(' ', '-', $altmenu->altmenu));
                                                @endphp

                                                @if ($altmenu->menu_id === $menu->id)

                                                    <li>
                                                        <a href="{{ route('altmenu', ['menu' => $menuSlug, 'altmenu' => $altMenuSlug]) }}" class="dropdown-item">{{ $altmenu->altmenu }}</a>
                                                    </li>

                                                @endif

                                            @endforeach

                                        </ul>
                                    </div>

                                @endforeach

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </header>

    <main>
        <section class="container-fluid p-4 mt-5">
            @yield('content')
        </section>
    </main>

    <footer>
        <section class="container-fluid text-white">
            <div class="row bg-danger p-4">
                <div class="col-12 col-md-4 my-4 my-md-0 footer-icon">
                    <div class="d-flex flex-column align-items-center gap-3">
                        <i class="fa fa-handshake border rounded-circle p-4"></i>
                        <p class="mb-0">Güvenli Alışveriş</p>
                    </div>
                </div>
                <div class="col-12 col-md-4 my-4 my-md-0 footer-icon">
                    <div class="d-flex flex-column align-items-center gap-3">
                        <i class="fa fa-truck border rounded-circle p-4"></i>
                        <p class="mb-0">600 TL üzeri Ücretsiz Kargo</p>
                    </div>
                </div>
                <div class="col-12 col-md-4 my-4 my-md-0 footer-icon">
                    <div class="d-flex flex-column align-items-center gap-3">
                        <i class="fa fa-shopping-cart border rounded-circle p-4"></i>
                        <p class="mb-0">Mağazada Değişim</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col bg-light">
                    <div class="container">
                        <div class="row py-5">
                            <div class="col footer">
                                <h6 class="fw-bold mb-4 border-bottom">Kurumsal</h6>
                                <div class="d-flex flex-column">
                                    <a href="#!">Kurumsal</a>
                                    <a href="#!">KVKK</a>
                                    <a href="#!">Gizlilik Sözleşmesi</a>
                                    <a href="#!">Bilgi Güvenliği Politikası</a>
                                    <a href="#!">Kalite Politikası</a>
                                </div>
                            </div>
                            <div class="col footer">
                                <h6 class="fw-bold mb-4 border-bottom">Kategoriler</h6>
                                <div class="d-flex flex-column">
                                    <a href="{{ route('menu', ['menu' => Str::slug('bebek giyim')]) }}">Ürünler</a>
                                    <a href="{{ route('menu', ['menu' => Str::slug('erkek çocuk giyim')]) }}">PC
                                        Parçaları</a>
                                    <a href="{{ route('menu', ['menu' => 'kız-çocuk-giyim']) }}">Bilgisayarlar</a>
                                    <a href="{{ route('menu', ['menu' => 'bebek-odası']) }}">Apple</a>
                                    <a href="{{ route('menu', ['menu' => 'bebek-arabası']) }}">En İyi Fırsatlar</a>
                                </div>
                            </div>
                            <div class="col footer">
                                <h6 class="fw-bold mb-4 border-bottom">Yardım</h6>
                                <div class="d-flex flex-column">
                                    <a href="{{ route('security') }}">Güvenlik</a>
                                    <a href="{{ route('shops') }}">Mağazalarımız</a>
                                    <a href="{{ route('shops') }}">Bize Ulaşın</a>
                                </div>
                            </div>
                            <div class="col footer-iletisim">
                                <h6 class="fw-bold mb-4 border-bottom">İletişim</h6>
                                <p><i class="fas fa-home me-3 text-secondary"></i> Tahsilli, Kozan Cad. No:303,
                                    01250<br>Yüreğir/Adana</p>
                                <p><i class="fas fa-envelope me-3 text-secondary"></i> Ram_zan01@hotmail.com</p>
                                <p><i class="fas fa-phone me-3 text-secondary"></i> + 90 535 502 11 31</p>
                                <div>
                                    <a href="https://www.facebook.com/AkdenizBebe/" target="_blank"
                                        class="me-4 link-secondary">
                                        <i class="fab fa-facebook-f"></i>
                                    </a>
                                    <a href="https://www.instagram.com/akdenizbebe/" target="_blank"
                                        class="me-4 link-secondary">
                                        <i class="fab fa-instagram"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.025);">
            © 2024 Copyright
            <span class="text-reset fw-bold">Enter Bilişim</span>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="{{ asset('js/script.js') }}"></script>

</body>

</html>
