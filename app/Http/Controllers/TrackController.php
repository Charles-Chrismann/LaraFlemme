<?php

namespace App\Http\Controllers;

use App\Models\Track;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Inertia\Inertia;

class TrackController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tracks = Track::where('display', true)->orderBy('artist')->get();

        return Inertia::render('Track/Index', [
            'tracks' => $tracks,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Track/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required', 'string', 'min:5', 'max:255'],
            'artist' => ['required', 'string', 'min:3', 'max:255'],
            'display' => ['required', 'boolean'],
            'image' => ['required', 'image', 'max:10000'],
            'music' => ['required', 'file', 'mimes:mp3,wav', 'max:10000'],
        ]);

        $uuid = 'trk-' . Str::uuid();

        $imageExtension = $request->image->extension();
        $imagePath = $request->image->storeAs('tracks/images', $uuid . '.' . $imageExtension);

        $musicExtension = $request->music->extension();
        $musicPath = $request->music->storeAs('tracks/musics', $uuid . '.' . $musicExtension);

        Track::create([
            'uuid' => $uuid,
            'title' => $request->title,
            'artist' => $request->artist,
            'display' => $request->display,
            'image' => $imagePath,
            'music' => $musicPath,
        ]);

        return redirect()->route('tracks.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Track $track)
    {
        return Inertia::render('Track/Edit', [
            'track' => $track,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Track $track)
    {
        $request->validate([
            'title' => ['required', 'string', 'min:5', 'max:255'],
            'artist' => ['required', 'string', 'min:3', 'max:255'],
            'display' => ['required', 'boolean'],
        ]);

        $track->title = $request->title;
        $track->artist = $request->artist;
        $track->display = $request->display;
        $track->save();

        return redirect()->route('tracks.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Track $track)
    {
      dd($track);
        $track->delete();

        return redirect()->route('tracks.index');
    }
}
