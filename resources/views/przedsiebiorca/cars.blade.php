
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
                   <td class="text-center">{{$car->nr_rej}}<br /><span class="text-primary"><small>{{$car->p_nr_rej}}</small></span></td>
                   <td class="text-center">{{$car->nr_vin}}</td>
                   <td class="text-center">{{$car->dmc}} kg</td>
                   <td class="text-center">{{$car->wlasnosc}}</td>
                   <td class="text-center">wprowadzono <br />{{$car->data_wpr}} r.</td>
                   <td class="text-center" colspan="2">
                    <button data-toggle="modal" data-id="{{$car->id}}" data-nr_rej="{{$car->nr_rej}}"  data-p_nr_rej="{{$car->p_nr_rej}}" data-marka="{{$car->marka}}" data-nr_vin="{{$car->nr_vin}}" data-wlasnosc="{{$car->wlasnosc}}" data-data_wpr="{{$car->data_wpr}}" data-dmc="{{$car->dmc}}" data-rodzaj_poj="{{$car->rodzaj_poj}}" data-target="#editModal" role="button" class="btn btn-success btn-sm carID" alt="Edycja" ><i class="fa fa-edit"></i></button>
                    
                    <button data-toggle="modal" data-id="{{$car->id}}" data-target="#myModal" role="button" class="btn btn-danger btn-sm">Wycofaj</button>

                  </td>
                 </tr>

               @endif
             @endforeach
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
                                          <!-- Form edit car -->
                                                <form method="post" name="fwyc" action="{{ route('pojazdy.update', 'idcar' ) }}">
                                              <div class="row">
                                                    @csrf
                                                      @method('PATCH')
                                                 <div class="col-md-6 form-group">
                                                    <label for="nr_rej"><strong>Numer rejestracyjny:</strong></label>
                                                    <input type="text" class="form-control" name="nr_rej" id="nr_rej" value="{{$car->nr_rej}}"/>
                                                 </div>
                                                 <div class="col-md-6 form-group">
                                                    <label for="p_nr_rej"><strong>Poprzedni numer rejestracyjny:</strong></label>
                                                    <input type="text" class="form-control" name="p_nr_rej" id="p_nr_rej" value="{{$car->p_nr_rej}}"/>
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
                                              <input type="hidden" name="idcar" id="idcar" value="{{$car->id}}" />
                                        </div>
                                        <div class="modal-footer">

                                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Zamknij</button>
                                          <button type="submit" class="btn btn-success">Zapisz zmiany</button>


                                           </form>
                                        </div>
                                      </div>
                                    </div>
                                  <script type="text/javascript">
                                    $(".carID").click(function () {
                                        var ids = $(this).attr('data-id');
                                        var nr_rej = $(this).attr('data-nr_rej');
                                        var p_nr_rej = $(this).attr('data-p_nr_rej');
                                        var rodzaj_poj = $(this).attr('data-rodzaj_poj');
                                        var marka = $(this).attr('data-marka');
                                        var nr_vin = $(this).attr('data-nr_vin');
                                        var dmc = $(this).attr('data-dmc');
                                        var wlasnosc = $(this).attr('data-wlasnosc');
                                        var data_wpr = $(this).attr('data-data_wpr');
                                        var uwagi = $(this).attr('data-uwagi');

                                        $("#idcar").val( ids );
                                        $('#nr_rej').val ( nr_rej);
                                        $('#p_nr_rej').val ( p_nr_rej);
                                        $('#rodzaj_poj').val ( rodzaj_poj);
                                        $('#marka').val ( marka);
                                        $('#nr_vin').val ( nr_vin);
                                        $('#dmc').val ( dmc);
                                        $('#wlasnosc').val ( wlasnosc);
                                        $('#data_wpr').val ( data_wpr);
                                        $('#uwagi').val ( uwagi);

                                        $('#editModal').modal('show');
                                    });

                                   
                                  </script>

                           <!-- end edit -->

                            <!-- wycofaj modal -->
                              
                                                     


           </table>
           <!-- Button to Open the Modal -->
                               

                                <!-- The Modal -->
                                <div class="modal" id="myModal">
                                  <div class="modal-dialog">
                                    <div class="modal-content">
                                        <input type="hidden" id="idp" name="idp" value="{{$car->id}}" disabled="disabled" />
                                        <form  method="POST" action="{{ route('wycofaj', 'id' ) }}" >
                                      <!-- Modal Header -->
                                      <div class="modal-header bg-danger text-light">
                                        <h4 class="modal-title">Wycofanie pojazdu</h4>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                      </div>
                                      
                                      <!-- Modal body -->
                                      <div class="modal-body">
                                        
                                          @csrf
                                          @method('PATCH')
                                        Wprowadź datę wycofania pojazdu: <input type="date" id="data_wyc" name="data_wyc" />
                                        <input type="hidden" id="id" name="id" value="{{$car->id}}" />
                                        <input type="hidden" name="id_przed" value="{{$dk->id_przed}}" />
                                      </div>

                                      <!-- Modal footer -->
                                      <div class="modal-footer">
                                        <button type="button" class="btn btn-dark" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-danger">Wycofaj</button>
                                        
                                      </form>
                                      </div>

                                    </div>
                                  </div>
                                </div>
                                <script type="text/javascript">
                                   
                                      $('#myModal').on("show.bs.modal", function (e) {
                                           
                                           $("#id").val($(e.relatedTarget).data('id'));
                                           
                                      });
                                
                                </script>
                           <!-- end wycofaj -->

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
                     <td class="text-center" style="font-size: 16px;color:red;">wycofany dn. <br />{{$car->data_wyc}} r.</td>
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