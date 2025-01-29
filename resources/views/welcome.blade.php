@extends('layouts.default')

@section('content')
<div class="container">
    <div class="box has-text-centered">
        <p>Maak hier uw eigen (virtuele) grond aan waar u Zijn stenen op kunt plaatsen.</p>
        <form action="/spaces" class="mt-4" method="POST">
            @csrf

            <input class="button" type="submit" value="Toekennen"/>
        </form>
    </div>
</div>
@endsection