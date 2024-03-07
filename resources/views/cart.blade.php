@extends('layouts.home')
@section('title', 'Sewa Mobil')
@section('content')

<section class="catalog" id="catalog">
  <div class="container">
    <div class="row text-center">
      <h3>Detail Mobil</h3>
      <hr>
    </div>
    <div class="card shadow" >
      <div class="row text-center mt-5">
        <div class="col-md-6">
          <img src="{{ url('/storage/cars', $car->model) }}" class="card-img-top" alt="{{ $car->merek }}">
          <div class="card-body">
            <h5 class="card-title">{{ $car->merek }}</h5>
            <ul class="list-group">
              <li class="list-group-item">Sisa Unit : {{ $car->jumlah }}</li>
              <li class="list-group-item">Tarif/Hari : Rp. {{ $car->tarif }}</li>
            </ul>
          </div>
        </div>
        <div class="col-md-6">
          <h5>Pesan Sekarang</h5>
          <hr>
          @if (session('status'))
            <div class="alert alert-danger">
                {{ session('status') }}
            </div>
          @endif
          <form action="{{ route('checkout') }}" method="POST">
            @csrf
            <input type="hidden" name="car_id" value="{{ $car->id }}">
            <div class="form-group mb-3">
              <label for="jumlah">Jumlah Unit</label>
              <input type="number" name="jumlah" class="form-control" id="jumlah" onchange="hitungBiaya()" min="0">
              @error('jumlah')
                <p class="text-danger">{{ $message }}</p>
              @enderror
            </div>
            <div class="form-group mb-3">
              <label for="tgl_sewa">Tanggal Sewa</label>
              <input type="date" name="tgl_sewa" class="form-control" id="tgl_sewa" onchange="hitungBiaya()">
              @error('tgl_sewa')
                <p class="text-danger">{{ $message }}</p>
              @enderror
            </div>
            <div class="form-group mb-3">
              <label for="tgl_pengembalian">Tanggal Pengembalian</label>
              <input type="date" name="tgl_pengembalian" class="form-control" id="tgl_pengembalian" onchange="hitungBiaya()">
              @error('tgl_pengembalian')
                <p class="text-danger">{{ $message }}</p>
              @enderror
            </div>
            <div class="form-group mb-3">
              <label for="totalBiaya">Total Biaya</label>
              <input type="number" name="total_biaya" class="form-control" id="totalBiaya" @readonly(true)>
              @error('total_biaya')
                <p class="text-danger">{{ $message }}</p>
              @enderror
            </div>
            @if (Auth::user())
              <button type="submit" class="btn btn-primary w-100">Pesan</button>
            @else
              <a href="{{ route('login') }}" class="btn btn-danger w-100">Silahkan Login Terlebih Dahulu</a> 
            @endif
          </form>
        </div>
      </div>
    </div>
  </div>
</section>

@push('scripts')
  <script>
    function hitungBiaya() {
      const jumlah = document.querySelector('#jumlah').value;
      const tglSewa = new Date(document.querySelector('#tgl_sewa').value);
      const tglPengembalian = new Date(document.querySelector('#tgl_pengembalian').value);
      const total = document.querySelector('#totalBiaya');
      
      // Menghitung selisih waktu
      const selisihWaktu = tglPengembalian - tglSewa;

      // Menghitung jumlah hari dengan membagi selisih waktu dengan milidetik per hari
      const jumlahHari = Math.floor(selisihWaktu / (1000 * 60 * 60 * 24)) + 1;
      
      // Hitung Total Biaya
      const hitungTotalBiaya = (jumlah * {{ $car->tarif }}) * jumlahHari;
      
      total.value = hitungTotalBiaya;
    }
  </script>
@endpush
@endsection