<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use PDF;
use RealRashid\SweetAlert\Facades\Alert;

class PrzedsiebiorcaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $przedsiebiorca = \App\Przedsiebiorca::all();
      
        $rodzaje= DB::table('dok_przed')
             ->join('przedsiebiorca', 'przedsiebiorca.id', '=' ,'dok_przed.id_przed')
             ->join('rodzaj_przed', 'rodzaj_przed.id', "=", 'przedsiebiorca.id_osf')
             //->join('dok_przed_wyp', 'dok_przed_wyp.id', "=", 'dok_przed_wyp.id_przed')
             ->select('rodzaj_przed.*','dok_przed.*','przedsiebiorca.*')
             ->get();
        
        $osobowosc = DB::table('rodzaj_przed')->get();
       
       // echo '<pre>';
       // print_r($rodzaje);
        
        return view('przedsiebiorca.index', compact('przedsiebiorca','rodzaje'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $rodzaje= DB::table('rodzaj_przed')->get();
         
        return view('przedsiebiorca.create', compact('rodzaje'));
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Alert::success('Dodano nowego przedsiębiorcę', '');
        $validatedData = $request->validate([
         'id_osf' => 'required',
         'nazwa_firmy' => 'required|max:255',
         'imie' => 'required|max:255',
         'nazwisko' => 'required|max:255',
         'adres' => 'required|max:255',
         'miejscowosc' => 'required|max:255',
         'kod_p' => 'required|max:6',
         'nip' => 'required|max:11',
         'regon' => 'required|max:9',
         'telefon' => 'required|max:10',
         
        ]);
        $przedsiebiorca = \App\Przedsiebiorca::create($validatedData);

        return redirect('/przedsiebiorca/dokumenty/create')->with('success', 'Przedsiebiorca dodany do bazy danych');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $przedsiebiorca = \App\Przedsiebiorca::findOrfail($id);

        $rodzaje= DB::table('dok_przed')
             ->join('przedsiebiorca', 'przedsiebiorca.id', '=' ,'dok_przed.id_przed')
             ->join('rodzaj_przed', 'rodzaj_przed.id', "=", 'przedsiebiorca.id_osf')
             ->join('dok_przed_wyp', 'dok_przed_wyp.id', "=", 'dok_przed_wyp.id_przed')
             ->select('rodzaj_przed.*','dok_przed.*','przedsiebiorca.*','dok_przed_wyp.*')
             ->get();
        
       // echo '<pre>';
        //print_r($rodzaje);
        $osobowosc = DB::table('rodzaj_przed')->where('id', $przedsiebiorca->id)->get();
        $cert = DB::table('cert_komp')->where('id_przed', $przedsiebiorca->id)->get();

        $dok = DB::table('dok_przed')->where('id_przed' , $przedsiebiorca->id)->get();

        

        return view('przedsiebiorca.show', compact('przedsiebiorca','rodzaje','osobowosc','dok','cert'));
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
         $rodzaje= DB::table('rodzaj_przed')->get();

         $przedsiebiorca = \App\Przedsiebiorca::findOrFail($id);
         $dok = DB::table('dok_przed')->where('id_przed' , $przedsiebiorca->id)->get();

         return view('przedsiebiorca.edit', compact('przedsiebiorca', 'rodzaje','dok'));

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
        Alert::success('Zmniany Zapisano', 'Dane przedsiębiorcy zmienione');
         $validatedData = $request->validate([
         'id_osf' => 'required|max:2',
         'nazwa_firmy' => 'required|max:255',
         'imie' => 'required|max:255',
         'nazwisko' => 'required|max:255',
         'adres' => 'required|max:255',
         'miejscowosc' => 'required|max:255',
         'kod_p' => 'required|max:6',
         'nip' => 'required|max:11',
         'regon' => 'required|max:9',
         'telefon' => 'required|max:10',
         
     ]);
     \App\Przedsiebiorca::whereId($id)->update($validatedData);

     return redirect('/przedsiebiorca')->with('success', 'Dane przedsiębiorcy zmienione');
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
            
            $przedsiebiorca = \App\Przedsiebiorca::findOrFail($id);
            $przedsiebiorca->delete();

            return redirect('/przedsiebiorca')->with('danger', 'Dane przedsiębiorcy usunięte');
    }

    public function cars($id)
    {
        //
        $przedsiebiorca = \App\Przedsiebiorca::findOrFail($id);
        $dok = DB::table('dok_przed')->where('id_przed' , $przedsiebiorca->id)->get();
      
        return view('przedsiebiorca.cars', compact('przedsiebiorca','dok'));

    }

    public function gPDF($id)
    {
        //set_time_limit(0);

       $przedsiebiorca = \App\Przedsiebiorca::findOrFail($id);
       //$pdf = PDF::loadView('przedsiebiorca.print_cars', ['przedsiebiorca' => $przedsiebiorca]);
       $dok = DB::table('dok_przed')->where('id_przed' , $przedsiebiorca->id)->get();
       
        //$nazwa_firmy = $przedsiebiorca->nazwa_firmy;
        $pdf = PDF::loadView('przedsiebiorca.print_cars', ['przedsiebiorca' => $przedsiebiorca,'dok'=> $dok] );
        
        return $pdf->stream('wykazpojazdow.pdf');

    }

    public function print_cars($id)
    {
        //
        $przedsiebiorca = \App\Przedsiebiorca::findOrFail($id);
        
       
        return view('przedsiebiorca.print_cars', compact('przedsiebiorca'));
        

    }
}
