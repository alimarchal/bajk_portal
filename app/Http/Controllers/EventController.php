<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEventRequest;
use App\Http\Requests\UpdateEventRequest;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\MediaLibrary\MediaCollections\Models\Media;


class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $events = Event::all();
        return view('events.index', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        return view('events.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEventRequest $request)
    {
        $request->merge(['user_id' => Auth::user()->id]);
        $fileManagementSystem = Event::create($request->all());
        foreach ($request->input('document', []) as $file) {
            $fileManagementSystem->addMedia(storage_path('app/public/tmp/' . $file))->toMediaCollection('document');
        }
        session()->flash('status', 'Files has been successfully added.');
        return to_route('event.index');
    }

    public function storeMedia(Request $request)
    {
        $directory = storage_path('app/public/tmp');
        if (!file_exists($directory)) {
            mkdir($directory, 0777, true);
        }
        $file = $request->file('file');
        $name = uniqid() . '_' . trim($file->getClientOriginalName());
        $file->move($directory, $name);

        return response()->json([
            'name' => $name,
            'original_name' => $file->getClientOriginalName(),
        ]);
    }

    public function update(Request $request, Event $event)
    {
        $validatedData = $request->validate([
            'document' => 'required', // validates that each document file is present and valid
        ]);
        $event->update($request->all());
        foreach ($request->input('document', []) as $file) {
            $event->addMedia(storage_path('app/public/tmp/' . $file))->toMediaCollection('document');
        }
        session()->flash('status', 'Event has been successfully update.');
        return to_route('event.show', $event->id);

    }

    public function destroy(Media $media, Event $event)
    {
        if ($media) {
            $path = $media->getPath(); // Get the full path of the media file
            $media->delete(true); // Delete the media file from the disk and the database, including its associated directory

            // Delete the directory if it's empty
            $directory = dirname($path);
            if (is_dir($directory) && count(scandir($directory)) == 2) {
                rmdir($directory);
            }
            session()->flash('status', 'Files has been successfully deleted.');
            return to_route('event.show', $event);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Event $event)
    {
        return view('events.show', compact('event'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Event $event)
    {
        //
    }
}
