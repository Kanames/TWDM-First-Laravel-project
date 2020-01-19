@extends('layouts.app')

@section('content')
<div class="container">
    @toastr_css
    @jquery
    @toastr_js
    @toastr_render
    <div class="row">
        <div class="col-md-3 col-sm-12">
            <div align="center">
                <div class="card">
                    <div class="face face1">
                        <div class="content">
                            <img src="/svg/money-pig128x128.png"> <!-- surse: https://icon-icons.com/icon/money-pig/56372#128 -->
                            <h2> + </h2>
                        </div>
                    </div>
                    <div class="face face2">
                        <div class="content">
                            <p>Noua suma poate fi depozitata fie in cont-ul bancar fie in portofel.</p>
                            <a href="{{ route('creditare') }}">Adauga o noua suma in cont</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-12">
            <div align="center">
                <div class="card">
                    <div class="face face1">
                        <div class="content">
                            <img src="/svg/receivemoneycashserviceonlines128x128.png"> <!-- surse: https://icon-icons.com/icon/receive-money-cash-service-online-send-premium/95912#128 -->
                            <h2> - </h2>
                        </div>
                    </div>
                    <div class="face face2">
                        <div class="content">
                            <p>Noua cheltuiala poate fi dedusa atat din cont-ul bancar cat si din portofel.</p>
                            <a href="{{ route('debitare') }}">Adauga o noua cheltuiala</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-12">
            <div align="center">
                <div class="card">
                    <div class="face face1">
                        <div class="content">
                            <img src="/svg/list128x128.png"> <!-- https://icon-icons.com/icon/Categories-check-list-listing-mark/113091#128-->
                            <h2> # </h2>
                        </div>
                    </div>
                    <div class="face face2">
                        <div class="content">
                            <p>Lista cu tranzactile efectuate asupra contului.</p>
                            <a href="{{ route('toAfisareListaTranzactii') }}">Afisare</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-12">
            <div align="center">
                <div class="card">
                    <div class="face face1">
                        <div class="content">
                            <img src="/svg/graph128x128.png"> <!-- https://icon-icons.com/icon/graph-bars-increase-info-statistics-business-charts/58023#128-->
                            <h2> ? </h2>
                        </div>
                    </div>
                    <div class="face face2">
                        <div class="content">
                            <p>Statistici despre cat sa cheltuit <strong>saptamanal</strong>, <strong>lunar</strong>, <strong>anual</strong> in procente.</p>
                            <a href="{{ route('afisareStatistica') }}">Statistici</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12 p-5">
            <div align="center">
                <p>Ultimile 5 tranzactii</p>
            </div>
            <table class="table"> <!-- class="table table-bordered" -->
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Tranzactie</th>
                    <th scope="col">Cost</th>
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
                                    <strong><font color="green"> + {{$tranzactieIndividuala->suma}} </font></strong>
                                @else
                                    <strong><font color="red"> - {{$tranzactieIndividuala->suma}} </font></strong>
                                @endif
                            </td>
                        </tr>
                    @endforeach

                </tbody>

            </table>

        </div>
    </div>
</div>
@endsection
