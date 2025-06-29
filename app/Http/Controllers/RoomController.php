<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\Building;
use App\Http\Requests\StoreRoomRequest;
use App\Http\Requests\UpdateRoomRequest;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class RoomController extends Controller
{
    use AuthorizesRequests;

    public function index()
    {
        $this->authorize('view_rooms');
        $rooms = Room::with('building')->latest()->get();
        return view('dashboard.admin.rooms.index', compact('rooms'));
    }

    public function create()
    {
        $this->authorize('create_rooms');
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
        $this->authorize('edit_rooms');
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
        $this->authorize('delete_rooms');
        $room->delete();

        return redirect()->route('dashboard.rooms.index')->with('success', 'Room deleted successfully.');
    }
}
