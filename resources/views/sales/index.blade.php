    @extends('layouts.structure')
@section('bread')
<div class="pagetitle">
    <h1>Dashboard</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ url('/sales')}}">Home</a></li>
        <li class="breadcrumb-item active">Sales</li>
      </ol>
    </nav>
  </div>
@endsection

@section('main')
<div class="col-lg-12">
    <div class="card">
        
        <div class="card-body">
          <h5 class="card-title">Sales Record</h5>
            <a href="{{ route('cart.create')}}" class="btn btn-success float-end">Add New</a>
          <!-- Table with stripped rows -->
          <table id="table" class="datatable-wrapper datatable-loading no-footer sortable searchable fixed-columns table table-striped">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Receipt</th>
                <th scope="col">Sold by</th>
                <th scope="col"> Student</th>
                <th scope="col">Total</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($sales as $index => $item)
              <tr>
                  <th scope="row">{{ $index + 1 }}</th>
                  <td>
                    {{str_pad($item->id, 6, '0', STR_PAD_LEFT)}}
                  </td>

                  <td>
                      {{ $item->soldby->name }}
                  </td>

                  <td>
                    {{ $item->student->first_name . ' ' . $item->student->father_name . ' ' . $item->student->grand_father_name }}
                </td>
                  
                  <td>
                    {{ $item->total_amount }}
                </td>

                <td>
                  <a href="{{ route('sales.show', $item->id) }}" class="btn btn-primary">View</a>
                  <a href="{{ route('sales.destroy', $item->id) }}" 
                    onclick="return confirm('Are you sure you want to delete this record?')"
                     class="btn btn-danger">Delete</a>
              </td>

              </tr>
             @endforeach
          
          </tbody>
          </table>
        </div>
    </div>
</div>         
@endsection