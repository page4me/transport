<!DOCTYPE html>
<html>
<head>
  <title>Wykaz pojazdów</title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
      <style>
            /** Define the margins of your page **/
            body {
          font-family: DejaVu Sans;
          font-size: 12px;
          margin: 10px 10px 0 0; 
      }
            @page {
               margin: 10px 10px 0 0; 
               
            }

        </style>
</head>
<body>

<div class="container">
      
        <br />
        <div class="row" style="text-align: right;">Stan na dzień: 25-05-2019 r.</div>
        <div class="row" style="margin-left: 10px;">
          <div>
              <div style="font-weight: bold;">{{$przedsiebiorca->nazwa_firmy }} <br />{{$przedsiebiorca->adres}}<br />{{$przedsiebiorca->kod_p}} {{$przedsiebiorca->miejscowosc}}
                <br />
              <strong>NIP</strong>: {{$przedsiebiorca->nip}}
              </div>
              <p><strong>Rodzaj:</strong>@if($przedsiebiorca->id_osf=='1')
               Osoba fizyczna
              @elseif($przedsiebiorca->id_osf=='2')
               Sp. z o.o.
              @elseif($przedsiebiorca->id_osf=='3')
               Sp. z o.o. Sp. K.
              @elseif($przedsiebiorca->id_osf=='4')
               Sp. J.
              @elseif($przedsiebiorca->id_osf=='5')
               Sp. C.
              @endif</p>

          </div>
         
       </div>
         <div class="row">
           <div class="text-center"> <span style="font-size:16px;font-weight: bold;">Wykaz pojazdów</span> <br/>
             <span style="font-size:13px;font-weight: bold;"> Nr licencji / zezwolenia:
                  @foreach($dok as $dk)
                     {{ $dk->nr_dok }}
                  @endforeach
             </span> 

          </div>
        </div>
               
       <div class="row" style="margin-left: 10px;">
         
         <div class="col-md-12">
           <table class="table table-striped table-sm">
             <thead class="table bg-dark text-light text-center">
             <tr>
               <th class="text-center">Lp.</th>
               <th>Rodzaj i marka</th>
               <th class="text-center" style="width:90px;">Nr rej.</th>
               <th class="text-center" style="width:100px;">Nr VIN</th>
               <th class="text-center" style="width:60px;">DMC / os.</th>
               <th class="text-center" style="width:60px;">Własnosć</th>
               <th class="text-center" style="width:80px;">Data wpr.</th>
              </tr>
             </thead>
             <tr><td colspan="7" class="text-center"><strong><span style="font-size: 14px;color:red;">Pojazdy wprowadzone do licencji / zezwolenia
             </span></strong></td></tr>
             <tr>
               <td class="text-center" style="width:20px;">1</td>
               <td style="width:140px;">samochód ciężarowy <br /><strong> SCANIA R420</strong></td>
               <td class="text-center" style="width:60px;">ZKO R300<br /><span style="color:#3399ff;font-size:10px;">ZK 58798</span></td>
               <td class="text-center" style="width:100px;">XKSDJKS9797987</td>
               <td class="text-center" style="width:80px;">40 000 kg</td>
               <td class="text-center" style="width:90px;">Własnosć</td>
               <td class="text-center" style="width:80px;">wprowadzono <br />15-05-2019 r.</td>
             </tr>
             <tr>
               <td class="text-center">2</td>
               <td>samochód ciężarowy <br /> <strong> SCANIA R420</strong></td>
               <td class="text-center">ZKO R300</td>
               <td class="text-center">XKSDJKS9797987</td>
               <td class="text-center">40 000 kg</td>
               <td class="text-center">Własnosć</td>
               <td class="text-center">wprowadzono <br />15-05-2019 r.</td>
             </tr>
             <tr>
               <td class="text-center">3</td>
               <td>samochód ciężarowy <br /><strong> SCANIA R420</strong></td>
               <td class="text-center">ZKO R300</td>
               <td class="text-center">XKSDJKS9797987</td>
               <td class="text-center">40 000 kg</td>
               <td class="text-center">Własnosć</td>
               <td class="text-center">wprowadzono <br />15-05-2019 r.</td>
             </tr>
           </table>
           
         
           <table class="table table-striped table-sm">
              <thead class="table bg-dark text-light text-center">
             <tr>
               <th class="text-center">Lp.</th>
               <th>Rodzaj i marka</th>
              <th class="text-center" style="width:90px;">Nr rej.</th>
               <th class="text-center" style="width:100px;">Nr VIN</th>
               <th class="text-center" style="width:60px;">DMC / os.</th>
               <th class="text-center" style="width:60px;">Własnosć</th>
               <th class="text-center" style="width:80px;">Data wpr.</th>
              </tr>
             </thead>
             <tr><td colspan="7" class="text-center"><strong><span style="font-size: 14px;color:red;">Pojazdy wycofane z licencji / zezwolenia</span>
             </strong></td></tr>
             <tr>
               <td class="text-center" style="width:20px;">1</td>
               <td style="width:140px;">samochód ciężarowy <br /><strong> SCANIA R420</strong></td>
               <td class="text-center" style="width:60px;">ZKO R300</td>
               <td class="text-center" style="width:100px;">XKSDJKS9797987</td>
               <td class="text-center" style="width:80px;">40 000 kg</td>
               <td class="text-center" style="width:90px;">Własnosć</td>
               <td class="text-center" style="font-size: 11px;color:red;">wycofany z ruchu dn.<br />15-05-2019 r.</td>
             </tr>
             <tr>
               <td class="text-center" style="width:20px;">1</td>
               <td style="width:140px;">samochód ciężarowy <br /><strong> SCANIA R420</strong></td>
               <td class="text-center" style="width:60px;">ZKO R300</td>
               <td class="text-center" style="width:100px;">XKSDJKS9797987</td>
               <td class="text-center" style="width:80px;">40 000 kg</td>
               <td class="text-center" style="width:90px;">Własnosć</td>
               <td class="text-center" style="font-size: 11px;color:red;">wycofany z ruchu dn.<br />15-05-2019 r.</td>
             </tr>
             <tr>
               <td class="text-center" style="width:20px;">1</td>
               <td style="width:140px;">samochód ciężarowy <br /><strong> SCANIA R420</strong></td>
               <td class="text-center" style="width:60px;">ZKO R300</td>
               <td class="text-center" style="width:100px;">XKSDJKS9797987</td>
               <td class="text-center" style="width:80px;">40 000 kg</td>
               <td class="text-center" style="width:90px;">Własnosć</td>
               <td class="text-center" style="font-size: 11px;color:red;">wycofany z ruchu dn.<br />15-05-2019 r.</td>
             </tr>
           </table>
         </div>
       </div>

</div>
</body>
</html>