<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Track;
use Inertia\Inertia;

class TrackController extends Controller
{
  public function index() {
    $tracks = Track::where('display', true)->orderBy('artist')->get();
    return Inertia::render('Track/index', [
      'tracks' => $tracks
    ]);
  }

  public function create() {

  }
  public function store() {

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
