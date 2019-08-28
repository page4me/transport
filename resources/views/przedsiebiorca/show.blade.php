
@extends('layouts.app')

@section('content')
<div class="container">
<div class="card uper">
  <div class="card-header bg-dark text-light" >
  @foreach($rodzaje as $petent)
       @endforeach
   Dane szczegółowe przedsiębiorcy -
     <span style="color: #00ddff;font-size:16px;"> Nr licencji / zezwolenia:
       @foreach($dok as $dk)
         @if(!empty($dk->nr_dok)) {{ $dk->nr_dok}} @else brak @endif

     </span><span style="color: #fff;font-size:16px;">wydano dn. {{ $dk->data_wyd}}   r.</span>
       @endforeach
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
                      {{$count = \App\Wypisy::where('id_przed','=',$przedsiebiorca->id)->count()}}
                    </span><br />
                 <strong>W depozycie wypisów: </strong><span class="badge badge-danger" style="font-size:12px;">
                   {{$count1 = \App\Wypisy::where('status','=','2','AND','id_przed','=',$przedsiebiorca->id)->count()}}
                {{$count1}}
                 </span><br />
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
                       <a class="btn btn-sm btn-primary" href="/przedsiebiorca/wypisy/{{$przedsiebiorca->id}}">Wypisy</a>
                   @endif
               </div>
          </div>
          <div class="col-md-3">
             <div><strong>Osoba zarządzająca</strong></div>
             <div>
              @foreach($cert as $ck)
                @if(!empty($ck->id)) {{$ck->imie_os_z}} {{$ck->nazwisko_os_z}} @else brak @endif
              @endforeach
                         </div>
             <div>Umowa do dnia -  @if(!empty($ck->id)) {{$ck->umowa}} @else brak @endif</div>
             <div><strong>Certyfikat kompetencji:</strong><br />@if(!empty($ck->id))<span style="color:#0041a8;font-weight: bold;">{{$ck->rodzaj}}</span>@else brak @endif / Nr @if(!empty($ck->id)) {{$ck->nr_cert}} @else brak <br /><br /> @endif</div><br />

              <div>


                      <strong>Ilość pojazdów:</strong>
                       <span class="badge badge-warning" style="font-size:13px;">
                          {{$count = \App\WykazPoj::where('id_przed','=',$przedsiebiorca->id)->where('status','=','1')->count()}}

                       </span><br />&nbsp;
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
                                                <input type="text" class="form-control" name="rodzaj_poj"/>
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
                                                <label for="tel"><strong>Własność:</strong></label>
                                                <input type="text" class="form-control" name="wlasnosc" />
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
                       <a class="btn btn-sm btn-primary" href="/przedsiebiorca/cars/{{$przedsiebiorca->id}}">Wykaz pojazdów</a>
                   @endif
                        </div>
                    </div>
                    <div class="col-md-3">
                        @foreach ($baza as $bz)
                        <div><strong>Baza eksploatacyjna</strong></div>
                        <div><strong>Adres:</strong> <br />{{$bz->adres}}<br /> {{$bz->kod_p}} {{$bz->miasto}}</div>
                        <div>Umowa do dnia {{$bz->dat_umowy}} r.</div>
                        <br />
                        @endforeach
                        @foreach ($zab as $zb)
                        <div><strong>Zabezpieczenie finansowe:</strong> {{$zb->nazwa}}s</div>
                        <div>{{$zb->suma_zab}} &euro; - {{$zb->ile_poj}} pojazdy</div>
                        <div>
                          @if($zb->data_do < date('Y-m-d'))
                            <h5><span class="badge badge-danger">Do dnia {{$zb->data_do}} r.
                               <br /> po terminie {{$dni = (strtotime($zb->data_do) - strtotime(date('Y-m-d'))) / (60*60*24)}} dni
                             </span></h5>
                             <a href="przedsiebiorca/pisma/print_zdol_finas" class="btn btn-warning btn-sm" role="butotn">przygotuj pismo inf.</a>
                          @else
                             <span class="badge badge-success" style="font-size:14px;">Do dnia {{$zb->data_do}} r.</span>
                          @endif
                        </div>
                        @endforeach
                    </div>
                </div>
                </div>
     <div class="card-header bg-dark text-light">

           <div class="col-md-12 bg-dark" style="color:#fff;font-size: 15px;">Dane licencji / zezwolenia</strong>  - <span class="badge badge-warning" style="font-size:13px;">  {{strtoupper($dk->rodz_dok)}} </span></div>
    </div>
    <div class="card-body">
           <div class="row">
             <div class="col-md-3">
               <strong>Data wydania : </strong><br /><span class="badge badge-secondary" style="font-size:14px;">
                  {{$dk->data_wyd}}
               </span>
             </div>
              <div class="col-md-3">
               <strong>Ważnść do dnia: </strong><br /><span class="badge badge-success" style="font-size:14px;"> {{$dk->data_waz}}</span>
             </div>
              <div class="col-md-3">
               <strong>Numer sprawy: </strong><br />  {{$dk->nr_sprawy}}
             </div>
              <div class="col-md-3">
               <strong>Numer dokumentu: </strong><br /><strong> <span style="color:#17aa06;"> {{$dk->nr_dok}}
              </span> /   {{$dk->nr_druku}} </strong></span>
             </div>
             <div class="col-md-12 text-center"><br /><a href="{{ url('ganerate-pdf')}}" role="button" class="btn btn-primary btn-sm">Historia zmian</a></div>
           </div>
    </div>
    <div class="card-header bg-dark text-light">

           <div class="col-md-12 bg-dark" style="color:#fff;font-size: 15px;">Kontrole</strong></div>
    </div>
    <div class="card-body">
           <div class="row">
             <div class="col-md-3">
               <strong>Przeprowadzenie kontroli: </strong><br /><span class="badge badge-secondary" style="font-size:14px;"> 25.05.2019 r. </span>
             </div>
              <div class="col-md-3">
               <strong>Kolejna kontrola: </strong><br /><span class="badge badge-warning" style="font-size:14px;"> 25.05.2024 r.</span>
             </div>
              <div class="col-md-3">
               <strong>Wyniki kontroli: </strong><br /><span class="badge badge-success" style="font-size:14px;"> Spełnia wymagania </span>
             </div>
              <div class="col-md-3">
               <strong>Zalecenia pokontrolne: </strong><br /><span class="badge badge-success" style="font-size:14px;"> Nie </span>
             </div>
             <div class="col-md-12 text-center"><br /><a href="#" role="button" class="btn btn-primary btn-sm">Podgląd wyników kontroli</a></div>
           </div>
    </div>

    </div>
    <div><a class="btn btn-primary" href="/przedsiebiorca" role="button">Powrót do listy przedsiębiorców</a></div>
  </div>
</div>
</div>
@endsection
