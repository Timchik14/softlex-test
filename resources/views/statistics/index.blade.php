<!DOCTYPE html>
<html lang="en">
<head>
    <title>Статистика</title>
</head>
<body>
<h1>Статистика</h1>

<hr>

<p><b>Посещения по городам</b></p>

@foreach($citiesWithVisitsCount as $city)
    <p>
        <b>Город: </b> {{ $city->name }}
        <b>Посещений: </b> {{$city->visits_count}}
    </p>
@endforeach

{{ $citiesWithVisitsCount->links() }}

<hr>

<form method="get" action="{{ route('visits') }}">
        <p>
            <b>Фильтр по дате</b>
        </p>
        <p>Дата в формате ХХХХ-ХХ-ХХ</p>

        @include('layouts.errors')

        <p>От <input type="text" name="after" value="{{ old('after') }}"></p>
        <p>До <input type="text" name="before" value="{{ old('before') }}"></p>
        <button type="submit">Применить</button>
    </form>

<hr>

<p><b>Всего посещений</b> {{ $visitsCount }}</p>

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
