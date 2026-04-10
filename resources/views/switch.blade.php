<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    @switch($role)
    @case("admin")
        <p>Kamu adalah admin</p>
        @break
    @case("user")
        <p>Kamu adalah user</p>
        @break
    @default
        <p>Peran tidak dikenal</p>
    @endswitch
</body>
</html>