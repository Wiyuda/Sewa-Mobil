@extends('layouts.dashboard')
@section('title', 'Edit Data Mobil')
@section('content')
  <div class="row">
    <div class="col-12">
      <div class="card shadow">
        <div class="card-body">
          <div class="d-flex justify-content-between">
            <h4 class="font-weight-bold">Edit Data Mobil</h4>
          </div>
          <form action="{{ route('cars.update', $car->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="merek">Merek</label>
                <input type="text" name="merek" class="form-control" id="merek" value="{{ $car->merek }}">
                @error('merek')
                  <p class="text-danger">{{ $message }}</p>
                @enderror
              </div>
              <div class="form-group col-md-6">
                <label for="model">Model</label>
                <input type="file" name="model" class="form-control-file" id="model">
                @error('model')
                  <p class="text-danger">{{ $message }}</p>
                @enderror
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="plat">Plat</label>
                <input type="text" name="plat" class="form-control" id="plat" value="{{ $car->plat }}">
                @error('plat')
                  <p class="text-danger">{{ $message }}</p>
                @enderror
              </div>
              <div class="form-group col-md-6">
                <label for="jumlah">Jumlah</label>
                <input type="number" name="jumlah" class="form-control" id="jumlah" value="{{ $car->jumlah }}">
                @error('jumlah')
                  <p class="text-danger">{{ $message }}</p>
                @enderror
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-12">
                <label for="tarif">Tarif</label>
                <input type="number" name="tarif" class="form-control" id="tarif" value="{{ $car->tarif }}">
                @error('tarif')
                  <p class="text-danger">{{ $message }}</p>
                @enderror
              </div>
            </div>
            <div class="d-flex justify-content-end">
              <a href="{{ route('cars.index') }}" class="btn btn-warning mr-3">Kembali</a>
              <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection