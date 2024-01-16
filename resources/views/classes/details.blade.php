@extends('layouts.structure')
@section('main')
<div class="col-lg-12">
    <div class="card">
        <div class="card-body">
            <a href="{{ url('class')}}" class="btn btn-success float-start">Back</a>
          <div class="card">
            <div class="card-body">
              <h5 class="card-title"> Details For {{ $class->name . ' ' . $class->father_name . ' ' .$class->grand_father_name  }} </h5>   
              <!-- Default Accordion -->
              <div class="accordion" id="accordionExample">
                <div class="accordion-item">
                  <h2 class="accordion-header" id="headingOne">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                      Teachers
                    </button>
                  </h2>
                  <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        @if ($class->teachers->isNotEmpty())
                        <strong>
                            <div class="container">
                                <div class="row">
                                    Assign to:

                                        
                                            @foreach ($class->teachers as $teacher)
                                            <form 
                                            class=""
                                            action="{{ route('class.removeTeacher', $class->id) }}" 
                                            onsubmit="return confirm('are you sure?')"
                                            method="post">
                                                @csrf
                                                @method('DELETE')
                                                <div class="text">
                                                    {{ $teacher->first_name . ' ' .
                                                    $teacher->last_name . ' ' .
                                                    $teacher->middle_name . ' ' .$teacher->id}}
                                                
                                                <span>
                                                    <button class="btn btn-danger text-white rounded-md" type="submit">        <i class="fa fas-trash"></i>X</button>
                                                </span>
                                                </div>
                                            </form>
                                            @endforeach
                                        
                                </div>
                            </div>
                            
                        </strong>
                        @else
                            No teacher assigned                        
                        @endif

                        <div class="card">
                            <div class="card-body">
                              <h5 class="card-title">Assign New teacher</h5>
                              <form action="{{ route('class.assign', $class->id  ) }}" method="post">
                                @csrf
                                    <div class="row ">
                                        <label for="name" class="col-md-4 col-form-label">Teacher Name</label>
                                        <select class="form-select col-md-4" id="teacher" name="teacher" >
                                            <option value="">--- Select Teacher ---</option>
                                            @foreach ($teachers as $teacher)
                                                <option value="{{ $teacher->id }}">{{ $teacher->first_name .' ' .$teacher->last_name .' ' .$teacher->middle_name  .'|'.$teacher->id}}</option>
                                                
                                            @endforeach
                                        </select>
                                        @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                        <div class="col-sm-4 ">
                                            <button type="submit" class="btn btn-primary">Create Class</button>
                                        </div>
                                    </div>
                              </form>
                    </div>
                  </div>
                </div>
                <div class="accordion-item">
                  <h2 class="accordion-header" id="headingTwo">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                      Students
                    </button>
                  </h2>
                  <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <strong>
                            <div class="container">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Student Name</th>
                                            <th scope="col">Image</th>
                                            <th scope="col">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($class->students as $index => $student)
                                            <tr>
                                                <th scope="row">{{ $index + 1 }}</th>
                                                <td>{{ $student->first_name . ' ' . $student->father_name . ' ' . $student->grand_father_name }}</td>
                                                <td>
                                                    <img src="{{ asset($student->image) }}" alt="Student Image" style="max-width: 100px; max-height: 100px;">
                                                </td>
                                                <td>
                                                    <a href="{{ route('student.show', $student->id) }}" class="btn btn-info sm">View</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                
                                
                            </div>
                            
                        </strong> 
                    </div>
                  </div>
                </div>
                <div class="accordion-item">
                  <h2 class="accordion-header" id="headingThree">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                      Subjects
                    </button>
                  </h2>
                  <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Subjects</th>
                                    <th scope="col">Terms</th>
                                </tr>
                            </thead>
                            <tbody>

                                @if($class->terms->isNotEmpty())
                                    <tr>
                                        <th scope="row">{{ $index + 1 }}</th>
                                        <td>
                                            @foreach ($class->terms as $subject)
                                                {{ $subject->name }} ({{ $subject->pivot->term_id }}),
                                            @endforeach
                                        </td>
                                        <td>
                                            @foreach ($class->terms as $term)
                                                {{ $term->name }} ({{ $term->pivot->subject_id }}),
                                            @endforeach
                                        </td>
                                    </tr>
                                @else
                                    <h1>No Subject Rigistered to this class</h1>
                                @endif
                            </tbody>
                        </table>                        
                    </div>
                  </div>
                </div>
              </div><!-- End Default Accordion Example -->

            </div>
          </div>

        </div>
    </div>
</div>         
@endsection