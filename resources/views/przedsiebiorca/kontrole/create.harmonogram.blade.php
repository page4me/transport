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
              <th><input type="checkbox" /></th>
              <th>Lp.</th>
              <th>Nr licencji</th>
              <th>Rodzaj</th>
              <th>Nazwa firmy</th>
              <th>Imię</th>
              <th>Nazwisko</th>
              <th>Miejscowość</th>
              <th>Gmina</th>
              <th>Telefon</th>
              <th colspan="4">Akcja</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
</div>
@endsection
