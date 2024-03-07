<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pembayaran</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>

    <div class="container mt-5">
      <div class="row d-flex justify-content-center text-center align-items-center" style="hight: 100vh">
        <div class="col-5">
          <div class="card shadow">
            <div class="card-body">
              <h1 class="text-success">Sukses</h1>
              <p>Pesanan Mobil Kamu Telah Kami Terima, Selanjutnya Tim Administration Kami Akan Mengirimkan Billing Statment Yang Perlu Kamu Bayarkan</p>
              <a href="{{ route('home') }}" class="btn btn-success w-100">Kembali ke Home Page</a>
            </div>
          </div>
        </div>
      </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>