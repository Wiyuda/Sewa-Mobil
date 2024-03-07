<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CarsRequest;
use App\Http\Requests\UpdateCarsRequest;
use App\Models\Car;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CarsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cars = Car::latest()->get();
        return view('admin.cars.index', compact('cars'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.cars.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CarsRequest $carsRequest)
    {
        $validated = $carsRequest->validated();

        $imageExtension = $carsRequest->file('model')->getClientOriginalExtension();
        $imageName = rand() . '.' . $imageExtension;
        $path = $carsRequest->file('model')->storeAs('cars', $imageName);
        
        $car = new Car($validated);
        $car['model'] = $imageName;
        $car->save();

        return redirect()->route('cars.index')->with('status', 'Data mobil baru berhasil di tambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $car = Car::find($id);
        
        return view('admin.cars.edit', compact('car'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCarsRequest $updateCarsRequest, string $id)
    {
        $validated = $updateCarsRequest->validated();

        $car = Car::find($id);

        if($updateCarsRequest->file('model')) {
            $imageExtension = $updateCarsRequest->file('model')->getClientOriginalExtension();
            $imageName = rand() . '.' . $imageExtension;
            $path = $updateCarsRequest->file('model')->storeAs('cars', $imageName);
        } else {
            $imageName = $car->model;
        }

        $car->update([
            'merek' => $validated['merek'],
            'model' => $imageName,
            'plat' => $validated['plat'],
            'jumlah' => $validated['jumlah'],
            'tarif' => $validated['tarif'],
        ]);

        return redirect()->route('cars.index')->with('status', 'Data mobil berhasil di update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Car::find($id)->delete();

        return redirect()->route('cars.index')->with('status', 'Data mobil berhasil di hapus');
    }
}
