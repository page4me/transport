
@extends('layouts.app')

@section('content')

<div class="container">
    <div class="card uper">
  <div class="card-header bg-dark text-light" >
   Wykaz pojazdów przedsiębiorcy o  -
     <span style="color: #00ddff;font-size:16px;"> Nr licencji / zezwolenia:
       @foreach($dok as $dk)
         {{ $dk->nr_dok }}
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
          <div class="col-md-4">
              <div style="font-weight: bold;">{{$przedsiebiorca->nazwa_firmy }} <br />{{$przedsiebiorca->adres}}<br />{{$przedsiebiorca->kod_p}} {{$przedsiebiorca->miejscowosc}}</div>
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
          <div class="col-md-4">
            <div><strong>NIP:</strong> {{$przedsiebiorca->nip}}</div>
              <div><strong>REGON:</strong> {{$przedsiebiorca->regon}}</div>

          </div>
          <div class="col-md-4">
            <span class="badge badge-success" style="font-size:14px;">Stan na dzień: @if(empty($stan->data_wpr)) brak danych @else {{$stan->data_wpr}} @endif r.</span>
            <br /><br /><a href="{{ url('/przedsiebiorca/pdf/' . $przedsiebiorca->id)}}" target="_blank" role="button" class="btn btn-warning">Wykaz w PDF</a>&nbsp;<button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModalCenter">
            Dodaj nowy pojazd
          </button>
          </div>

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
                            <label for="tel"><strong>Własnosć:</strong></label>
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
               <th class="text-center">Własnoć</th>
               <th class="text-center">Data wprowadzenia</th>
               <th class="text-center">Opcja</th>
              </tr>
             </thead>
             <tr><td colspan="8" class="text-center"><strong><span style="font-size: 16px;color:red;">Pojazdy wprowadzone do licencji / zezwolenia
             </span></strong></td></tr>
              <p style="font-size:1px;">{{$i=1}}</p>
             @foreach($cars as $car)
               @if(($car->status)==1)
                 
                 <tr>
                   <td class="text-center">{{$i++}}</td>
                   <td>{{$car->rodzaj_poj}}<br /><strong> {{$car->marka}} </strong></td>
                   <td class="text-center">{{$car->nr_rej}}</td>
                   <td class="text-center">{{$car->nr_vin}}</td>
                   <td class="text-center">{{$car->dmc}} kg</td>
                   <td class="text-center">{{$car->wlasnosc}}</td>
                   <td class="text-center">wprowadzono <br />{{$car->data_wpr}} r.</td>
                   <td class="text-center" colspan="2">
                   
                    <a href="/przedsiebiorca/pojazdy/{{$car->id}}" data-toggle="modal" data-id="{{$car->id}}" data-nr_rej="{{$car->nr_rej}}"  data-marka="{{$car->marka}}" data-nr_vin="{{$car->nr_vin}}" data-wlasnosc="{{$car->wlasnosc}}" data-data_wpr="{{$car->data_wpr}}" data-dmc="{{$car->dmc}}" data-rodzaj_poj="{{$car->rodzaj_poj}}" data-target="#editModal" role="button" class="btn btn-success btn-sm" alt="Edycja" ><i class="fa fa-edit"></i></a>

                    <a href="#" role="button" class="btn btn-danger btn-sm">Wycofaj</a>

                                      <!-- edit modal -->
                                <!-- Modal -->
                                  <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                      <div class="modal-content text-left">
                                        <div class="modal-header  bg-success">
                                          <div class="card-header bg-success text-light" >
                                             Edycja pojazdu przedsiębiorcy o  -
                                               <span style="color:#000;font-size:15px;"> Nr licencji / zezwolenia:
                                                 @foreach($dok as $dk)
                                                   {{ $dk->nr_dok }}
                              
                                               </span><span style="color: #fff;font-size:15px;">wydano dn. {{ $dk->data_wyd}}   r.</span>

                                                 @endforeach
                                            </div>
                                          <button type="button" class="close text-light" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                          </button>
                                        </div>
                                        <div class="modal-body">
                                          
                                             
                                            <!-- Form add new car -->
                                                <form method="post" action="{{ route('pojazdy.update', $car->id ) }}">
                                              <div class="row">
                                                    @csrf
                                                      @method('PATCH')
                                                 <div class="col-md-12 form-group">
                                                    <label for="nr_rej"><strong>Numer rejestracyjny:</strong></label>
                                                    <input type="text" class="form-control" name="nr_rej" id="nr_rej" value="{{$car->nr_rej}}"/>
                                                </div>
                                               </div>

                                              <div class="row">

                                                <div class="col-md-4 form-group">
                                                    <label for="nr_dok"><strong>Rodzaj pojazdu:</strong></label>
                                                    <input type="text" class="form-control" name="rodzaj_poj" id="rodzaj_poj" value="{{$car->rodzaj_poj}}" />
                                                </div>
                                                <div class="col-md-4 form-group">
                                                    <label for="kod_p"><strong>Marka:</strong></label>
                                                    <input type="text" class="form-control" name="marka" id="marka" value="{{$car->marka}}" />
                                                </div>
                                                 <div class="col-md-4 form-group">
                                                    <label for="nr_druku"><strong>Nr VIN:</strong></label>
                                                    <input type="text" class="form-control" name="nr_vin" id="nr_vin" maxlength="17" value="{{$car->nr_vin}}" />
                                                </div>

                                              </div>


                                              <div class="row">
                                                 <div class="col-md-4 form-group">
                                                    <label for="nr_sprawy"><strong>DMC:</strong></label>
                                                    <input type="text" class="form-control" name="dmc" id="dmc" value="{{$car->dmc}}" />
                                                </div>
                                                <div class="col-md-4 form-group">
                                                    <label for="tel"><strong>Własnosć:</strong></label>
                                                    <input type="text" class="form-control" name="wlasnosc" id="wlasnosc" value="{{$car->wlasnosc}}" />
                                                </div>
                                                <div class="col-md-4 form-group">
                                                    <label for="tel"><strong>Data wprowadzenia:</strong></label>
                                                    <input type="date" class="form-control" name="data_wpr" id="data_wpr" value="{{$car->data_wpr}}" />
                                                </div>

                                              </div>
                                              <div class="row">
                                                <div class="col-md-12 form-group">
                                                    <label for="uwagi"><strong>Uwagi:</strong></label>
                                                    <input type="text" class="form-control" name="uwagi" id="uwagi" value="{{$car->uwagi}}" />
                                                </div>
                                              </div>
                                              <input type="hidden" name="id_przed" value="{{$dk->id_przed}}" />
                                              <input type="hidden" name="id_dok_przed" value="{{$dk->id}}" />
                                              <input type="hidden" name="id" id="id" value="{{$car->id}}" />
                                        </div>
                                        <div class="modal-footer">

                                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Zamknij</button>
                                          <button type="submit" class="btn btn-success">Zapisz zmiany</button>
                                      
                                        
                                           </form>
                                        </div>
                                      </div>
                                    </div>
                                  <script type="text/javascript">
                                     $('#editModal').on('show.bs.modal', function (event) {
                                              var button = $(event.relatedTarget) 
                                              var marka = button.data('marka') 
                                              var nr_rej = button.data('nr_rej') 
                                              var nr_vin = button.data('nr_vin') 
                                              var data_wpr = button.data('data_wpr')
                                              var rodzaj_poj = button.data('rodzaj_poj')
                                              var wlasnosc = button.data('wlasnosc')
                                              var dmc = button.data('dmc')
                                              var uwagi = button.data('uwagi') 
                                              
                                              
                                              var modal = $(this)
                                              modal.find('.modal-body #marka').val(marka);
                                              modal.find('.modal-body #nr_rej').val(nr_rej);
                                              modal.find('.modal-body #nr_vin').val(nr_vin);
                                              modal.find('.modal-body #data_wpr').val(data_wpr);
                                              modal.find('.modal-body #rodzaj_poj').val(rodzaj_poj);
                                              modal.find('.modal-body #dmc').val(dmc);
                                              modal.find('.modal-body #wlasnosc').val(wlasnosc);
                                              modal.find('.modal-body #uwagi').val(uwagi);
                                             
                                             
                                             
                                        })
                                  </script>

                               
                               
                               
                           <!-- end edit -->
                  </td>
                 </tr>
                 
               @endif
             @endforeach
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
               <th class="text-center">Data wycofania</th>
              </tr>
             </thead>
             <tr><td colspan="7" class="text-center"><strong><span style="font-size: 16px;color:red;">Pojazdy wycofane z licencji / zezwolenia</span>
             </strong></td></tr>
               <p style="font-size:1px;">{{$a=1}}</p>
               @foreach($cars as $car)
               @if(($car->status)==2)
                    <tr>
                     <td class="text-center">{{$a++}}</td>
                     <td>{{$car->rodzaj_poj}}<br /><strong> {{$car->marka}} </strong></td>
                     <td class="text-center">{{$car->nr_rej}}</td>
                     <td class="text-center">{{$car->nr_vin}}</td>
                     <td class="text-center">{{$car->dmc}} kg</td>
                     <td class="text-center">{{$car->wlasnosc}}</td>
                     <td class="text-center" style="font-size: 16px;color:red;">wycofany dn. <br />{{$car->data_wpr}} r.</td>
                   </tr>
                @endif
             @endforeach

           </table>
         </div>
       </div>
 </div>
 <div><a class="btn btn-primary" href="/przedsiebiorca/{{$przedsiebiorca->id}}" role="button"><i class="fa fa-arrow-left"></i> Szczegóły przedsiębiorcy</a></div><br />
</div>
</div>
@endsection