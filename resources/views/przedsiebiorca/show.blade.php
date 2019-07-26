
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
                   {{$count = \App\Wypisy::where('id_przed','=',$przedsiebiorca->id)->count()}} 
                 </span><br />
                 @if($count ==0) 
                       &nbsp; <a href="/przedsiebiorca/wypisy/{{$przedsiebiorca->id}}" role="button" class="btn btn-success btn-sm">Dodaj wypis</a> 
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
               
              
                      <strong>Ilosć pojazdów:</strong>
                       <span class="badge badge-warning" style="font-size:13px;">
                           {{$count = \App\WykazPoj::where('id_przed','=',$przedsiebiorca->id)->where('status','=','1')->count()}} 

                       </span><br />&nbsp;
                   @if($count ==0) 
                       &nbsp; <a href="/przedsiebiorca/cars/{{$przedsiebiorca->id}}" role="button" class="btn btn-success btn-sm">Dodaj pojazd</a> 
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
             <div><span class="badge badge-success" style="font-size:14px;">Do dnia {{$zb->data_do}} r.</span></div>
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
               <strong>Ważnsć do dnia: </strong><br /><span class="badge badge-success" style="font-size:14px;"> {{$dk->data_waz}}</span>
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