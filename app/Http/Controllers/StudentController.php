<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Classes;
use App\Models\Student;
use App\Models\Guardian;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class StudentController extends Controller
{
    public function index()
    {
         $students = Student::with('classes')->get(); 
        
        // Student::with(['classes' => function ($query) {
        //     $query->latest()->first(); // Retrieve the last inserted class
        // }])->get();
    
        return view('student.index', compact('students'));
    }
    public function create() {
        $availables = Classes::all();
        $existingGuardians = Guardian::all();
        return view('student.create', compact('existingGuardians','availables'));
    }   
    
    public function store(Request $request){
        // Validate the request data
        
        $validator = Validator::make($request->all(), [
            // Add validation rules for other fields
            'student_first_name' => 'required|string|max:255',
            'student_last_name' => 'required|string|max:255',
            // Add other student fields
    
            'guardian_selection' => 'required|in:existing,new',
            'existing_guardian_id' => Rule::requiredIf($request->input('guardian_selection') == 'existing'),
            // Add validation rules for other guardian fields if creating a new guardian
        ]);
    
        // Check if the validation fails
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
    
        // Check if the user selected to register a new guardian
        if ($request->input('guardian_selection') == 'new') {
            // Validate the guardian data
            $guardianValidator = Validator::make($request->all(), [
                // Add validation rules for guardian fields
                'email' => 'required|string|max:255|unique:users',
                'guardian_phone_number' => 'required|string|max:255',
                'guardian_father_name' => 'required|string|max:255',
                'guardian_first_name' => 'required|string|max:255',
                'guardian_place_of_birth' => 'required|string|max:255',
                'guardian_dob' => 'required|date',
                'guardian_gender' => 'required|in:male,female',
                'guardian_tribe' => 'required|string|max:255',
                'guardian_religion' => 'required|string|max:255',
                'guardian_nin_no' => 'nullable|string|max:255',
                'guardian_nationality' => 'required|string|max:255',
                // 'guardian_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                // Add other guardian fields
            ]);
    
            // Check if the guardian validation fails
            if ($guardianValidator->fails()) {
                return redirect()->back()
                    ->withErrors($guardianValidator)
                    ->withInput();
            }

            $user = User::create([
                'email' => $request->input('email'),
                'password' => $request->input('guardian_phone_number'),
                'name' => $request->input('guardian_first_name') . ' ' . $request->input('guardian_father_name') ,
            ]);
    
        // Create the guardian with only guardian-specific fields
            $guardian = Guardian::create([
                'user_id' => $user->id, 
                'g_father_name' => $request->input( 'guardian_grand_father_name'),
                'g_father_name' => $request->input( 'guardian_grand_father_name'),
                'father_name' => $request->input( 'guardian_father_name'),
                'first_name' => $request->input( 'guardian_first_name'),
                'place_of_birth' => $request->input( 'guardian_place_of_birth'),
                'date_of_birth' => $request->input( 'guardian_dob'),
                'gender' => $request->input( 'guardian_gender'),
                'tribe' => $request->input( 'guardian_tribe'),
                'religion' => $request->input( 'guardian_religion'),
                'nin_no' => $request->input( 'guardian_nin_no'),
                'nationality' => $request->input( 'guardian_religion'),
                'relation' => $request->input( 'guardian_relation'),
                'marital_status' => 'single',
                'email' => $request->input( 'email'),
                'phone_number' => $request->input( 'guardian_phone_number'),
                'whatsapp_number' => $request->input( 'guardian_whatsapp_number'),
                'work_place' => $request->input( 'guardian_work_place'),
                'occupation' => $request->input( 'guardian_occupation'),
                'postal_code' => $request->input( 'guardian_postal_code'),
                'po_box' => $request->input( 'guardian_p_o_box'),
            ]);
    
            // Attach the guardian ID to the request for creating the student
            $request->merge(['guardian_id' => $guardian->id]);
        }

        
            $guardian_id = $request->input('guardian_selection') == 'new' 
            ? $request->input('guardian_id')
            : $request->input('existing_guardian_id');

            $imageDirectory = 'public/images/students';
            if (!Storage::exists($imageDirectory)) {
                Storage::makeDirectory($imageDirectory);
            }
        if ($request->hasFile('image')) {
            // Store the uploaded image with a unique name
            $imagePath = $request->file('image')->store('images/students');
    
            // Check if the image was uploaded successfully
            if ($imagePath) {
                $imageName = uniqid() . '_' . time() . '.' . $request->file('image')->getClientOriginalExtension();
            
                // Store the image with the generated name
                if(!$request->file('image')->storeAs('images/students', $imageName)){
                    return redirect()->back()
                    ->with('error', 'Image upload failed. Please try again. image not saved')
                    ->withInput();
                }
            } else {
                // Image upload failed
                return redirect()->back()
                    ->with('error', 'Image upload failed. Please try again.')
                    ->withInput();
            }
        } else {
            // No image provided
            return redirect()->back()
                ->with('error', 'Please provide an image.')
                ->withInput();
        }

        $entryYear = date('y'); // Get the last two digits of the current year
        $serialNumber = Student::whereYear('created_at', now()->year)->count() + 1;
        $admissionNumber = $entryYear . str_pad($serialNumber, 3, '0', STR_PAD_LEFT);
    
        // Create the student
        $student = Student::create([
            
            'first_name' => $request->input('student_first_name'),
            'father_name' => $request->input('student_last_name'),
            'other_name' => $request->input('student_other_name'),
            'date_of_birth' => $request->input('student_dob'),
            'gender' => $request->input('student_gender'),
            'tribe' => $request->input('tribe'),
            'religion' => $request->input('student_religion'),
            'place_of_birth' => $request->input('student_place_of_birth'),
            'nin_no' => $request->input('nin_no'),
            'nationality' => $request->input('student_nationality'),
            'image' => $imageName, // Assuming 'images' is the storage folder
            // Add other student fields
            'admission_number' => $admissionNumber,
            'guardian_id' => $guardian_id, 

        ]);

        $student->classes()->attach($request->input('starting_class'));

        // Redirect or perform other actions after successfully creating the student
    
        return redirect()->route('student.index')->with('message', 'Student created successfully');
    }

    public function show(Student $student){
        return view('student.details', compact('student'));
    }
    
}
