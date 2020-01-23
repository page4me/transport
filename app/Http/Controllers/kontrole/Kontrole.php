<?php

namespace App\Http\Controllers\kontrole;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Alert;

class Kontrole extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('przedsiebiorca.kontrole.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //
        $dok = DB::table('dok_przed')->where('id_przed' , $request->id_przed)->where('nr_dok' , $request->nr_dok)->get();

        return view('przedsiebiorca.kontrole.create', compact('dok'));
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
        $validatedData = $request->validate([
            'id_przed' => 'required|max:1',
            'id_dok_przed' => 'required|nullable',
            'nazwa' => 'string|max:255|nullable',
            'nr_sprawy' => 'string|max:255|nullable',
            'dat_zawiad' => 'required',
            'dat_roz' => 'required',
            'dat_zak' => 'required',
            'nr_upo' => 'required|max:255',
            'kto' => 'required|max:255',
            'wynik' => 'string|max:255|nullable',
            'zalecenia' => 'string|max:1000|nullable',
            'uwagi' => 'string|max:255|nullable'
           ]);
           $kontrole = \App\Kontrole::create($validatedData);

           $historia_zm = \App\ZmianyPrzed::create(['id_przed' => $request->id_przed, 'id_dok_przed' => $request->id_dok_przed, 'nazwa_zm' => 'Zaplanowano nową kontrolę przedsiębiorcy od '.$request->dat_roz.' do '.$request->dat_zak, 'data_zm' => $request->dat_zawiad]);

        Alert::success('Dodano nową kontrolę', 'Zaplanowano kontrolę przedsiębiorcy');
        return back();

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        //
        $dok = DB::table('dok_przed')->where('nr_dok' , $request->nr_dok)->get();
        $przedsiebiorca = DB::table('przedsiebiorca')->where('id' , $id)->get();

        //print_r($przedsiebiorca);
        //exit;
        foreach($dok as $dk){
            $id_dok = $dk->id;
        }

        $kontrole = DB::table('kontrole')->where('id_dok_przed' , $id_dok)->get();

        //echo "<pre />";
        //print_r($kontrole);

        return view('/przedsiebiorca.kontrole.show', compact('dok', 'kontrole','przedsiebiorca'));


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        //
        return view('przedsiebiorca.kontrole.edit');
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

    public function create_harmo()
    {
        $przedsiebiorca = \App\Przedsiebiorca::all();

        foreach($przedsiebiorca as $pr)
        {
          $id = $pr->id;
        }
        $dok = DB::table('dok_przed')->where('id_przed' ,$id);

        return view('przedsiebiorca.kontrole.new_harmo', compact('przedsiebiorca','dok'));
    }
}
