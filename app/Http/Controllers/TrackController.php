<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Track;
use Inertia\Inertia;
use Illuminate\Support\Str;

class TrackController extends Controller
{
  public function index() {
    $tracks = Track::where('display', true)->orderBy('artist')->get();
    return Inertia::render('Track/index', [
      'tracks' => $tracks
    ]);
  }

  public function create() {
    return Inertia::render('Track/create');
  }
  public function store(Request $request) {
    $request->validate([
      'title' => ['required', 'string', 'min:5', 'max:255'],
      'artist' => ['required', 'string', 'min:3', 'max:255'],
      'display' => ['required', 'boolean'],
      'image' => ['required', 'image'],
      'music' => ['required', 'file', 'mimes:mp3,wav'],
    ]);

    $uuid = 'trk-' . Str::uuid();

    $imageExtension = $request->image->extension();
    $imagePath = $request->image->storAs('tracks/images', $uuid . '.' . $imageExtension);

    $musicExtension = $request->music->extension();
    $musicPath = $request->music->storAs('tracks/musics', $uuid . '.' . $musicExtension);

    Track::create([
      'uuid' => $uuid,
      'title' => $request->title,
      'artist' => $request->artist,
      'display' => $request->display,
      'image' => $imagePath,
      'music' =>$musicPath
    ]);

    return redirect()->route('tracks.index');
  }

  public function show() {

  }
  public function edit() {

  }

  public function update() {

  }

  public function destroy() {

  }
}
