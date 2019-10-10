
@extends('layouts.app')

@section('content')
<div class="container-fluid">
<div><br />

            <a href="przedsiebiorca/zabezpieczenie/stare" role="button" class="btn btn-danger" style="margin-bottom:5px;">
                Zabezpieczenie finansowe po terminie&nbsp;<span class="badge badge-light">{{$count = \App\Zdolnosc::where('data_do','<',date('Y-m-d'))->count()}}</span>
                <span class="sr-only">unread messages</span>
            </a>
            @if(\App\Baza::where('dat_umowy','<',date('Y-m-d'))->count() != 0)
            <a href="przedsiebiorca/baza/stare" role="button" class="btn btn-danger" style="margin-bottom:5px;">
                Umowa bazy po terminie&nbsp;<span class="badge badge-light">{{$count = \App\Baza::where('dat_umowy','<',date('Y-m-d'))->count()}}</span>
                <span class="sr-only">unread messages</span>
            </a>
            @else
            @endif

            @if(\App\Certyfikat::where('dat_umowy','<',date('Y-m-d'))->count() != 0)
            <a href="przedsiebiorca/zarzadzajacy/stare" role="button" class="btn btn-danger" style="margin-bottom:5px;">
                Umowa z osobą zarządzającą po terminie&nbsp;<span class="badge badge-light">{{$count = \App\Certyfikat::where('dat_umowy','<',date('Y-m-d'))->count()}}</span>
                <span class="sr-only">unread messages</span>
            </a>
            @else
            @endif


  <div class="card bg-dark text-white">
    <div class="row card-body">
       <div class="col-md-3">Przedsiębiorcy - <a href="przedsiebiorca/create" role="button" class="btn btn-success">Dodaj nowego</a></div>
       <div class="col-md-6">
           <form action="/search" method="get">
            <div class="input-group">
                @csrf
               <input type="search" name="search" class="form-control" placeholder="wpisz nr licencji, zezwolenia, zaświadczenia, nip, nazwisko, nazwę firmy">
               <div class="input-group-append">
                 <button class="btn btn-success" type="submit">
                   <i class="fa fa-search"></i>
                 </button>
               </div>
             </div>
            </form>
        </div>
        <div class="col-md-3">
            <button class="btn btn-warning" >Harmonogram kontroli</button>
            &nbsp; <button class="btn btn-info" >Raporty</button>
        </div>
    </div>

  </div>
 <div class="table-responsive">

    <div class="col-md-12">
       @if(empty($wyniki) or $wyniki ==0 )<div class='text-danger text-center col-md-12'> <strong>@if(!empty($brak)) {{$brak}} @else @endif</strong></div>  @else <div class="bg bg-light text-center p-2 text-success">Znalezionych wyników: <strong>{{ $wyniki }}</strong></div>  @endif
    </div>

  <table class="table table-striped table-sm">
    <thead class="table-primary" style="font-weight:bold;">
        <tr>
          <th>Nr licencji</th>
          <th>Rodzaj</th>
          <th>Nazwa firmy</th>
          <th>Imię</th>
          <th>Nazwisko</th>
          <th>Adres</th>
          <th>Miejscowość</th>
          <th>NIP</th>
          <th>Telefon</th>
          <th colspan="4">Akcja</th>
        </tr>
    </thead>
    <tbody>
        @foreach($rodzaje as $petent)
        <tr>
            <td style="width:150px;" @if($petent->status == '2') class="bg-warning" @elseif($petent->status == '3') class="bg-danger text-light" @else  @endif>
              <strong>
                @foreach($rodzaje as $row)
                  @if($petent->id == $row->id)
                    {{$row->nr_dok}}
              </strong></td>
            <td @if($petent->status == '2') class="bg-warning" @elseif($petent->status == '3') class="bg-danger text-light" @else  @endif>
               {{$row->nazwa}} - {{$row->rodz_dok}}
                <br />
                  @if($row->powod != null && $petent->status =='2') <p class="text small"><strong>{{$row->powod}} do {{$row->dat_zaw}}</strong></p> @else @endif
                  @if($row->powod != null && $petent->status =='3') <p class="text small"><strong>{{$row->powod}} </strong></p> @else @endif
                @endif
               @endforeach
            </td>
            <td style="width:280px;" @if($petent->status == '2') class="bg-warning" @elseif($petent->status == '3') class="bg-danger text-light" @else  @endif>{{$petent->nazwa_firmy}}</td>
            <td @if($petent->status == '2') class="bg-warning" @elseif($petent->status == '3') class="bg-danger text-light" @else @endif>{{$petent->imie}}</td>
            <td @if($petent->status == '2') class="bg-warning" @elseif($petent->status == '3') class="bg-danger text-light" @else  @endif>{{$petent->nazwisko}}</td>
            <td @if($petent->status == '2') class="bg-warning" @elseif($petent->status == '3') class="bg-danger text-light" @else  @endif>{{$petent->adres}}</td>
            <td @if($petent->status == '2') class="bg-warning" @elseif($petent->status == '3') class="bg-danger text-light" @else  @endif>{{$petent->miejscowosc}}</td>
            <td @if($petent->status == '2') class="bg-warning" @elseif($petent->status == '3') class="bg-danger text-light" @else  @endif>{{$petent->nip}}</td>
            <td @if($petent->status == '2') class="bg-warning" @elseif($petent->status == '3') class="bg-danger text-light" @else  @endif>{{$petent->telefon}}</td>
            <td style="width:30px;"><a  @if($petent->status == '3')  style = "display:none;" @endif href="{{ route('przedsiebiorca.edit',$petent->id)}}" class="btn btn-sm btn-success" title="Edycja"><i class="fa fa-edit"></a></td>
            <td style="width:40px;text-align:center;">
              @if($petent->status != '2')
                <form  method="get" action="{{ route('zawies', $petent->id) }}">
                  @csrf
                    <a  @if($petent->status == '3')  style = "display:none;" @endif data-toggle="modal" data-id="{{$petent->id}}" role="button" class="openZawies btn btn-warning btn-sm" href="#zawies" title="Zawieszenie"><i class="fa fa-history"></i></a>

                </form>
              @else
              <a  @if($petent->status == '3')  style = "display:none;" @endif data-toggle="modal" data-id="{{$petent->id}}" role="button" class="openOdwies btn btn-info btn-sm" href="#odwies" title="Odwieś"><i class="fa fa-recycle"></i></a>

              @endif


            </td>
            <td style="width:30px;"><a @if($petent->status == '3')  style = "display:none;" @else @endif data-toggle="modal" data-id="{{$petent->id}}" role="button" class="openRezygnuj btn btn-danger btn-sm" href="#rezygnacja" title="Rezygnacja"><i class="fa fa-user-slash fa-1x"></a></td>
            <td><a href="{{ route('przedsiebiorca.show',$petent->id)}}" class="btn btn-sm btn-primary" title="Podgląd"><i class="fa fa-eye"></a></td>
        </tr>
        @endforeach
    </tbody>
  </table>
  <div>{{ $rodzaje->links() }}</div>
  <div class="text-center"><a href="/" role="button" class="btn btn-primary"><i class="fas fa-home fa-lg"></i> Home </a></div>
</div>
<div>
</div>

     <div class="modal fade" id="zawies">
        <div class="modal-dialog" style="margin:0 auto;top:25%;">
          <div class="modal-content">
            <form  method="POST" action="{{ route('zawies', 'id' ) }}" >
            <!-- Modal Header -->

            <div class="modal-header bg-warning">
              <h4 class="modal-title">Zawieszenie licencji / zezwolenia</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                @csrf
                @method('PATCH')
              Wprowadź datę zawieszenia: <input class="form-control" type="date" id="dat_zaw" name="dat_zaw" /><br />
              Podaj powód zawieszenia: <textarea class="form-control" id="powod" name="powod"></textarea><br />
              <input type="hidden" id="idz" name="id" value="@foreach($rodzaje as $petent) {{$petent->id}} @endforeach" />


            </div>
            <!-- Modal footer -->
            <div class="modal-footer">
              <button type="button" class="btn btn-dark" data-dismiss="modal">Zamknij</button>
              <button type="submit" class="btn btn-warning">Zawieś</button>

            </div>
           </form>
          </div>
        </div>
      </div>
      <script>
            $(document).on("click", ".openZawies", function () {
                  var zawId = $(this).data('id');
                  $(".modal-body #idz").val( zawId );

              });
         </script>

    <div class="modal fade" id="odwies">
        <div class="modal-dialog" style="margin:0 auto;top:25%;">
          <div class="modal-content">
            <form  method="POST" action="{{ route('odwies', 'id' ) }}" >
            <!-- Modal Header -->

            <div class="modal-header bg-warning">
              <h5 class="modal-title">Przywrócenie po zawieszeniu licencji / zezwolenia</h5>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                @csrf
                @method('PATCH')
              Wprowadź datę odwieszenia: <input class="form-control" type="date" id="dat_odw" name="dat_odw" /><br />
              <input type="hidden" id="ido" name="id" value="@foreach($rodzaje as $petent) {{$petent->id}} @endforeach" />


            </div>
            <!-- Modal footer -->
            <div class="modal-footer">
              <button type="button" class="btn btn-dark" data-dismiss="modal">Zamknij</button>
              <button type="submit" class="btn btn-success">Odwieś</button>

            </div>
           </form>
          </div>
        </div>
      </div>
      <script>
            $(document).on("click", ".openOdwies", function () {
                  var odwId = $(this).data('id');
                  $(".modal-body #ido").val( odwId );

              });
         </script>

        <div class="modal fade" id="rezygnacja">
            <div class="modal-dialog" style="margin:0 auto;top:25%;">
            <div class="modal-content">
                <form  method="POST" action="{{ route('rezygnacja', 'id' ) }}" >
                <!-- Modal Header -->

                <div class="modal-header bg-danger text-light">
                <h5 class="modal-title">Rezygnacja - Wycofanie z licencji / zezwolenia</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                    @csrf
                    @method('PATCH')
                Wprowadź datę z decyzji: <input class="form-control" type="date" id="dat_rez" name="dat_rez" /><br />
                Podaj powód rezygnacji/wycofania: <textarea class="form-control" id="powod" name="powod"></textarea><br />
                <input type="hidden" id="idr" name="id" value="@foreach($rodzaje as $petent) {{$petent->id}} @endforeach" />


                </div>
                <!-- Modal footer -->
                <div class="modal-footer">
                <button type="button" class="btn btn-dark" data-dismiss="modal">Zamknij</button>
                <button type="submit" class="btn btn-danger">Rezygnuj/Wycofaj</button>

                </div>
            </form>
            </div>
            </div>
        </div>
        <script>
                $(document).on("click", ".openRezygnuj", function () {
                    var rezId = $(this).data('id');
                    $(".modal-body #idr").val( rezId );

                });
            </script>

@endsection
