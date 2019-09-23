<?php

namespace App\Http\Controllers;

use App\Pisma;
use Illuminate\Http\Request;
use DB;
use PDF;

class PismaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pisma  $pisma
     * @return \Illuminate\Http\Response
     */
    public function show(Pisma $pisma)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pisma  $pisma
     * @return \Illuminate\Http\Response
     */
    public function edit(Pisma $pisma)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pisma  $pisma
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pisma $pisma)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pisma  $pisma
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pisma $pisma)
    {
        //
    }

    public function zf_pdf($id)
    {
        set_time_limit(0);

       $przedsiebiorca = \App\Przedsiebiorca::findOrFail($id);
       //$pdf = PDF::loadView('przedsiebiorca.print_cars', ['przedsiebiorca' => $przedsiebiorca]);
       $dok = DB::table('dok_przed')->where('id_przed' , $przedsiebiorca->id)->get();
      // $cars = DB::table('wykaz_poj')->where('id_przed', $przedsiebiorca->id)->get();
       //$stan = DB::table('dok_przed_wyp')->where('id_przed', $przedsiebiorca->id)->orderBy('id', 'desc')->first();

       //$wypisy = DB::table('dok_przed_wyp')->where('id_przed' , $przedsiebiorca->id)->get();
       $pisma = DB::table('pisma')->where('id_przed' , $przedsiebiorca->id)->get();

        //$nazwa_firmy = $przedsiebiorca->nazwa_firmy;
        $pdf = PDF::loadView('przedsiebiorca.pisma.zf_pdf', ['przedsiebiorca' => $przedsiebiorca,'dok'=> $dok, 'pisma' =>$pisma] );

        return $pdf->download('pismo_zdolnosc_finansowa.pdf');

    }

    public function tresc($id)
    {
        $przedsiebiorca = \App\Przedsiebiorca::findOrFail($id);
        //$pdf = PDF::loadView('przedsiebiorca.print_cars', ['przedsiebiorca' => $przedsiebiorca]);
        $dok = DB::table('dok_przed')->where('id_przed' , $przedsiebiorca->id)->get();
        $cars = DB::table('wykaz_poj')->where('id_przed', $przedsiebiorca->id)->get();
        $stan = DB::table('dok_przed_wyp')->where('id_przed', $przedsiebiorca->id)->orderBy('id', 'desc')->first();

        $wypisy = DB::table('dok_przed_wyp')->where('id_przed' , $przedsiebiorca->id)->get();

        return view('przedsiebiorca.pisma.pismo', compact('przedsiebiorca'));
    }

    public function print_zdol_finans(Request $request, $id)
     {
        $przedsiebiorca = \App\Przedsiebiorca::findOrFail($id);
        $pisma = \App\Pisma::all();
        $pismo = new Pisma;
        $pismo->id_przed = $request->id;
        //$pismo->nazwa = 'Zdolność finansowa';
        $pismo->nr_sprawy = $request->get('nr_sprawy');
        $pismo->data_p = $request->get('data_p');
        $dok = DB::table('dok_przed')->where('id_przed' , $request->id)->get();


        return view('przedsiebiorca.pisma.print_zdol_finans', compact('przedsiebiorca','pisma','dok'));
     }

     public function pismo_gotowe(Request $request, $id)
     {
        $przedsiebiorca = \App\Przedsiebiorca::findOrFail($id);
        $pisma = \App\Pisma::all();
        $pismo = new Pisma;
        $pismo->id_przed = $request->id;
        //$pismo->nazwa = 'Zdolność finansowa';
        $pismo->nr_sprawy = $request->get('nr_sprawy');
        $pismo->data_p = $request->get('data_p');
        $pismo->tresc = $request->get('tresc');
        $pismo->update();

        return view('przedsiebiorca.pisma.podglad', compact('przedsiebiorca','pisma','dok'));
     }
}
