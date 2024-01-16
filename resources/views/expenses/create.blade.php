@extends('layouts.structure')
@section('bread')
<div class="pagetitle">
    <h1>Dashboard</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item ">Expenses</li>
        <li class="breadcrumb-item active">Add New</li>
      </ol>
    </nav>
  </div>
@endsection

@section('main')
<div class="col-lg-12">
    <div class="card">
        <div class="card-body">
          <h5 class="card-title">New Expense</h5>
          <div class="balance pb-3">Present Account Balance: {{ $accountBalance->total_amount }}</div>
          <form action="{{ route('expenses.store') }}" method="post">
            @csrf
                <div class="row mb-3">
                    <label for="name" class="col-sm-2 col-form-label">Description</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="description" name="description" value="{{ old('description') }}">
                        @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="amount" class="col-sm-2 col-form-label">Amount</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" id="amount" name="amount" value="{{ old('amount') }}">
                        @error('amount')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-sm-10 offset-sm-2">
                        <button type="submit" class="btn btn-primary">Create Class</button>
                    </div>
                </div>
          </form>  
        </div>
    </div>
</div>         
@endsection