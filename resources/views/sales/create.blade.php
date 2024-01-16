@extends('layouts.structure')
@section('bread')
<div class="pagetitle">
    <h1>Dashboard</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item ">Section</li>
        <li class="breadcrumb-item active">Add New</li>
      </ol>
    </nav>
  </div>
@endsection

@section('main')
<div class="col-lg-12">
    <div class="card">
        <div class="card-body">
          <h5 class="card-title">Cart</h5>
            <div class="row">
                <div class="col-md-8">
                    <table class="datatable-wrapper datatable-loading no-footer sortable searchable fixed-columns table table-striped">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Item </th>
                            <th scope="col">Price</th>
                            <th scope="col">Quantity</th>
                          </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
                <div class="col-md-4">
                    <form action="{{ route('section.store') }}" method="post">
                        @csrf    
                        <label for="name" class=" col-form-label">Basket</label>
                        <div class="">
                            <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                            
                      </form>
                </div>
            </div>

  
        </div>
    </div>
</div>         
@endsection