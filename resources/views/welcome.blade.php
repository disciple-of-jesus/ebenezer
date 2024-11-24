<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Ebenezer</title>

    @laravelPWA
</head>
<body>
<form action="/add" method="POST">
    @csrf

    <div>
        <label for="nameOfStone">Naam</label>
        <input type="text" name="nameOfStone"/>
    </div>

    <div>
        <label for="wayOfShowing">Manier</label>
        <input type="text" name="wayOfShowing"/>
    </div>

    <div>
        <label for="contextToWord">Context</label>
        <textarea name="contextToWord"></textarea>
    </div>

    <input type="submit" name="submit"/>
</form>
<ul>
    @foreach($stoneOfRemembrances as $stoneOfRemembrance)
    <li>
        God heeft "{{ $stoneOfRemembrance->nameOfStone }}" laten zien via "{{ $stoneOfRemembrance->wayOfShowing }}" met
        "{{ $stoneOfRemembrance->contextToWord }}".
    </li>
    @endforeach
</ul>
</body>
</html>
