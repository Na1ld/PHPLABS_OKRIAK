@extends('adminlte::page')

@section('content')
<h1>Список бронювань</h1>

<a href="{{ route('bookings.create') }}" class="btn btn-success mb-3">Додати бронювання</a>

<table class="table table-bordered">
    <tr>
        <th>Номер кімнати</th>
        <th>Гість</th>
        <th>Дата заїзду</th>
        <th>Дата виїзду</th>
        <th>Дії</th>
    </tr>
    @foreach($bookings as $booking)
        <tr>
            <td>{{ $booking->room->number }}</td>
            <td>{{ $booking->guest->name }}</td>
            <td>{{ $booking->check_in }}</td>
            <td>{{ $booking->check_out }}</td>
            <td>
                <a href="{{ route('bookings.edit', $booking->id) }}" class="btn btn-warning btn-sm">Редагувати</a>
            </td>
        </tr>
    @endforeach
</table>
@endsection