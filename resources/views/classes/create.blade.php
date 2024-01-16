@extends('layouts.structure')
@section('main')
<div class="col-lg-12">
    <div class="card">
        <div class="card-body">
          <h5 class="card-title">New Class</h5>
          <form action="{{ route('class.store') }}" method="post">
            @csrf
                <div class="row mb-3">
                    <label for="name" class="col-sm-2 col-form-label">Class Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
                        @error('name')
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