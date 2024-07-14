<?php

namespace App\Http\Controllers;

use App\Models\Playlist;
use App\Models\Track;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Inertia\Inertia;

class PlaylistController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth()->user();
        $playlists = $user->playlists()->withCount(['tracks'])->get();

        return Inertia::render('Playlist/Index', [
            'playlists' => $playlists,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tracks = Track::where('display', true)->get();

        return Inertia::render('Playlist/Create', [
            'tracks' => $tracks,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required', 'string', 'min:5', 'max:255'],
            'tracks' => ['required', 'array'],
            'tracks.*' => ['required', 'string'],
        ]);

        $tracks = Track::whereIn('uuid', $request->tracks)->where('display', true)->get();
        if ($tracks->count() !== count($request->tracks)) {
            throw ValidationException::withMessages(['tracks' => 'Une musique n\'existe pas']);
        }

        $playlist = Playlist::create([
            'uuid' => 'ply-' . Str::uuid(),
            'user_id' => $request->user()->id,
            'title' => $request->title,
        ]);
        $playlist->tracks()->attach($tracks->pluck('id'));

        return redirect()->route('playlists.index');
    }

    public function show(Playlist $playlist)
    {
        return Inertia::render('Playlist/Show', [
            'playlist' => $playlist,
            'tracks' => $playlist->tracks,
            // 'playlist' => $playlist->load('tracks'),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Playlist $playlist)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Playlist $playlist)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Playlist $playlist)
    {
        //
    }

    public function getPlaylists(Request $request) {
      // dd($request->user);
      $user = $request->user;
      $playlists = $user->playlists()->withCount(['tracks'])->get();
      return $playlists;
    }
}
