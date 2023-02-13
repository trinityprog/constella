<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ __('Новый клиент') }}</title>
    <style type="text/css">
        body {
            font-family: 'Arial', sans-serif;
        }
    </style>
</head>
<body>
    <h2>{{ __('Добавлен новый клиент:') }}</h2>
    <h3>{{ __('Данные агента:') }} </h3>
    <p>{{ __('ФИО:') }} <strong>{{ $data['agent'] }}</strong></p>
    <p>{{ __('Телефон:') }} <strong>{{ $data['agent_phone'] }}</strong></p>
    <hr>
    <h3>{{ __('Данные клиента:') }} </h3>
    <p>{{ __('ФИО:') }} <strong>{{ $data['fio'] }}</strong></p>
    <p>{{ __('Город:') }} <strong>{{ $data['city'] }}</strong></p>
    <p>{{ __('Телефон:') }} <strong>{{ $data['phone'] }}</strong></p>
</body>
</html>
