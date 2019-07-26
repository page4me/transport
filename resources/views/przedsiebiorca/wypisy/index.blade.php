
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

                <td colspan="3">Akcja</td>
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
                  
                  <td><a href="{{ route('przedsiebiorca.edit',$wp->id)}}" class="btn btn-sm btn-success"><i class="fa fa-edit"></a></td>
                  <td><form action="{{ route('przedsiebiorca.destroy', $wp->id)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger" type="submit" id="confirm_delete"><i class="fa fa-trash"></i></button>
                      </form>
                  </td>
                  <td><a href="{{ route('przedsiebiorca.show',$wp->id)}}" class="btn btn-sm btn-primary"><i class="fa fa-eye"></a></td>
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
