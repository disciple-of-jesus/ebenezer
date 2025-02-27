@php use App\CurrentState; @endphp
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
                <form action="{{ route('change-the-current-state', [ 'work' => $work->id ]) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <select name="currentState">
                        <option value="TO_DO" @selected($work->currentState == CurrentState::TO_DO)>
                            Te doen
                        </option>
                        <option value="DOING" @selected($work->currentState == CurrentState::DOING)>
                            Bezig
                        </option>
                        <option value="DONE" @selected($work->currentState == CurrentState::DONE)>
                            Gedaan
                        </option>
                    </select>

                    <input class="button" id="changeCurrentState" type="submit"/>
                </form>
                <form action="{{ route('enjoy-the-effort', [ 'work' => $work->id]) }}" method="POST">
                    @csrf

                    <input class="input mb-2" name="summaryOfEffort" type="text"/>
                    <input class="button" id="enjoyEffort" type="submit"/>
                </form>
            </li>
        @endforeach
    </ul>
@endsection