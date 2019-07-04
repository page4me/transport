
@extends('layouts.app')

@section('content')
<div class="container-fluid">
<div>
  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}
    </div><br />
  @endif
  <div class="card bg-dark text-white">
    <div class="card-body">Przedsiębiorcy - <a href="przedsiebiorca/create" role="button" class="btn btn-success">Dodaj nowego</a></div>
  </div>
 <div class="table-responsive">
  <table class="table table-bordered table-sm">
    <thead class="table-primary" style="font-weight:bold;">
        <tr>
          <td>Nr licencji</td>
          <td>Nazwa firmy</td>
          <td>Imię</td>
          <td>Nazwisko</td>
          <td>Adres</td>
          <td>Miejscowosć</td>
          <td>NIP</td>
          <td>REGON</td>
          <td>Telefon<td>
          <td colspan="3">Akcja</td>
        </tr>
    </thead>
    <tbody>
        @foreach($przedsiebiorca as $petent)
        <tr>
            <td><strong>
              @foreach($rodzaje as $row)
                @if($petent->id == $row->id)
                  {{$row->nr_dok}}
                @endif
              @endforeach 
            </strong></td>
            <td>{{$petent->nazwa_firmy}}</td>
            <td>{{$petent->imie}}</td>
            <td>{{$petent->nazwisko}}</td>
            <td>{{$petent->adres}}</td>
            <td>{{$petent->miejscowosc}}</td>
            <td>{{$petent->nip}}</td>
            <td>{{$petent->regon}}</td>
            <td>+48 {{$petent->telefon}}</td>
            <td><a href="{{ route('przedsiebiorca.edit',$petent->id)}}" class="btn btn-sm btn-success">Edytuj</a></td>
            <td><form action="{{ route('przedsiebiorca.destroy', $petent->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-sm btn-danger" type="submit">Usuń</button>
                </form>
            </td>
            <td><a href="{{ route('przedsiebiorca.show',$petent->id)}}" class="btn btn-sm btn-primary">Podgląd</a></td>
        </tr>
        @endforeach
    </tbody>
  </table>
</div>
<div>
</div>
@endsection