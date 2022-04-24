<!DOCTYPE html>
<html lang="en">
<head>
    <title>Статистика</title>
</head>
<body>
<h1>Статистика</h1>
<hr>
    <h2>{{ $visit->ip}}</h2>
    <b>Browser:</b> {{$visit->browser}}
    <b>Date:</b> {{$visit->created_at}}
    <b>City:</b> {{$visit->city->name}}
</body>
</html>
