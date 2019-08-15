
@extends('layouts.app')

@section('content')

<div class="container">
    <div class="card uper">
  <div class="card-header bg-dark text-light" >
   Wypisy z   @foreach($dok as $dk){{$dk->nazwa}}@endforeach -
     <span style="color: #00ddff;font-size:16px;"> Nr:

         {{ $dk->nr_dok }}

     </span><span style="color: #fff;font-size:16px;">wydano dn. {{ $dk->data_wyd}}   r.</span>

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
            <span class="badge badge-success" style="font-size:14px;">Stan na dzień: @if(empty($stan->data_wyd)) brak danych @else {{$stan->data_wyd}} @endif r.</span>
            <br /><br /><a href="{{ url('/przedsiebiorca/wypisyPDF/' . $przedsiebiorca->id) }}" target="_blank" role="button" class="btn btn-warning">Wypisy PDF</a>
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#nowyWypis">Dodaj nowy wypis</button>
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
          </div>
       </div>
       <div class="row">
         <div class="col-md-12 text-center">
          <span style="font-size: 20px;"> <strong>WYPISY</strong></span>
         </div>
         <div class="col-md-12 text-center">

         </div>
         <div class="col-md-12">
        <table class="table table-bordered table-striped table-sm">
         <thead class="table-primary text-center" style="font-weight:bold;">
              <tr>
                <td>Nr wypisu</td>
                <td>Nr druku</td>
                <td>Nr dokumentu</td>
                <td>Nazwa</td>
                <td>Rodzaj wypisu</td>
                <td>Data wniosku</td>
                <td>Data wydania</td>

                <td colspan="3">Akcja</td>
              </tr>
          </thead>
          <tbody class="text-center">
              @foreach($wypisy as $wp)
              <tr>
                  <td>{{$wp->nr_wyp}}</td>
                  <td>{{$wp->nr_druku}}</td>
                  <td>@foreach($dok as $dk) {{$dk->nr_dok}} @endforeach</td>
                  <td>{{$wp->nazwa}}</td>

                  <td>{{$wp->rodzaj_wyp}}</td>
                  <td>{{$wp->data_wn}}</td>
                  <td>{{$wp->data_wyd}}</td>

                  <td>{{$wp->id}}
                  <button data-toggle="modal" data-id="{{$wp->id}}" data-nr_wyp="{{$wp->nr_wyp}}" data-nr_druku="{{$wp->nr_druku}}" data-nr_sprawy="{{$wp->nr_sprawy}}" data-data_wn="{{$wp->data_wn}}" data-data_wyd="{{$wp->data_wyd}}" data-uwagi="{{$wp->uwagi}}" data-target="#editModal" role="button" class="btn btn-success btn-sm carID" alt="Edycja" ><i class="fa fa-edit"></i></button>

                  <td>
                      <form action="{{ route('przedsiebiorca.destroy', $wp->id)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger" type="submit" id="confirm_delete btn-sm"><i class="fa fa-trash"></i></button>
                      </form>
                  </td>

                  <td><button class="btn btn-sm btn-warning btn-sm">Depozyt</button></td>
              </tr>
              @endforeach
          </tbody>
        </table>
                               <!-- Modal -->
                  <div class="modal fade" id="edycjaWypis" tabindex="-1" role="dialog" aria-labelledby="editWypisCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header  bg-success">
                                <div class="card-header bg-success text-light" >
                                    Lista wypisów przedsiębiorcy o  -
                                    <span style="color: #000;font-size:16px;"> Nr licencji / zezwolenia:
                                        @foreach($dok as $dk)
                                        {{ $dk->nr_dok }}

                                    </span><span style="color: #fff;font-size:16px;">wydano dn. {{ $dk->data_wyd}}   r.</span>

                                        @endforeach
                                    </div>
                                <button type="button" class="close text-light" data-dismiss="modal" aria-label="Zamknij">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                </div>
                                <div class="modal-body">
                                    <!-- Form add new car -->
                                 <form method="post" action="{{ route('wypisy.update','idwyp') }}">
                                    <div class="row">
                                            @csrf
                                             @method('PATCH')
                                        <div class="col-md-4 form-group">
                                            <label for="nr_wyp"><strong>Numer wypisu:</strong></label>
                                            <input type="text" class="form-control" id="nr_wyp" name="nr_wyp" value="{{$wp->nr_wyp}}" />
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <label for="nr_druk"><strong>Nr druku:</strong></label>
                                            <input type="text" class="form-control" name="nr_druku" id="nr_druku" />
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
                                            <input type="date" class="form-control" name="data_wn" id="data_wn" value="{{$wp->data_wn}}" />
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <label for="data_wyd"><strong>Data wydania:</strong></label>
                                            <input type="date" class="form-control" name="data_wyd" id="data_wyd" value="{{$wp->data_wyd}}" />
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <label for="nr_sprawy"><strong>Numer sprawy:</strong></label>
                                            <input type="text" class="form-control" name="nr_sprawy" id="nr_sprawy" value="{{$wp->nr_sprawy}}" />
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 form-group">
                                            <label for="uwagi"><strong>Uwagi:</strong></label>
                                            <input type="text" class="form-control" name="uwagi" id="uwagi" value="{{$wp->uwagi}}" />
                                        </div>
                                    </div>

                                    <input type="hidden" name="id_przed" value="{{$dk->id_przed}}" />

                                    <input type="hidden" name="idwyp" id="idwyp" value="{{$wp->id}}" />
                                </div>
                                <div class="modal-footer">

                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Zamknij</button>
                                <button type="submit" class="btn btn-success">Zapisz zmiany</button>
                                </form>
                                </div>


                            </div>
                            </div>


                        </div>

         </div>
       </div>
 </div>
 <div><a class="btn btn-primary" href="/przedsiebiorca/{{$przedsiebiorca->id}}" role="button"><i class="fa fa-arrow-left"></i> Szczegóły przedsiębiorcy</a></div><br />
</div>
</div>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
                                <script type="text/javascript">
                                     $(".carID").click(function () {
                                        var idwyp = $(this).attr('data-id');
                                        var nr_wyp = $(this).attr('data-nr_wyp');
                                        var nr_druku = $(this).attr('data-nr_druku');
                                        var nr_sprawy = $(this).attr('data-nr_sprawy');
                                        var data_wn = $(this).attr('data-data_wn');
                                        var data_wyd = $(this).attr('data-data_wyd');
                                        var uwagi = $(this).attr('data-uwagi');

                                        $("#idwyp").val(idwyp);
                                        $('#nr_wyp').val(nr_wyp);
                                        $('#nr_druku').val(nr_druku);
                                        $('#nr_sprawy').val(nr_sprawy);
                                        $('#data_wn').val(data_wn);
                                        $('#data_wyd').val(data_wyd);
                                        $('#uwagi').val(uwagi);

                                        $('#edycjaWypis').modal('show');
                                    });


                                  </script>
