<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Alert;

class DokPrzedController extends Controller
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
        $przedsiebiorca = \App\Przedsiebiorca::latest()->get();
        
        return view('przedsiebiorca.dokumenty.create', compact('przedsiebiorca'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Alert::success('Dodano nowy dokument', '');
        $validatedData = $request->validate([
         'id_przed' => 'required',
         'nazwa' => 'required|max:255',
         'rodz_dok' => 'required:max:255',
         'nr_dok' => 'required|max:255',
         'nr_druku' => 'required|max:255',
         'nr_sprawy' => 'required|max:255',
         'data_wn' => 'required',
         'data_wyd' => 'required',
         'data_waz' => 'required',
         
        ]);
        $dokumenty = \App\DokumentyPrzed::create($validatedData);

        return redirect('/przedsiebiorca/baza/create')->with('success', 'Dokument dodany do bazy danych');
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
        Alert::success('Zmniany Zapisano', 'Dane dokumentów przedsiębiorcy zmienione');
        $validatedData = $request->validate([
         
         'nazwa' => 'required|max:255',
         'rodz_dok' => 'required:max:255',
         'nr_dok' => 'required|max:255',
         'nr_druku' => 'required|max:255',
         'nr_sprawy' => 'required|max:255',
         'data_wn' => 'required',
         'data_wyd' => 'required',
         'data_waz' => 'required',
         
        ]);
       
        \App\DokumentyPrzed::whereId($id)->update($validatedData);

        return redirect('/przedsiebiorca')->with('success', 'Dane dokumentów przedsiębiorcy zmienione');

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
