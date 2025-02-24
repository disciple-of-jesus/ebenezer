@extends('layouts.default')

@section('content')
    (Goede) werken

    <div class="content">
        <form action="{{ route('assign-godly-work') }}" method="POST">
            @csrf

            <input class="input" type="text" name="nameOfWork"/>
            <input class="button" id="assignWork" type="submit" value="Toekennen"/>
        </form>
    </div>

    <ul>
        @foreach($works as $work)
            <li class="box">
                <div class="content">
                    <h1 class="is-uppercase">{{ $work->nameOfWork }}</h1>
                </div>
            </li>
        @endforeach
    </ul>
@endsection