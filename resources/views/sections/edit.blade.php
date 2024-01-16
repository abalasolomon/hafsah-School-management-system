@extends('layouts.structure')
@section('bread')
<div class="pagetitle">
    <h1>Dashboard</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item ">Section</li>
        <li class="breadcrumb-item active">Edit</li>
      </ol>
    </nav>
  </div>
@endsection

@section('main')
<div class="col-lg-12">
    <div class="card">
        <div class="card-body">
          <h5 class="card-title">Edit Section</h5>
          <form action="{{ route('section.update', $section->id) }}" method="post">
            @csrf
            @method('PUT')
                <div class="row mb-3">
                    <label for="name" class="col-sm-2 col-form-label">Section Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="name" name="name" value="{{ $section->name }}">
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-sm-10 offset-sm-2">
                        <button type="submit" class="btn btn-primary">Update Section</button>
                    </div>
                </div>
          </form>  
        </div>
    </div>
</div>         
@endsection