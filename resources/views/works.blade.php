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
                    <ul>
                        @foreach($work->effort as $effort)
                            <li>{{ $effort->toiledAt }}: {{ $effort->summaryOfEffort }}</li>
                        @endforeach
                    </ul>
                </div>
                <form action="{{ route('enjoy-the-effort', [ 'work' => $work->id]) }}" method="POST">
                    @csrf

                    <input class="input mb-2" name="summaryOfEffort" type="text"/>
                    <input class="button" id="enjoyEffort" type="submit"/>
                </form>
            </li>
        @endforeach
    </ul>
@endsection