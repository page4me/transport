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
        <form action="{{ url('/przedsiebiorca/pisma/print_zdol_finans/' . $przedsiebiorca->id)}}" method="get">
            @csrf

            <div class="card">
                <div class="card-header bg-dark text-light" >
                    <span style="color: #00ddff;font-size:16px;">Przygotowanie pisma o nieaktualnej zdolności finansowej</span>
                </div>
                <div class="card-body">
                    <div class="col-md-4"><label>Wpisz numer sprawy:</label> <input class="form-control" type="text" name="nr_sprawy" /></div>
                    <div class="col-md-4"><label>Wpisz datę pisma:</label> <input class="form-control" type="date" name="data_p" /></div>
                    <div class="col-md-12" style="padding: 20px;"><input class="btn btn-success" type="submit" value="Utwórz pismo" /></div>
                </div>
            </div>
          </form>
          <div><a class="btn btn-primary" href="/przedsiebiorca/{{$przedsiebiorca->id}}" role="button"><i class="fa fa-arrow-left"></i> Szczegóły przedsiębiorcy</a></div><br />
        </div>

@endsection

