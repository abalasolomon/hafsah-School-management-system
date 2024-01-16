<?php

namespace App\Http\Controllers;

use App\Models\Session;
use Illuminate\Http\Request;

class SessionController extends Controller
{
    public function index()
    {
        $sessions = Session::all();
        return view('sessions.index', compact('sessions'));
    }

    public function create()
    {
        return view('sessions.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        Session::create($request->all());

        return redirect()->route('sessions.index')->with('success', 'Session created successfully');
    }

    public function show(Session $session)
    {
        return view('sessions.show', compact('session'));
    }

    public function edit(Session $session)
    {
        return view('sessions.edit', compact('session'));
    }

    public function update(Request $request, Session $session)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $session->update($request->all());

        return redirect()->route('sessions.index')->with('success', 'Session updated successfully');
    }

    public function destroy(Session $session)
    {
        $session->delete();

        return redirect()->route('sessions.index')->with('success', 'Session deleted successfully');
    }
}
