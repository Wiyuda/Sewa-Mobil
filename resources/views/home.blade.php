@extends('layouts.home')
@section('title', 'Sewa Mobil')
@section('content')
<section class="home" id="home">
  <div class="container">
    <div class="row text-center pt-5 pb-5">
      <div class="col-md-12">
        <h1>Selamat Datang di Website Penyedia Jasa Sewa Mobil</h1>
        <p>Berpetualang lebih mudah dan nyaman dengan kami di <span class="fw-bold">Sewa Mobil</span>, kualitas terjamin dan termurah sekota Medan</p>
        <a href="#catalog" class="btn btn-success mt-3">Sewa Sekarang</a>
      </div>
    </div>
  </div>
</section>

<section class="catalog" id="catalog">
  <div class="container">
    <div class="row text-center">
      <h3>Catalog Mobil</h3>
      <hr>
    </div>
    <div class="row text-center mt-5">
      @foreach ($cars as $car)
        <div class="col-md-4">
          <div class="card shadow" >
            <img src="{{ url('/storage/cars', $car->model) }}" class="card-img-top" alt="{{ $car->merek }}">
            <div class="card-body">
              <h5 class="card-title">{{ $car->merek }}</h5>
              <ul class="list-group">
                <li class="list-group-item">Sisa Unit : {{ $car->jumlah }}</li>
                <li class="list-group-item">Tarif/Hari : Rp. {{ $car->tarif }}</li>
              </ul>
              <a href="{{ route('cart', $car->id) }}" class="btn btn-primary mt-3">Pesan Sekarang</a>
            </div>
          </div>
        </div>
      @endforeach
    </div>
  </div>
</section>
@endsection