@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div>
                        <h2> <img src="/svg/receivemoneycashserviceonlines48x48.png"> Adaugare noua tranzactie&nbsp;<strong>de debitare</strong> </h2>
                    </div>
                    @if ($errors->any()) <!-- de aici incepe afisarea erorilor -->
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif              <!-- si aici se termina afisarea erorilor -->
                    <div class="card-body">
                        <form method="GET" action="{{ route('registrareDebitare',Auth::user()) }}">
                            @csrf

                            <div class="form-group row">
                                <label for="motivTranzactie" class="col-md-4 col-form-label text-md-right">{{ __('Motiv tranzactie: ') }}</label>
                                <div class="col-md-6">
                                    <input id="motivTranzactie" type="text" class="form-control @error('motivTranzactie') is-invalid @enderror" name="motivTranzactie" value="{{ old('motivTranzactie') }}" autocomplete="motivTranzactie" autofocus>

                                    @error('motivTranzactie')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="categorieTranzactie" class="col-md-4 col-form-label text-md-right">{{ __('Categorie tranzactie: ') }}</label>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <select class="form-control @error('categorieTranzactie') is-invalid @enderror" id="categorieTranzactie" name="categorieTranzactie">
                                            <option></option>
                                            <option value="Mancare"     @if(old('categorieTranzactie') == 'Mancare')SELECTED @endif>Mancare</option>
                                            <option value="Cumparaturi" @if(old('categorieTranzactie') == 'Cumparaturi')SELECTED @endif>Cumparaturi</option>
                                            <option value="Facturi"     @if(old('categorieTranzactie') == 'Facturi')SELECTED @endif>Facturi</option>
                                            <option value="Distractie"  @if(old('categorieTranzactie') == 'Distractie')SELECTED @endif>Distractie</option>
                                            <option value="Dezvoltare"  @if(old('categorieTranzactie') == 'Dezvoltare')SELECTED @endif>Dezvoltare</option>
                                            <option value="ALTELE"      @if(old('categorieTranzactie') == 'ALTELE')SELECTED @endif>ALTELE</option>
                                        </select>
                                    </div>

                                    @error('categorieTranzactie')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="sursaMonetara" class="col-md-4 col-form-label text-md-right">{{ __('Sursa monetara: ') }}</label>
                                <div class="col-md-6">

                                    <div class="form-group">
                                        <select class="form-control @error('sursaMonetara') is-invalid @enderror" id="sursaMonetara" name="sursaMonetara">
                                            <option></option>
                                            <option value="CardBancar" @if(old('sursaMonetara') == 'CardBancar') SELECTED @endif>Card bancar</option>
                                            <option value="Portofel"   @if(old('sursaMonetara') == 'Portofel') SELECTED @endif>Portofel</option>
                                        </select>
                                    </div>

                                    @error('sursaMonetara')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="sumaDeDebitat" class="col-md-4 col-form-label text-md-right">{{ __('Suma de debitat: ') }}</label>
                                <div class="col-md-6">

                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">00.00 (Lei)</span>
                                        </div>
                                        <input type="number" id="sumaDeDebitat" step="0.01" name="sumaDeDebitat" class="form-control @error('sumaDeDebitat') is-invalid @enderror" value="{{ old('sumaDeDebitat') }}" aria-label="Suma">
                                    </div>

                                    @error('sumaDeDebitat')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Registrare debitare') }}
                                    </button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 col-6 col-sm-6 col-lg-6" align="left">
                <a href="{{ route('home') }}"><button type="button" class="btn btn-info" >Inapoi</button></a>
            </div>
        </div>
    </div>
@endsection
