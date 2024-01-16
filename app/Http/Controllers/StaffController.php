<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Validator;

class StaffController extends Controller
{
    public function index(){
        $staffs = Teacher::with('user')->get();
        return view('staff.index',compact('staffs'));
    }

    public function details(User $user ){
        $user->load('teacher');        
        return view('staff.details',compact('user'));
    }

    public function show( $id ){
        $user = Teacher::findOrFail($id);
        return view('staff.details',compact('user'));
    }

    public function edit( $id ){
        $teacher = Teacher::findOrFail($id);
         
        return view('staff.edit',compact('teacher'));
    }

    public function create(User $user ){
        $user->load('teacher');       
        $roles = Role::all(); 
        return view('staff.create',compact('roles'));
    }
    
    public function store(Request $request)
    {
        // Validate the request data
        $validator = Validator::make($request->all(), [
            // Add validation rules for other fields
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'middle_name' => 'nullable|string|max:255',
            'place_of_birth' => 'required|string|max:255',
            'date_of_birth' => 'required|date',
            'place_of_birth' => 'nullable|string|max:255',
            'gender' => 'required|in:male,female',
            'marital_status' => 'required|in:single,married,divorced',
            'highest_qualification' => 'nullable|string|max:255',
            'residential_address' => 'nullable|string',
            'nearest_landmark' => 'nullable|string|max:255',
            'mobile_number' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'bank' => 'nullable|string|max:255',
            'bank_account_number' => 'nullable|string|max:255',
            // Add more validation rules as needed
        ]);

        // Check if the validation fails
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Create the user
        $user = User::create([
            'email' => $request->input('email'),
            'password' => $request->input('mobile_number'), // Set a default password or generate one as needed
            'name' => $request->input('first_name') . ' '
             . $request->input('last_name') . ' '
              . $request->input('middle_name'),
        ]);

        // Create the staff with the user_id
        $staff = Teacher::create([
            'user_id' => $user->id,
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'middle_name' => $request->input('middle_name'),
            'date_of_birth' => $request->input('date_of_birth'),
            'place_of_birth' => $request->input('place_of_birth'),
            'gender' => $request->input('gender'),
            'marital_status' => $request->input('marital_status'),
            'highest_qualification' => $request->input('highest_qualification'),
            'residential_address' => $request->input('residential_address'),
            'nearest_landmark' => $request->input('nearest_landmark'),
            'mobile_number' => $request->input('mobile_number'),
            'email' => $request->input('email'),
            'bank' => $request->input('bank'),
            'bank_account_number' => $request->input('bank_account_number'),
            // Add more fields as needed
        ]);

        // Redirect or perform other actions after successfully creating the staff
        return redirect()->route('staff.index')->with('success', 'Staff created successfully');
    }

    public function update( Request $request, $id)
    {
        $teacher = Teacher::findOrFail($id);
        $user = User::findOrFail($teacher->user_id);
        // Validate the request data
        $validator = Validator::make($request->all(), [
            // Add validation rules for other fields
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'middle_name' => 'nullable|string|max:255',
            'place_of_birth' => 'required|string|max:255',
            'date_of_birth' => 'required|date',
            'gender' => 'required|in:male,female',
            'marital_status' => 'required|in:single,married,divorced',
            'highest_qualification' => 'nullable|string|max:255',
            'residential_address' => 'nullable|string',
            'nearest_landmark' => 'nullable|string|max:255',
            'mobile_number' => 'required|string|max:255',
            //'email' => 'required|email|unique:users,'. $user->id,
            'bank' => 'nullable|string|max:255',
            'bank_account_number' => 'nullable|string|max:255',
            // Add more validation rules as needed
        ]);

        // Check if the validation fails
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Create the user
        $user->updateOrCreate(
            ['id' => $user->id],
            [
                'email' => $request->input('email'),
                'name' => $request->input('first_name') . ' ' . $request->input('last_name') . ' ' . $request->input('middle_name'),
            ]
        );
        
        $teacher->update($request->all());

        // Redirect or perform other actions after successfully creating the staff
        return redirect()->route('staff.index')->with('success', 'Staff created successfully');
    }

    
}
