@extends('layouts.dashboard')
@section('title', 'Data Mobil')
@section('content')
  <div class="row">
    <div class="col-12">
      <div class="card shadow">
        <div class="card-body">
          <div class="d-flex justify-content-between mb-3">
            <h4 class="font-weight-bold">Data Mobil</h4>
            <a href="{{ route('cars.create') }}" class="btn btn-primary">Tambah Data Mobil</a>
          </div>
          @if (session('status'))
              <div class="alert alert-success">
                  {{ session('status') }}
              </div>
          @endif
          <div class="table-responsive mt-3">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                    <th>#</th>
                    <th>Merek</th>
                    <th>Model</th>
                    <th>Plat</th>
                    <th>Jumlah</th>
                    <th>Tarif</th>
                    <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                @php
                  $i = 1
                @endphp
                @foreach ($cars as $car)
                  <tr>
                    <th>{{ $i++ }}</th>
                    <td>{{ $car->merek }}</td>
                    <td>
                      <img src="{{ url('storage/cars', $car->model) }}" alt="{{ $car->merek }}" width="150px" height="100px">
                    </td>
                    <td>{{ $car->plat }}</td>
                    <td>{{ $car->jumlah }}</td>
                    <td>{{ $car->tarif }}</td>
                    <td>
                      <a href="{{ route('cars.edit', $car->id) }}" class="btn btn-info">Edit</a>
                      <form action="{{ route('cars.destroy', $car->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-danger d-inline">Hapus</button>
                      </form>
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
@endsection