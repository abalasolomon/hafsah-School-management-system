<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use App\Models\Teacher;
use Illuminate\Http\Request;

class ClassesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $classes = Classes::all();
        return view('classes.index', compact('classes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('classes.create');
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

        Classes::create([
            'name' => ucfirst($request->name),
            // Add more fields based on your model's attributes
        ]);

        return redirect()->route('class.index')->with('success', 'Class created successfully!');
    }

    public function details(Classes $class)
    {
        $teachersNotAssigned = Teacher::whereDoesntHave('classes', function ($query) use ($classId) {
            $query->where('class_id', $classId);
        })->get();
        return view('class.details',compact('class','teachersNotAssigned'));
    }

    public function assignClass(Request $req, Classes $class)
    {
        $teacherId = $req->input('teacher');
    
        // Check if the teacher is already assigned to the class
        if ($class->teachers->contains($teacherId)) {
            return redirect()->back()->with('success', 'Teacher already assigned to this class');
        }
    
        // Attempt to attach the teacher to the class
        try {
            $class->teachers()->attach($teacherId);
            return redirect()->back()->with('success', 'Teacher assigned to class successfully');
        } catch (QueryException $e) {
            // Handle any exceptions that might occur during the attachment
            return redirect()->back()->with('success', 'Failed to assign teacher to class');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Classes $class)
    {
        $teachers = Teacher::all();
        return view('classes.details', compact('class','teachers'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Classes $class)
    {
        return view('classes.edit', compact('class'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Classes $class)
    {
        $request->validate([
            'name' => 'required|unique:classes,name,' . $class->id,
        ]);
    
        $class->update([
            'name' => ucfirst($request->input('name')),
            // Add other fields to update if needed
        ]);
    
        return redirect()->route('class.index')->with('success', 'Class updated successfully.');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
