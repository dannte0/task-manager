<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wdone</title>
</head>
<body>
    @if (!request()->routeIs('index'))    
    <a href="{{ route('index') }}">Back</a>
    @endif
    
    <h1>@yield('title')</h1>
    @yield('content')
</body>
</html>