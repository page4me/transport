<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Alert;
use PDF;

class WypisyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        //
         $przedsiebiorca = \App\Przedsiebiorca::findOrfail($id);
         $wypisy =  DB::table('dok_przed_wyp')->where('id_przed', $przedsiebiorca->id)->get();
         $dok = DB::table('dok_przed')->where('id_przed', $przedsiebiorca->id)->get();;
         $stan = DB::table('dok_przed_wyp')->where('id_przed', $przedsiebiorca->id)->orderBy('id', 'desc')->first();

         return view('przedsiebiorca.wypisy.index', compact('przedsiebiorca','wypisy','dok','stan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $przedsiebiorca = \App\Przedsiebiorca::latest()->get();
         $dok = DB::table('dok_przed')->get();

         return view('przedsiebiorca.wypisy.create', compact('przedsiebiorca','dok'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Alert::success('Dodano nowy wypis', '');
        $validatedData = $request->validate([
         'id_przed' => 'required',
         'id_dok_przed' => 'required',
         'nazwa' => 'required|max:255',
         'rodzaj_wyp' => 'required:max:255',
         'nr_wyp' => 'string|max:255',
         'nr_druku' => 'string|max:255',
         'nr_sprawy' => 'required|max:255',
         'data_wn' => 'required',
         'data_wyd' => 'required',

        ]);
        $dokumenty = \App\Wypisy::create($validatedData);

        return redirect('/przedsiebiorca/wypisy/'.$request->id_przed)->with('success', 'Dokument dodany do bazy danych');
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
        //
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
        //
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

    public function wypisyPDF($id)
    {
        //set_time_limit(0);

       $przedsiebiorca = \App\Przedsiebiorca::findOrFail($id);
       //$pdf = PDF::loadView('przedsiebiorca.print_cars', ['przedsiebiorca' => $przedsiebiorca]);
       $dok = DB::table('dok_przed')->where('id_przed' , $przedsiebiorca->id)->get();
       $cars = DB::table('wykaz_poj')->where('id_przed', $przedsiebiorca->id)->get();
       $stan = DB::table('dok_przed_wyp')->where('id_przed', $przedsiebiorca->id)->orderBy('id', 'desc')->first();

       $wypisy = DB::table('dok_przed_wyp')->where('id_przed' , $przedsiebiorca->id)->get();
        //$nazwa_firmy = $przedsiebiorca->nazwa_firmy;
        $pdf = PDF::loadView('przedsiebiorca.wypisy.print_wypisy', ['przedsiebiorca' => $przedsiebiorca,'dok'=> $dok, 'cars'=>$cars, 'stan' => $stan , 'wypisy' => $wypisy] );

        return $pdf->stream('wypisy.pdf');

    }

    public function print_wypisy($id)
    {
        //
        $przedsiebiorca = \App\Przedsiebiorca::findOrFail($id);


        return view('przedsiebiorca.print_cars', compact('przedsiebiorca'));


    }
}
