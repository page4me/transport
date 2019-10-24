
@extends('layouts.app')

@section('content')
<div class="container">
<div class="card uper">
        @foreach ($rodzaje as $rodz)
        @endforeach
        @foreach($dok as $dk)
        @endforeach

        @php $id_dok = \App\DokumentyPrzed::all()->where('nr_dok','=',$rodz->nr_dok); @endphp

        @foreach($id_dok as $id)
         @php $id_d = $id->id @endphp
        @endforeach

  <div @if($przedsiebiorca->status =="0") class="card-header bg-dark text-light" @elseif($przedsiebiorca->status =="2") class="card-header bg-warning"  @elseif($przedsiebiorca->status =="3") class="card-header bg-danger text-light" @endif>

   Dane szczegółowe przedsiębiorcy -
     <span @if($przedsiebiorca->status =="2") style="color: #000000;font-size:16px;" @else style="color: #00ddff;font-size:16px;"  @endif > Nr licencji / zezwolenia:

         @if(!empty($rodz->nr_dok)) {{ $rodz->nr_dok}} @else brak @endif

     </span><span @if($przedsiebiorca->status =="2") style="color: #000000;font-size:16px;" @else style="color: #fff;font-size:16px;" @endif>wydano dn. {{ $rodz->data_wyd}}   r.</span>

  </div>
  <div class="card-body">
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
       <div class="row">
          <div class=" col-md-3">
              <label for="Nazwa firmy"><strong>Nazwa firmy - zgodnie z CEIDG: <br />Rodzaj:</strong>
               @foreach($osobowosc as $row)
                {{$row->rodzaj}}
               @endforeach

             </label>
              <div>{{$przedsiebiorca->nazwa_firmy }}<br />{{$przedsiebiorca->adres}}<br />{{$przedsiebiorca->kod_p}} {{$przedsiebiorca->miejscowosc}}</div><br />
              <div><strong>NIP:</strong> {{$przedsiebiorca->nip}}</div>
              <div><strong>REGON:</strong> {{$przedsiebiorca->regon}}</div>
          </div>
          <div class="col-md-3">
              <strong>Własciciel:</strong><br />
              {{$przedsiebiorca->nazwisko}} {{$przedsiebiorca->imie}} <br />
              <strong>Dane kontatkowe:</strong><br />
              telefon: +48 {{$przedsiebiorca->telefon}} <br />
              e-mail: {{$przedsiebiorca->email}}
              <br />
              <br />
               <div>
                 <strong>Wydanych wypisów:</strong>
                   <span class="badge badge-warning" style="font-size:13px;">
                      {{$count = \App\Wypisy::where('id_przed','=',$przedsiebiorca->id)->where('id_dok_przed','=', $id_d)->count()}}
                    </span><br />
                 <strong>W depozycie wypisów: </strong><span class="badge badge-danger" style="font-size:12px;">
                   {{$count1 = \App\Wypisy::where('status','=','2')->where('id_przed','=',$przedsiebiorca->id)->where('id_dok_przed','=', $id_d)->count()}}

                 </span><br />
                 @if($dk->nazwa == 'Licencja Pośrednictwo')
                       <span class="badge badge-warning" style="font-size:13px;"> nie dotyczny</span>

                 @else
                            @if($count ==0)
                                &nbsp; <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#nowyWypis">Dodaj wypis</button>
                                                <!-- Modal -->
                                    <div class="modal fade" id="nowyWypis" tabindex="-1" role="dialog" aria-labelledby="nowyWypisCenterTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header  bg-dark">
                                            <div class="card-header bg-dark text-light" >
                                                Lista wypisów przedsiębiorcy o  -
                                                <span style="color: #00ddff;font-size:16px;"> Nr licencji / zezwolenia:
                                                    @foreach($dok as $dk)
                                                    {{ $dk->nr_dok }}

                                                </span><span style="color: #fff;font-size:16px;">wydano dn. {{ $dk->data_wyd}}   r.</span>

                                                    @endforeach
                                                </div>
                                            <button type="button" class="close text-light" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                            </div>
                                            <div class="modal-body">
                                                <!-- Form add new car -->
                                                    <form method="post" action="{{ route('wypisy.store') }}">
                                                <div class="row">
                                                        @csrf
                                                    <div class="col-md-4 form-group">
                                                        <label for="nr_wyp"><strong>Numer wypisu:</strong></label>
                                                        <input type="text" class="form-control" name="nr_wyp"/>
                                                    </div>
                                                    <div class="col-md-4 form-group">
                                                        <label for="nr_druk"><strong>Nr druku:</strong></label>
                                                        <input type="text" class="form-control" name="nr_druku"/>
                                                    </div>
                                                    <div class="col-md-4 form-group">
                                                        <label for="id_dok_przed"><strong>Nr dokumentu:</strong></label>
                                                        <input type="text" class="form-control" name="_id_dok_przed" placeholder="{{$dk->nr_dok}}" disabled="disabled" />
                                                        <input type="hidden" class="form-control" name="id_dok_przed" value="{{$dk->nr_dok}}" />
                                                    </div>
                                                </div>

                                                <div class="row">

                                                    <div class="col-md-6 form-group">
                                                    <label for="nazwa"><strong>Nazwa dokumentu:</strong></label>
                                                    <input type="text" class="form-control" name="_nazwa" value="{{$dk->nazwa}}" disabled="disabled" />
                                                    <input type="hidden" class="form-control" name="nazwa" value="{{$dk->nazwa}}" />
                                                    </div>
                                                    <div class="col-md-6 form-group">
                                                        <label for="nazwa_wyp"><strong>Rodzaj dokuemntu:</strong></label>
                                                        <input type="text" class="form-control" name="_nazwa" value="{{$dk->rodz_dok}}" disabled="disabled" />
                                                        <input type="hidden" class="form-control" name="rodzaj_wyp" value="{{$dk->rodz_dok}}" />
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-4 form-group">
                                                        <label for="data_wn"><strong>Data wniosku:</strong></label>
                                                        <input type="date" class="form-control" name="data_wn"/>
                                                    </div>
                                                    <div class="col-md-4 form-group">
                                                        <label for="data_wyd"><strong>Data wydania:</strong></label>
                                                        <input type="date" class="form-control" name="data_wyd" />
                                                    </div>
                                                    <div class="col-md-4 form-group">
                                                        <label for="nr_sprawy"><strong>Numer sprawy:</strong></label>
                                                        <input type="text" class="form-control" name="nr_sprawy" />
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12 form-group">
                                                        <label for="uwagi"><strong>Uwagi:</strong></label>
                                                        <input type="text" class="form-control" name="uwagi"/>
                                                    </div>
                                                </div>
                                                <input type="hidden" name="id_przed" value="{{$dk->id_przed}}" />
                                                <input type="hidden" name="id_dok_przed" value="{{$dk->id}}" />
                                            </div>
                                            <div class="modal-footer">

                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Zamknij</button>
                                            <button type="submit" class="btn btn-success">Dodaj</button>
                                            </form>
                                            </div>
                                        </div>
                                        </div>


                                    </div>
                                @else
                                <a class="btn btn-sm btn-primary" href="/przedsiebiorca/{{$rodz->id}}/dokument/{{$rodz->nr_dok}}/wypisy/">Wypisy</a>
                            @endif
                    @endif
               </div>
          </div>
          <div class="col-md-3">
            <!-- Dane dotyczace Certyfikatu Kompetencji Zawodowych -->
            @foreach($cert as $ck)
               @if($ck->nr_cert == 'b/d')

               @else
                    <div><strong>Osoba zarządzająca</strong></div>
                    <div>

                        @if(!empty($ck->id)) {{$ck->imie_os_z}} {{$ck->nazwisko_os_z}} @else brak @endif

                    </div>
                    <div>
                        @if(!empty($ck->id))
                            @if(!empty($ck->dat_umowy))
                                    @if($ck->dat_umowy < date('Y-m-d'))
                                    Umowa do dnia -
                                    <span class="badge badge-danger" style="font-size:11px;">
                                    {{$ck->dat_umowy}} r.<br/>
                                    {{$ck->umowa}} <br />
                                    po terminie {{$dni = (strtotime($ck->dat_umowy) - strtotime(date('Y-m-d'))) / (60*60*24)}} dni
                                    </span> <br /><a href="/przedsiebiorca/{{$rodz->id}}/dokumenty/{{$rodz->nr_dok}}/pisma/zarzadzajacy/tresc/" role="button" class="btn btn-warning btn-sm" style="font-size:10px;">przygotuj pismo inf.</a>
                                    @else
                                    Umowa do dnia -
                                    <span class="badge badge-success" style="font-size:13px;">    {{$ck->dat_umowy}} r.</span> <br/>
                                        {{$ck->umowa}}
                                    @endif
                            @else
                                    Zarządzający: Właściciel
                            @endif
                        @else
                            brak
                        @endif
                    </div>



                <div><strong>Certyfikat kompetencji:</strong><br />@if(!empty($ck->id))<span style="color:#0041a8;font-weight: bold;">{{$ck->rodzaj}}</span>@else brak @endif / Nr @if(!empty($ck->id)) {{$ck->nr_cert}} @else brak <br /><br /> @endif</div><br />
                @endif

            @endforeach

             <!-- Koniec Dane dotyczace Certyfikatu Kompetencji Zawodowych -->
              <div>

                      <strong>Ilość pojazdów:</strong>
                       <span class="badge badge-warning" style="font-size:13px;">
                          {{$count = \App\WykazPoj::where('id_przed','=',$rodz->id_przed)->where('status','=','1')->where('id_dok_przed','=', $id_d)->count()}}

                       </span><br />&nbsp;
                           @if($dk->nazwa == 'Licencja Pośrednictwo')
                             <span class="badge badge-warning" style="font-size:13px;"> nie dotyczny</span>
                           @else
                                @if($count ==0)
                                &nbsp; <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#exampleModalCenter">Dodaj nowy</button>

                                    <!-- Modal -->
                                        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header  bg-dark">
                                                <div class="card-header bg-dark text-light" >
                                                    Wykaz pojazdów przedsiębiorcy o  -
                                                    <span style="color: #00ddff;font-size:16px;"> Nr licencji / zezwolenia:

                                                        {{ $rodz->nr_dok }}
                                                        @php $dok_przed = \App\DokumentyPrzed::where('nr_dok','=', $rodz->nr_dok)->get()   @endphp
                                                       @foreach($dok_przed as $dkp)

                                                       @endforeach
                                                    </span><span style="color: #fff;font-size:16px;">wydano dn. {{ $rodz->data_wyd}}   r.</span>


                                                    </div>
                                                <button type="button" class="close text-light" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                                </div>
                                                <div class="modal-body">
                                                    <!-- Form add new car -->
                                                        <form method="post" action="{{ route('pojazdy.store') }}">
                                                    <div class="row">
                                                            @csrf
                                                        <div class="col-md-12 form-group">
                                                            <label for="nr_rej"><strong>Numer rejestracyjny:</strong></label>
                                                            <input type="text" class="form-control" name="nr_rej"/>
                                                        </div>
                                                    </div>

                                                    <div class="row">

                                                        <div class="col-md-4 form-group">
                                                            <label for="nr_dok"><strong>Rodzaj pojazdu:</strong></label>

                                                            <select name="rodzaj_poj" class="form-control">
                                                            <option value="samochód ciężarowy">samochód ciężarowy</option>
                                                            <option value="ciągnik samochodowy">ciągnik samochodowy</option>
                                                            <option value="samochód specjany">samochód specjalny</option>
                                                            <option value="autobus">autobus</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-md-4 form-group">
                                                            <label for="kod_p"><strong>Marka:</strong></label>
                                                            <input type="text" class="form-control" name="marka">
                                                        </div>
                                                        <div class="col-md-4 form-group">
                                                            <label for="nr_druku"><strong>Nr VIN:</strong></label>
                                                            <input type="text" class="form-control" name="nr_vin" maxlength="17" />
                                                        </div>

                                                    </div>


                                                    <div class="row">
                                                        <div class="col-md-4 form-group">
                                                            <label for="nr_sprawy"><strong>DMC:</strong></label>
                                                            <input type="text" class="form-control" name="dmc"/>
                                                        </div>
                                                        <div class="col-md-4 form-group">
                                                            <label for="tel"><strong>Prawo do dysponowania:</strong></label>
                                                            <select name="wlasnosc" class="form-control">
                                                                <option value="wlasność">własność</option>
                                                                <option value="leasing">leasing</option>
                                                                <option value="najem">najem</option>
                                                                <option value="użyczenie">użyczenie</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-md-4 form-group">
                                                            <label for="tel"><strong>Data wprowadzenia:</strong></label>
                                                            <input type="date" class="form-control" name="data_wpr" />
                                                        </div>

                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12 form-group">
                                                            <label for="uwagi"><strong>Uwagi:</strong></label>
                                                            <input type="text" class="form-control" name="uwagi"/>
                                                        </div>
                                                    </div>
                                                    <input type="hidden" name="id_przed" value="{{$rodz->id_przed}}" />


                                                <input type="hidden" name="id_dok_przed" value="{{$dkp->id}}" />

                                                </div>
                                                <div class="modal-footer">

                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Zamknij</button>
                                                <button type="submit" class="btn btn-success">Dodaj</button>
                                                </form>
                                                </div>
                                            </div>
                                            </div>


                                        </div>
                                @else


                                    <a class="btn btn-sm btn-primary" href="{{route('cars',['id'=>$rodz->id_przed, 'nr_dok'=>$rodz->nr_dok])}}">Wykaz pojazdów</a>
                                @endif
                            @endif

                        </div>
                    </div>
                    <div class="col-md-3">
                        <!-- Dane dotyczace Bazy eksploatacyjnej -->
                        @foreach ($baza as $bz)
                          @if($bz->adres == 'b/d')

                          @else
                            <div><strong>Baza eksploatacyjna</strong></div>
                            <div><strong>Adres:</strong> <br />{{$bz->adres}}<br /> {{$bz->kod_p}} {{$bz->miasto}}</div>
                            <div>
                            @if(!empty($bz->dat_umowy))
                                @if($bz->dat_umowy < date('Y-m-d'))
                                Umowa do dnia
                                    <span class="badge badge-danger" style="font-size:11px;">
                                    {{$bz->dat_umowy}} r.<br/>

                                    po terminie {{$dni = (strtotime($bz->dat_umowy) - strtotime(date('Y-m-d'))) / (60*60*24)}} dni
                                    </span>
                                    @else
                                    Umowa do dnia
                                    <span class="badge badge-success" style="font-size:11px;">  {{$bz->dat_umowy}} r.</span>
                                    @endif
                            @else
                                {{$bz->wlasnosc}}
                            @endif

                            </div>
                            <br />
                          @endif
                        @endforeach
                        <!-- koniec danych Bazy Eksploatacyjnej -->

                        <!-- Dane dotyczace Zabezpieczenia Fianansowego -->
                        @foreach ($zab as $zb)
                            @if($zb->nazwa == 'b/d')

                            @else
                                <div><strong>Zabezpieczenie finansowe:</strong> {{$zb->nazwa}}s</div>
                                <div>{{$zb->suma_zab}} &euro; - {{$zb->ile_poj}} pojazdy</div>
                                <div>
                                @if($zb->data_do < date('Y-m-d'))
                                    <h5><span class="badge badge-danger">Do dnia {{$zb->data_do}} r.
                                    <br /> po terminie {{$dni = (strtotime($zb->data_do) - strtotime(date('Y-m-d'))) / (60*60*24)}} dni
                                    </span></h5>
                                    <a href="{{ url('/przedsiebiorca/'.$przedsiebiorca->id.'/dokument/'.$rodz->nr_dok.'/pisma/zabezpieczenie/tresc/')}}" class="btn btn-warning btn-sm" role="butotn">przygotuj pismo inf.</a>
                                @else
                                    <span class="badge badge-success" style="font-size:14px;">Do dnia {{$zb->data_do}} r.</span>
                                @endif
                                </div>
                            @endif
                        @endforeach

                    </div>
                </div>
                </div>
     <div class="card-header bg-dark text-light">

           <div class="col-md-12 bg-dark" style="color:#fff;font-size: 15px;">Dane licencji / zezwolenia</strong>
            - <span @if($rodz->rodz_dok =='rzeczy') class="badge badge-success"  @else class="badge badge-warning" @endif  style="font-size:13px;">  {{strtoupper($rodz->rodz_dok)}} </span>
           @if($rodz->nazwa == 'Licencja Pośrednictwo')
              <span class="badge badge-danger" style="font-size:13px;"> SPEDYCJA </span>
           @endif
           </div>
    </div>
    <div class="card-body">
           <div class="row">
             <div class="col-md-3">
               <strong>Data wydania : </strong><br /><span class="badge badge-secondary" style="font-size:14px;">
                  {{$rodz->data_wyd}} r.
               </span>
             </div>
              <div class="col-md-3">
               <strong>Ważnść do dnia: </strong><br /><span class="badge badge-success" style="font-size:14px;"> {{$rodz->data_waz}} r.</span>
             </div>
              <div class="col-md-3">
               <strong>Numer sprawy: </strong><br />  {{$rodz->nr_sprawy}}
             </div>
              <div class="col-md-3">
               <strong>Numer dokumentu: </strong><br /><strong> <span style="color:#17aa06;"> {{$rodz->nr_dok}}
              </span> /   {{$rodz->nr_druku}} </strong></span>
             </div>
             <div class="col-md-12 text-center"><br /><a href="{{ url('/przedsiebiorca/' . $przedsiebiorca->id.'/zmiany/'.$rodz->nr_dok)}}" role="button" class="btn btn-primary btn-sm">Historia zmian</a></div>
           </div>
    </div>
    <div class="card-header bg-dark text-light">

           <div class="col-md-12 bg-dark" style="color:#fff;font-size: 15px;">Kontrole</strong></div>
    </div>
    <div class="card-body">
           <div class="row">
             <div class="col-md-3">
               <strong>Ostatnia kontrola: </strong><br /><span class="badge badge-secondary" style="font-size:14px;"> {{$p_kont = \Carbon\Carbon::createFromFormat('Y-m-d',$dk->data_wyd)->addYear(5) }} r. </span>
             </div>
              <div class="col-md-3">
               <strong>Następna kontrola: </strong><br /><span class="badge badge-warning" style="font-size:14px;"> {{ $n_kont = $p_kont->addYear(5)}} r.</span>
             </div>
              <div class="col-md-3">
               <strong>Wyniki kontroli: </strong><br /><span class="badge badge-success" style="font-size:14px;"> Spełnia wymagania </span>
             </div>
              <div class="col-md-3">
               <strong>Zalecenia pokontrolne: </strong><br /><span class="badge badge-success" style="font-size:14px;"> Nie </span>
             </div>
             <div class="col-md-12 text-center"><br /><a href="#" role="button" class="btn btn-primary btn-sm">Podglądaj kontrole</a></div>
           </div>
    </div>

    </div>
<div><a class="btn btn-primary" href="/przedsiebiorca" role="button">Powrót do listy przedsiębiorców</a></div>
  </div>
</div>
</div>
@endsection
