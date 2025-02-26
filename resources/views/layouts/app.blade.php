<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ипотечные предложения</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="{{ route('admin') }}">Для админа</a>
            <a class="navbar-brand" href="{{ route('index') }}">Для клиента</a>
        </div>
    </nav>

    <div class="container mt-4">
        @yield('content')
    </div>

    <script>
        var apiMortgagesUrl = "{{ url('/api/public/mortgages') }}";
    </script>
</body>
</html>
