<?php

namespace App\Http\Controllers;

use App\Car;
use Illuminate\Http\Request;
use App\Garage;

class GaragesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $garages = Garage::orderBy('garage_name', 'asc')->get();

        // return $cars = Car::where('model', '320D')->get();
        return view('garages.index')->with('garages', $garages);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('garages.create');
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
            'garage_name' => 'required'
        ]);

        $garage = new Garage;
        $garage->garage_name = $request->input('garage_name');
        $garage->save();
        return ($garage->save() !== 1) ?
            redirect('/garages')->with('status_success', 'Garage Created') :
            redirect('/garages')->with('status_error', 'Garage not created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $garage = Garage::find($id);
        return view('garages/show')->with('garage', $garage);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $garage = Garage::find($id);
        return view('garages/edit')->with('garage', $garage);
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
            'garage_name' => 'required'
        ]);

        $garage = Garage::find($id);
        $garage->garage_name = $request->input('garage_name');
        $garage->save();
        return ($garage->save() !== 1) ?
            redirect('/garages')->with('status_success', 'Garage Updated') :
            redirect('/garages')->with('status_error', 'Garage Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cars = Car::where('garage_id', '=',  $id)->get();
        foreach ($cars as $car) {
            $car->garage_id = null;
            $car->save();
        }
        Garage::destroy($id);
        return redirect('/garages')->with('status_success', 'Garage Destroyed');
    }
}
