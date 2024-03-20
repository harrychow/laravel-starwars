<!-- resources/views/layouts/app.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>

</head>
<body>
<ul>
    <li>
        <a href="{{ url('/actors') }}">Actors Listing</a>
    </li>
    <li>
        <a href="{{ url('/starwars') }}">StarWars Search</a>
    </li>
</ul>

@yield('content')

@yield('scripts')
</body>
</html>
