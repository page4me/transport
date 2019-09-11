<?php

namespace App\Http\Controllers;

use App\Pisma;
use Illuminate\Http\Request;

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
        //set_time_limit(0);

       $przedsiebiorca = \App\Przedsiebiorca::findOrFail($id);
       //$pdf = PDF::loadView('przedsiebiorca.print_cars', ['przedsiebiorca' => $przedsiebiorca]);
       $dok = DB::table('dok_przed')->where('id_przed' , $przedsiebiorca->id)->get();
       $cars = DB::table('wykaz_poj')->where('id_przed', $przedsiebiorca->id)->get();
       $stan = DB::table('dok_przed_wyp')->where('id_przed', $przedsiebiorca->id)->orderBy('id', 'desc')->first();

       $wypisy = DB::table('dok_przed_wyp')->where('id_przed' , $przedsiebiorca->id)->get();
    
        //$nazwa_firmy = $przedsiebiorca->nazwa_firmy;
        $pdf = PDF::loadView('przedsiebiorca.pisma.zf_pdf', ['przedsiebiorca' => $przedsiebiorca,'dok'=> $dok, 'cars'=>$cars, 'stan' => $stan , 'wypisy' => $wypisy] );

        return $pdf->stream('pismo_zdolnosc_finansowa.pdf');

    }
}
