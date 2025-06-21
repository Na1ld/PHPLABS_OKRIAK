@extends('adminlte::page')

@section('content')
<h1>Список кімнат</h1>

<a href="{{ route('rooms.create') }}" class="btn btn-success mb-3">Додати кімнату</a>

<table class="table table-bordered">
    <tr>
        <th>Номер</th>
        <th>Тип</th>
        <th>Місткість</th>
        <th>Ціна</th>
        <th>Дія</th>
    </tr>
    @foreach($rooms as $room)
        <tr>
            <td>{{ $room->number }}</td>
            <td>{{ $room->type }}</td>
            <td>{{ $room->capacity }}</td>
            <td>{{ $room->price }}</td>
            <td>
                <a href="{{ route('bookings.create', ['room_id' => $room->id]) }}" class="btn btn-success btn-sm">
                    Забронювати
                </a>
            </td>
        </tr>
    @endforeach
</table>
@endsection