@extends('layouts.home')
@section('title', 'Riwayat Sewa Mobil')
@section('content')
<div class="container">
  <div class="row text-center">
    <div class="col">
      <h3>Riwayat Sewa Mobil</h3>
    </div>
  </div>
  <hr>
  <div class="row justify-content-center">
    @foreach ($rents as $rent)
        <div class="col-md-4">
          <div class="card shadow" >
            <img src="{{ url('/storage/cars', $rent->car->model) }}" class="card-img-top" alt="{{ $rent->car->merek }}">
            <div class="card-body">
              <h5 class="card-title">{{ $rent->merek }}</h5>
              <ul class="list-group">
                <li class="list-group-item">Jumlah Unit : {{ $rent->jumlah }}</li>
                <li class="list-group-item">Tarif : Rp. {{ $rent->total_biaya }}</li>
                <li class="list-group-item">Tanggal Sewa : {{ $rent->tgl_sewa }}</li>
                <li class="list-group-item">Jadwal Pengembalian : {{ $rent->tgl_pengembalian }}</li>
              </ul>
            </div>
          </div>
        </div>
      @endforeach
  </div>
</div>
@endsection