<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\Booking;

class RoomController extends Controller
{
    // Показати всі доступні номери на певні дати
    public function index(Request $request)
    {
        $rooms = \App\Models\Room::all();
        return view('rooms.index', compact('rooms'));
    }

    public function create()
    {
        return view('rooms.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'number' => 'required|unique:rooms,number',
            'type' => 'required',
            'capacity' => 'required|integer|min:1',
            'price' => 'required|numeric|min:0',
        ]);

        \App\Models\Room::create($request->only(['number', 'type', 'capacity', 'price']));

        return redirect()->route('rooms.index')->with('success', 'Кімната додана!');
    }
}
