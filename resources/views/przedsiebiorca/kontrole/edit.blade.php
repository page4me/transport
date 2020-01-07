<!-- create.blade.php -->

@extends('layouts.app')

@section('content')
<style>

  .header-1 {
    background-color: #3399ff;
    color: #fff;
  }

</style>
<div class="container-fluid">
    <div class="col-md-12 text-center bg bg-primary" style="height: 8px;"></div>
    <div class="col-md-12 text-center text-primary shadow-sm p-2 mb-2 bg-white rounded"><h3>PRZEDSIĘBIORCY - <span class="text-warning">KONTROLE</span></h3></div>
  <div class="p-2">
<div class="container">

<div class="card uper">
  <div class="card-header bg-success text-light">
    Edycja kontroli przedsiębiorcy - Nr
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
      <form method="post" action="">
        <div class="row">
              @csrf

        </div>

        <div class="row">
          <div class="col-md-3 form-group">
              <label for="nazwa"><strong>Nazwa kontroli:</strong></label>
              <input type="text" class="form-control" name="nazwa" />
          </div>
           <div class="col-md-3 form-group">
              <label for="dat_roz">Data rozporzczęcia:</label>
              <input type="date" class="form-control" name="dat_roz"/>
          </div>
           <div class="col-md-3 form-group">
              <label for="dat_zak">Data zakończenia:</label>
              <input type="date" class="form-control" name="dat_zak"/>
          </div>
          <div class="col-md-3 form-group">
            <label for="dat_zawiad">Zawiadomienie:</label>
            <input type="date" class="form-control" name="dat_zawiad"/>
        </div>
        </div>


        <div class="row">
          <div class="col-md-4 form-group">
                <label for="nr_sprawy">Numer sprawy:</label>
                <input type="text" class="form-control" name="nr_sprawy" />
          </div>
          <div class="col-md-3 form-group">
              <label for="nr_upo">Numer upoważnienia:</label>
              <input type="text" class="form-control" name="nr_upo" />
          </div>
          <div class="col-md-5 form-group">
            <label for="kto">Osoba przeprowadzająca kontrolę:</label>
            <input type="text" class="form-control" name="kto" />
          </div>

        </div>
        <div class="row">
            <div class="col-md-4 form-group">
                  <label for="wynik">Wynik kontroli:</label>
                  <input type="text" class="form-control" name="wynik" />
            </div>
            <div class="col-md-4 form-group">
                <label for="dat_zal">Data zaleceń pokontrolnych:</label>
                <input type="date" class="form-control" name="dat_zal" />
            </div>
          </div>
        <div class="row">
            <div class="col-md-12 form-group">
                <label for="zalecenia"><strong>Zalecenia pokontrolne:</strong></label>
                <input id="nk" type="text" class="form-control" name="zalecenia" />
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 form-group">
                  <label for="wyn_pokont">Wynik po zalceniach:</label>
                  <input type="text" class="form-control" name="wyn_pokont" />
            </div>
            <div class="col-md-4 form-group">
                <label for="dat_ost_kont">Data ostatniej kontroli:</label>
                <input type="date" class="form-control" name="dat_ost_kont" />
            </div>
        </div>
        <div class="row">
          <div class="col-md-12 form-group">
              <label for="uwagi">Uwagi:</label>
              <input type="text" class="form-control" name="uwagi"/>
          </div>
        </div>
          <button type="submit" class="btn btn-success">Zapisz dane</button>
      </form>


  </div>
</div>
</div>
</div>
</div>
<script type="text/javascript">
tinymce.init({
      selector: '#nk',
      language: 'pl'
    });
</script>
@endsection
