@extends('layouts.app')

@section('content')

<div class="container-fluid">
        <div class="col-md-12 text-center bg bg-primary" style="height: 8px;"></div>
        <div class="col-md-12 text-center text-primary shadow-sm p-2 mb-2 bg-white rounded"><h3>PRZEDSIĘBIORCY - <span class="text-warning">KONTROLE</span></h3></div>
    <div class="p-2">
        @foreach($przedsiebiorca as $row)
            <div class="row">Przedsiębiorca:&nbsp;<strong>{{$row->nazwa_firmy}}</strong></div>
        @endforeach
    </div>
    <table class="table table-striped table-sm">
        <thead class="table-primary" style="font-weight:bold;">
            <tr>
              <th>Lp.</th>
              <th>Nazwa</th>
              <th>Data Od</th>
              <th>Data Do</th>
              <th>Nr sprawy</th>
              <th>Upoważnienie</th>
              <th>Kto</th>
              <th>Zalecenia</th>
              <th>Wynik</th>
              <th>Data ost. kontroli</th>
              <th colspan="4">Akcja</th>
            </tr>
        </thead>
        <tbody>
            <p style="font-size:1px;">{{$a=1}}</p>
            @foreach($kontrole as $kt)
               <tr>
               <td>{{$a++}}</td>
                   <td>{{$kt->nazwa}}</td>
                   <td>{{$kt->dat_roz}}</td>
                   <td>{{$kt->dat_zak}}</td>
                   <td>{{$kt->nr_sprawy}}</td>
                   <td>{{$kt->nr_upo}}</td>
                   <td>{{$kt->kto}}</td>
                   <td>{{$kt->wynik}}</td>
                   <td>{{$kt->dat_ost_kont}}</td>
                   <td></td>
                   <td> <a href="#" class="btn btn-success btn-sm" role="button"><i class="fa fa-edit"></i></a>
                    <a href="#" class="btn btn-primary btn-sm" role="button"><i class="fa fa-eye"></i></a>
                    <a href="#" class="btn btn-warning btn-sm" role="button"><i class="fa fa-bars"></i></a>
                    <a href="#" class="btn btn-danger btn-sm" role="button">pdf</a>
                   </td>

              </tr>
            @endforeach
        </tbody>
    </table>
    @foreach($dok as $dk)
    @endforeach
    <div class="text-center"><a class="btn btn-primary" href="/przedsiebiorca/{{$row->id}}/dokument/{{$dk->nr_dok}}" role="button"><i class="fa fa-arrow-left"></i> Szczegóły przedsiębiorcy</a></div><br />
</div>
@endsection
