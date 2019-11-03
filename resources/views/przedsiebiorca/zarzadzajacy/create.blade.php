<!-- create.blade.php -->

@extends('layouts.app')

@section('content')
<style>
  .uper {
    margin-top: 40px;

  }
  .header-1 {
    background-color: #3399ff;
    color: #fff;
  }

</style>
<div class="container">
   <div style="padding-top: 20px;margin: 0 auto; text-align: center;">
    <i class="fa fa-truck-monster fa-3x"></i>&nbsp;&nbsp;
    <i class="far fa-arrow-alt-circle-right fa-3x " ></i>&nbsp;&nbsp;
    <i class="fa fa-truck-monster fa-3x"></i>&nbsp;&nbsp;
    <i class="far fa-arrow-alt-circle-right fa-3x"></i>&nbsp;&nbsp;
    <i class="fa fa-truck-monster fa-3x"></i>&nbsp;&nbsp;
    <i class="far fa-arrow-alt-circle-right fa-3x"></i>&nbsp;&nbsp;
    <i class="fa fa-truck-monster fa-3x"></i>&nbsp;&nbsp;
    <i class="far fa-arrow-alt-circle-right fa-3x "></i>&nbsp;&nbsp;
    <i class="fa fa-truck-monster fa-3x " style="color: #e0e0e0;"></i>&nbsp;&nbsp;
  </div>
<div class="card uper">
  <div class="card-header bg-primary text-light">
    Nowy Przedsiebiorca - Osoba zarządzająca KROK 4
  </div>
  <div class="card-body" >
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
      <form method="post" action="{{ route('zarzadzajacy.store') }}">
        <div class="row">
              @csrf

          <div class="col-md-8 form-group">
              <label for="id_przed">Przedsiębiorca:</label>
             <select class="form-control" name="id_przed" id="id_przed">

                 @foreach($przedsiebiorca as $row)

                        <option value="{{$row->id}}">{{$row->nazwa_firmy}}, {{$row->adres}}, {{$row->miejscowosc}}, NIP: {{$row->nip}}</option>

                 @endforeach
              </select>
          </div>
           <div class="col-md-4 form-group">
              <label for="imie">Rodzaj:</label>
               <select class="form-control" name="rodzaj" id="rodzaj" >
                 <option value="0"> </option>
                 <option value="rzeczy">Rzeczy</option>
                 <option value="osoby">Osób</option>

               </select>
          </div>
        </div>

        <div class="row">

          <div class="col-md-3 form-group">
              <label for="adres">Nr certyfikatu:</label>
              <input type="text" class="form-control" name="nr_cert"/>
          </div>
          <div class="col-md-3 form-group">
              <label for="">Imię:</label>
              <input type="text" class="form-control" name="imie_os_z" />
          </div>
           <div class="col-md-3 form-group">
              <label for="miejscowosc">Nazwisko:</label>
              <input type="text" class="form-control" name="nazwisko_os_z"/>
          </div>
           <div class="col-md-3 form-group">
              <label for="gmina">Data urodzenia:</label>
              <input type="date" class="form-control" name="dat_ur"/>
          </div>
        </div>

        <div class="row">

          <div class="col-md-4 form-group">
              <label for="adres">Adres:</label>
              <input type="text" class="form-control" name="adres"/>
          </div>
           <div class="col-md-4 form-group">
              <label for="miejscowosc">Miejscowość:</label>
              <input type="text" class="form-control" name="miasto"/>
          </div>
           <div class="col-md-4 form-group">
              <label for="data">Data wydania:</label>
              <input type="date" class="form-control" name="dat_wyd"/>
          </div>
        </div>


        <div class="row">
          <div class="col-md-4 form-group">
              <label for="tel">Zarządzający:</label>
              <input type="text" class="form-control" name="os_zarz" />
          </div>
          <div class="col-md-4 form-group">
              <label for="tel">Umowa:</label>
              <input type="text" class="form-control" name="umowa" />
          </div>
          <div class="col-md-4 form-group">
              <label for="data">Data umowy:</label>
              <input type="date" class="form-control" name="dat_umowy" />
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 form-group">
              <label for="uwagi">Uwagi:</label>
              <input type="text" class="form-control" name="uwagi"/>
          </div>
        </div>
        @php $dok = \App\DokumentyPrzed::where('id_przed', $row->id)->latest()->get(); @endphp
            @foreach($dok as $dk)
            @endforeach
          <input type="hidden" name="id_dok_przed" value="{{$dk->nr_dok}}" />
          <button type="submit" class="btn btn-success">Dodaj osobę zarządzającą</button>
      </form>
  </div>
</div>
</div>
@endsection
