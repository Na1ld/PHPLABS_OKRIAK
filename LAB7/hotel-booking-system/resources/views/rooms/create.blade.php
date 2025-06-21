@extends('adminlte::page')

@section('content')
<h1>Додати кімнату</h1>
<form method="POST" action="{{ route('rooms.store') }}">
    @csrf
    <label>Номер: <input type="text" name="number" required></label><br>
    <label>Тип: <input type="text" name="type" required></label><br>
    <label>Місткість: <input type="number" name="capacity" min="1" required></label><br>
    <label>Ціна: <input type="number" name="price" min="0" step="0.01" required></label><br>
    <button type="submit" class="btn btn-success">Зберегти</button>
</form>
@endsection