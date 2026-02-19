<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class RickMortyClientController extends Controller
{
    private $api;

    public function __construct()
    {
        $this->api = env('RICK_API_URL');
    }

    public function index()
    {
        $response = Http::get($this->api . '/rick-and-morties');

        if ($response->successful()) {
            $characters = $response->json()['data'] ?? [];
        } else {
            $characters = [];
        }

        return view('characters.index', compact('characters'));
    }

    public function create()
    {
        return view('characters.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name'     => 'required|string|max:255',
            'status'   => 'nullable|string|max:255',
            'species'  => 'nullable|string|max:255',
            'type'     => 'nullable|string|max:255',
            'gender'   => 'nullable|string|max:255',
            'origin'   => 'nullable|string|max:255',
            'location' => 'nullable|string|max:255',
            'image'    => 'nullable|string|max:255',
        ]);

        $response = Http::post($this->api . '/rick-and-morties', $data);

        if ($response->successful()) {
            return redirect()->route('characters.index')
                ->with('success', 'Character created in Project B');
        }

        return back()->with('error', 'Failed to create character');
    }

    public function edit($id)
    {
        $response = Http::get($this->api . '/rick-and-morty/' . $id);

        if ($response->successful()) {
            $character = $response->json();
        } else {
            return redirect()->route('characters.index')
                ->with('error', 'Character not found');
        }

        return view('characters.edit', compact('character'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'name'     => 'required|string|max:255',
            'status'   => 'nullable|string|max:255',
            'species'  => 'nullable|string|max:255',
            'type'     => 'nullable|string|max:255',
            'gender'   => 'nullable|string|max:255',
            'origin'   => 'nullable|string|max:255',
            'location' => 'nullable|string|max:255',
            'image'    => 'nullable|string|max:255',
        ]);

        $response = Http::put($this->api . '/rick-and-morty/' . $id, $data);

        if ($response->successful()) {
            return redirect()->route('characters.index')
                ->with('success', 'Character updated');
        }

        return back()->with('error', 'Update failed');
    }

    public function destroy($id)
    {
        $response = Http::delete($this->api . '/rick-and-morty/' . $id);

        if ($response->successful()) {
            return redirect()->route('characters.index')
                ->with('success', 'Character deleted');
        }

        return redirect()->route('characters.index')
            ->with('error', 'Delete failed');
    }
}
