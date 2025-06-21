@extends('adminlte::page')

@section('content')
<h1>Гості</h1>
@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif
<table border="1" cellpadding="5">
    <tr>
        <th>Ім'я</th>
        <th>Email</th>
        <th>Телефон</th>
        <th>Дії</th>
    </tr>
    @foreach($guests as $guest)
        <tr>
            <td>{{ $guest->name }}</td>
            <td>{{ $guest->email }}</td>
            <td>{{ $guest->phone }}</td>
            <td>
                <form action="{{ route('guests.destroy', $guest->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Ви впевнені, що хочете видалити гостя?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm">Видалити</button>
                </form>
            </td>
        </tr>
    @endforeach
</table>
@endsection