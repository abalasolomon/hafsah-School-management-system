<?php

namespace App\Http\Controllers;

use App\Models\SaleItem;
use Illuminate\Http\Request;

class SaleItemController extends Controller
{
    public function index()
    {
        $saleItems = SaleItem::all();
        return view('saleitems.index', compact('saleItems'));
    }

    public function create()
    {
        return view('saleitems.create');
    }

    public function store(Request $request)
    {
        // Validate and store the sale item

        return redirect()->route('saleitems.index')
            ->with('success', 'Sale item created successfully');
    }

    public function show($id)
    {
        $saleItem = SaleItem::findOrFail($id);
        return view('saleitems.show', compact('saleItem'));
    }

    public function edit($id)
    {
        $saleItem = SaleItem::findOrFail($id);
        return view('saleitems.edit', compact('saleItem'));
    }

    public function update(Request $request, $id)
    {
        // Validate and update the sale item

        return redirect()->route('saleitems.index')
            ->with('success', 'Sale item updated successfully');
    }

    public function destroy($id)
    {
        $saleItem = SaleItem::findOrFail($id);
        $saleItem->delete();

        return redirect()->route('saleitems.index')
            ->with('success', 'Sale item deleted successfully');
    }
}
