@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4 col-sm-12">
            <div align="center">
                <img align="middle" width="100%" height="100%" src="\svg\avatar.jpg"/>
            </div>
        </div>
        <div class="col-md-7 col-sm-12">
            <div align="center">
                <h3>Editare cont</h3>
                <form method="GET" action="{{ route('updateProfile',Auth::user()) }}">
                    <table class="table">
                        <tbody>
                            <tr>
                                <td>Nume</td>
                                <td>
                                    <div class="input-group input-group-sm mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroup-sizing-sm">Valoare actuala:&nbsp;<strong>{{ $user->name }}</strong></span>
                                        </div>
                                        <input type="text" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" id="nume" name="nume">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Prenume</td>
                                <td>
                                    <div class="input-group input-group-sm mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroup-sizing-sm">Valoare actuala:&nbsp;<strong>{{ $user->sirname }}</strong></span>
                                        </div>
                                        <input type="text" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm"  id="prenume" name="prenume">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Data nasterii</td>
                                <td>
                                    <div class="input-group input-group-sm mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroup-sizing-sm">Valoare actuala:&nbsp;<strong>{{ $user->bday }}</strong></span>
                                        </div>
                                        <input class="form-control" type="datetime-local" value="{{ $user->bday }}" id="bday" name="bday">
            </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Oras in care locuiesti</td>
                                <td>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <label class="input-group-text" for="inputGroupSelect01">Optiuni</label>
                                        </div>
                                        <select class="custom-select" id="inputGroupSelect01" disabled>
                                            <option selected>Alege...</option>
                                            <option value="1">Galati</option>
                                            <option value="2">Braila</option>
                                            <option value="3">Focsani</option>
                                        </select>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2" align="center"><a href="#"><h3>RESETARE PAROLA</h3></a></td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Update') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-4">

        </div>
        <div class="col-4">

        </div>
        <div class="col-4">

        </div>
    </div>
    <div class="row">
        <div class="col-4">
            For debug: <a href="{{ route('debitare') }}">Adauga tranzactie noua de debitare</a>
            <br>
            For debug: <a href="{{ route('creditare') }}">Adauga tranzactie noua de creditare</a>
        </div>
    </div>
</div>
@endsection
