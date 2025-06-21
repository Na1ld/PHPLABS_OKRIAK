@extends('adminlte::page')

@section('content')
<h1>Редагування бронювання</h1>
<form method="POST" action="{{ route('bookings.update', $booking->id) }}">
    @csrf
    @method('PUT')
    <label>Номер кімнати:
        <select name="room_id" required>
            @foreach($rooms as $room)
                <option value="{{ $room->id }}" {{ $booking->room_id == $room->id ? 'selected' : '' }}>
                    {{ $room->number }}
                </option>
            @endforeach
        </select>
    </label><br>
    <label>Ім'я: <input type="text" name="name" value="{{ $booking->guest->name }}" required></label><br>
    <label>Email: <input type="email" name="email" value="{{ $booking->guest->email }}" required></label><br>
    <label>Телефон: <input type="text" name="phone" value="{{ $booking->guest->phone }}" required></label><br>
    <label>Дата заїзду: <input type="date" name="check_in" value="{{ $booking->check_in }}" required></label><br>
    <label>Дата виїзду: <input type="date" name="check_out" value="{{ $booking->check_out }}" required></label><br>
    <button type="submit" class="btn btn-primary">Оновити</button>
</form>
@endsection