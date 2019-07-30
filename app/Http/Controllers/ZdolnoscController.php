<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Alert;

class ZdolnoscController extends Controller
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
         $przedsiebiorca = \App\Przedsiebiorca::latest()->get();

        return view('przedsiebiorca.zabezpieczenie.create', compact('przedsiebiorca'));
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

        Alert::success('Dodano nowe zabezpieczenie', 'Zdolnosć finansowa przypisana do przedsiębiorcy');
        $validatedData = $request->validate([
         'id_przed' => 'required|max:1',
         'nazwa' => 'string|max:255|nullable',
         'numer' => 'string|max:255|nullable',
         'data_od' => 'string|max:255|nullable',
         'data_do' => 'string|max:255|nullable',
         'ile_poj' => 'required|max:255',
         'suma_zab' => 'required|max:255',
         'status' => 'required|max:16|nullable',
         'uwagi' => 'string|max:255|nullable'
        ]);
        $baza = \App\Zdolnosc::create($validatedData);

        return redirect('/przedsiebiorca')->with('success', 'Baza eksploatacyjna przypisana do przedsiębiorcy');
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
}
