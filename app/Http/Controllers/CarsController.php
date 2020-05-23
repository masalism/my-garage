<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Car;

class CarsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $cars = Car::all();
        $cars = Car::orderBy('manufacturer', 'asc')->paginate(10);
        // return $cars = Car::where('model', '320D')->get();
        return view('cars.index')->with('cars', $cars);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cars.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'manufacturer' => 'required',
            'model' => 'required',
            'year' => 'required',
            'price' => 'required'
        ]);

        $car = new Car;
        $car->manufacturer = $request->input('manufacturer');
        $car->model = $request->input('model');
        $car->year = $request->input('year');
        $car->price = $request->input('price');
        $car->save();
        // return redirect('/cars');
        return ($car->save() !== 1) ?
            redirect('/cars')->with('status_success', 'Car Added') :
            redirect('/cars')->with('status_error', 'Car Was Not Added');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $car = Car::find($id);
        return view('cars/show')->with('car', $car);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $car = Car::find($id);
        return view('cars/edit')->with('car', $car);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'manufacturer' => 'required',
            'model' => 'required',
            'year' => 'required',
            'price' => 'required'
        ]);

        $car = Car::find($id);
        $car->manufacturer = $request->input('manufacturer');
        $car->model = $request->input('model');
        $car->year = $request->input('year');
        $car->price = $request->input('price');
        $car->save();
        // return redirect('/cars');
        return ($car->save() !== 1) ?
            redirect('/cars')->with('status_success', 'Car Updated') :
            redirect('/cars')->with('status_error', 'Car Was Not Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Car::destroy($id);
        return redirect('/cars')->with('status_success', 'Car Removed');
    }
}
