<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use App\Models\SaleItem;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class SaleController extends Controller
{
    public function index(Request $request)
    {
        // Validate the request data
        $request->validate([
            'start_date' => 'nullable|date',
            'end_date' => ['nullable', 'date', Rule::requiredIf($request->has('start_date'))],
        ]);

        // Default to today if no start date is provided
        $startDate = $request->input('start_date', now()->toDateString());

        // Default to the start date if no end date is provided
        $endDate = $request->input('end_date', $startDate);

        // Perform any additional validation as needed


        if (isset($request) && !is_null($request->input('start_date'))) {
            $sales = Sale::whereBetween('created_at', [$startDate, $endDate])->get();

        }
        else{
            $sales = Sale::all();
        }
        $totalSales = $sales->sum('amount');


        return view('sales.index', compact('sales', 'totalSales', 'startDate', 'endDate'));
    }


    public function create()
    {
        return view('sales.create');
    }

    public function store(Request $request)
    {
        // Validate and store the sale

        return redirect()->route('sales.index')
            ->with('success', 'Sale created successfully');
    }

    public function show($id)
    {
        $sale = Sale::findOrFail($id);
        $saleItems = SaleItem::where('sale_id',$id)->get();
        return view('sales.show', compact('sale','saleItems'));
    }

    public function edit($id)
    {
        $sale = Sale::findOrFail($id);
        return view('sales.edit', compact('sale'));
    }

    public function update(Request $request, $id)
    {
        // Validate and update the sale

        return redirect()->route('sales.index')
            ->with('success', 'Sale updated successfully');
    }

    public function destroy($id)
    {
        $sale = Sale::findOrFail($id);
        $sale->delete();

        return redirect()->route('sales.index')
            ->with('success', 'Sale deleted successfully');
    }


    public function salesReport(Request $request)
    {
        // Set the default date to today
        $date = $request->input('date', Carbon::today()->toDateString());

        // Get sales items for the specified date
        $salesReport = SaleItem::whereDate('created_at', $date)
            ->select(
                'name',
                'price',
                DB::raw('SUM(quantity) as total_quantity'),
                DB::raw('SUM(price) as total_amount')
            )
            ->groupBy('name','price')
            ->get();

        // Calculate the overall total amount
        $overallTotalAmount = $salesReport->sum('total_amount');

        return view('sales.sales_report', compact('salesReport', 'date', 'overallTotalAmount'));
    }

}
