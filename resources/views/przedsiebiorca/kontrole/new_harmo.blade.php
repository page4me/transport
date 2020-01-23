@extends('layouts.app')

@section('content')

<div class="container-fluid">
        <div class="col-md-12 text-center bg bg-primary" style="height: 8px;"></div>
        <div class="col-md-12 text-center text-primary shadow-sm p-2 mb-2 bg-white rounded"><h3>PRZEDSIĘBIORCY - <span class="text-warning">KONTROLE</span></h3></div>
    <div class="p-2">
    </div>
    <table class="table table-striped table-sm">
        <thead class="table-primary" style="font-weight:bold;">
            <tr>
              <th class="text-center"><input type="checkbox" id="checkAll"  /></th>
              <th>Nr dokuemntu</th>
              <th>Rodzaj</th>
              <th>Nazwa firmy</th>
              <th>Gmina</th>
            </tr>
        </thead>
        <tbody>


            @foreach($przedsiebiorca as $row)
             <tr>
                <td class="text-center"><input type="checkbox" name="id[]" value="{{$row->id}}" /></td>
                <td class="p-0">{{$row->nazwa_firmy}} <br />{{$row->adres}} <br /> {{$row->kod_p}} {{$row->miejscowosc}}</td>
                <td>{{$row->gmina}}</td>
                <td>@foreach($dok as $dk){{$dk->nr_dok}} @endforeach</td>
             </tr>
            @endforeach
        </tbody>
    </table>
</div>
<script>
  $('#checkAll').click(function () {
     $('input:checkbox').prop('checked', this.checked);
 });
</script>
@endsection
