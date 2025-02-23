<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel App</title>
</head>
<body>
    <nav>
        <ul>
            <li><a href="{{ route('spies.index') }}">Spies</a></li>
            <li><a href="{{ route('agencies.index') }}">Agencies</a></li>
        </ul>
    </nav>
    <div>
        @yield('content')
    </div>
</body>
</html>
