@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div>
                        <h2> <img src="/svg/money-pig48x48.png"> Adaugare noua tranzactie&nbsp;<strong>de creditare</strong> </h2>
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
                        <form method="GET" action="{{ route('registrareCreditare',Auth::user()) }}">
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
                                <label for="sursaMonetara" class="col-md-4 col-form-label text-md-right">{{ __('Sursa monetara: ') }}</label>
                                <div class="col-md-6">

                                    <div class="form-group">
                                        <select class="form-control @error('sursaMonetara') is-invalid @enderror" id="sursaMonetara" name="sursaMonetara">
                                            <option disabled selected="selected">...</option>
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
                                <label for="sumaDeDebitat" class="col-md-4 col-form-label text-md-right">{{ __('Suma de creditare: ') }}</label>
                                <div class="col-md-6">

                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">00.00 (Lei)</span>
                                        </div>
                                        <input type="text" id="sumaDeDebitat" step='0.01' placeholder='0.00' name="sumaDeDebitat" aria-label="Suma" class="form-control @error('sumaDeDebitat') is-invalid @enderror">
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
                                        {{ __('Registrare creditare') }}
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
