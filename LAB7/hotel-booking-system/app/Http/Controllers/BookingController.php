<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Room;
use App\Models\Guest;

class BookingController extends Controller
{
    // Форма бронювання
    public function create(Request $request)
    {
        $rooms = \App\Models\Room::all();
        $selectedRoom = $request->input('room_id');
        return view('bookings.create', compact('rooms', 'selectedRoom'));
    }

    // Зберегти нове бронювання
    public function store(Request $request)
    {
        $request->validate([
            'room_id' => 'required|exists:rooms,id',
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'check_in' => 'required|date',
            'check_out' => 'required|date|after:check_in',
        ]);

        // Якщо гість вже існує, знайти його, інакше створити нового
        $guest = \App\Models\Guest::firstOrCreate(
            ['email' => $request->email],
            ['name' => $request->name, 'phone' => $request->phone]
        );

        \App\Models\Booking::create([
            'room_id' => $request->room_id,
            'guest_id' => $guest->id,
            'check_in' => $request->check_in,
            'check_out' => $request->check_out,
        ]);

        return redirect()->route('bookings.index')->with('success', 'Бронювання створено!');
    }

    // Звіт про заповненість номерів по датах
    public function report()
    {
        $bookings = \App\Models\Booking::with(['room', 'guest'])->orderBy('check_in')->get();
        return view('bookings.report', compact('bookings'));
    }

    public function index()
    {
        $bookings = \App\Models\Booking::with(['room', 'guest'])->orderBy('check_in')->get();
        return view('bookings.index', compact('bookings'));
    }

    // Форма редагування
    public function edit($id)
    {
        $booking = \App\Models\Booking::with(['room', 'guest'])->findOrFail($id);
        $rooms = \App\Models\Room::all();
        return view('bookings.edit', compact('booking', 'rooms'));
    }

    // Оновлення бронювання
    public function update(Request $request, $id)
    {
        $request->validate([
            'room_id' => 'required|exists:rooms,id',
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'check_in' => 'required|date',
            'check_out' => 'required|date|after:check_in',
        ]);

        $booking = \App\Models\Booking::findOrFail($id);

        // Оновити гостя
        $guest = $booking->guest;
        $guest->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
        ]);

        // Оновити бронювання
        $booking->update([
            'room_id' => $request->room_id,
            'check_in' => $request->check_in,
            'check_out' => $request->check_out,
        ]);

        return redirect()->route('bookings.index')->with('success', 'Бронювання оновлено!');
    }
}
