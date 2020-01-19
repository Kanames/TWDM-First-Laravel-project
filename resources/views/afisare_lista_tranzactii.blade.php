@extends('layouts.app')

@section('content')
<div class="container">
    @toastr_css
    @jquery
    @toastr_js
    @toastr_render
    <div class="row" style='margin: 0px;padding: 0px'>
        <div class="col-md-6 col-sm-12" align="center" style='margin: 0px;padding: 0px'>
            <div class="card" style='margin: 0px;'>
                <div class="card-body" style='margin: 0px;'>
                    <h5 class="card-title"><img src="\svg\card96x96.png" alt="Card image cap"> </h5> <!-- surse: https://icon-icons.com/icon/credit-debit-master-card-payment/84582#48 -->
                    <p class="card-text">Suma aflata pe cont-ul bancar <strong>@if(!empty($cardBancarValue)){{$cardBancarValue}} @endif Lei</strong></p>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-sm-12" align="center" style='margin: 0px;'>
            <div class="card" style='margin: 0px;'>
                <div class="card-body" style='margin: 0px;'>
                    <h5 class="card-title"><img src="\svg\wallet96x96.png" alt="Card image cap"> </h5> <!-- surse: https://icon-icons.com/icon/payment-wallet-money/73886#96 -->
                    <p class="card-text">Suma aflata in portofel <strong>@if(!empty($portofelValue)){{$portofelValue}} @endif Lei</strong></p>
                </div>
            </div>
        </div>
    </div>

    <div class="row" >
        <div class="col-12 p-5">
            <div align="center">
                <p>Tabel cu toate tranzactiile efectuate</p>
            </div>
            <form method="GET" action="{{route('statisticaOrdonare')}}" target="blank">
                {{ csrf_field() }}
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="inputGroupSelect01">Ordoneaza dupa</label>
                    </div>
                    <select class="custom-select" name="orderBy" onchange="this.form.submit()">
                        <option value="" disabled selected>#</option>
                        <option value="id asc"                     @if(!empty($orderBy) && $orderBy == "id asc") selected @endif >Id (Asc)</option>
                        <option value="id desc"                    @if(!empty($orderBy) && $orderBy == "id desc") selected @endif >Id (Desc)</option>
                        <option value="categorieTranzactie asc"    @if(!empty($orderBy) && $orderBy == "categorieTranzactie asc") selected @endif >Categorie (A - Z)</option>
                        <option value="categorieTranzactie desc"   @if(!empty($orderBy) && $orderBy == "categorieTranzactie desc") selected @endif >Categorie (Z - A)</option>
                        <option value="created_at asc"             @if(!empty($orderBy) && $orderBy == "created_at asc") selected @endif >Data tranzactiei (Asc)</option>
                        <option value="created_at desc"            @if(!empty($orderBy) && $orderBy == "created_at desc") selected @endif >Date tranzactiei (Desc)</option>
                    </select>
                </div>
            </form>
            <table class="table"> <!-- class="table table-bordered" -->
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Motiv</th>
                    <th scope="col">Tip tranzactie</th>
                    <th scope="col">Categorie</th>
                    <th scope="col">Data tranzactiei</th>
                    <th scope="col">Protofel/CardBancar</th>
                    <th scope="col"></th>
                </tr>
                </thead>

                <tbody>
                @foreach($tranzactii as $tranzactieIndividuala)
                    <!-- Nothing Runs Inside Here-->
                    <p></p>
                    <tr>
                        <th scope="row">{{$tranzactieIndividuala->id}}</th>
                        <td>{{$tranzactieIndividuala->motivTranzactie}}</td>
                        <td>@if($tranzactieIndividuala->isCreditare)
                                <strong><font color="green">Creditare +{{$tranzactieIndividuala->suma}} Lei</font></strong>
                            @else
                                <strong><font color="red">Debitare -{{$tranzactieIndividuala->suma}} Lei</font></strong>
                            @endif
                        </td>
                        <td> <!--<img src="/svg/money-pig48x48.png">--> {{$tranzactieIndividuala->categorieTranzactie}} </td>
                        <td>{{$tranzactieIndividuala->created_at}} </td>
                        <td>
                            {{$tranzactieIndividuala->sursaMonetara}}
                        </td>
                        <td>
                            <form method="GET" action="{{route('modificareTranzactie')}}" target="blank">
                                <input name="idTranzactieUnica" value="{{$tranzactieIndividuala->id}}" hidden>
                                <button type="submit" class="btn btn-dark">Modifica</button>
                            </form>
                        </td>

                    </tr>
                @endforeach

                </tbody>

            </table>
            <div class="col-md-6 col-6 col-sm-6 col-lg-6" align="left">
                <a href="{{ route('home') }}"><button type="button" class="btn btn-info" >Inapoi</button></a>
            </div>
        </div>
    </div>
</div>
@endsection
