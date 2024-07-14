<?php

namespace App\Http\Controllers;

use App\Models\ApiKey;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Str;

class ApiKeyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
      return Inertia::render('Apikey/Index',[
        'apikeys' => auth()->user()->apikeys()->get()
      ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Apikey/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
      $request->validate([
        'name' => ['required', 'string', 'min:1', 'max:255'],
      ]);

      $apikey = substr(md5(microtime()),rand(0,26),24);

      $apikey = ApiKey::create([
        'uuid' => 'apikey-' . Str::uuid(),
        'user_id' => $request->user()->id,
        'name' => $request->name,
        'key' => $apikey
      ]);

      return redirect()->route('apikeys.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(ApiKey $apiKey)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ApiKey $apiKey)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ApiKey $apiKey)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, ApiKey $apiKey)
    {
      $ff = $request->getRequestUri();
$segments = explode('/', $ff);
$id = end($segments);


      // dd($id);
      // if (!$apiKey->exists) {
      //   return redirect()->route('apikeys.index')->with('error', 'API Key not found.');
      // }
      // dd(intval($id));
      ApiKey::destroy(intval($id));

      return redirect()->route('apikeys.index');
    }
}
