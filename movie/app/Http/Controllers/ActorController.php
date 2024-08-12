<?php

namespace App\Http\Controllers;

use App\Models\Actor;
use App\Models\Scenario;
use Illuminate\Http\Request;

class ActorController extends Controller
{
    public function index()
    {
        $actors = Actor::with('scenario')->get();
        return view('actors.index', compact('actors'));
    }

    public function create()
    {
        $scenarios = Scenario::whereDoesntHave('actor')->get();
        return view('actors.create', compact('scenarios'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'image' => 'nullable|image',
            'scenario_id' => 'required|exists:scenarios,id',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('public/images');
        }

        Actor::create($validated);
        return redirect()->route('actors.index')->with('success', 'Actor created successfully.');
    }

    public function show(Actor $actor)
    {
        return view('actors.show', compact('actor'));
    }

    public function edit(Actor $actor)
    {
        $scenarios = Scenario::whereDoesntHave('actor')
            ->orWhere('id', $actor->scenario_id)
            ->get();
        return view('actors.edit', compact('actor', 'scenarios'));
    }

    public function update(Request $request, Actor $actor)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'image' => 'nullable|image',
            'scenario_id' => 'required|exists:scenarios,id',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('public/images');
        }

        $actor->update($validated);
        return redirect()->route('actors.index')->with('success', 'Actor updated successfully.');
    }

    public function destroy(Actor $actor)
    {
        $actor->delete();
        return redirect()->route('actors.index')->with('success', 'Actor deleted successfully.');
    }
}
