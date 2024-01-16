@extends('layouts.structure')
@section('bread')
<div class="pagetitle non-printable-items ">
    <h1>Dashboard</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ url('/sales')}}">Home</a></li>
        <li class="breadcrumb-item ">Sales</li>
        <li class="breadcrumb-item active">Details</li>
      </ol>
    </nav>
  </div>
@endsection

@section('main')
<div class="col-lg-12 ">
    <div class="card non-printable-items ">
        <div class="card-body">
          <h5 class="card-title">New Class</h5>
          <form action="{{ route('sales.report.date') }}" method="post">
            @csrf
                <div class="row mb-3">
                    <label for="name" class="col-sm-2 col-form-label">Pick Date</label>
                    <div class="col-sm-10">
                        <input type="date" class="form-control" id="date" name="date" value="{{ old('date') }}">
                        @error('date')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-sm-10 offset-sm-2">
                        <button type="submit" class="btn btn-primary">Generate Report</button>
                    </div>
                </div>
          </form>  
        </div>
    </div>
    <div class="card printable-items">       
        <div class="card-body">
          <h5 class="card-title">Sales Report For {{ $date }}</h5>
          <!-- Table with stripped rows -->
            <div class="sale-items">
              <table class="datatable-wrapper datatable-loading no-footer sortable searchable fixed-columns table table-striped">
                <thead>
                    <tr>
                        <th>Item</th>
                        <th>Item Price</th>
                        <th>Total Quantity Sold</th>
                        <th>Total Amount</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($salesReport as $item)
                        <tr>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->price }}</td>
                            <td>{{ $item->total_quantity }}</td>
                            <td>{{ $item->total_amount }}</td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="3">Overall Total:</td>
                        <td>{{ $overallTotalAmount }}</td>
                    </tr>
                </tfoot>
              </table>              
            <div class="print-button">
                <button class="btn btn-info float-end" onclick="window.print()">Print Report</button>
            </div>

            </div>
        </div>
    </div>
</div>         
@endsection