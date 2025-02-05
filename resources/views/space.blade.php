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

            <input class="button" name="erect" type="submit" value="Oprichten"/>
        </form>
        <hr/>
        <form>
            <div class="field">
                <label class="label" for="query">Waarde</label>
                <div class="control">
                    <input class="input" type="text" name="query"/>
                </div>
            </div>

            <input class="button" name="search" type="submit" value="Zoeken"/>
        </form>
    </div>
</div>

@foreach($stonesOfRemembrance as $stoneOfRemembrance)
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