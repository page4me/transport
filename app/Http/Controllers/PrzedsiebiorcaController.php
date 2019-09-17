<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use PDF;
use RealRashid\SweetAlert\Facades\Alert;
use \App\WykazPoj;
use \App\Pisma;

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

        //$przedsiebiorca = \App\Przedsiebiorca::all();

        $rodzaje= DB::table('dok_przed')
             ->join('przedsiebiorca', 'przedsiebiorca.id', '=' ,'dok_przed.id_przed')
             ->join('rodzaj_przed', 'rodzaj_przed.id', "=", 'przedsiebiorca.id_osf')
             ->select('rodzaj_przed.*','dok_przed.*','przedsiebiorca.*')
             ->paginate(15);

        $zdolnosc = \App\Zdolnosc::all();

        return view('przedsiebiorca.index', compact('rodzaje','zdolnosc'));
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
        $zab = DB::table('zdol_finans')->where('id_przed', $przedsiebiorca->id)->get();
        $baza = DB::table('baza_eksp')->where('id_przed', $przedsiebiorca->id)->get();
        $cars = DB::table('wykaz_poj')->where('id', $przedsiebiorca->id)->get();



        return view('przedsiebiorca.show', compact('przedsiebiorca','rodzaje','osobowosc','dok','cert','baza','zab','cars'));
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
         $baza = DB::table('baza_eksp')->where('id_przed' , $przedsiebiorca->id)->get();
         $osz = DB::table('cert_komp')->where('id_przed' , $przedsiebiorca->id)->get();
         $zdf = DB::table('zdol_finans')->where('id_przed' , $przedsiebiorca->id)->get();

         return view('przedsiebiorca.edit', compact('przedsiebiorca', 'rodzaje','dok','baza','osz','zdf'));

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

     $przedsiebiorca = DB::table('przedsiebiorca')->where('id' , $id)->get();

     foreach($przedsiebiorca as $przed){
        $firma = $przed->nazwa_firmy;
        $adres = $przed->adres;
     }

     $data_zm = date('Y-m-d');

    // zapisanie historii wykonanych zmian danych przedsiebiorcy
    if($request->nazwa_firmy <> $firma) {
        $historia_zm = \App\ZmianyPrzed::create(['id_przed' => $id, 'id_dok_przed' => null, 'nazwa_zm' => 'Zmiana nazwy firmy z '. $firma .' na '.$request->nazwa_firmy, 'data_zm' => $data_zm]);
    }elseif($request->adres <> $adres) {
        $historia_zm = \App\ZmianyPrzed::create(['id_przed' => $id, 'id_dok_przed' => null, 'nazwa_zm' => 'Zmiana adresu firmy z '. $adres .' na '.$request->adres, 'data_zm' => $data_zm]);
    }

    // koniec zapisu historii zmian

     \App\Przedsiebiorca::whereId($id)->update($validatedData); //update danych przedsiebiorcy

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

    public function cars(Request $request,$id)
    {
        //
        $przedsiebiorca = \App\Przedsiebiorca::findOrFail($id);
        $dok = DB::table('dok_przed')->where('id_przed' , $przedsiebiorca->id)->get();
        $cars = DB::table('wykaz_poj')->where('id_przed', $przedsiebiorca->id)->get();

        $stan = DB::table('wykaz_poj')->where('id_przed', $przedsiebiorca->id)->orderBy('stan', 'desc')->first();

        return view('przedsiebiorca.cars', compact('przedsiebiorca','dok','cars','stan'));

    }

    public function gPDF($id)
    {
        //set_time_limit(0);

       $przedsiebiorca = \App\Przedsiebiorca::findOrFail($id);
       //$pdf = PDF::loadView('przedsiebiorca.print_cars', ['przedsiebiorca' => $przedsiebiorca]);
       $dok = DB::table('dok_przed')->where('id_przed' , $przedsiebiorca->id)->get();
       $cars = DB::table('wykaz_poj')->where('id_przed', $przedsiebiorca->id)->get();
       $stan = DB::table('wykaz_poj')->where('id_przed', $przedsiebiorca->id)->orderBy('id', 'desc')->first();
        //$nazwa_firmy = $przedsiebiorca->nazwa_firmy;

        $pdf = PDF::loadView('przedsiebiorca.print_cars', ['przedsiebiorca' => $przedsiebiorca,'dok'=> $dok, 'cars'=>$cars, 'stan' => $stan ] );
        //$pdf->output();
        //$dom_pdf = $pdf->getDomPDF();

        //$canvas = $dom_pdf ->get_canvas();
        //$canvas->page_text(10, 10, "Strona {PAGE_NUM} z {PAGE_COUNT}", null, 10, array(0, 0, 0));

        return $pdf->stream('wykazpojazdow.pdf');

    }

    public function print_cars($id)
    {
        //
        $przedsiebiorca = \App\Przedsiebiorca::findOrFail($id);


        return view('przedsiebiorca.print_cars', compact('przedsiebiorca'));


    }

    public function wypisy($id)
    {
        //
        $przedsiebiorca = \App\Przedsiebiorca::findOrFail($id);
        $dok = DB::table('dok_przed')->where('id_przed' , $przedsiebiorca->id)->get();
        $wypisy = DB::table('dok_przed_wyp')->where('id_przed', $przedsiebiorca->id)->get();

        return view('przedsiebiorca.wypisy', compact('przedsiebiorca','dok','wypisy'));

    }

     public function pojazdy($id)
    {
        //
        $przedsiebiorca = \App\Przedsiebiorca::findOrFail($id);
        $dok = DB::table('dok_przed')->where('id_przed' , $przedsiebiorca->id)->get();

        return view('przedsiebiorca.pojazdy.create', compact('przedsiebiorca','dok'));


    }

    public function stare_zf()
    {
        $zdolnosc = \App\Zdolnosc::all();

        return view('przedsiebiorca.zabezpieczenie.stare', compact('zdolnosc'));
    }

    public function stare_bz()
    {
        $baza = \App\Baza::all();

        return view('przedsiebiorca.baza.stare', compact('baza'));
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
       /*$pismo->tresc = '
        <p>Starosta Koszaliński na podstawie art. 83 ust. 1 ustawy z dnia 6 września 2001 r. o transporcie drogowym (Dz. U. z 2019 r., poz. 58 z późn. zm.)
        oraz § 2 ust. 3 rozporządzenia Ministra Infrastruktury i Rozwoju z dnia 8 września 2014 roku w sprawie danych i informacji, które przewoźnik
        drogowy jest obowiązany przekazywać do organu w związku z prowadzoną działalnością w zakresie przewozu drogowego (Dz.U. z 2014 r., poz.1217)
        nakłada na Pana obowiązek przedłożenia w terminie 21 dni od dnia otrzymania tego pisma, dokumentów potwierdzających spełnienie wymagań
        ustawowych do otrzymanego „zezwolenia na wykonywanie zawodu przewoźnika drogowego” </p>
        <p> wyrażonego licencją: nr udzieloną dnia 31 stycznia
        2011 roku na wykonywanie krajowego transportu drogowego rzeczy. tj.: </p>
        <p>- dokumenty potwierdzające spełnienie warunków, o których mowa w
        art. 7 rozporządzenia (WE) nr 1071/2009 związane z wymogiem zdolności finansowej. Przedsiębiorca musi być w stanie w każdym momencie roku
        finansowego spełnić swoje zobowiązania finansowe. W tym celu przedsiębiorca wykazuje na podstawie poświadczonych przez audytora lub odpowiednio
        upoważnioną osobę rocznych sprawozdań finansowych, że co roku dysponuje kapitałem i rezerwami o wartości co najmniej równej 9 000 EUR w przypadku
        wykorzystywania tylko jednego pojazdu i 5 000 EUR na każdy dodatkowy wykorzystywany pojazd. </p>
        <p>- wykaz pojazdów zawierający następujące informacje:
            markę, typ; 2) rodzaj/przeznaczenie; 3) numer rejestracyjny; 4) numer VIN; wskazanie rodzaju tytułu prawnego do dysponowania pojazdem wraz z
            kserokopiami dowodów rejestracyjnych, z aktualnymi badaniami technicznymi; W drodze odstępstwa właściwy organ może zgodzić się lub wymagać,
            aby przedsiębiorca wykazał swoją zdolność finansową za pomocą zabezpieczenia, takiego jak gwarancja bankowa lub ubezpieczenie, w tym
            ubezpieczenie odpowiedzialności zawodowej z jednego lub kilku banków lub innych instytucji finansowych, w tym przedsiębiorstw ubezpieczeniowych,
            składających solidarną gwarancję za przedsiębiorstwo na kwoty określone przy posiadaniu pojazdów samochodowych przeznaczonych do transportu
            drogowego.</p>
        <p>Pouczenie</p>
        <p>Jednocześnie informuję, że jeśli organ udzielający „zezwolenia na wykonywanie zawodu przewoźnika drogowego” wyrażonego licencją na
        wykonywanie krajowego transportu drogowego rzeczy, stwierdzi niespełnienie przez przedsiębiorcę wymogów będących podstawą do wydania
        tego dokumentu, organ ten zawiesza lub cofa zezwolenie (licencję) na wykonywanie zawodu przewoźnika drogowego.</p><br /><br /><br />
        <p>Otrzymuje:</p>
        <p>1. Adresat</p>
        <p>2. A/a</p>
        <p>UWAGA: wszelkie informacje można uzyskać pod nr telefonu 94 71 40 116 lub w pokoju nr 116 w Wydziale Komunikacji i Dróg Starostwa
        Powiatowego w Koszalinie</p>
        ';*/
        //$pismo->save();

        return view('przedsiebiorca.pisma.print_zdol_finans', compact('przedsiebiorca','pisma'));
     }

     public function search(Request $request){
        $search = $request->get('search');
        //$przedsiebiorca = DB::Table('przedsiebiorca')->where('nazwisko','like','%'.$search.'%')->paginate(5);
        $rodzaje= DB::table('dok_przed')
             ->join('przedsiebiorca', 'przedsiebiorca.id', '=' ,'dok_przed.id_przed')
             ->join('rodzaj_przed', 'rodzaj_przed.id', "=", 'przedsiebiorca.id_osf')
             ->select('rodzaj_przed.*','dok_przed.*','przedsiebiorca.*')
             ->where('nazwisko','like','%'.$search.'%')
             ->orWhere('nazwa_firmy','like','%'.$search.'%')
             ->orWhere('nazwa','like','%'.$search.'%')
             ->orWhere('nip','like','%'.$search.'%')
             ->orWhere('nr_dok','like','%'.$search.'%')
             ->paginate(15);

        return view('przedsiebiorca.index', ['rodzaje' => $rodzaje]);

     }
}
