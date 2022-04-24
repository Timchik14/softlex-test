<!DOCTYPE html>
<html lang="en">
<head>
    <title>Статистика</title>
</head>
<body>
<h1>Статистика</h1>
<hr>
    <h2>Посетителей из города {{ $cityWithVisits->name}} - {{$count}}</h2>
<hr>
        @foreach($cityWithVisits['visits'] as $visit)
            <p>
                <b>IP: </b><a href="{{ route('visit.show', ['visit' => $visit]) }}">{{ $visit->ip}}</a>
                <b>Browser: </b>{{$visit->browser}}
                <b>Date: </b>{{$visit->created_at->toFormattedDateString()}}
            </p>
        @endforeach
</body>
</html>
