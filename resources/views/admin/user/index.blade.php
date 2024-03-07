@extends('layouts.dashboard')
@section('title', 'Data Pengguna')
@section('content')
  <div class="row">
    <div class="col-12">
      <div class="card shadow">
        <div class="card-body">
          <div class="d-flex justify-content-between mb-3">
            <h4 class="font-weight-bold">Data Pengguna</h4>
          </div>
          <div class="table-responsive mt-3">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                    <th>#</th>
                    <th>Nama</th>
                    <th>SIM</th>
                    <th>Telpon</th>
                    <th>Alamat</th>
                </tr>
              </thead>
              <tbody>
                @php
                  $i = 1
                @endphp
                @foreach ($users as $user)
                  <tr>
                    <th>{{ $i++ }}</th>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->sim }}</td>
                    <td>{{ $user->no_telp }}</td>
                    <td>{{ $user->alamat }}</td>
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