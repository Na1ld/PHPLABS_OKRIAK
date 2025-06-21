@extends('adminlte::page')

@section('content')
<h1>Додати бронювання</h1>
<form method="POST" action="{{ route('bookings.store') }}">
    @csrf
    <label>Номер кімнати:
        <select name="room_id" required>
            @foreach($rooms as $room)
                <option value="{{ $room->id }}" {{ (isset($selectedRoom) && $selectedRoom == $room->id) ? 'selected' : '' }}>
                    {{ $room->number }}
                </option>
            @endforeach
        </select>
    </label><br>
    <label>Ім'я: <input type="text" name="name" required></label><br>
    <label>Email: <input type="email" name="email" required></label><br>
    <label>Телефон: <input type="text" name="phone" required></label><br>
    <label>Дата заїзду: <input type="date" name="check_in" required></label><br>
    <label>Дата виїзду: <input type="date" name="check_out" required></label><br>
    <button type="submit" class="btn btn-success">Зберегти</button>
</form>
@endsection