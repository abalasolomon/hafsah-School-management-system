@extends('layouts.structure')
@section('main')
<div class="col-lg-12">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">New Student</h5>
            <!-- Create Student Form -->
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{ route('student.store') }}" method="post" enctype="multipart/form-data">
             @csrf



                <!-- Student Fields -->
                <fieldset>
                    <legend>Student Details</legend>

                    <div class="row mb-3">
                        <!-- Add student fields as needed -->
                        <!-- Example: -->
                        <div class="col-md-6">
                            <label for="student_first_name" class="form-label">Student's First Name</label>
                            <input type="text" class="form-control " id="student_first_name" required name="student_first_name" value="{{ old('student_first_name') }}" >
                        </div>

                        <div class="col-md-6">
                            <label for="student_last_name" class="form-label">Student's Last Name</label>
                            <input type="text" class="form-control" id="student_last_name" name="student_last_name" value="{{ old('student_last_name') }}" required>
                        </div>

                        <div class="col-md-6">
                            <label for="student_other_name" class="form-label">Student's Other Name</label>
                            <input type="text" class="form-control" id="student_other_name" name="student_other_name" value="{{ old('student_other_name') }}" >
                        </div>
                    
                        <div class="col-md-6">
                            <label for="student_dob" class="form-label">Date of Birth</label>
                            <input type="date" class="form-control" id="student_dob" name="student_dob" value="{{ old('student_dob') }}" required>
                        </div>

                        <div class="col-md-6">
                            <label for="student_gender" class="form-label">Gender</label>
                            <select class="form-select" id="student_gender" name="student_gender" required>
                                <option value="">--- Select Gender ---</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label for="tribe" class="form-label">Tribe</label>
                            <input type="text" class="form-control" id="tribe" name="tribe" value="{{ old('tribe') }}" required>
                        </div>
                        <div class="col-md-6">
                            <label for=" student_religion" class="form-label"> Religion</label>
                            <select class="form-select" id=" student_religion" name=" student_religion" required>
                                <option value="">--- Select Religion ---</option>
                                <option value="Christian">Christian</option>
                                <option value="muslim">Muslim</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="student_nin_no" class="form-label">nin_no</label>
                            <input type="number" class="form-control" id="student_nin_no" name="student_nin_no" value="{{ old('nin_no') }}" required>
                        </div>
                        <div class="col-md-6">
                            <label for="student_place_of_birth" class="form-label">place_of_birth</label>
                            <input type="text" class="form-control" id="student_place_of_birth" name="student_place_of_birth" value="{{ old('nin_no') }}" required>
                        </div>

                        <div class="col-md-6">
                            <label for="student_nationality" class="form-label">Nationality</label>
                            <input type="text" class="form-control" id="student_nationality" name="student_nationality" value="{{ old('nationality') }}" required>
                        </div>

                        <div class="col-md-6">
                            <label for="image" class="form-label">image</label>
                            <input type="file" class="form-control" id="image" name="image" value="{{ old('image') }}" required>
                        </div>

                        <div class="col-md-6">
                            <label for="starting_class" class="form-label">Starting Class</label>
                            <select class="form-select" id="starting_class" name="starting_class" required>
                                <option value="">--- Select Class ---</option>
                                @if ($availables)
                                    @foreach($availables as $available)
                                    <option value="{{ $available->id }}">{{ $available->name }}</option>
                                    <!-- Assuming "full_name" is a method or attribute in your Guardian model -->
                                    @endforeach
                                @else
                                    <option value=""> No Existing Guardian</option>    
                                @endif
                            </select>
                        </div>

                        
                    </div>

                    <!-- Add more student fields as needed -->

                </fieldset>
                <!-- Student Fieldset -->
                <fieldset>
        

                    <!-- Guardian Selection Dropdown -->
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="guardian_selection" class="form-label">Select Guardian</label>
                            <select class="form-select" id="guardian_selection" name="guardian_selection">
                                <option value="existing">Select Existing Guardian</option>
                                <option value="new">Register New Guardian</option>
                            </select>
                        </div>

                        <div class="col-md-6" id="existing_guardian">
                            <label for="existing_guardian_id" class="form-label">Existing Guardian</label>
                            <select class="form-select" id="existing_guardian_id" name="existing_guardian_id">
                                @if ($existingGuardians)
                                    @foreach($existingGuardians as $existingGuardian)
                                    <option value="{{ $existingGuardian->id }}">{{ $existingGuardian->first_name . ' '.$existingGuardian->father_name. ' '.$existingGuardian->grand_father_name. ' | '.$existingGuardian->phone_number }}</option>
                                    <!-- Assuming "full_name" is a method or attribute in your Guardian model -->
                                    @endforeach
                                @else
                                    <option value=""> No Existing Guardian</option>    
                                @endif
                                
                            </select>
                        </div>
                    </div>

                    <!-- New Guardian Fields -->
                    <div id="new_guardian" class="row mb-3" style="display:none;">
                        <legend>Guardian Information</legend>
                        <div class="row mb-3">
                            <div class="col-md-4">
                                <label for="guardian_g_father_name" class="form-label">Guardian's Father Name (Optional)</label>
                                <input type="text" class="form-control" id="guardian_g_father_name" name="guardian_g_father_name" value="{{ old('guardian_g_father_name') }}">
                            </div>
        
                            <div class="col-md-4">
                                <label for="guardian_father_name" class="form-label">Guardian's Father Name</label>
                                <input type="text" class="form-control" id="guardian_father_name" name="guardian_father_name" value="{{ old('guardian_father_name') }}" >
                            </div>
        
                            <div class="col-md-4">
                                <label for="guardian_first_name" class="form-label">Guardian's First Name</label>
                                <input type="text" class="form-control guardian-required" id="guardian_first_name" name="guardian_first_name" value="{{ old('guardian_first_name') }}" >
                            </div>
                        </div>
        
                        <div class="row mb-3">
                            <div class="col-md-4">
                                <label for="guardian_last_name" class="form-label">Guardian's Last Name</label>
                                <input type="text" class="form-control guardian-required" id="guardian_last_name" name="guardian_last_name" value="{{ old('guardian_last_name') }}" >
                            </div>
        
                            <div class="col-md-4">
                                <label for="guardian_place_of_birth" class="form-label">Place of Birth</label>
                                <input type="text" class="form-control guardian-required" id="guardian_place_of_birth" name="guardian_place_of_birth" value="{{ old('guardian_place_of_birth') }}" >
                            </div>
        
                            <div class="col-md-4">
                                <label for="guardian_dob" class="form-label">Date of Birth</label>
                                <input type="date" class="form-control guardian-required" id="guardian_dob" name="guardian_dob" value="{{ old('guardian_dob') }}" >
                            </div>
                        </div>
        
                        <!-- Add other guardian fields as needed -->
        
                        <div class="row mb-3">
                            <div class="col-md-4">
                                <label for="guardian_gender" class="form-label">Gender</label guardian-required>
                                <select class="form-select" id="guardian_gender" name="guardian_gender" >
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                </select>
                            </div>
        
                            <div class="col-md-4">
                                <label for="guardian_tribe" class="form-label">Tribe</label>
                                <input type="text" class="form-control guardian-required" id="guardian_tribe" name="guardian_tribe" value="{{ old('guardian_tribe') }}" >
                            </div>
        
                            <div class="col-md-4">
                                <label for="guardian_religion" class="form-label">Religion</label>
                                <input type="text" class="form-control guardian-required" id="guardian_religion" name="guardian_religion" value="{{ old('guardian_religion') }}" >
                            </div>
                        </div>
        
                        <div class="row mb-3">
                            <div class="col-md-4">
                                <label for="guardian_nin_no" class="form-label">NIN No (Optional)</label>
                                <input type="text" class="form-control" id="guardian_nin_no" name="guardian_nin_no" value="{{ old('guardian_nin_no') }}">
                            </div>
        
                            <div class="col-md-4">
                                <label for="guardian_nationality" class="form-label">Nationality</label>
                                <input type="text" class="form-control guardian-required" id="guardian_nationality" name="guardian_nationality" value="{{ old('guardian_nationality') }}" >
                            </div>
                            <!-- Add more guardian fields as needed -->
        
                        </div>
        
                        <div class="row mb-3">
                            <div class="col-md-4">
                                <label for="guardian_relation" class="form-label">Relation</label>
                                <input type="text" class="form-control guardian-required" id="guardian_relation" name="guardian_relation" value="{{ old('guardian_relation') }}" >
                            </div>
        
                            <div class="col-md-4">
                                <label for="guardian_email" class="form-label">Email</label>
                                <input type="email" class="form-control guardian-required" id="email" name="email" value="{{ old('email') }}" >
                            </div>
        
                            <div class="col-md-4">
                                <label for="guardian_phone_number" class="form-label">Phone Number</label>
                                <input type="tel" class="form-control guardian-required" id="guardian_phone_number" name="guardian_phone_number" value="{{ old('guardian_phone_number') }}" >
                            </div>
                        </div>
        
                        <div class="row mb-3">
                            <div class="col-md-4">
                                <label for="guardian_whatsapp_number" class="form-label">WhatsApp Number (Optional)</label>
                                <input type="tel" class="form-control" id="guardian_whatsapp_number" name="guardian_whatsapp_number" value="{{ old('guardian_whatsapp_number') }}">
                            </div>
        
                            <div class="col-md-4">
                                <label for="guardian_work_place" class="form-label">Work Place</label>
                                <input type="text" class="form-control guardian-required" id="guardian_work_place" name="guardian_work_place" value="{{ old('guardian_work_place') }}" >
                            </div>
        
                            <div class="col-md-4">
                                <label for="guardian_occupation" class="form-label">Occupation</label>
                                <input type="text" class="form-control guardian-required" id="guardian_occupation" name="guardian_occupation" value="{{ old('guardian_occupation') }}" >
                            </div>
                        </div>
        
                        <div class="row mb-3">
                            <div class="col-md-4">
                                <label for="guardian_postal_code" class="form-label">Postal Code (Optional)</label>
                                <input type="text" class="form-control" id="guardian_postal_code" name="guardian_postal_code" value="{{ old('guardian_postal_code') }}">
                            </div>
        
                            <div class="col-md-4">
                                <label for="guardian_po_box" class="form-label">P.O. Box (Optional)</label>
                                <input type="text" class="form-control" id="guardian_po_box" name="guardian_po_box" value="{{ old('guardian_po_box') }}">
                            </div>
                    </div>
                </fieldset>
                <button type="submit" class="btn btn-primary">Create Student</button>
            </form>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
    document.getElementById('guardian_selection').addEventListener('change', function () {
        var existingGuardian = document.getElementById('existing_guardian');
        var newGuardian = document.getElementById('new_guardian');

        if (this.value === 'existing') {
            existingGuardian.style.display = 'block';
            newGuardian.style.display = 'none';
        } else if (this.value === 'new') {
            existingGuardian.style.display = 'none';
            newGuardian.style.display = 'block';
        }
    });

    document.addEventListener('DOMContentLoaded', function() {
        // Get the select element
        var guardianSelection = document.getElementById('guardian_selection');
        
        // Get the fieldset and fields that need to be dynamically updated
        var guardianFieldset = document.getElementById('new_guardian');
        var requiredFields = guardianFieldset.querySelectorAll('.guardian-required');

        // Function to update required attribute
        function updateRequiredAttribute() {
            if (guardianSelection.value === 'new') {
                requiredFields.forEach(function(field) {
                    field.setAttribute('required', 'required');
                });
            } else {
                requiredFields.forEach(function(field) {
                    field.removeAttribute('required');
                });
            }
        }

        // Add event listener to the guardian selection dropdown
        guardianSelection.addEventListener('change', updateRequiredAttribute);

        // Initial update based on the default value
        updateRequiredAttribute();
    });
</script>

@endsection
