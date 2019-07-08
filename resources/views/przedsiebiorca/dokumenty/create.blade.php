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
<div class="card uper">
  <div class="card-header bg-primary text-light">
    Nowy Przedsiebiorca - Licencja / Zezwolenie / Zaswiadczenie - KROK 2
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
      <form method="post" action="{{ route('dokumenty.store') }}">
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
              <label for="imie">Nazwa:</label>
               <select class="form-control" name="nazwa">
                 <option value="0"> </option>
                 <option value="1">Zezwolenie</option>
                 <option value="2">Licencja</option>
                 <option value="3">Zaswiadczenie</option>
                 <option value="4">Licencja 7-9</option>
                 <option value="5">Licencja Posrednictwo</option>
               </select>
          </div>
        </div>

        <div class="row">

          <div class="col-md-3 form-group">
              <label for="adres"><strong>Nr dokumentu:</strong></label>
              <input type="text" class="form-control" name="nr_dok"/>
          </div>
          <div class="col-md-3 form-group">
              <label for="kod_p">Rodzaj:</label>
              <input type="text" class="form-control" name="rodz_dok" maxlength="6" placeholder="osoby/rzeczy"/>
          </div>
           <div class="col-md-3 form-group">
              <label for="miejscowosc">Nr druku:</label>
              <input type="text" class="form-control" name="nr_druku"/>
          </div>
           <div class="col-md-3 form-group">
              <label for="gmina">Nr sprawy:</label>
              <input type="text" class="form-control" name="nr_sprawy"/>
          </div>
        </div>


        <div class="row">
          <div class="col-md-4 form-group">
              <label for="tel">Data wniosku:</label>
              <input type="date" class="form-control" name="data_wn" />
          </div>
          <div class="col-md-4 form-group">
              <label for="tel">Data wydania:</label>
              <input type="date" class="form-control" name="data_wyd" />
          </div>
          <div class="col-md-4 form-group">
              <label for="tel">Data ważnoci:</label>
              <input type="date" class="form-control" name="data_waz" />
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 form-group">
              <label for="uwagi">Uwagi:</label>
              <input type="text" class="form-control" name="uwagi"/>
          </div>
        </div>
          <button type="submit" class="btn btn-success">Utwórz nowy dokument</button>
      </form>

      
  </div>
</div>
</div>
@endsection