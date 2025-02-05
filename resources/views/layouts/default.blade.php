<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Ebenezer</title>
    <link rel="stylesheet" href="/dist/app.css">
</head>
<body class="has-background-primary-soft">
<div class="container is-fluid pt-5 pb-5">
    @yield('content')
</div>
</body>
</html>