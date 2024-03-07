@extends('layouts.dashboard')
@section('title', 'Data Penyewa Mobil')
@section('content')
  <div class="row">
    <div class="col-12">
      <div class="card shadow">
        <div class="card-body">
          <div class="d-flex justify-content-between mb-3">
            <h4 class="font-weight-bold">Data Penyewa Mobil</h4>
          </div>
          <div class="table-responsive mt-3">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                    <th>#</th>
                    <th>Nama</th>
                    <th>Merek</th>
                    <th>Model</th>
                    <th>Tgl Sewa</th>
                    <th>Jadwal Pengembalian</th>
                    <th>Total Biaya</th>
                </tr>
              </thead>
              <tbody>
                @php
                  $i = 1
                @endphp
                @foreach ($rents as $rent)
                  <tr>
                    <th>{{ $i++ }}</th>
                    <td>{{ $rent->user->name }}</td>
                    <td>{{ $rent->car->merek }}</td>
                    <td>
                      <img src="{{ url('storage/cars', $rent->car->model) }}" alt="{{ $rent->car->merek }}" width="150px" height="100px">
                    </td>
                    <td>{{ $rent->tgl_sewa }}</td>
                    <td>{{ $rent->tgl_pengembalian }}</td>
                    <td>{{ $rent->total_biaya }}</td>
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