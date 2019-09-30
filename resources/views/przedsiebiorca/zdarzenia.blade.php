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
<div class="container-fluid" style="margin:0 auto;text-align:center;font-size:13px;">
    <table class="table table-bordered">
        <thead class="bg-warning">
            <th>Zdarzenia - zdolność finansowa</th>
            <th>Zdarzenia - osoba zarządzająca</th>
            <th>Zdarzenia - baza eksploatacyjna</th>
        </thead>
        <tbody>
            <tr>
                <td class="text-left">
                        <p style="font-size:1px;">{{$i=1}}</p>
                        @foreach($zdolnosc as $zdl)
                          @if($zdl->data_do < date('Y-m-d'))

                             <div class="alert alert-danger">
                                <strong>{{$i++}}</strong> - {{$ilosc_zdlolnosci_po_terminie= \App\Przedsiebiorca::find($zdl->id_przed)->nazwa_firmy}}
                                 - <strong> {{$zdl->data_do}} po terminie {{$dni = (strtotime($zdl->data_do) - strtotime(date('Y-m-d'))) / (60*60*24)}} dni</strong> <a role="button" class="btn btn-danger btn-sm text-light" href="{{ route('przedsiebiorca.show',$zdl->id_przed)}}">Podgląd</a>
                              </div>

                          @endif
                        @endforeach
                </td>
                <td class="text-left">
                        <p style="font-size:1px;">{{$i=1}}</p>
                        @foreach($certyfikat as $oz)
                          @if($oz->dat_umowy != null && $oz->dat_umowy < date('Y-m-d'))

                             <div class="alert alert-danger">
                                <strong>{{$i++}}</strong> - {{$ilosc_bazy_po_terminie= \App\Przedsiebiorca::find($oz->id_przed)->nazwa_firmy}}
                                 - <strong> {{$oz->dat_umowy}} po terminie {{$dni = (strtotime($oz->dat_umowy) - strtotime(date('Y-m-d'))) / (60*60*24)}} dni</strong>
                                 <a role="button" class="btn btn-danger btn-sm text-light" href="{{ route('przedsiebiorca.show',$oz->id_przed)}}">Podgląd</a>
                              </div>

                          @endif
                        @endforeach
                </td>
                <td class="text-left">
                        <p style="font-size:1px;">{{$i=1}}</p>
                        @foreach($baza as $bz)
                            @if($bz->dat_umowy != null && $bz->dat_umowy < date('Y-m-d'))

                            <div class="alert alert-danger">
                                <strong>{{$i++}}</strong> - {{$ilosc_bazy_po_terminie= \App\Przedsiebiorca::find($bz->id_przed)->nazwa_firmy}}
                                - <strong> {{$bz->dat_umowy}} po terminie {{$dni = (strtotime($bz->dat_umowy) - strtotime(date('Y-m-d'))) / (60*60*24)}} dni</strong>
                                <a role="button" class="btn btn-danger btn-sm text-light" href="{{ route('przedsiebiorca.show',$bz->id_przed)}}">Podgląd</a>
                                </div>

                            @endif
                        @endforeach
                </td>
            </tr>
        </tbody>
    </table>
</div>

@endsection
