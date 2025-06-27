<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\Building;
use App\Http\Requests\StoreRoomRequest;
use App\Http\Requests\UpdateRoomRequest;

class RoomController extends Controller
{
    public function index()
    {
        $rooms = Room::with('building')->latest()->get();
        return view('dashboard.admin.rooms.index', compact('rooms'));
    }

    public function create()
    {
        $buildings = Building::all();
        return view('dashboard.admin.rooms.create', compact('buildings'));
    }

    public function store(StoreRoomRequest $request)
    {
        Room::create($request->validated());

        return redirect()->route('dashboard.rooms.index')->with('success', 'Room created successfully.');
    }

    public function edit(Room $room)
    {
        $buildings = Building::all();
        return view('dashboard.admin.rooms.edit', compact('room', 'buildings'));
    }

    public function update(UpdateRoomRequest $request, Room $room)
    {
        $room->update($request->validated());

        return redirect()->route('dashboard.rooms.index')->with('success', 'Room updated successfully.');
    }

    public function destroy(Room $room)
    {
        $room->delete();

        return redirect()->route('dashboard.rooms.index')->with('success', 'Room deleted successfully.');
    }
}
