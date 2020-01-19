@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div style="padding: 1em;"><h3>Statistica 1 - Cantitatea de tranzactii efectuate per categorie</h3></div>
        <div style="padding: 1em;width: 100%">
            {!! $statistici->container() !!}
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 col-6 col-sm-6 col-lg-6" align="left">
            <a href="{{ route('home') }}"><button type="button" class="btn btn-info" >Inapoi</button></a>
        </div>
    </div>
</div>

@endsection
