@extends('layouts.app')

@section('content')
@php $id_dok = \App\DokumentyPrzed::all()->where('nr_dok','=',$_GET['nr_dok']); @endphp

@foreach($id_dok as $id)

@endforeach

<div class="container-fluid">
    <div class="col-md-12 text-center bg bg-primary" style="height: 8px;"></div>
    <div class="col-md-12 text-center text-primary shadow-sm p-2 mb-2 bg-white rounded"><h3>PRZEDSIĘBIORCY</h3></div>
<div class="p-2">


<div class="container">

<div class="p-2">

<div>
        <div class="card-header bg-success text-light">
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
               <label for="miejscowosc">Miejscowość:</label>
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
               <select class="form-control" name="os_zarz">
                @if($oz->os_zarz =='Tak')
                <option value="{{$oz->os_zarz}}">{{$oz->os_zarz}}</option>
                <option value="Nie">Nie</option>
                @else
                <option value="{{$oz->os_zarz}}">{{$oz->os_zarz}}</option>
                <option value="Tak">Tak</option>
                @endif
              </select>
           </div>
           <div class="col-md-4 form-group">
               <label for="tel">Umowa:</label>
               <select name="umowa" id="umowa" pk="1"  @if($oz->os_zarz =='Tak') disabled class="form-control" @elseif($oz->os_zarz =='Nie') class="form-control border-danger" @endif>
                @if(empty($oz->umowa))
                    <option value="0"></option>
                    <option value="umowa najmu">umowa najmu</option>
                    <option value="umowa użyczenia">umowa użyczenia</option>
                @else
                   @if($oz->umowa =='umowa najmu')
                        <option value="{{$oz->umowa}}">{{$oz->umowa}}</option>
                        <option value="umowa użyczenia">umowa użyczenia</option>
                    @elseif($oz->umowa =='umowa użyczenia')
                        <option value="{{$oz->umowa}}">{{$oz->umowa}}</option>
                        <option value="umowa najmu">umowa najmu</option>
                    @endif
                @endif

            </select>
            <input type="checkbox" name="umowa_nie" pk="3" id="umowa_nie" @if(empty($oz->umowa)) @elseif(!empty($oz->umowa)) checked @else @endif  @if($oz->os_zarz=="Tak") disabled @else @endif /> na czas nieokreślony
            </div>
           <div class="col-md-4 form-group">
               <label for="data">Data umowy:</label>
               <input type="date" name="dat_umowy" value="{{$oz->dat_umowy}}" @if($oz->os_zarz=='Tak') class="form-control" disabled @else class="form-control border-danger" @endif />
           </div>
         </div>
         <div class="row">
           <div class="col-md-12 form-group">
               <label for="uwagi">Uwagi:</label>
               <textarea class="form-control" id="osz" name="uwagi" value="{{$oz->uwagi}}"  />{{$oz->uwagi}}</textarea>
           </div>
         </div>
           <button type="submit" class="btn btn-success">Zapisz zmiany zarządzającego</button>
       </form>

       <script type="text/javascript">
        tinymce.init({
          selector: '#zf',
          language: 'pl'
        });
        tinymce.init({
          selector: '#osz',
          language: 'pl'
        });
        tinymce.init({
          selector: '#bz',
          language: 'pl'
        });
        tinymce.init({
          selector: '#dk',
          language: 'pl'
        });
        tinymce.init({
          selector: '#pp',
          language: 'pl'
        });
        </script>



   </div>



 </div>
</div>

</div>
<div class="text-center"><a href="/przedsiebiorca/{{$id->id_przed}}/dokument/{{$id->nr_dok}}" role="button" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Szczegóły przedsiębiorcy</a></div>
</div>
@endsection
