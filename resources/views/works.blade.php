@extends('layouts.default')

@section('content')
(Goede) werken

<form action="{{ route('assign-godly-work') }}" method="POST">
    @csrf

    <input class="input" type="text" name="nameOfWork"/>
    <input class="button" id="assignWork" type="submit" value="Toekennen"/>
</form>

<ul>
    @foreach($works as $work)
    <li>{{ $work->assignedAt }}, {{ $work->lastToiledAt }}, {{ $work->nameOfWork }}</li>
    @endforeach
</ul>
@endsection