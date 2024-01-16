@extends('layouts.structure')
@section('main')
<div class="col-lg-12">
    <div class="card">
        <div class="card-body">
          <h5 class="card-title">All Staff</h5>
            <a href="{{ route('staff.create')}}" class="btn btn-success float-end">Add New</a>
          <!-- Table with stripped rows -->
          <table id="table" class="table table-striped">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Roles</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($staffs as $index => $item)
                <tr>
                    <th scope="row"> {{ $index + 1 }}</th>
                
                    <td> {{ $item->user->name}} </td>
                    <td> {{ $item->user->email}} </td>

                    <td>
                        @php
                            foreach ($item->user->roles as $role) {
                                
                                echo $role->name;
                                echo '| ';
                            }
                        @endphp
                    </td>
                    <td> <a href="{{  route('staff.show',  $item->id ) }}" class="btn btn-info sm">View</a> 
                       <a href="{{  route('staff.edit',  $item->id ) }}" class="btn btn-info sm">Edit</a> </td>
                 </tr>
                @endforeach
            </tbody>
          </table>
        </div>
    </div>
</div>         
@endsection