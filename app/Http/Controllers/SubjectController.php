<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $subjects = Subject::all();
        return view('subject.index',compact('subjects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('subject.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:classes|max:255', // Replace your_class_table_name with the actual table name for classes
            // Add more validation rules if needed
        ]);

        Subject::create([
            'name' => ucfirst($request->name),
            // Add more fields based on your model's attributes
        ]);

        return redirect()->route('subject.index')->with('success', 'Subject created successfully!');
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
    public function edit(Subject $subject)
    {
        return view('subject.edit',compact('subject'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Subject $subject)
    {
        $request->validate([
            'name' => 'required|unique:subject,name,' . $subject->id,
        ]);
    
        $subject->update([
            'name' => $request->input('name'),
            // Add other fields to update if needed
        ]);
    
        return redirect()->route('subject.index')->with('success', 'Subject updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
