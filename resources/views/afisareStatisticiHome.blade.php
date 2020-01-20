@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <div style="padding: 1em;"><h3>Statistica 1 - Cantitatea de tranzactii efectuate per categorie</h3></div>
        </div>
        <div class="col-12">
            <div>
                <p>
                    Cantitatea de tranzactii pe categori ce se efectueaza lunar.
                </p>
            </div>
        </div>
    </div>
    <div class="row">
        <div style="padding: 1em;width: 100%">
            {!! $statistici->container() !!}
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 col-6 col-sm-6 col-lg-6" align="center">
            <a href="{{ route('home') }}"><button type="button" class="btn btn-info" >Inapoi</button></a>
        </div>
    </div>
</div>

@endsection
