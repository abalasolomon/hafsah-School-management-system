@extends('layouts.structure')
@section('bread')
<div class="pagetitle">
    <h1>Dashboard</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item active">Expenses</li>
      </ol>
    </nav>
  </div>
@endsection

@section('main')
<div class="col-lg-12">
    <div class="card">
        
        <div class="card-body">
          <h5 class="card-title">All Expenses</h5>
          <div class="balance pb-3">Present Account Balance: {{ $accountBalance->total_amount }}</div>
            <a href="{{ route('expenses.create')}}" class="btn btn-success float-end">Add New</a>
          <!-- Table with stripped rows -->
          <table id="table" class="datatable-wrapper datatable-loading no-footer sortable searchable fixed-columns table table-striped">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Created_by</th>
                <th scope="col">Description</th>
                <th scope="col">Amount</th>
                <th scope="col">Created_at</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($expenses as $index => $item)
              <tr>
                  <th scope="row">{{ $index + 1 }}</th>

                  <td>
                      {{ $item->user->name }}
                  </td> 
                  <td>
                    {{ $item->description }}
                </td> 
                <td>
                    {{ $item->amount }}
                </td> 
                <td>
                  {{ $item->created_at }}
              </td> 
                  <td>
                    <a href="{{ route('expenses.destroy', $item->id) }}" class="btn btn-danger btn-sm">Delete</a>
                  </td>
              </tr>
          @endforeach
          
          </tbody>
          </table>
        </div>
    </div>
</div>         
@endsection