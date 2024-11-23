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

    <label>Naam</label>
    <input type="text" name="nameOfStone"/>
    <input type="text" name="wayOfShowing"/>
    <textarea name="contextToWord"></textarea>
    <input type="submit" name="submit"/>
</form>
@foreach($stoneOfRemembrances as $stoneOfRemembrance)
<div>
    {{ $stoneOfRemembrance->nameOfStone }}
    {{ $stoneOfRemembrance->wayOfShowing }}
    {{ $stoneOfRemembrance->contextToWord }}
</div>
@endforeach
</body>
</html>
