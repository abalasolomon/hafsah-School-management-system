@extends('layouts.structure')
@section('bread')
<div class="pagetitle">
    <h1>Dashboard</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item ">Inventory</li>
        <li class="breadcrumb-item active">Add Item</li>
      </ol>
    </nav>
  </div>
@endsection

@section('main')
<div class="col-lg-12">
    <div class="card">
        <div class="card-body">
          <h5 class="card-title">New Item</h5>
          <form action="{{ route('inventory.update', $inventoryItem->id) }}" method="post">
            @csrf
            @method('PUT')
            <div class="row mb-3">
                <label for="name" class="col-sm-2 col-form-label">Item Name</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="name" name="name" value="{{ $inventoryItem->name }}">
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <label for="quantity" class="col-sm-2 col-form-label">Quantity</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" id="quantity" name="quantity" value="{{ $inventoryItem->quantity }}">
                    @error('quantity')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <label for="price" class="col-sm-2 col-form-label">Price</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="price" name="price" value="{{ $inventoryItem->price }} ">
                    @error('price')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="row mb-3">
                <label for="price" class="col-sm-2 col-form-label"> Status </label>
                <div class="col-sm-10">
                    <select name="status" class="form-control" id="">
                        <option value="available" {{ $inventoryItem->status == 'available' ? 'selected' : ' ' }} >Available</option>
                        <option value="unavailable"  {{ $inventoryItem->status == 'unavailable' ? 'selected' : ' ' }} >Unavailable</option>
                    </select>
                    @error('price')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-sm-10 offset-sm-2">
                    <button type="submit" class="btn btn-primary">Update Item</button>
                </div>
            </div>
        </form> 
        </div>
    </div>
</div>         
@endsection