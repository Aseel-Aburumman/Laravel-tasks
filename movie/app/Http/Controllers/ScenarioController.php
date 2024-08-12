<?php

namespace App\Http\Controllers;

use App\Models\Scenario;
use Illuminate\Http\Request;

class ScenarioController extends Controller
{
    public function index()
    {
        $scenarios = Scenario::all();
        return view('scenarios.index', compact('scenarios'));
    }

    public function create()
    {
        return view('scenarios.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'description' => 'required',
        ]);

        Scenario::create($validated);
        return redirect()->route('scenarios.index')->with('success', 'Scenario created successfully.');
    }

    public function show(Scenario $scenario)
    {
        return view('scenarios.show', compact('scenario'));
    }

    public function edit(Scenario $scenario)
    {
        return view('scenarios.edit', compact('scenario'));
    }

    public function update(Request $request, Scenario $scenario)
    {
        $validated = $request->validate([
            'description' => 'required',
        ]);

        $scenario->update($validated);
        return redirect()->route('scenarios.index')->with('success', 'Scenario updated successfully.');
    }

    public function destroy(Scenario $scenario)
    {
        $scenario->delete();
        return redirect()->route('scenarios.index')->with('success', 'Scenario deleted successfully.');
    }
}
