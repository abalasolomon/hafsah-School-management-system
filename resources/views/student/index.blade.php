@extends('layouts.structure')
@section('main')
<div class="col-lg-12">
    <div class="card">
        
        <div class="card-body">
          <h5 class="card-title">All Students</h5>
            <a href="{{ route('student.create')}}" class="btn btn-success float-end">Add New</a>
          <!-- Table with stripped rows -->
          <table id="table" class="datatable-wrapper datatable-loading no-footer sortable searchable fixed-columns table table-striped">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Admission Number</th>
                <th scope="col">Present Class</th>
                <th scope="col">Image</th>
                <th scope="col">Image</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($students as $index => $item)
              <tr>
                  <th scope="row">{{ $index + 1 }}</th>
                  <td>{{ $item->first_name . ' ' . $item->father_name . ' ' . $item->grand_father_name}}</td>
                  <td>{{ $item->admission_number}}</td>
                  <td>
                      @forelse ($item->classes as $class)
                          {{ $class->name }}
                          @if (!$loop->last)
                              , <!-- Add a comma if it's not the last iteration -->
                          @endif
                      @empty
                          No class assigned
                      @endforelse
                  </td>
                  <td>
                    <img src="{{ asset('storage/images/students/' . $item->image) }}" 
                          alt="Student Image" 
                          style="max-width: 100px; max-height: 100px;">
                  </td>
                  <td>
                      <a href="{{ route('student.show', $item->id) }}" class="btn btn-info sm">View</a>
                  </td>
              </tr>
          @endforeach
          
          </tbody>
          </table>
        </div>
    </div>
</div>         
@endsection