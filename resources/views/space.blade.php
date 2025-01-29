@extends('layouts.default')

@section('content')
<div class="block">
    <div class="box">
        <form action="{{ route('erect-stone-of-remembrance', [ 'space' => $space->id ]) }}" method="POST">
            @csrf

            <div class="field">
                <label class="label" for="nameOfStone">Naam</label>
                <div class="control">
                    <input class="input" type="text" name="nameOfStone"/>
                </div>
            </div>

            <div class="field">
                <label class="label" for="wayOfShowing">Manier</label>
                <div class="control">
                    <input class="input" type="text" name="wayOfShowing"/>
                </div>
            </div>

            <div class="field">
                <label class="label" for="contextToWord">Context</label>
                <div class="control">
                    <textarea class="textarea" name="contextToWord"></textarea>
                </div>
            </div>

            <input class="button" type="submit" name="submit"/>
        </form>
    </div>
</div>

@foreach($space->stonesOfRemembrance as $stoneOfRemembrance)
@if($loop->last)
<div class="box mb-0">
    @else
    <div class="box">
        @endif
        <div class="content">
            <h1 class="is-uppercase">{{ $stoneOfRemembrance->nameOfStone }}</h1>
            <p class="is-italic">{{ $stoneOfRemembrance->wayOfShowing }}</p>
            <p>{{ $stoneOfRemembrance->contextToWord }}</p>
        </div>
    </div>
    @endforeach
</div>
@endsection
