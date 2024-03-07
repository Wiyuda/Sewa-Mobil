<?php

namespace App\Http\Controllers;

use App\Http\Requests\CheckoutRequest;
use App\Models\Car;
use App\Models\Rent;
use App\Models\Repayment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        $cars = Car::latest()->get();

        return view('home', compact('cars'));
    }

    public function cart($id)
    {
        $car = Car::find($id);

        return view('cart', compact('car'));

    }

    public function checkout(CheckoutRequest $checkoutRequest)
    {
        $validated = $checkoutRequest->validated();

        DB::beginTransaction();
        try {
            // Mengambil data mobil yang di pilih
            $car = Car::find($checkoutRequest->car_id);

            // Check stok mobil
            if(($car->jumlah - $validated['jumlah']) < 0) {
                return back()->with('status', 'Maaf stok mobil yang kamu pilih telah habis, silahkan pilih mobil lainnya');
            }

            // Mengurangi Stok mobil
            $stokUnit = $car->jumlah - 1;

            // Update Jumlah Mobil
            $car->update(['jumlah' => $stokUnit]);
            
            // Simpan Data Sewa Mobil
            $rent = new Rent($validated);
            $rent['user_id'] = Auth::user()->id;
            $rent['car_id'] = $checkoutRequest->car_id;
            $rent->save();

            // Simpan Jadwal Pengembalian
            $repayment = Repayment::create([
                'user_id' => Auth::user()->id,
                'car_id' => $checkoutRequest->car_id,
                'jadwal_pengembalian' => $validated['tgl_pengembalian'],
            ]);
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();

            $message = 'Maaf sedang terjadi masalah saat anda ingin menyewa mobil, silahkan coba beberapa saat lagi';

            return back()->with('status', $message);
        }

        return redirect()->route('payment', $rent->id);
    }

    public function payment()
    {
        return view('payment');
    }

    public function history()
    {
        $rents = Rent::where('user_id', Auth::user()->id)->with(['user', 'car'])->latest()->get();

        return view('history', compact('rents'));
    }
}
