
@extends('layouts.app')

@section('content')

<div class="container">
    <div class="card uper">
  <div class="card-header bg-dark text-light" >
   Wykaz pojazdów przedsiębiorcy o  -
     <span style="color: #00ddff;font-size:16px;"> Nr licencji / zezwolenia:
       @if(strlen($przedsiebiorca->nr_dokumentu) < 3)
          00{{$przedsiebiorca->nr_dokumentu}}
        @elseif (strlen($przedsiebiorca->nr_dokumentu) > 3)
          0{{$przedsiebiorca->nr_dokumentu}}
        @endif
     </span><span style="color: #fff;font-size:16px;">wydano dn. 25-06-2019 r.</span>
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
          <div class="col-md-4">
              <div style="font-weight: bold;">{{$przedsiebiorca->nazwa_firmy }} <br />{{$przedsiebiorca->adres}}<br />{{$przedsiebiorca->kod_p}} {{$przedsiebiorca->miejscowosc}}</div>
              <p><strong>Rodzaj:</strong>@if($przedsiebiorca->id_rodzaj_przedsiebiorcy=='1')
               Osoba fizyczna
              @elseif($przedsiebiorca->id_rodzaj_przedsiebiorcy=='2')
               Sp. z o.o.
              @elseif($przedsiebiorca->id_rodzaj_przedsiebiorcy=='3')
               Sp. z o.o. Sp. K.
              @elseif($przedsiebiorca->id_rodzaj_przedsiebiorcy=='4')
               Sp. J.
              @elseif($przedsiebiorca->id_rodzaj_przedsiebiorcy=='5')
               Sp. C.
              @endif</p>
          </div>
          <div class="col-md-4">
            <div><strong>NIP:</strong> {{$przedsiebiorca->nip}}</div>
              <div><strong>REGON:</strong> {{$przedsiebiorca->regon}}</div>
              <div><strong>KREPTD:</strong> P/2018/05505405050</div>
          </div>
          <div class="col-md-4">
            <span class="badge badge-success" style="font-size:14px;">Stan na dzień: 25-05-2019 r.</span>
            <br /><br /><a href="{{ url('/przedsiebiorca/pdf/' . $przedsiebiorca->id)}}" role="button" class="btn btn-warning">Wykaz w PDF</a>
          </div>
       </div>
       <div class="row">
         <div class="col-md-12 text-center">
          <span style="font-size: 20px;"> <strong>WYKAZ POJAZDÓW</strong></span>
         </div>
         <div class="col-md-12 text-center">
           
         </div>
         <div class="col-md-12">
           <table class="table table-striped">
             <thead class="table bg-primary text-light text-center">
              <tr>
               <th class="text-center">Lp.</th>
               <th>Rodzaj i marka</th>
               <th class="text-center">Nr rejestracjny</th>
               <th class="text-center">Nr VIN</th>
               <th class="text-center">DMC / Ilosć os.</th>
               <th class="text-center">Własnosć</th>
               <th class="text-center">Data wprowadzenia</th>
              </tr>
             </thead>
             <tr><td colspan="7" class="text-center"><strong><span style="font-size: 16px;color:red;">Pojazdy wprowadzone do licencji / zezwolenia
             </span></strong></td></tr>
             <tr>
               <td class="text-center">1</td>
               <td>samochód ciężarowy <br /> SCANIA R420</td>
               <td class="text-center">ZKO R300</td>
               <td class="text-center">XKSDJKS9797987</td>
               <td class="text-center">40 000 kg</td>
               <td class="text-center">Własnosć</td>
               <td class="text-center">wprowadzono <br />15-05-2019 r.</td>
             </tr>
             <tr>
               <td class="text-center">2</td>
               <td>samochód ciężarowy <br /> SCANIA R420</td>
               <td class="text-center">ZKO R300</td>
               <td class="text-center">XKSDJKS9797987</td>
               <td class="text-center">40 000 kg</td>
               <td class="text-center">Własnosć</td>
               <td class="text-center">wprowadzono <br />15-05-2019 r.</td>
             </tr>
             <tr>
               <td class="text-center">3</td>
               <td>samochód ciężarowy <br /> SCANIA R420</td>
               <td class="text-center">ZKO R300</td>
               <td class="text-center">XKSDJKS9797987</td>
               <td class="text-center">40 000 kg</td>
               <td class="text-center">Własnosć</td>
               <td class="text-center">wprowadzono <br />15-05-2019 r.</td>
             </tr>
           </table>
           
         
           <table class="table table-striped">
             <thead class="table bg-primary text-light text-center">
              <tr>
               <th class="text-center">Lp.</th>
               <th>Rodzaj i marka</th>
               <th class="text-center">Nr rejestracjny</th>
               <th class="text-center">Nr VIN</th>
               <th class="text-center">DMC / Ilosć os.</th>
               <th class="text-center">Własnosć</th>
               <th class="text-center">Data wprowadzenia</th>
              </tr>
             </thead>
             <tr><td colspan="7" class="text-center"><strong><span style="font-size: 16px;color:red;">Pojazdy wycofane z licencji / zezwolenia</span>
             </strong></td></tr>
             <tr>
               <td class="text-center">1</td>
               <td>samochód ciężarowy <br /> SCANIA R420</td>
               <td class="text-center">ZKO R300</td>
               <td class="text-center">XKSDJKS9797987</td>
               <td class="text-center">40 000 kg</td>
               <td class="text-center">Własnosć</td>
               <td class="text-center" style="font-size: 16px;color:red;">wycofany z ruchu dn.<br />15-05-2019 r.</td>
             </tr>
             <tr>
               <td class="text-center">2</td>
               <td>samochód ciężarowy <br /> SCANIA R420</td>
               <td class="text-center">ZKO R300</td>
               <td class="text-center">XKSDJKS9797987</td>
               <td class="text-center">40 000 kg</td>
               <td class="text-center">Własnosć</td>
               <td class="text-center" style="font-size: 16px;color:red;">wycofany z ruchu dn.<br />15-05-2019 r.</td>
             </tr>
             <tr>
               <td class="text-center">3</td>
               <td>samochód ciężarowy <br /> SCANIA R420</td>
               <td class="text-center">ZKO R300</td>
               <td class="text-center">XKSDJKS9797987</td>
               <td class="text-center">40 000 kg</td>
               <td class="text-center">Własnosć</td>
               <td class="text-center" style="font-size: 16px;color:red;">wycofany z ruchu dn.<br />15-05-2019 r.</td>
             </tr>
           </table>
         </div>
       </div>
 </div>
 <div><a class="btn btn-primary" href="/przedsiebiorca/{{$przedsiebiorca->id}}" role="button">Powrót do listy przedsiębiorców</a></div>
</div>
</div>
@endsection