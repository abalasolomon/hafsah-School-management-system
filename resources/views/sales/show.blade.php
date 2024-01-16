@extends('layouts.structure')
@section('bread')
<div class="pagetitle">
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
<div class="col-lg-12">
    <div class="card">
        
        <div class="card-body">
          <h5 class="card-title">Sales Detail</h5>
          <!-- Table with stripped rows -->
            <h2> Received For : {{ Str::ucfirst($sale->student->first_name) . ' ' . Str::ucfirst($sale->student->father_name . ' ' . $sale->student->grand_father_name) }} </h2>
            <h2> Date Received : {{ $sale->created_at }} </h2>
            <span>Receipt ID: {{str_pad($sale->id, 6, '0', STR_PAD_LEFT)}}</span>
            <div class="sale-items">                
                <table class="datatable-wrapper datatable-loading no-footer sortable searchable fixed-columns table table-striped">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Item Name</th>
                        <th scope="col">Price </th>
                        <th scope="col">Quantity</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($saleItems as $item)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$item['name']}}</td>
                            <td>N {{$item['price']}}.00 </td>
                            <td>{{$item['quantity']}} </td>
                        </tr>    
                        @endforeach
                    </tbody>
                </table>
                <div class="total">
                    <strong class="float-start">
                        <h2>Total: N {{$sale->total_amount}}.00</h2>
                    </strong>

                    <button class="btn btn-info float-end" onclick="window.print()">Print</button>
                </div>
            </div>
        </div>
    </div>
</div>         
@endsection