
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
            <span class="badge badge-success" style="font-size:14px;">Stan na dzień: @foreach($wypisy as $wp){{$wp->data_wyd}}@endforeach  r.</span>
            <br /><br /><a href="#" target="_blank" role="button" class="btn btn-warning">Wypisy PDF</a>
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
         <thead class="table-primary" style="font-weight:bold;">
              <tr>
                <td>Nr wypisu</td>
                <td>Nr druku</td>
                <td>Nr dokumentu</td>
                <td>Nazwa</td>
                <td>Rodzaj wypisu</td>
                <td>Data wniosku</td>
                <td>Data wydania</td>

                <td colspan="4">Akcja</td>
              </tr>
          </thead>
          <tbody>
              @foreach($wypisy as $wp)
              <tr>
                  <td>{{$wp->nr_wyp}}</td>
                  <td>{{$wp->nr_druku}}</td>
                  <td>@foreach($dok as $dk) {{$dk->nr_dok}} @endforeach</td>
                  <td>{{$wp->nazwa}}</td>

                  <td>{{$wp->rodzaj_wyp}}</td>
                  <td>{{$wp->data_wn}}</td>
                  <td>{{$wp->data_wyd}}</td>

                  <td><a href="{{ route('przedsiebiorca.edit',$wp->id)}}" class="btn btn-sm btn-success btn-sm"><i class="fa fa-edit"></a></td>
                  <td><form action="{{ route('przedsiebiorca.destroy', $wp->id)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger" type="submit" id="confirm_delete btn-sm"><i class="fa fa-trash"></i></button>
                      </form>
                  </td>
                  <td><a href="{{ route('przedsiebiorca.show',$wp->id)}}" class="btn btn-sm btn-primary btn-sm"><i class="fa fa-eye"></i></a></td>
                  <td><a href="{{ route('przedsiebiorca.show',$wp->id)}}" class="btn btn-sm btn-warning btn-sm">Depozyt</a></td>
              </tr>
              @endforeach
          </tbody>
        </table>


         </div>
       </div>
 </div>
 <div><a class="btn btn-primary" href="/przedsiebiorca/{{$przedsiebiorca->id}}" role="button"><i class="fa fa-arrow-left"></i> Szczegóły przedsiębiorcy</a></div><br />
</div>
</div>
