@extends('layouts.structure')
@section('main')
<div class="col-lg-12">
    <div class="card">
        <div class="card-body">
          <h5 class="card-title">All Subjects</h5>
            <a href="{{ route('subject.create')}}" class="btn btn-success float-end">Add New</a>
          <!-- Table with stripped rows -->
          <table id="table" class="table table-striped">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($subjects as $index => $item)
                <tr>
                    <td scope="row"> {{ $index + 1 }}</td>
                    <td scope="row"> {{ $item->name }}</td>
                    <td> <a href="{{  route('subject.edit',  $item->id ) }}" class="btn btn-info sm">Edit</a> </td>
                 </tr>
                @endforeach
            </tbody>
          </table>
        </div>
    </div>
</div>         
@endsection

@section('script')
    <!-- Your custom scripts go here -->
    <script>
        // Function to show Swal alert
        function showAlert(message, type) {
            Swal.fire({
                icon: type,
                title: message,
                showConfirmButton: false,
                timer: 1500
            });
        }

        // Check if a message exists in the session
        let alertMessage = '{{ session("success") }}';

        // If a message exists, show the alert
        if (alertMessage) {
            showAlert(alertMessage, 'success');
        }
    </script>
    @endsection