@extends('adminlte::page')

@section('content')
<h1>Звіт про заповненість номерів по датах</h1>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>Номер кімнати</th>
            <th>Тип</th>
            <th>Гість</th>
            <th>Дата заїзду</th>
            <th>Дата виїзду</th>
        </tr>
    </thead>
    <tbody>
        @foreach($bookings as $booking)
            <tr>
                <td>{{ $booking->room->number ?? '-' }}</td>
                <td>{{ $booking->room->type ?? '-' }}</td>
                <td>{{ $booking->guest->name ?? '-' }}</td>
                <td>{{ $booking->check_in }}</td>
                <td>{{ $booking->check_out }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection