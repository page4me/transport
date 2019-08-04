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
 <nav>
  <div class="nav nav-tabs" id="nav-tab" role="tablist">
    <a class="nav-item nav-link active bg-warning" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Edycja danych</a>
    <a class="nav-item nav-link bg-primary text-light" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Edycja dokumentów</a>
    <a class="nav-item nav-link bg-dark text-light" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Edycja bazy</a>
    <a class="nav-item nav-link bg-info text-light" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Edycja osoby zarządzającej</a>
    <a class="nav-item nav-link bg-success text-light" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Edycja zabezpieczenia finansowego</a>
  </div>
</nav>
<div class="tab-content" id="nav-tabContent">
  <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
    <div class="card-header bg-warning text-dark">
   <strong>Edycja danych przedsiębiorcy</strong>
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
      <form method="post" action="{{ route('przedsiebiorca.update', $przedsiebiorca->id) }}">
        <div class="row">
              @csrf
               @method('PATCH')
          <div class="col-md-12 form-group">
              <label for="Nazwa firmy"><B>Nazwa firmy - zgodnie z CEIDG:</B></label>
              <input type="text" class="form-control" name="nazwa_firmy" value="{{$przedsiebiorca->nazwa_firmy}}" />
          </div>
        </div>
        <div class="row">
          <div class="col-md-4 form-group">
              <label for="rodzaj">Rodzaj przedsiębiorcy:</label>
              <select class="form-control" name="id_osf" id="id_osf" >
                 @foreach($rodzaje as $rodzaj)                                  
                     <option value="{{$rodzaj->id}}" @if($przedsiebiorca->id_osf == $rodzaj->id) selected @endif>{{$rodzaj->rodzaj}}</option>
                 @endforeach
              </select>
          </div>
          <div class="col-md-4 form-group">
              <label for="imie">Imię:</label>
              <input type="text" class="form-control" name="imie" value="{{$przedsiebiorca->imie}}"/>
          </div>
         <div class="col-md-4 form-group">
              <label for="nazwisko">Nazwisko:</label>
              <input type="text" class="form-control" name="nazwisko" value="{{$przedsiebiorca->nazwisko}}"/>
          </div>
        </div>
        <div class="row">
          
          <div class="col-md-3 form-group">
              <label for="adres">Adres:</label>
              <input type="text" class="form-control" name="adres" value="{{$przedsiebiorca->adres}}"/>
          </div>
          <div class="col-md-3 form-group">
              <label for="kod_p">Kod pocztowy:</label>
              <input type="text" class="form-control" name="kod_p" maxlength="6" placeholder="xx-xxx" value="{{$przedsiebiorca->kod_p}}"/>
          </div>
           <div class="col-md-3 form-group">
              <label for="miejscowosc">Miejscowość:</label>
              <input type="text" class="form-control" name="miejscowosc" value="{{$przedsiebiorca->miejscowosc}}"/>
          </div>
           <div class="col-md-3 form-group">
              <label for="gmina">Gmina:</label>
              <input type="text" class="form-control" name="gmina" value="{{$przedsiebiorca->gmina}}"/>
          </div>
        </div>
        
        <div class="row">
          <div class="col-md-6 form-group">
              <label for="nip">NIP:</label>
              <input type="text" class=" form-control" name="nip" maxlength="11" value="{{$przedsiebiorca->nip}}" />
            
          </div>
          <div class="col-md-6 form-group">
              <label for="regon">REGON:</label>
              <input type="text" class="form-control" name="regon" maxlength="9" value="{{$przedsiebiorca->regon}}"/>
               
          </div>
        </div>
        <div class="row">
          <div class="col-md-6 form-group">
              <label for="tel">Telefon:</label>
              <input type="text" class="form-control" name="telefon" maxlength="10" value="{{$przedsiebiorca->telefon}}"/>
          </div>
          <div class="col-md-6 form-group">
              <label for="tel">E-mail:</label>
              <input type="text" class="form-control" name="email" value="{{$przedsiebiorca->email}}"/>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 form-group">
              <label for="uwagi">Uwagi:</label>
              <input type="text" class="form-control" name="uwagi" value="{{$przedsiebiorca->uwagi}}"/>
          </div>
        </div>
          <button type="submit" class="btn btn-success">Zapisz zmiany przedsiębiorcy</button>
      </form>
      <br />
    </div>

  </div>
  <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
    <div class="card-header bg-primary text-light">
       <strong>Edycja dokumentów przedsiębiorcy</strong>
      </div>
     <div style="margin: 20px;">
       @foreach($dok as $row)
      <form method="post" action="{{ route('dokumenty.update', $row->id) }}">
        <div class="row">
              @csrf
              @method('PATCH')
          <div class="col-md-8 form-group">
              <label for="id_przed">Przedsiębiorca:</label>
              <input type="text" class="form-control" name="nazwa_firmy" value="{{$przedsiebiorca->nazwa_firmy}}" disabled="disabled"/>
              <input type="hidden""  name="id_przed" value="{{$przedsiebiorca->id}}"/>
          </div>
         
           <div class="col-md-4 form-group">
              <label for="nazwa">Nazwa dokumentu:</label>
              <input type="text" class="form-control" name="nazwa" value="{{$row->nazwa}}"  /> 
          </div>
          @endforeach
        </div>

        <div class="row">

          <div class="col-md-3 form-group">
              <label for="adres"><strong>Nr dokumentu:</strong></label>
              <input type="text" class="form-control" name="nr_dok" value="{{$row->nr_dok}}" />
          </div>
          <div class="col-md-3 form-group">
              <label for="kod_p">Rodzaj:</label>
              <input type="text" class="form-control" name="rodz_dok" maxlength="6" placeholder="osoby/rzeczy" value="{{$row->rodz_dok}}" />
          </div>
           <div class="col-md-3 form-group">
              <label for="miejscowosc">Nr druku:</label>
              <input type="text" class="form-control" name="nr_druku" value="{{$row->nr_druku}}" />
          </div>
           <div class="col-md-3 form-group">
              <label for="gmina">Nr sprawy:</label>
              <input type="text" class="form-control" name="nr_sprawy" value="{{$row->nr_sprawy}}" />
          </div>
        </div>


        <div class="row">
          <div class="col-md-4 form-group">
              <label for="tel">Data wniosku:</label>
              <input type="date" class="form-control" name="data_wn" value="{{$row->data_wn}}" />
          </div>
          <div class="col-md-4 form-group">
              <label for="tel">Data wydania:</label>
              <input type="date" class="form-control" name="data_wyd" value="{{$row->data_wyd}}" />
          </div>
          <div class="col-md-4 form-group">
              <label for="tel">Data ważności:</label>
              <input type="date" class="form-control" name="data_waz" value="{{$row->data_waz}}" />
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 form-group">
              <label for="uwagi">Uwagi:</label>
              <input type="text" class="form-control" name="uwagi" value="{{$row->uwagi}}" />
          </div>
        </div>
          <button type="submit" class="btn btn-success">Zapisz zmiany dokumentów</button>
      </form>
     </div>
  </div>
  <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
       <div class="card-header bg-dark text-light">
       <strong>Edycja bazy eksploatacyjnej przedsiębiorcy</strong>
      </div>
     <div style="margin: 20px;">
      <form method="post" action="{{ route('baza.store') }}">
        <div class="row">
              @csrf

          <div class="col-md-8 form-group">
               <label for="id_przed">Przedsiębiorca:</label>
              <input type="text" class="form-control" name="nazwa_firmy" value="{{$przedsiebiorca->nazwa_firmy}}" disabled="disabled"/>
              <input type="hidden""  name="id_przed" value="{{$przedsiebiorca->id}}"/>
          </div>
           <div class="col-md-4 form-group">
              <label for="imie">Rodzaj:</label>
               <select class="form-control" name="rodzaj" id="rodzaj" >
                 <option value="0"> </option>
                 <option value="1">Miejsce postojowe</option>
                 <option value="2">Miejsce załadunku/rozładunku</option>
                 <option value="3">Konserwacja i naprawa</option>
               </select>
          </div>
        </div>

        <div class="row">

          <div class="col-md-3 form-group">
              <label for="adres">Adres:</label>
              <input type="text" class="form-control" name="adres"/>
          </div>
          <div class="col-md-3 form-group">
              <label for="kod_p">Kod pocztowy:</label>
              <input type="text" class="form-control" name="kod_p" maxlength="6" placeholder="xx-xxx"/>
          </div>
           <div class="col-md-3 form-group">
              <label for="miejscowosc">Miejscowość:</label>
              <input type="text" class="form-control" name="miasto"/>
          </div>
           <div class="col-md-3 form-group">
              <label for="gmina">Gmina:</label>
              <input type="text" class="form-control" name="gmina"/>
          </div>
        </div>


        <div class="row">
          <div class="col-md-4 form-group">
              <label for="tel">Własność:</label>
              <input type="text" class="form-control" name="wlasnosc" />
          </div>
          <div class="col-md-4 form-group">
              <label for="tel">Umowa:</label>
              <input type="text" class="form-control" name="umowa" />
          </div>
          <div class="col-md-4 form-group">
              <label for="tel">Data umowy:</label>
              <input type="text" class="form-control" name="dat_umowy" />
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 form-group">
              <label for="uwagi">Uwagi:</label>
              <input type="text" class="form-control" name="uwagi"/>
          </div>
        </div>
          <button type="submit" class="btn btn-success">Zapisz zmiany bazy</button>
      </form>
  </div>
</div>

  

      
   
  </div>
</div>
<div class="text-center"><a href="/przedsiebiorca" role="button" class="btn btn-primary"><i class="fas fa-home fa-lg"></i> Przedsiębiorcy </a></div>
</div>
@endsection