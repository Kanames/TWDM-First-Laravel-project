@extends('layouts.app')

@section('content')
    <div class="container">
        @toastr_css <!-- https://github.com/yoeunes/toastr -->
        @jquery
        @toastr_js
        @toastr_render
        <form action="{{ route('modificareTranzactieInDB') }}" METHOD="GET">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <h2>Modificare tranzactie</h2>
                <table class="table table-bordered"> <!-- class="" -->
                    <thead>
                        <tr>
                            <th scope="col">Descriere</th>
                            <th scope="col">Valoare</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">#(idUnic)</th>
                            <td scope="row">
                                <input name="idTranzactieUnica" class="form-control" type="text" value="{{$tranzactieUnica->id}}" placeholder="{{$tranzactieUnica->id}}" readonly>
                            </td>
                        </tr>
                        <tr>
                            <td scope="col">Motiv</td>
                            <td><input name="motivTranzactie" type="text" class="form-control" id="motivTranzactie" placeholder="{{$tranzactieUnica->motivTranzactie}}"></td>
                        </tr>
                        <tr>
                            <td scope="col">Suma (Lei)</td>
                            <td>
                                <input type="number" class="form-control" name="suma" value="{{$tranzactieUnica->suma}}" placeholder="{{$tranzactieUnica->suma}}">
                            </td>
                        </tr>
                        <tr>
                            <td scope="col">Categorie</td>
                            <td> <!--<img src="/svg/money-pig48x48.png">-->
                                <div class="form-group">
                                    <select  class="form-control @error('categorieTranzactie') is-invalid @enderror" id="categorieTranzactie" name="categorieTranzactie" @if(!empty($tranzactieUnica) && $tranzactieUnica->isCreditare) disabled @endif>
                                        <option disabled>...</option>
                                        <option value="Mancare"     @if(!empty($tranzactieUnica) && $tranzactieUnica->categorieTranzactie=='Mancare') SELECTED @endif>Mancare</option>
                                        <option value="Cumparaturi" @if(!empty($tranzactieUnica) && $tranzactieUnica->categorieTranzactie=='Cumparaturi') SELECTED @endif>Cumparaturi</option>
                                        <option value="Facturi"     @if(!empty($tranzactieUnica) && $tranzactieUnica->categorieTranzactie=='Facturi') SELECTED @endif>Facturi</option>
                                        <option value="Distractie"  @if(!empty($tranzactieUnica) && $tranzactieUnica->categorieTranzactie=='Distractie') SELECTED @endif>Distractie</option>
                                        <option value="Dezvoltare"  @if(!empty($tranzactieUnica) && $tranzactieUnica->categorieTranzactie=='Dezvoltare') SELECTED @endif>Dezvoltare</option>
                                        <option value="ALTELE"      @if(!empty($tranzactieUnica) && $tranzactieUnica->categorieTranzactie=='ALTELE') SELECTED @endif>ALTELE</option>
                                    </select>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td scope="col">Data tranzactiei</td>
                            <td>{{$tranzactieUnica->created_at}} </td>
                        </tr>
                        <tr>
                            <td scope="col">Protofel/CardBancar</td>
                            <td><div class="form-group">
                                    <select class="form-control @error('sursaMonetara') is-invalid @enderror" id="sursaMonetara" name="sursaMonetara">
                                        <option disabled>...</option>
                                        <option value="CardBancar" @if(!empty($tranzactieUnica) && $tranzactieUnica->sursaMonetara=='CardBancar') SELECTED @endif>Card bancar</option>
                                        <option value="Portofel"   @if(!empty($tranzactieUnica) && $tranzactieUnica->sursaMonetara=='Portofel') SELECTED @endif>Portofel</option>
                                    </select>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" align="center"> <button type="submit" class="btn btn-success" >Modifica</button> </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        </form>

        <div class="row">
            <div class="col-md-6 col-6 col-sm-6 col-lg-6" align="left">
                <a href="{{ route('toAfisareListaTranzactii') }}"><button type="button" class="btn btn-info" >Inapoi</button></a>
            </div>
            <div class="col-md-6 col-6 col-sm-6 col-lg-6" align="right">
                <form action="{{ route('stergereTranzactieInDB') }}" METHOD="GET">
                    <input  name="idTranzactieUnica" value="{{$tranzactieUnica->id}}" hidden>
                    <button type="submit" class="btn btn-danger">Sterge</button>
                </form>
            </div>
        </div>
    </div>
@endsection
