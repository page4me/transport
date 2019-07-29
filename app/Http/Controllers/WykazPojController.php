<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Alert;

class WykazPojController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        //$przedsiebiorca = \App\Przedsiebiorca::all();

       // $cars = DB::table('wykaz_poj')->where('id', $przedsiebiorca->id)->get();

       // return view('przedsiebiorca.show', compact('przedsiebiorca','cars'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $przedsiebiorca= DB::table('wykaz_poj')->get();
         
        return view('przedsiebiorca.cars', compact('przedsiebiorca'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        // $przedsiebiorca = \App\Przedsiebiorca::findOrFail($id);
       // Alert::success('Dodano nowy pojazd', '');
        $validatedData = $request->validate([
         'id_przed' => 'required',
         'id_dok_przed' => 'required',
         'rodzaj_poj' => 'required|max:255',
         'marka' => 'required|max:255',
         'nr_rej' => 'required|max:255',
         'nr_vin' => 'required|max:255',
         'dmc' => 'required|max:255',
         'wlasnosc' => 'required|max:255',
         'data_wpr' => 'required|max:11',
         'status' => 'default|1',
                  
        ]);
        $pojazdy = \App\WykazPoj::create($validatedData);
       
       // $dok = DB::table('wykaz_poj')->where('id_przed' , $przed->id)->get();

        return redirect('przedsiebiorca/cars/'.$request->id_przed)->with('success', 'Przedsiebiorca dodany do bazy danych');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $cars = \App\WykazPoj::findOrFail($id);
         //$dok = DB::table('dok_przed')->where('id_przed')->get();
         //echo '<pre/>';
         //print_r($cars);
         return view('przedsiebiorca.pojazdy.edit', compact('cars'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        Alert::success('Zapisano zmiany', '');
        $cars = \App\WykazPoj::findOrFail($request->idcar);
        
        $cars->update($request->all());

        //return back();
        
       /* $validatedData = $request->validate([
         'id_przed' => 'required',
         'id_dok_przed' => 'required',
         'rodzaj_poj' => 'required|max:255',
         'marka' => 'required|max:255',
         'nr_rej' => 'required|max:255',
         'nr_vin' => 'required|max:255',
         'dmc' => 'required|max:255',
         'wlasnosc' => 'required|max:255',
         'data_wpr' => 'required|max:11',
         'status' => 'default|1',
                  
        ]);
        \App\WykazPoj::whereId($id)->update($validatedData);
        */
        return redirect('/przedsiebiorca/cars/'.$request->id_przed)->with('success', 'Zapisano zmiany');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

   public function wycofaj($id)
    {
       
      $cars = \App\WykazPoj::findOrFail($id);
      
      //$cars->update(['status'=>'2']);
      //echo '<pre />';
      //print_r($cars);

    }



}
