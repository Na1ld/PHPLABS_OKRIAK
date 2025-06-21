<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <title>Система бронювання готелів</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-4">
        <nav class="mb-4">
            <a href="{{ route('rooms.index') }}" class="btn btn-primary">Номери</a>
            <a href="{{ route('guests.index') }}" class="btn btn-secondary">Гості</a>
            <a href="{{ route('bookings.report') }}" class="btn btn-success">Звіт по бронюваннях</a>
        </nav>
        @yield('content')
    </div>
</body>
</html>