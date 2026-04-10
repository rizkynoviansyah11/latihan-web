<html>
    <head>
        <title>Halo</title>
    </head>
    <body>
        <h1>Halo, nama saya {{ $name }}</h1>
        <ul>
            @foreach ($hobis as $hobi)
                <li>{{ $hobi }}</li>
            @endforeach
        </ul>
    </body>
</html>