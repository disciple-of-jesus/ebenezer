<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Ebenezer</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@1.0.2/css/bulma.min.css">
</head>
<body>
<div class="container is-fluid">
    <div class="block">
        <form action="/add" method="POST">
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

    @foreach($stoneOfRemembrances as $stoneOfRemembrance)
    <div class="box">
        <div class="content">
            <h1>{{ $stoneOfRemembrance->nameOfStone }}</h1>
            <p>{{ $stoneOfRemembrance->wayOfShowing }}</p>
            <p>{{ $stoneOfRemembrance->contextToWord }}</p>
        </div>
    </div>
    @endforeach
</div>
</body>
</html>
