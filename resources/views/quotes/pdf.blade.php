<!DOCTYPE html>
<html>

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet" />
</head>
<style>
  h1,
  h2,
  div,
  p {
    font-family: 'Montserrat';
  }

  p {
    font-size: 40px;
  }
</style>

<body>
  <p>{{ $quote->name }}</p>
  <p>Klient: {{ $client->first_name }} {{ $client->last_name }}</p>
  @foreach ($quote->pricedItems as $item)
    <div>{{ $item->title }}</div>
    <div>
      {{ $item->content }}
    </div>
    <div title="{{ $item->jobType->type }}">
      {{ $item->jobType->abbreviation }}
    </div>
    <div>
      {{ $item->work_hours }}
    </div>
  @endforeach
</body>

</html>
