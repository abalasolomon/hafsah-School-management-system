<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class InventoryController extends Controller
{
    public function index()
    {
        $inventoryItems = Inventory::all();
        return view('inventory.index', compact('inventoryItems'));
    }

    public function create()
    {
        return view('inventory.create');
    }

    public function store(Request $request)
    {
        // Validate the request data
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:100',
            'quantity' => 'nullable|integer|min:0',
        ]);

    
        // Check if the validation fails
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
    
        // Create the inventory item
        $inventoryItem = Inventory::create([
            'name' => $request->input('name'),
            'price' => $request->input('price'),
            'quantity' => $request->input('quantity', 0), // Use specified quantity or default to 0
            'status' => $request->input('status'),
        ]);
    
        return redirect()->route('inventory.index')
            ->with('success', 'Inventory item created successfully');
    }
    

    public function show($id)
    {
        $inventoryItem = Inventory::findOrFail($id);
        return view('inventory.show', compact('inventoryItem'));
    }

    public function edit($id)
    {
        $inventoryItem = Inventory::findOrFail($id);
        return view('inventory.edit', compact('inventoryItem'));
    }

    public function update(Request $request, $id)
    {
        // Validate and update the inventory item

        $item = Inventory::findOrFail($id);
        $item->update([
            'name' => $request->input('name'),
            'price' => $request->input('price'),
            'quantity' => $request->input('quantity'),
            'status' => $request->input('status'),
        ]);
        return redirect()->route('inventory.index')
            ->with('success', 'Inventory item updated successfully');
    }

    public function destroy($id)
    {
        $inventoryItem = Inventory::findOrFail($id);
        //dd($inventoryItem);
        $inventoryItem->delete();

        return redirect()->route('inventory.index')
            ->with('success', 'Inventory item deleted successfully');
    }
}
