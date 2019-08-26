
@extends('layouts.app')

@section('content')
<div class="container-fluid">
<div><br />


  <div class="card bg-dark text-white">
    <div class="card-body">Przedsiębiorcy - <a href="przedsiebiorca/create" role="button" class="btn btn-success">Dodaj nowego</a></div>
  </div>
 <div class="table-responsive">
  <table class="table table-bordered table-striped table-sm">
    <thead class="table-primary" style="font-weight:bold;">
        <tr>
          <td>Nr licencji</td>
          <td>Rodzaj</td>
          <td>Nazwa firmy</td>
          <td>Imię</td>
          <td>Nazwisko</td>
          <td>Adres</td>
          <td>Miejscowość</td>
          <td>NIP</td>
          <td>Telefon<td>
          <td colspan="3">Akcja</td>
        </tr>
    </thead>
    <tbody>
        @foreach($rodzaje as $petent)
        <tr>
            <td><strong>
              @foreach($rodzaje as $row)
                @if($petent->id == $row->id)
                  {{$row->nr_dok}}


            </strong></td>
            <td>

                  {{$row->nazwa}}

              @endif
              @endforeach
            </td>
            <td style="width:250px;">{{$petent->nazwa_firmy}}</td>
            <td>{{$petent->imie}}</td>
            <td>{{$petent->nazwisko}}</td>
            <td>{{$petent->adres}}</td>
            <td>{{$petent->miejscowosc}}</td>
            <td>{{$petent->nip}}</td>
            <td>{{$petent->telefon}}</td>
            <td><a href="{{ route('przedsiebiorca.edit',$petent->id)}}" class="btn btn-sm btn-success"><i class="fa fa-edit"></a></td>
            <td><form action="{{ route('przedsiebiorca.destroy', $petent->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-sm btn-danger" type="submit" id="confirm_deleteXX"><i class="fa fa-trash"></i></button>
                </form>
            </td>
            <td><a href="{{ route('przedsiebiorca.show',$petent->id)}}" class="btn btn-sm btn-primary"><i class="fa fa-eye"></a></td>
        </tr>
        @endforeach
    </tbody>
  </table>
  <div>{{ $rodzaje->links() }}</div>
  <div class="text-center"><a href="/" role="button" class="btn btn-primary"><i class="fas fa-home fa-lg"></i> Home </a></div>
</div>
<div>
</div>
<script type="text/javascript">
    $(document).ready(function(){
        $( "#confirm_delete" ).submit(function( event ) {
            event.preventDefault();
            swal({
                title: 'Are you sure?',
                text: "Please click confirm to delete this item",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No, cancel!',
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger',
                buttonsStyling: true
            }).then(function() {
                    $("#confirm_delete").off("submit").submit();
            }, function(dismiss) {
                // dismiss can be 'cancel', 'overlay',
                // 'close', and 'timer'
                if (dismiss === 'cancel') {
                    swal('Cancelled', 'Delete Cancelled :)', 'error');
                }
            })
        });
    });
</script>

@endsection
