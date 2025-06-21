<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Guest;

class GuestController extends Controller
{
    // Показати всіх гостей
    public function index()
    {
        $guests = Guest::all();
        return view('guests.index', compact('guests'));
    }

    public function destroy($id)
    {
        $guest = \App\Models\Guest::findOrFail($id);
        $guest->delete();

        return redirect()->route('guests.index')->with('success', 'Гостя видалено!');
    }
}
