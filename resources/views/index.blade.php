<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Ebenezer</title>
    <link rel="stylesheet" href="/dist/app.css">

    @laravelPWA
</head>
<body class="h-100 w-100 has-background-primary-soft">
<div class="container is-fluid pt-5 pb-5">
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
</body>
</html>
<script src="/dist/echo.js"></script>
<script async>
    Notification.requestPermission();

    window.Echo.private('App.Models.Space.{{ $space->id }}')
        .notification((notification) => {
            new Notification(notification.nameOfStone, {
                body: `${notification.wayOfShowing} ${notification.contextToWord}`
            });
        });
</script>
