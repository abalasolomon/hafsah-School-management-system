@extends('layouts.structure')
@section('main')
<div class="col-lg-12">
    <div class="card">
        <div class="card-body">
          <h5 class="card-title">New Class</h5>
          <form action="{{ route('staff.update' , $teacher->id ) }}" method="post">
            @csrf
            @method('PUT')
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <!-- First Name -->
            <div class="row mb-3">
                <label for="first_name" class="col-sm-2 col-form-label">First Name</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="first_name" name="first_name" value="{{ $teacher->first_name }}">
                    @error('first_name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        
            <!-- Last Name -->
            <div class="row mb-3">
                <label for="last_name" class="col-sm-2 col-form-label">Last Name</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="last_name" name="last_name" value="{{ $teacher->last_name }}">
                    @error('last_name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        
            <!-- Middle Name -->
            <div class="row mb-3">
                <label for="middle_name" class="col-sm-2 col-form-label">Middle Name</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="middle_name" name="middle_name" value="{{ $teacher->middle_name }}">
                    @error('middle_name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        
            <!-- Date of Birth -->
            <div class="row mb-3">
                <label for="date_of_birth" class="col-sm-2 col-form-label">Date of Birth</label>
                <div class="col-sm-10">
                    <input type="date" class="form-control" id="date_of_birth" name="date_of_birth" value="{{ date('m-d-Y', strtotime($teacher->date_of_birth)) }}">
                    @error('date_of_birth')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        
            <!-- Add other fields as needed -->
        
            <!-- Marital Status -->
            <div class="row mb-3">
                <label for="marital_status" class="col-sm-2 col-form-label">Marital Status</label>
                <div class="col-sm-10">
                    <select class="form-select" id="marital_status" name="marital_status">
                        <option value="single">Single</option>
                        <option value="married">Married</option>
                        <option value="divorced">Divorced</option>
                    </select>
                    @error('marital_status')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <!-- Marital Status -->
            <div class="row mb-3">
                <label for="gender" class="col-sm-2 col-form-label">Gender</label>
                <div class="col-sm-10">
                    <select class="form-select" id="gender" name="gender">
                        <option value="">--- Select Gender ---</option>
                        <option value="male" {{ $teacher->gender == 'Male'? 'selected' : ''  }} >Male</option>
                        <option value="female" {{ $teacher->gender == 'Female'? 'selected' : ''  }}>Female</option>
                    </select>
                    @error('gender')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        
            <!-- Highest Qualification -->
            <div class="row mb-3">
                <label for="highest_qualification" class="col-sm-2 col-form-label">Highest Qualification</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="highest_qualification" name="highest_qualification" value="{{ $teacher->highest_qualification }}">
                    @error('highest_qualification')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <label for="place_of_birth" class="col-sm-2 col-form-label"> Place of Birth </label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="place_of_birth" name="place_of_birth" value="{{ $teacher->place_of_birth }}">
                    @error('place_of_birth')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        
            <!-- Residential Address -->
            <div class="row mb-3">
                <label for="residential_address" class="col-sm-2 col-form-label">Residential Address</label>
                <div class="col-sm-10">
                    <textarea class="form-control" id="residential_address" name="residential_address">{{ $teacher->residential_address }}</textarea>
                    @error('residential_address')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        
            <!-- Nearest Landmark -->
            <div class="row mb-3">
                <label for="nearest_landmark" class="col-sm-2 col-form-label">Nearest Landmark</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="nearest_landmark" name="nearest_landmark" value="{{ $teacher->nearest_landmark }}">
                    @error('nearest_landmark')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        
            <!-- Mobile Number -->
            <div class="row mb-3">
                <label for="mobile_number" class="col-sm-2 col-form-label">Mobile Number</label>
                <div class="col-sm-10">
                    <input type="tel" class="form-control" id="mobile_number" name="mobile_number" value="{{ $teacher->mobile_number }}">
                    @error('mobile_number')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        
            <!-- Email -->
            <div class="row mb-3">
                <label for="email" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                    <input type="email" class="form-control" id="email" name="email" value="{{ $teacher->email }}">
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        
            <!-- Bank -->
            <div class="row mb-3">
                <label for="bank" class="col-sm-2 col-form-label">Bank</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="bank" name="bank" value="{{ $teacher->bank }}">
                    @error('bank')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        
            <!-- Bank Account Number -->
            <div class="row mb-3">
                <label for="bank_account_number" class="col-sm-2 col-form-label">Bank Account Number</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="bank_account_number" name="bank_account_number" value="{{ $teacher->bank_account_number }}">
                    @error('bank_account_number')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        
            <!-- Add more fields as needed -->
        
            <div class="row mb-3">
                <div class="col-sm-10 offset-sm-2">
                    <button type="submit" class="btn btn-primary">Update Staff</button>
                </div>
            </div>
        </form>
          
        </div>
    </div>
</div>         
@endsection