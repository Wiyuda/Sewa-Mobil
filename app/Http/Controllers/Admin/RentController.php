<?php

namespace App\Http\Controllers\Admin;

use App\Models\Rent;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RentController extends Controller
{
    public function index()
    {
        $rents = Rent::with(['user', 'car'])->latest()->get();

        return view('admin.rent.index', compact('rents'));
    }
}
