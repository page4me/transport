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
  <div class="nav nav-pills" id="nav-tab" role="tablist" style="padding: 10px;">
    <a class="nav-item nav-link bg-dark" style="color:#fff;" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Edycja danych</a>&nbsp;&nbsp;
    <a class="nav-item nav-link bg-success text-light" style="padding:10px;" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Edycja dokumentów</a>&nbsp;&nbsp;
    <a class="nav-item nav-link bg-success text-light" style="padding:10px;" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Edycja bazy</a>&nbsp;&nbsp;
    <a class="nav-item nav-link bg-success text-light" style="padding:10px;" id="nav-osz-tab" data-toggle="tab" href="#nav-osz" role="tab" aria-controls="nav-osz" aria-selected="false">Edycja osoby zarządzającej</a>&nbsp;&nbsp;
    <a class="nav-item nav-link bg-success text-light" style="padding:10px;" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Edycja zabezpieczenia finansowego</a>
  </div>
</nav>
<div class="tab-content" id="nav-tabContent">
  <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
    <div class="card-header">
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
    <div class="card-header">
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
       <div class="card-header">
       <strong>Edycja bazy eksploatacyjnej przedsiębiorcy</strong>
      </div>
     <div style="margin: 20px;">
     @foreach($baza as $bz)

      <form method="post" action="{{ route('baza.update', $bz->id) }}">
        <div class="row">
              @csrf
              @method('PATCH')
          <div class="col-md-8 form-group">
               <label for="id_przed">Przedsiębiorca:</label>
              <input type="text" class="form-control" name="nazwa_firmy" value="{{$przedsiebiorca->nazwa_firmy}}" disabled="disabled"/>
              <input type="hidden""  name="id_przed" value="{{$przedsiebiorca->id}}"/>
          </div>
           <div class="col-md-4 form-group">
              <label for="imie">Rodzaj:</label>
               <select class="form-control" name="rodzaj" id="rodzaj" value="{{$bz->rodzaj}}" >

                 @if($bz->rodzaj =='1')
                      <option value="{{$bz->rodzaj}}">Miejsce postojowe</option>
                      <option value="2">Miejsce załadunku/rozładunku</option>
                      <option value="3">Konserwacja i naprawa</option>
                 @elseif($bz->rodzaj =="2")
                      <option value="{{$bz->rodzaj}}">Miejsce załadunku/rozładunku</option>
                      <option value="1">Miejsce postojowe</option>
                      <option value="3">Konserwacja i naprawa</option>
                 @elseif($bz->rodzaj =="3")
                      <option value="{{$bz->rodzaj}}">Konserwacja i naprawa</option>
                      <option value="1">Miejsce postojowe</option>
                      <option value="2">Miejsce załadunku/rozładunku</option>
                 @endif
               </select>
          </div>
        </div>

        <div class="row">

          <div class="col-md-3 form-group">
              <label for="adres">Adres:</label>
              <input type="text" class="form-control" name="adres" value="{{$bz->adres}}" />
          </div>
          <div class="col-md-3 form-group">
              <label for="kod_p">Kod pocztowy:</label>
              <input type="text" class="form-control" name="kod_p" maxlength="6" placeholder="xx-xxx" value="{{$bz->kod_p}}" />
          </div>
           <div class="col-md-3 form-group">
              <label for="miejscowosc">Miejscowość:</label>
              <input type="text" class="form-control" name="miasto" value="{{$bz->miasto}}" />
          </div>
           <div class="col-md-3 form-group">
              <label for="gmina">Gmina:</label>
              <input type="text" class="form-control" name="gmina" value="{{$bz->gmina}}" />
          </div>
        </div>
        @endforeach

        <div class="row">
          <div class="col-md-4 form-group">
              <label for="tel">Własność:</label>
              <input type="text" class="form-control" name="wlasnosc" value="{{$bz->wlasnosc}}" />
          </div>
          <div class="col-md-4 form-group">
              <label for="tel">Umowa:</label>
              <input type="text" class="form-control" name="umowa" value="{{$bz->umowa}}" />
          </div>
          <div class="col-md-4 form-group">
              <label for="tel">Data umowy:</label>
              <input type="text" class="form-control" name="dat_umowy" value="{{$bz->dat_umowy}}" />
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 form-group">
              <label for="uwagi">Uwagi:</label>
              <input type="text" class="form-control" name="uwagi" value="{{$bz->uwagi}}" />
          </div>
        </div>
          <button type="submit" class="btn btn-success">Zapisz zmiany bazy</button>
      </form>
  </div>
</div>

<div class="tab-pane fade" id="nav-osz" role="tabpanel" aria-labelledby="nav-osz-tab">
       <div class="card-header">
       <strong>Edycja osoby zarządającej</strong>
      </div>
     <div style="margin: 20px;padding-top: 1px;">
     @foreach($osz as $oz)
     <form method="post" action="{{ route('zarzadzajacy.update', $oz->id) }}">
        <div class="row">
              @csrf
              @method('PATCH')
          <div class="col-md-8 form-group">
              <label for="id_przed">Przedsiębiorca:</label>
              <input type="text" class="form-control" name="nazwa_firmy" value="{{$przedsiebiorca->nazwa_firmy}}" disabled="disabled"/>
              <input type="hidden""  name="id_przed" value="{{$przedsiebiorca->id}}"/>

          </div>
           <div class="col-md-4 form-group">
              <label for="imie">Rodzaj:</label>
               <select class="form-control" name="rodzaj" id="rodzaj" value="{{$oz->rodzaj}}">
                @if($oz->rodzaj =='rzeczy')
                 <option value="rzeczy">Rzeczy</option>
                 <option value="osoby">Osoby</option>
                 @elseif($oz->rodzaj =='osoby')
                 <option value="osoby">Osoby</option>
                 <option value="rzeczy">Rzeczy</option>
                @endif
               </select>
          </div>
        </div>

        <div class="row">

          <div class="col-md-3 form-group">
              <label for="adres"><strong>Nr certyfikatu:</strong></label>
              <input type="text" class="form-control" name="nr_cert" value="{{$oz->nr_cert}}" />
          </div>
          <div class="col-md-3 form-group">
              <label for="">Imię:</label>
              <input type="text" class="form-control" name="imie_os_z" value="{{$oz->imie_os_z}}" />
          </div>
           <div class="col-md-3 form-group">
              <label for="miejscowosc">Nazwisko:</label>
              <input type="text" class="form-control" name="nazwisko_os_z" value="{{$oz->nazwisko_os_z}}" />
          </div>
           <div class="col-md-3 form-group">
              <label for="gmina">Data urodzenia:</label>
              <input type="date" class="form-control" name="dat_ur" value="{{$oz->dat_ur}}" />
          </div>
        </div>

        <div class="row">

          <div class="col-md-4 form-group">
              <label for="adres">Adres:</label>
              <input type="text" class="form-control" name="adres" value="{{$oz->adres}}" />
          </div>
           <div class="col-md-4 form-group">
              <label for="miejscowosc">Miejscowosć:</label>
              <input type="text" class="form-control" name="miasto" value="{{$oz->miasto}}" />
          </div>
           <div class="col-md-4 form-group">
              <label for="data">Data wydania:</label>
              <input type="date" class="form-control" name="dat_wyd" value="{{$oz->dat_wyd}}" />
          </div>
        </div>

        @endforeach
        <div class="row">
          <div class="col-md-4 form-group">
              <label for="tel">Zarządzający:</label>
              <input type="text" class="form-control" name="os_zarz" value="{{$oz->os_zarz}}" />
          </div>
          <div class="col-md-4 form-group">
              <label for="tel">Umowa:</label>
              <input type="text" class="form-control" name="umowa" value="{{$oz->umowa}}" />
          </div>
          <div class="col-md-4 form-group">
              <label for="data">Data umowy:</label>
              <input type="date" class="form-control" name="dat_umowy" value="{{$oz->dat_umowy}}" />
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 form-group">
              <label for="uwagi">Uwagi:</label>
              <input type="text" class="form-control" name="uwagi" value="{{$oz->uwagi}}" />
          </div>
        </div>
          <button type="submit" class="btn btn-success">Zapisz zmiany zarządzającego</button>
      </form>





  </div>
</div>
<div class="text-center"><a href="/przedsiebiorca" role="button" class="btn btn-primary"><i class="fas fa-home fa-lg"></i> Przedsiębiorcy </a></div>
</div>
@endsection
