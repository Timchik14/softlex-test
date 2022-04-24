<!DOCTYPE html>
<html lang="en">
<head>
    <title>Статистика</title>
</head>
<body>
<h1>Статистика</h1>
<hr>
<p>Посещений за выбранный период: {{ $visitsCount }}</p>
<hr>

@foreach($visits as $visit)
    <p>
        <b>IP: </b><a href="{{ route('visit.show', ['visit' => $visit]) }}">{{ $visit->ip}}</a>
        <b>Browser: </b>{{$visit->browser}}
        <b>Date: </b>{{$visit->created_at->toFormattedDateString()}}
        <b>City: </b><a href="{{ route('city.show', ['city' => $visit->city]) }}">{{$visit->city->name}}</a>
    </p>
@endforeach

{{ $visits->links() }}

</body>
</html>
