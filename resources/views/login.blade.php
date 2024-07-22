@extends('index')

@section('content')
  <div class="container" style="padding-top: 150px; padding-bottom: 150px;">
    <div class="row d-flex justify-content-center align-items-center">
      <div class="col col-md-5">
        <form action="{{ route('login') }}" method="POST" novalidate>
            @csrf

            @if (session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif

            <div class="mb-5">
              <h3 class="text-center fw-bold">Giriş Yap</h3>
            </div>
            <div class="mb-3">
              <label for="" class="form-label">Email</label>
              <input type="email" class="form-control" name="email">
            </div>
            <div class="mb-3">
              <label for="" class="form-label">Şifre</label>
              <input type="password" class="form-control" name="password">
            </div>
            <button type="submit" class="btn btn-danger">Gönder</button>
            <a class="btn btn-primary float-end" href="{{ route('registerForm') }}">Kayıt Ol</a>
        </form>
      </div>
    </div>
  </div>
@endsection
