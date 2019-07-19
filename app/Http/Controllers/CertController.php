<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Alert;

class CertController extends Controller
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
        $przedsiebiorca= DB::table('przedsiebiorca')->get();
         
        return view('przedsiebiorca.zarzadzajacy.create', compact('przedsiebiorca'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Alert::success('Dodano nowego zarządzającego', 'Zarządzający przypisany do przedsiębiorcy');
        $validatedData = $request->validate([
         'id_przed' => 'required|max:1',
         'rodzaj' => 'string|max:255|nullable',
         'nr_cert' => 'string|max:255|nullable',
         'imnie_os_z' => 'string|max:255|nullable',
         'nazwisko_os_z' => 'string|max:255|nullable',
         'adres' => 'required|max:255',
         'miasto' => 'required|max:255',
         'dat_ur' => 'required|max:16',
         'dat_wyd' => 'string|max:255|nullable',
         'os_zarz' => 'string|max:255|nullable',
         'umowa' => 'string|max:255|nullable',
         'dat_umowy' => 'string|max:255|nullable',
         'uwagi' => 'string|max:255|nullable'         
        ]);
        $baza = \App\Certyfikat::create($validatedData);

        return redirect('/przedsiebiorca/zabezpieczenie/create')->with('success', 'Baza eksploatacyjna przypisana do przedsiębiorcy');
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
