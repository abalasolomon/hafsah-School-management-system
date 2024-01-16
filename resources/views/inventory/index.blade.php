@extends('layouts.structure')
@section('bread')
<div class="pagetitle">
    <h1>Dashboard</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item active">Inventory</li>
      </ol>
    </nav>
  </div>
@endsection

@section('main')
<div class="col-lg-12">
    <div class="card">
        
        <div class="card-body">
          <h5 class="card-title">All Items</h5>
            <a href="{{ route('inventory.create')}}" class="btn btn-success float-end">Add New</a>
          <!-- Table with stripped rows -->
          <table id="table" class="datatable-wrapper datatable-loading no-footer sortable searchable fixed-columns table table-striped">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Price</th>
                <th scope="col">Quantity</th>
                <th scope="col">Status</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($inventoryItems as $index => $item)
              <tr>
                  <th scope="row">{{ $index + 1 }}</th>

                  <td>
                      {{ $item->name }}
                  </td> 
                  <td>
                    {{ $item->price }}
                </td> 
                <td>
                    {{ $item->quantity }}
                </td>
                <td>
                    {{ Str::ucfirst($item->status) }}
                </td> 
                  <td>
                    <a href="{{ route('inventory.edit', $item->id) }}" class="btn btn-info sm">Edit</a>
                    <a href="{{ route('inventory.destroy', $item->id) }}" class="btn btn-danger sm">Delete</a>
                  </td>
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

@endsection